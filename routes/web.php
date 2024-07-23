<?php

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index');
Route::view('/consultancy', 'consultancy.index');
Route::view('/training', 'training.index');
Route::view('/about', 'about.index');
Route::view('/apply-for-job', 'about.apply-for-job');
Route::get('/contacts', function () {
    return view('contacts', [
        "countries" => Country::all(),
        "courses" => pierData(model: "Course", filters: ["pluck" => "title"])["data"],
        "solutions" => pierData(model: "Solution", filters: ["pluck" => "title", "whereFeatured" => 1])["data"]
    ]);
});
Route::view('/podcast', 'podcast.index');
Route::view('/podcast/{slug}', 'podcast.detail');
Route::view('/thrive-in-the-middle', 'thrive-in-the-middle.index');
Route::get('/thrive-in-the-middle/form', function () {
    return view('thrive-in-the-middle.enroll.index', ["countries" => Country::all()]);
});

Route::post('/subscribe', function (Request $request) {
    $email = $request->input("email");
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . env('HUBSPOT_APP_TOKEN'),
    ])->post("https://api.hubapi.com/contacts/v1/contact/createOrUpdate/email/$email/", [
        "properties" => [
            [
                "property" =>  "email",
                "value" =>  $email
            ],
        ]
    ]);

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer ' . env('HUBSPOT_APP_TOKEN'),
    ])->post("https://api.hubapi.com/contacts/v1/lists/6/add", [
        'emails' => [
            $email
        ]
    ]);

    return response()->json($response->body());
});

Route::get('/fetch-podcasts', function (Request $request) {
    if ($request->input("admin") != env("ADMIN_CODE")) return response('', 404);

    $response = Http::get("https://www.buzzsprout.com/api/" . env('BUZZSPROUT_ID') . "/episodes.json?api_token=" . env('BUZZSPROUT_API_TOKEN'));
    $episodes = collect($response->json())->map(function ($ep) {
        $e = (object) $ep;
        $link = str_replace(".mp3", "", $e->audio_url);

        return [
            '_id' => $e->id,
            'image' => $e->artwork_url,
            'title' => str_replace("00" . $e->episode_number . " - ", "", explode(" ft ", $e->title)[0]),
            'description' => $e->description,
            'featuring' => explode(" ft ", $e->title)[1] ?? null,
            'season' => $e->season_number,
            'number' => $e->episode_number,
            'date' => $e->published_at,
            'link' => $link,
            'slug' => collect(explode("/", $link ?? ""))->last(),
            'total_plays' => $e->total_plays
        ];
    })->filter(fn ($e) => $e['number']);

    pierTruncateModel("Podcast");
    pierBulkInsert("Podcast", $episodes);

    // return response()->json($response->json());
    return response()->json($episodes);
});

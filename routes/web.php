<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home.index');
Route::view('/consultancy', 'consultancy.index');
Route::view('/training', 'training.index');
Route::view('/about', 'about.index');
Route::view('/contacts', 'contacts');
Route::view('/podcast', 'podcast.index');
Route::view('/thrive-in-the-middle', 'thrive-in-the-middle.index');
Route::get('/fetch-podcasts', function (Request $request) {
    if ($request->input("admin") != env("ADMIN_CODE")) return response('', 404);

    $response = Http::get("https://www.buzzsprout.com/api/" . env('BUZZSPROUT_ID') . "/episodes.json?api_token=" . env('BUZZSPROUT_API_TOKEN'));
    $episodes = collect($response->json())->map(function ($ep) {
        $e = (object) $ep;

        return [
            '_id' => $e->id,
            'image' => $e->artwork_url,
            'title' => str_replace("00" . $e->episode_number . " - ", "", explode(" ft ", $e->title)[0]),
            'description' => $e->description,
            'featuring' => explode(" ft ", $e->title)[1] ?? null,
            'season' => $e->season_number,
            'number' => $e->episode_number,
            'date' => $e->published_at,
            'link' => str_replace(".mp3", "", $e->audio_url),
            'total_plays' => $e->total_plays
        ];
    })->filter(fn ($e) => $e['number']);

    pierTruncateModel("Podcast");
    pierBulkInsert("Podcast", $episodes);

    // return response()->json($response->json());
    return response()->json($episodes);
});

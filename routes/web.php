<?php

use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Statamic\Facades\Entry;

Route::get('/contacts', function () {
    return view('contacts', [
        'countries' => Country::all(),
        'courses' => Entry::query()->where('collection', 'courses')->get()->map(fn ($e) => $e->get('title')),
        'solutions' => Entry::query()->where('collection', 'solutions')->where('featured', true)->get()->map(fn ($e) => $e->get('title')),
    ]);
});
Route::view('/podcast/{slug}', 'podcast.detail');
Route::get('/thrive-in-the-middle/form', function () {
    return view('thrive-in-the-middle.enroll.index', ['countries' => Country::all()]);
});

Route::post('/subscribe', function (Request $request) {
    $email = $request->input('email');
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer '.env('HUBSPOT_APP_TOKEN'),
    ])->post("https://api.hubapi.com/contacts/v1/contact/createOrUpdate/email/$email/", [
        'properties' => [
            [
                'property' => 'email',
                'value' => $email,
            ],
        ],
    ]);

    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'Authorization' => 'Bearer '.env('HUBSPOT_APP_TOKEN'),
    ])->post('https://api.hubapi.com/contacts/v1/lists/6/add', [
        'emails' => [
            $email,
        ],
    ]);

    return response()->json($response->body());
});

Route::get('/fetch-podcasts', function (Request $request) {
    if ($request->input('admin') != env('ADMIN_CODE')) {
        return response('', 404);
    }

    $response = Http::get('https://www.buzzsprout.com/api/'.env('BUZZSPROUT_ID').'/episodes.json?api_token='.env('BUZZSPROUT_API_TOKEN'));
    $episodes = collect($response->json())->map(function ($ep) {
        $e = (object) $ep;
        $link = str_replace('.mp3', '', $e->audio_url);

        return [
            '_id' => $e->id,
            'image' => $e->artwork_url,
            'title' => str_replace('00'.$e->episode_number.' - ', '', explode(' ft ', $e->title)[0]),
            'description' => $e->description,
            'featuring' => explode(' ft ', $e->title)[1] ?? null,
            'season' => $e->season_number,
            'number' => $e->episode_number,
            'date' => $e->published_at,
            'link' => $link,
            'slug' => collect(explode('/', $link ?? ''))->last(),
            'total_plays' => $e->total_plays,
        ];
    })->filter(fn ($e) => $e['number']);

    // Clear all existing podcast entries
    Entry::query()->where('collection', 'podcasts')->get()->each->delete();

    // Re-insert from Buzzsprout
    $episodes->each(function ($ep) {
        $date = Carbon::parse($ep['date'])->format('Y-m-d');
        Entry::make()
            ->collection('podcasts')
            ->id((string) $ep['_id'])
            ->slug($ep['slug'] ?: (string) $ep['_id'])
            ->date($date)
            ->data([
                'title' => $ep['title'],
                'description' => $ep['description'],
                'featuring' => $ep['featuring'],
                'season' => $ep['season'],
                'number' => $ep['number'],
                'date' => $date,
                'link' => $ep['link'],
                'slug' => $ep['slug'],
                'image' => $ep['image'],
                'total_plays' => $ep['total_plays'],
            ])
            ->save();
    });

    return response()->json($episodes);
});

Route::post('/cp/widgets/refresh-podcasts', function (Request $request) {
    $response = Http::get('https://www.buzzsprout.com/api/'.env('BUZZSPROUT_ID').'/episodes.json?api_token='.env('BUZZSPROUT_API_TOKEN'));
    $episodes = collect($response->json())->map(function ($ep) {
        $e = (object) $ep;
        $link = str_replace('.mp3', '', $e->audio_url);

        return [
            '_id' => $e->id,
            'image' => $e->artwork_url,
            'title' => str_replace('00'.$e->episode_number.' - ', '', explode(' ft ', $e->title)[0]),
            'description' => $e->description,
            'featuring' => explode(' ft ', $e->title)[1] ?? null,
            'season' => $e->season_number,
            'number' => $e->episode_number,
            'date' => $e->published_at,
            'link' => $link,
            'slug' => collect(explode('/', $link ?? ''))->last(),
            'total_plays' => $e->total_plays,
        ];
    })->filter(fn ($e) => $e['number']);

    if ($request->input('mode') === 'reimport') {
        Entry::query()->where('collection', 'podcasts')->get()->each->delete();
        $toImport = $episodes;
    } else {
        $existingIds = Entry::query()->where('collection', 'podcasts')->get()->map->id()->all();
        $toImport = $episodes->filter(fn ($ep) => ! in_array((string) $ep['_id'], $existingIds));
    }

    $toImport->each(function ($ep) {
        $date = Carbon::parse($ep['date'])->format('Y-m-d');
        Entry::make()
            ->collection('podcasts')
            ->id((string) $ep['_id'])
            ->slug($ep['slug'] ?: (string) $ep['_id'])
            ->date($date)
            ->data([
                'title' => $ep['title'],
                'description' => $ep['description'],
                'featuring' => $ep['featuring'],
                'season' => $ep['season'],
                'number' => $ep['number'],
                'date' => $ep['date'],
                'link' => $ep['link'],
                'slug' => $ep['slug'],
                'image' => $ep['image'],
                'total_plays' => $ep['total_plays'],
            ])
            ->save();
    });

    return response()->json(['count' => $toImport->count()]);
})->middleware('statamic.cp');

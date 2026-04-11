<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Statamic\Facades\Entry;

class MigrateToStatamic extends Command
{
    protected $signature = 'migrate:to-statamic {--fresh : Delete existing entries before migrating}';

    protected $description = 'Migrate content from SQLite (Pier) to Statamic flat-file collections';

    public function handle(): int
    {
        if ($this->option('fresh')) {
            $this->info('Clearing existing entries...');
            foreach (['faqs', 'solutions', 'challenges', 'courses', 'podcasts'] as $collection) {
                Entry::query()->where('collection', $collection)->get()->each->delete();
            }
        }

        $this->migrateFaqs();
        $this->migrateSolutions();
        $this->migrateChallenges();
        $this->migrateCourses();
        $this->migratePodcasts();

        $this->info('');
        $this->info('Migration complete. Run: php please stache:refresh');

        return self::SUCCESS;
    }

    private function migrateFaqs(): void
    {
        $rows = DB::table('f_a_q')->orderBy('order')->get();
        $this->info("Migrating {$rows->count()} FAQs...");

        foreach ($rows as $row) {
            Entry::make()
                ->collection('faqs')
                ->id($row->_id)
                ->slug(Str::slug($row->question))
                ->data([
                    'question' => $row->question,
                    'answer' => $row->answer,
                ])
                ->save();
        }

        $this->line("  ✓ {$rows->count()} FAQs");
    }

    private function migrateSolutions(): void
    {
        $rows = DB::table('solution')->get();
        $this->info("Migrating {$rows->count()} solutions...");

        foreach ($rows as $row) {
            Entry::make()
                ->collection('solutions')
                ->id($row->_id)
                ->slug(Str::slug($row->title))
                ->data([
                    'title' => $row->title,
                    'description' => $row->description,
                    'featured' => (bool) $row->featured,
                ])
                ->save();
        }

        $this->line("  ✓ {$rows->count()} solutions");
    }

    private function migrateChallenges(): void
    {
        $rows = DB::table('challenge')->orderBy('order')->get();
        $this->info("Migrating {$rows->count()} challenges...");

        foreach ($rows as $row) {
            $solutionIds = DB::table('challenge_solutions')
                ->where('challenge_id', $row->_id)
                ->pluck('solutions_id')
                ->toArray();

            Entry::make()
                ->collection('challenges')
                ->id($row->_id)
                ->slug(Str::slug($row->title))
                ->data([
                    'title' => $row->title,
                    'description' => $row->description,
                    'icon' => $row->icon,
                    'image' => $row->image,
                    'order' => $row->order,
                    'solutions' => $solutionIds,
                ])
                ->save();
        }

        $this->line("  ✓ {$rows->count()} challenges");
    }

    private function migrateCourses(): void
    {
        $rows = DB::table('course')->orderBy('order')->get();
        $this->info("Migrating {$rows->count()} courses...");

        foreach ($rows as $row) {
            Entry::make()
                ->collection('courses')
                ->id($row->_id)
                ->slug(Str::slug($row->title))
                ->data([
                    'title' => $row->title,
                    'description' => $row->description,
                    'prompt' => $row->prompt,
                    'action' => $row->action,
                    'order' => $row->order,
                ])
                ->save();
        }

        $this->line("  ✓ {$rows->count()} courses");
    }

    private function migratePodcasts(): void
    {
        $rows = DB::table('podcast')->orderBy('season')->orderBy('number')->get();
        $this->info("Migrating {$rows->count()} podcasts...");

        foreach ($rows as $row) {
            $date = $row->date ? substr($row->date, 0, 10) : null;

            Entry::make()
                ->collection('podcasts')
                ->id($row->_id)
                ->slug($row->slug ?: Str::slug($row->title))
                ->data([
                    'title' => $row->title,
                    'description' => $row->description,
                    'featuring' => $row->featuring,
                    'number' => $row->number,
                    'season' => $row->season,
                    'date' => $date,
                    'link' => $row->link,
                    'slug' => $row->slug,
                    'image' => $row->image,
                    'total_plays' => $row->total_plays,
                ])
                ->save();
        }

        $this->line("  ✓ {$rows->count()} podcasts");
    }
}

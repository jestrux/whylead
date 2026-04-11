# Statamic Migration Plan

Migrating content from Pier (SQLite) to Statamic 6 (flat-file).

## Content Types

| Type | Records | Notes |
|------|---------|-------|
| Podcasts | 87 | Dynamic — fetched from Buzzsprout API |
| FAQs | 9 | |
| Challenges | 9 | Many-to-many relationship with Solutions |
| Solutions | 10 | |
| Courses | 5 | |

## Phases

### Phase 1: Create Statamic collection blueprints
Create blueprints for: faqs, solutions, challenges, courses, podcasts.
Set up collection structures in `content/collections/`.

### Phase 2: Migrate data
Write a one-time artisan command to export all SQLite data to Statamic YAML
entries in `content/collections/{collection}/`.

### Phase 3: Update views
Replace all `@pierdata()` / `@endpierdata()` blocks with Statamic `Entry::query()`
calls. Convert affected `Route::view()` calls to `Route::get()` closures that
pass entry data.

### Phase 4: Update fetch-podcasts route
Replace `pierTruncateModel` / `pierBulkInsert` with Statamic entry management
so the Buzzsprout sync writes YAML entries instead of SQLite rows.

### Phase 4b: Set up asset container
Create a Statamic asset container pointing to the existing `public/img/uploads/`
directory — no files move. Requires:
- Adding an `uploads` filesystem disk in `config/filesystems.php`
- Creating `content/assets/uploads.yaml`

This gives Statamic's `/cp` a full asset browser for the existing uploads and
any future image uploads via the CP.

### Phase 5: Remove Pier
Remove `jestrux/pier` from `composer.json` once all content is managed via
Statamic's control panel (`/cp`).

## What stays the same
- All view templates, HTML, Alpine.js — no visual changes
- Image paths under `public/img` — unchanged
- The `/fetch-podcasts` route — still exists, just writes YAML instead of SQLite

## Challenges → Solutions relationship
In Statamic, the many-to-many link becomes an `entries` fieldtype on the
Challenge blueprint pointing to the Solutions collection.

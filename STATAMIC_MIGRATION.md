# Statamic Native Migration Plan

The goal is to make the app fully Statamic-native so any Statamic-familiar developer can pick it up without learning a custom system. Community addons (SEO, forms) should "just work" out of the box.

---

## Current State Audit

### Already in Statamic ✅
| Content | Collection/Global |
|---|---|
| Challenges | `challenges` collection |
| Solutions | `solutions` collection |
| FAQs | `faqs` collection |
| Courses | `courses` collection |
| Podcasts | `podcasts` collection (Buzzsprout-synced) |
| Page images | `consultancy` + `training` globals |
| Form options | `form_options` global |

### Hardcoded in Blade views ❌
| Content | View file | Statamic home |
|---|---|---|
| Team members (3) | `about/team.blade.php` | `team` collection |
| Testimonials (3) | `consultancy/testimonials.blade.php` | `testimonials` collection |
| Training programs (7) | `training/programmes.blade.php` | `programs` collection |
| Cohort schedule (2) | `thrive-in-the-middle/upcoming-cohorts.blade.php` | `cohorts` collection |
| Leadership audit indicators (6) | `home/leaders.blade.php` | `audit_sections` collection |
| Company values (3) | `about/our-values.blade.php` | `about` global |
| Career benefits (3) | `about/careers.blade.php` | `about` global |
| Job qualifications (4) | `about/careers.blade.php` | `about` global |
| Service features (3) | `home/working-with-whylead.blade.php` | `home` global |
| Thrive benefits (4) | `home/thriving-in-the-middle.blade.php` | `thrive_in_the_middle` global |
| Career FAQs (3) | `about/careers.blade.php` | `faqs` collection (with category) |
| Thrive FAQs (3) | `thrive-in-the-middle/upcoming-cohorts.blade.php` | `faqs` collection (with category) |
| Challenge images | `home/challenges.blade.php` | Add `image` field to `challenges` blueprint |
| Site navigation | Hardcoded HTML in layout | Statamic Navigation |

### Missing Statamic features
- No Navigation trees configured
- No Taxonomies
- Images stored as text paths instead of asset fieldtype
- No Statamic SEO solution (OG meta hardcoded in layout)
- No Statamic forms (custom PHP array builders posting to HubSpot directly)
- Pages are Laravel routes → Blade views, not Statamic entries

---

## Phase 1 — Quick Wins (No structural changes)

### ✅ 1.1 Convert image fields to Assets fieldtype
Replace `text` fields in consultancy and training globals with `assets` fieldtype.
- `consultancy`: banner_image, thriving_teams_image, happier_workplace_image, facilitating_gatherings_image
- `training`: banner_image, learning_approach_image
- Images moved out of `pier_files/` to uploads root with clean names
- Views updated to use `$_g->augmentedValue('field')->value()?->url()` — helper removed

### ✅ 1.2 Add image field to Challenges blueprint
The challenge images are hardcoded in `home/challenges.blade.php` as a PHP array keyed by slug. Add an `image` field to the `challenges` blueprint so they're managed in the CP.

### ✅ 1.3 Add category/section field to FAQs blueprint
Career FAQs and Thrive FAQs are hardcoded separately from the `faqs` collection. Add a `section` taxonomy or select field to the FAQs blueprint so all FAQs live in one place, filterable by page.
- `faq_section` taxonomy created with terms: `training`, `careers`, `thrive_in_the_middle`
- All FAQ entries tagged; views use `->whereTaxonomy('faq_section::slug')` to filter

### ✅ 1.4 Configure site Navigation
Create a Statamic Navigation tree for the main nav so menu items are CP-managed instead of hardcoded in HTML.

---

## Phase 2 — Content Collections (Medium lift) ✅

Move all hardcoded Blade arrays into proper Statamic collections and globals.

### ✅ 2.1 New collections
| Collection | Fields | Notes |
|---|---|---|
| `team` | name, position, description, image, values (array) | Replace hardcoded staff array in `about/team.blade.php` |
| `testimonials` | client_name, client_position, quote, image, company | Replace hardcoded array in `consultancy/testimonials.blade.php` |
| `programs` | title, description, image, outcomes (array), order | Replace hardcoded array in `training/programmes.blade.php` |
| `cohorts` | label, month, year, description, enrollment_link | Replace hardcoded dates in `thrive-in-the-middle/upcoming-cohorts.blade.php` |
| `audit_sections` | title, color, indicators (grid: icon, title, description) | Replace hardcoded leadership audit in `home/leaders.blade.php` |

### ✅ 2.2 Expand existing globals with page-specific content
Rather than creating many small globals, consolidate by page:

**`about` global** (new) — replaces hardcoded content in about views:
- `values` replicator (icon, title, description) — currently in `about/our-values.blade.php`
- `career_benefits` replicator (icon, image, title, description) — currently in `about/careers.blade.php`
- `job_qualifications` replicator (icon, title) — currently in `about/careers.blade.php`

**`home` global** (new) — replaces hardcoded content in home views:
- `service_features` replicator (icon, title, description) — currently in `home/working-with-whylead.blade.php`

**`thrive_in_the_middle` global** (new) — replaces hardcoded content:
- `program_benefits` replicator (icon, title) — currently in `home/thriving-in-the-middle.blade.php`

### ✅ 2.3 Taxonomies
**`faq_section` taxonomy** — tag FAQs by section (General, Careers, Thrive in the Middle) so the single `faqs` collection serves all pages with filtered queries instead of separate hardcoded arrays.

---

## Phase 3 — Pages Collection & Per-page SEO

The biggest architectural shift. Pages become Statamic entries in a structured collection, unlocking per-page SEO, live preview, and CP editing of page content.

### 3.1 Create `pages` collection with structure tree

Pages to create as entries:
| Page | Slug |
|---|---|
| Home | `/` |
| About | `/about` |
| Consultancy | `/consultancy` |
| Training | `/training` |
| Thrive in the Middle | `/thrive-in-the-middle` |
| Contact | `/contacts` |
| Podcast | `/podcast` |
| Apply for Job | `/apply-for-job` |

### 3.2 Remove Laravel routes for Statamic-handled pages
Remove `Route::view()` calls for pages now handled by Statamic routing.

### 3.3 Dissolve page-specific globals
- `consultancy` and `training` globals slim down to section-only images (or move to page entry blueprints)
- Banner images move into the page entry blueprint

---

## Phase 4 — Statamic Forms

Replace custom PHP array form builders with Statamic-native forms. HubSpot integration moves server-side via an event listener.

### 4.1 Create form blueprints in CP
| Form | Handle |
|---|---|
| Contact | `contact` |
| Apply for Job | `apply_for_job` |
| Thrive Enrollment | `thrive_enrollment` |

### 4.2 HubSpot integration via event listener
Statamic fires `Statamic\Events\FormSubmitted` on every submission. Create a listener that posts to HubSpot's Forms API and adds contacts to the relevant list. Submissions are stored flat-file in Statamic as backup.

### 4.3 Replace custom form components
- Remove `<x-dynamic-form>` Blade component
- Replace with Statamic `{{ form:handle }}` tags
- `form_options` global continues to serve dynamic choice lists

### 4.4 Cleanup
- Remove HubSpot JS fetch calls from views
- Remove `/subscribe` route from `routes/web.php`

---

## Summary

| Phase | Effort | What changes | Unlocks |
|---|---|---|---|
| 1 — Quick wins | Low | Assets fieldtype, challenge images, FAQ categories, Navigation | CP-managed nav and content |
| 2 — Content collections ✅ | Medium | Team, testimonials, programs, cohorts, audit sections moved to Statamic | All content CP-managed, no more hardcoded Blade arrays |
| 3 — Pages collection | Medium | Pages become Statamic entries with structure tree | Per-page SEO, live preview, CP page editing |
| 4 — Statamic forms | Medium-High | Native forms replace custom builders, HubSpot via event listener | CP form management, submission inbox, standard Statamic form flow |

Complete all four phases and any Statamic developer can manage the full site from the CP with zero knowledge of the custom layer.

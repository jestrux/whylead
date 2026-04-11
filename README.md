# WhyLead

Website for WhyLead Consultancy — built with Laravel, Statamic CMS, Livewire, and Tailwind CSS.

## Stack

- **Laravel 12** + **Statamic 6** (flat-file CMS)
- **Livewire 3** + **Flux UI**
- **Tailwind CSS v3**
- **Alpine.js**

## Local Development

```bash
composer install
yarn install
cp .env.example .env
php artisan key:generate
composer run dev   # starts Laravel + Vite together
```

## Deployment

The app is hosted on shared hosting at `2026.whyleadothers.com`.

SSH credentials and step-by-step deploy commands are in `DEPLOY.md` (gitignored).
Copy `DEPLOY.md.example` to `DEPLOY.md` and fill in your credentials.

**Quick deploy after pushing to `statamic` branch** (see `DEPLOY.md` for exact commands with credentials):

1. SSH into the server and run `git pull origin statamic && php artisan statamic:stache:clear && php artisan cache:clear`
2. If frontend changed — run `yarn run build` locally, then rsync `public/build/` to `public_html/build/`
3. If images changed — rsync `public/img/uploads/` to `public_html/img/uploads/`

## Content Management

Content is managed via the Statamic CP at `/cp`. Collections include courses, podcasts, solutions, and testimonials.

### CP Password Changes

When updating the CP password, Statamic rewrites `users/admin@whylead.co.yaml` on the server. Always run `git checkout users/admin@whylead.co.yaml` before pulling to avoid merge conflicts. Avoid special characters like `!` in passwords — they get mangled by shell escaping over SSH.

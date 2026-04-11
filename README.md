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

**Quick deploy after pushing to `statamic` branch:**

```bash
# 1. Pull on server
ssh -p 18765 -i ~/.ssh/id_ed25519 u2441-qhfc5wtejp8h@ssh.whyleadothers.com \
  'cd /home/customer/www/whyleadothers.com/2026.whyleadothers.com && git pull origin statamic && php artisan statamic:stache:clear && php artisan cache:clear'

# 2. If frontend changed — build locally then upload
yarn run build
rsync -avz -e "ssh -p 18765 -i ~/.ssh/id_ed25519" \
  public/build/ \
  u2441-qhfc5wtejp8h@ssh.whyleadothers.com:/home/customer/www/2026.whyleadothers.com/public_html/build/
```

## Content Management

Content is managed via the Statamic CP at `/cp`. Collections include courses, podcasts, solutions, and testimonials.

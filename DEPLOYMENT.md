# Deployment Guide — GitHub + InfinityFree

Order: **run locally → push to GitHub → upload to InfinityFree → put the live link in the README.**

---

## Part 0 — Run it locally first

Needs PHP 8.2+ and Composer (XAMPP's PHP works). Open a terminal in the project folder:

```bash
composer install
copy .env.example .env        # macOS/Linux: cp .env.example .env
php artisan key:generate
php artisan serve
```

Open http://127.0.0.1:8000 and click through Home, About, Customers and Users.
`php artisan route:list --except-vendor` should list the four routes.

Optional database: start MySQL in XAMPP, create `saripos_db` in phpMyAdmin, then
`php artisan migrate --seed`.

---

## Part 1 — GitHub

1. Sign in at https://github.com → **+** (top right) → **New repository**.
   - Name: `IT0049-TFA5-Laravel-POS`
   - Visibility: **Public** (so your professor can open it)
   - Leave "Add a README", ".gitignore" and "license" **unchecked**
   - **Create repository**
2. In the project folder terminal (first time on this PC only, set your identity):

   ```bash
   git config --global user.name "Jose Luis Pascual"
   git config --global user.email "you@example.com"
   ```
3. Commit and push:

   ```bash
   git init
   git add .
   git commit -m "TFA5: Laravel POS foundations (4 pages, static arrays)"
   git branch -M main
   git remote add origin https://github.com/YOUR-USERNAME/IT0049-TFA5-Laravel-POS.git
   git push -u origin main
   ```
   A browser window asks you to sign in to GitHub the first time.
4. Refresh the repo page. You should see `app/`, `database/` (migrations, seeders and
   `saripos_db.sql`), `resources/`, `routes/`, `README.md`, etc.
   You should **not** see `vendor/` or `.env`. `.gitignore` keeps them out on purpose.

---

## Part 2 — InfinityFree

### 2.1 Create the hosting account
1. Log in at https://app.infinityfree.com → **Create Account**.
2. Pick a free subdomain, e.g. `saripos-tfa5.infinityfreeapp.com` (any free name works).
   A new account keeps this separate from your earlier TSA site.
3. Wait until the account shows **Active**. A brand-new subdomain can take a few minutes
   (sometimes longer) before it opens in your browser.

### 2.2 Prepare a production build on your PC
In the project folder:

```bash
php artisan optimize:clear
composer install --no-dev
```

(`--no-dev` removes testing packages so there are fewer files to upload. Don't add
`--optimize-autoloader`: InfinityFree rejects PHP files over 1 MB. Run `composer install`
again later if you need the dev tools back.)

Open `.env` and change these lines (keep the existing `APP_KEY`):

```
APP_ENV=production
APP_DEBUG=false
APP_URL=https://saripos-tfa5.infinityfreeapp.com
```

If https doesn't open for your subdomain yet, use `http://` in `APP_URL`.

### 2.3 Upload with FileZilla
1. Install FileZilla Client (https://filezilla-project.org).
2. In the InfinityFree client area → your account → **FTP Details**. Note the
   hostname (`ftpupload.net`), username (`if0_...`) and password (click **Show**).
3. FileZilla → **Server → Force showing hidden files** (so `.env` and `.htaccess` upload).
4. Connect with Host = `ftpupload.net`, Username = `if0_...`, Password, Port = `21`
   → **Quickconnect**.
5. On the right side open `htdocs`. Delete the default placeholder file(s) in it
   (e.g. `index2.html`).
6. On the left side open your project folder, select **everything inside it** (not the folder
   itself), and drag it into `htdocs`. Must include: `app`, `bootstrap`, `config`,
   `database`, `public`, `resources`, `routes`, `storage`, `vendor`, `artisan`,
   `composer.json`, **`.env`** and **`.htaccess`**.
   Skip `node_modules`, `.git` and `tests` if you have them.
7. Wait for "Queued files: 0" (`vendor` has thousands of small files; expect 10–30 minutes).
   If some transfers fail, right-click **Failed transfers → Reset and requeue all**.

`htdocs` should end up looking like:

```
htdocs/
├── .env
├── .htaccess      <- sends every request to public/
├── app/  bootstrap/  config/  database/  public/  resources/  routes/  storage/  vendor/
├── artisan
└── composer.json
```

### 2.4 (Optional) Import the database
1. Client area → **MySQL Databases** → create a database (e.g. `saripos`).
   Note the **MySQL hostname** (`sqlXXX.infinityfree.com`), **database name**
   (`if0_..._saripos`), **username** (`if0_...`) and **password** (your hosting account password).
2. Click **phpMyAdmin** beside the database → **Import** → choose
   `database/saripos_db.sql` → **Import/Go**.
3. Put the same values in the server's `.env` (`DB_HOST`, `DB_DATABASE`, `DB_USERNAME`,
   `DB_PASSWORD`) and re-upload `.env`.

The TFA5 pages don't read the database (they use static arrays), so the site works
even if you skip this step.

### 2.5 Test the live site
Open each page:
- `https://YOUR-SUBDOMAIN/`
- `https://YOUR-SUBDOMAIN/about`
- `https://YOUR-SUBDOMAIN/customers`
- `https://YOUR-SUBDOMAIN/users`

Also open `https://YOUR-SUBDOMAIN/.env`. It must show a **404** page (your secrets stay hidden).

### Troubleshooting
| Symptom | Fix |
|---|---|
| Directory listing or InfinityFree default page | `.htaccess` is missing from `htdocs`. Turn on hidden files in FileZilla and upload it. |
| "500 Server Error" | `.env` missing or `APP_KEY` empty. Upload `.env`. To see the real error, set `APP_DEBUG=true` for a minute, reload, then set it back to `false`. |
| `Class "..." not found` | An upload was skipped. Re-upload `vendor/` (FileZilla → overwrite if size differs). |
| Page loads without styling | `APP_URL` scheme doesn't match the address bar (http vs https). Fix it in `.env` and re-upload. |
| `/about` etc. give 404 but `/` works | `public/.htaccess` didn't upload. Upload it. |
| Site not found right after creating the account | New subdomain still setting up. Wait, or try another network / incognito. |

---

## Part 3 — Finish the submission

1. Put the live link and repo link at the top of `README.md`, then:

   ```bash
   git add README.md
   git commit -m "Add live site link"
   git push
   ```
2. Submit both links:
   - GitHub: `https://github.com/YOUR-USERNAME/IT0049-TFA5-Laravel-POS`
   - Hosted: `https://YOUR-SUBDOMAIN.infinityfreeapp.com`

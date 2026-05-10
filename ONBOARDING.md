# Onboarding

How to install the louisecarronharris.com rebuild locally and start contributing.

## Prerequisites

- **[Local by Flywheel](https://localwp.com/)** — local WordPress environment.
- **Git**.
- **Node.js ≥ 20.10** and **npm ≥ 10.2** (`nvm` recommended).
- **PHP 8.2+** on your CLI (Local provides one for the site itself; you'll want it on the PATH for `composer`).
- **[Composer](https://getcomposer.org/)** — used to install PHPCS / WordPress Coding Standards.

## First-time setup

This repo is the **WordPress webroot** (i.e. the `app/public/` directory inside a Local-by-Flywheel site). The cleanest setup is to let Local create a fresh site, replace its webroot with the repo, then merge Local's WP core back on top.

### 1. Create a Local site

Open Local → **Create a new site**. Name it whatever you like (e.g. `louise-carron-harris-2026`). Default PHP version (8.2+), default web server. Stop the site once it's created.

### 2. Replace the webroot with this repo

```bash
# macOS Local default sites path
cd "$HOME/Local Sites/<your-site-name>/app/"

# Park Local's auto-generated webroot
mv public public.backup

# Clone the repo as the new webroot
git clone <REPO_URL> public
```

### 3. Restore WordPress core, default themes, and wp-config.php

The repo only tracks the child theme + workflows + root config. WP core, the bundled `twentytwentyfive` theme, and `wp-config.php` are all gitignored — copy them in from Local's backup:

```bash
# Copy anything not already in the cloned tree (WP core, default theme, wp-config.php, etc.)
rsync -a --ignore-existing public.backup/ public/
```

Verify `public/wp-config.php` exists and the credentials match Local's **Database** tab. For local work, make sure these are set:

```php
define( 'WP_ENVIRONMENT_TYPE', 'local' );
define( 'WP_DEBUG', true );
```

### 4. Start the site & install themes via wp-admin

Start the site in Local, then **Open site → wp-admin**:

- **Install Ollie** (parent): Appearance → Themes → Add New → search "Ollie" by Mike McAlister → Install. **Don't activate Ollie itself** — it's only the parent.
- **Activate the child**: Appearance → Themes → "Louise Carron Harris" → Activate.

### 5. Install theme dependencies

```bash
cd wp-content/themes/louise-carron-harris

# PHPCS + WordPress Coding Standards (used by PHPCS workflow on PRs)
composer install

# Front-end build deps (only after package.json is committed — see Dev log)
npm install
```

You should now be able to load the local site URL (set by Local — typically `https://<site-name>.local`) and see Ollie's default templates rendering through the child theme.

## Daily workflows

All theme commands run from `wp-content/themes/louise-carron-harris/`.

```bash
cd wp-content/themes/louise-carron-harris

# Lint changed PHP
vendor/bin/phpcs --standard=phpcs.xml.dist path/to/file.php

# Lint everything
vendor/bin/phpcs --standard=phpcs.xml.dist .

# Auto-fix what PHPCS can fix
vendor/bin/phpcbf --standard=phpcs.xml.dist .

# Production asset build (mirrors CI)
npm run build
```

Site editing — page templates, template parts, patterns, theme tokens — is done in the WP block editor (Appearance → Editor). Exporting these as files into the child theme's `templates/`, `parts/`, and `patterns/` directories, and editing `theme.json`, is the way changes get version-controlled.

For architecture and conventions, see [`CLAUDE.md`](CLAUDE.md).

## Branching & deployment

- Open feature branches off `main`.
- Open PRs against `main`. PRs trigger [`phpcs.yml`](.github/workflows/phpcs.yml) on changed PHP files; the job must pass before merge.
- Merging into `develop` triggers [`develop.yml`](.github/workflows/develop.yml), which builds the child theme and deploys to the WP Engine env **`lchdevtemp`**.
- Production deployment is not yet automated — TBD.

## Things that are intentionally not in the repo

If something looks "missing" after cloning, check this list before assuming a bug:

- **WordPress core** (`wp-admin/`, `wp-includes/`, root `wp-*.php`, `index.php`) — installed at runtime.
- **`wp-config.php`** — environment-specific, never committed.
- **Default WP themes** (`twentytwentyfive`, etc.) — bundled with WP, not project code.
- **Plugins** (`wp-content/plugins/*`) — managed in production by WP Engine's Smart Plugin Manager.
- **Ollie parent theme** (`wp-content/themes/ollie/`) — installed via wp-admin or by WP Engine on production.
- **`wp-content/uploads/`** — media lives in production / per-environment storage.
- **`build/` inside the child theme** — compiled at deploy time by `npm run build`; never committed.

## Dev log

Most-recent first. Add a dated entry whenever scope, tooling, or workflow changes — keep entries short.

### 2026-05-10
- Repo initialised on `main` (no commits yet).
- Locked decisions: Ollie as parent, child theme slug `louise-carron-harris`, FSE-first customization (`theme.json` + template parts), Figma in parallel for design.
- Scaffolded `wp-content/themes/louise-carron-harris/` with `style.css` (manifest declaring `Template: ollie`), `theme.json`, `functions.php`, `composer.json`, `phpcs.xml.dist`.
- `.github/workflows/develop.yml` retargeted at the new theme path; `WPE_ENV` set to `lchdevtemp`. Build step kept (npm ci + build + cleanup); plan is to use `@wordpress/scripts`.
- `.github/workflows/phpcs.yml` retargeted at the new theme path.
- `.gitignore` updated to allow the child theme's `style.css` (the WP theme manifest is hand-authored, not built).
- Built assets (`build/`) excluded from the repo and produced at deploy time.
- Wired up the [Automattic WordPress MCP server](https://github.com/Automattic/wordpress-mcp) for the local site: committed `.mcp.json.example` updated with the project hostname; per-developer `.mcp.json` (gitignored) holds the real application password and is enabled in `.claude/settings.local.json`. Requires the WordPress MCP plugin to be installed and active on the local site, plus a Claude Code session restart to pick up the server.
- Open: install `@wordpress/scripts` and commit both `package.json` and `package-lock.json` (CI's `npm ci` + setup-node cache require the lockfile).
- Open: WP Engine prod env name; MCP adapter on the **live** site for content migration (separate from the local-site MCP setup above).

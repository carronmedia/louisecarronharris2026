# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

From-scratch WordPress rebuild of **louisecarronharris.com** (Louise Carron Harris — psycho-spiritual shaman, teacher, and author based in Glastonbury, UK). The site is a personal-brand hub for shamanic therapy, teaching programs, pilgrimages, books, and events — not e-commerce, not a marketing site.

**Locked-in decisions (2026-05-10):**

- **Base theme**: [Ollie](https://wordpress.org/themes/ollie/) — free FSE/block theme. Used as the parent.
- **Child theme**: lives at `wp-content/themes/louise-carron-harris/`. Slug `louise-carron-harris` is canonical — use it for the directory name, `style.css` Text Domain, `composer.json` / `package.json` name, and CI paths.
- **Customization surface**: because Ollie is FSE-native, prefer **`theme.json` token overrides + template parts in the child** over `functions.php` PHP. The child theme should stay small.
- **Design**: produced in Figma in parallel; tokens and components translate into the child's `theme.json` and template parts.
- **Content migration (future)**: plan is to install `@automattic/mcp-wordpress-remote` on the live site so Claude can pull posts/pages/media via MCP instead of SQL export/import. Not set up yet.

## Repo shape

This directory is the WordPress webroot of a Local by Flywheel site (`louise-carron-harris-2026`). It contains a full WordPress install on disk, but `.gitignore` excludes nearly all of it — **only the custom theme, GitHub workflows, and root config files are meant to be tracked**. Specifically, the following are intentionally ignored and should not be committed or modified for project work:

- `wp-admin/`, `wp-includes/`, all `wp-*.php` core files, `index.php`, `license.txt`, `readme.html`
- `wp-config.php` (local DB creds: `local` / `root` / `root` on `localhost`; `WP_ENVIRONMENT_TYPE=local`)
- `wp-content/uploads/`, `wp-content/languages/`, `wp-content/upgrade/`
- `wp-content/plugins/*` (WP Engine's Smart Plugin Manager owns plugins in production)
- All bundled default themes (`twentytwentyfive`, etc.) — present on disk for WP to run, but not project code
- `wp-content/themes/filter-scaffold` and `wp-content/plugins/filter-block-library` (legacy artifacts, explicitly excluded)

Custom project work belongs in **`wp-content/themes/louise-carron-harris/`** (the Ollie child theme).

## CI workflows

- **`develop.yml`** — on push to `develop`: checks out, runs `npm ci` and `npm run build` inside `wp-content/themes/louise-carron-harris/`, deletes `node_modules/` and `vendor/` from the theme, then deploys the workspace to WP Engine (`WPE_ENV: lchdevtemp`) via `wpengine/github-action-wpe-site-deploy@v3`. Built assets are produced at deploy time and shipped from the runner's workspace; they are **not committed** (the theme's `build/` directory is gitignored).
- **`phpcs.yml`** — on PRs, runs WordPress Coding Standards against any changed `*.php` files using the child theme's `phpcs.xml.dist` and a per-PR `composer install` of WPCS into `wp-content/themes/louise-carron-harris/vendor/`.

The deploy workflow assumes the child theme has a working `package.json` with `build` script and a committed `package-lock.json` (npm ci requires the lockfile + the cache action keys off it). If both are missing, the deploy job will fail at "Setup Node.js" or "Install dependencies".

## Common commands

All theme commands run from `wp-content/themes/louise-carron-harris/`.

```bash
cd wp-content/themes/louise-carron-harris

# Asset build (mirrors CI; expects @wordpress/scripts in package.json)
npm ci
npm run build              # production build
# dev: whatever the package.json defines (wp-scripts uses `npm start`)

# PHP linting — WordPress Coding Standards
composer install
vendor/bin/phpcs --standard=phpcs.xml.dist path/to/file.php
vendor/bin/phpcs --standard=phpcs.xml.dist .                  # whole theme
vendor/bin/phpcbf --standard=phpcs.xml.dist path/to/file.php  # auto-fix
```

The site itself runs under Local by Flywheel — start/stop from the Local app, not the CLI. The local URL is configured in Local (the `.mcp.json.example` still references `record-power.local` from a previous project; update when the local hostname is known).

## Deployment

Pushing to the `develop` branch triggers `develop.yml` → installs node deps in the child theme, runs `npm run build`, deletes `node_modules/` and `vendor/`, then deploys the workspace via `wpengine/github-action-wpe-site-deploy@v3` (auth: `secrets.WPE_SSHG_KEY_PRIVATE`) to WP Engine env **`lchdevtemp`**. No `main`-branch deploy workflow exists — production deploys are manual / TBD.

## Coding conventions

From `.editorconfig`:

- **Tabs** for indentation in PHP/JS/CSS (WordPress Coding Standards)
- 2-space indent for `*.json` and `*.yml`
- LF line endings everywhere except `*.txt` (CRLF)
- UTF-8, trim trailing whitespace, final newline required

PHP changes are gated on PRs by PHPCS against the WordPress standard configured in the theme's `phpcs.xml.dist`. Keep code WPCS-clean.

## Tooling notes

- `.mcp.json.example` documents the Automattic WordPress remote MCP server (`@automattic/mcp-wordpress-remote`). Each developer copies it to `.mcp.json` (gitignored) and fills in their own WP application password. The server is enabled in `.claude/settings.local.json` (no `disabledMcpjsonServers` entry); a Claude Code session restart is needed after editing `.mcp.json` for changes to take effect. The local site needs the corresponding [WordPress MCP plugin](https://github.com/Automattic/wordpress-mcp) installed and active, exposing `/wp-json/mcp/mcp-adapter-default-server`.
- `.gitignore` blocks build artifacts (`build/`, `*.min.css`, `style.css`, `style-editor.css`) — compiled assets are produced at deploy time and never committed. **Exception**: `wp-content/themes/louise-carron-harris/style.css` is hand-authored (it's the WP theme manifest declaring `Template: ollie`) and is force-included via a `!`-rule in `.gitignore`. Don't generate that file from a build pipeline.

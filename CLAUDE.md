# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project

From-scratch WordPress rebuild of **louisecarronharris.com** (Louise Carron Harris — psycho-spiritual shaman, teacher, and author based in Glastonbury, UK). The site is a personal-brand hub for shamanic therapy, teaching programs, pilgrimages, books, and events — not e-commerce, not a marketing site.

The brief is **conversion + structural**, not visual reimagining. Preserve the current site's visual feeling (navy + warm gold + cream + Bodoni-style serif + soft sans). The rebuild fixes the conversion friction documented in `.docs/Website-Analysis-LouiseCarronHarris.docx` (no clear CTAs, no pricing on offering pages, fragmented booking journey, no FAQ, no schema markup).

## Locked decisions

| Date | Decision |
|---|---|
| 2026-05-10 | Brand tokens — see `wp-content/themes/louise-carron-harris/docs/brand-guidelines.md` |
| 2026-05-16 | **Standalone block theme** — no parent. Theme lives at `wp-content/themes/louise-carron-harris/`. Slug `louise-carron-harris` is canonical. |
| 2026-05-16 | **Display font:** Bodoni Moda (replaces Bodoni Seventy Two ITC TT). **Body:** Montserrat. **Script:** Mellow Morning Script for narrow use (signature / one-off display phrases / pull-quote attribution — placements still TBD). |
| 2026-05-16 | **Orange dropped.** CTA accent decided later, visually, against a real homepage hero composition. Candidates: forest green `#2F5233`, burnt copper `#A85D2B`, aubergine `#5B2A45`. Buttons render navy in the interim. |
| 2026-05-16 | **Palette consolidated** per `brand-guidelines.md`. Live-site slots `secondary-copy`, `highlight`, `light-gold`, `ghost-white`, `grey`, `header` are absorbed, not preserved. |
| 2026-05-16 | **IA redesigned together.** `docs/sitemap.md` is draft, not spec. Starting structure: Home / Offerings / Learn / About / Contact + utility. |
| 2026-05-16 | **Commerce-agnostic theme.** No on-site checkout assumption. Each offering page has an editable CTA slot (URL + label per page). Soft-launch on Kajabi/Calendly, migrate later if needed. |
| 2026-05-16 | **Live-site MCP** to be installed on louisecarronharris.com as Phase 1 setup, so Claude can read existing content during the rebuild. |
| 2026-05-16 | **Drawing approach** — tokens → Figma design-system frame → low-fi wireframes (Home + canonical offering) → hi-fi homepage with three CTA-accent variants on the hero. Code builds in parallel from day 1. Figma file: `https://www.figma.com/design/Si1G6Uc40aWBe8CEFlhHvg/Louise-Carron-Harris`. |

## Brand & design references

**Authoritative — `wp-content/themes/louise-carron-harris/docs/brand-guidelines.md`** (tracked).
The record of brand decisions: typography, colour, spacing, voice, etc. Update it whenever a brand decision is made. When proposing tokens, components, copy patterns, or visuals, default to what's recorded here.

**Setup-phase only — `.docs/Website-Analysis-LouiseCarronHarris.docx`** (gitignored).
A March 2026 Conversion / SEO / AEO analysis used to drive the rebuild direction. Will be retired once `brand-guidelines.md` covers the same ground. Where it conflicts with `brand-guidelines.md`, `brand-guidelines.md` wins.

To read the `.docx`: `textutil -convert txt -output .docs/Website-Analysis-LouiseCarronHarris.txt .docs/Website-Analysis-LouiseCarronHarris.docx`, then `Read` the `.txt`. Both files are gitignored.

## Repo shape

This directory is the WordPress webroot of a Local by Flywheel site (`louise-carron-harris-2026`). It contains a full WordPress install on disk, but `.gitignore` excludes nearly all of it — **only the custom theme, GitHub workflows, and root config files are meant to be tracked**. Specifically, the following are intentionally ignored and should not be committed or modified for project work:

- `wp-admin/`, `wp-includes/`, all `wp-*.php` core files, `index.php`, `license.txt`, `readme.html`
- `wp-config.php` (local DB creds: `local` / `root` / `root` on `localhost`; `WP_ENVIRONMENT_TYPE=local`)
- `wp-content/uploads/`, `wp-content/languages/`, `wp-content/upgrade/`
- `wp-content/plugins/*` (WP Engine's Smart Plugin Manager owns plugins in production)
- All bundled default themes (`twentytwentyfive`, etc.) — present on disk for WP to run, but not project code
- `wp-content/themes/filter-scaffold` and `wp-content/plugins/filter-block-library` (legacy artifacts, explicitly excluded)
- `wp-content/themes/ollie/` (formerly the parent — now retained on disk for reference only, not project code)

Custom project work belongs in **`wp-content/themes/louise-carron-harris/`** — a standalone FSE block theme.

## CI workflows

- **`develop.yml`** — on push to `develop`: checks out, runs `npm ci` and `npm run build` inside `wp-content/themes/louise-carron-harris/`, deletes `node_modules/` and `vendor/` from the theme, then deploys the workspace to WP Engine (`WPE_ENV: lchdevtemp`) via `wpengine/github-action-wpe-site-deploy@v3`. Built assets are produced at deploy time and shipped from the runner's workspace; they are **not committed** (the theme's `build/` directory is gitignored).
- **`phpcs.yml`** — on PRs, runs WordPress Coding Standards against any changed `*.php` files using the theme's `phpcs.xml.dist` and a per-PR `composer install` of WPCS into `wp-content/themes/louise-carron-harris/vendor/`.

The deploy workflow assumes the theme has a working `package.json` with `build` script and a committed `package-lock.json` (npm ci requires the lockfile + the cache action keys off it). If both are missing, the deploy job will fail at "Setup Node.js" or "Install dependencies".

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

The site itself runs under Local by Flywheel — start/stop from the Local app, not the CLI. The local URL is configured in Local.

## Deployment

Pushing to the `develop` branch triggers `develop.yml` → installs node deps in the theme, runs `npm run build`, deletes `node_modules/` and `vendor/`, then deploys the workspace via `wpengine/github-action-wpe-site-deploy@v3` (auth: `secrets.WPE_SSHG_KEY_PRIVATE`) to WP Engine env **`lchdevtemp`**. No `main`-branch deploy workflow exists — production deploys are manual / TBD.

## Coding conventions

From `.editorconfig`:

- **Tabs** for indentation in PHP/JS/CSS (WordPress Coding Standards)
- 2-space indent for `*.json` and `*.yml`
- LF line endings everywhere except `*.txt` (CRLF)
- UTF-8, trim trailing whitespace, final newline required

PHP changes are gated on PRs by PHPCS against the WordPress standard configured in the theme's `phpcs.xml.dist`. Keep code WPCS-clean.

## Standalone-theme implications

Because the theme no longer inherits from Ollie, it must provide its own fallback templates. Phase 1 sets up the minimum:

- `templates/index.html` — generic fallback
- `templates/single.html` — single post
- `templates/page.html` — single page
- `templates/archive.html` — category/tag/CPT archives
- `templates/404.html` — not found
- `templates/search.html` — search results
- `parts/header.html` — already exists
- `parts/footer.html` — to be created

These will be refined per page during Phase 3+ template rollout.

## Tooling notes

- `.mcp.json.example` documents the Automattic WordPress remote MCP server (`@automattic/mcp-wordpress-remote`). Each developer copies it to `.mcp.json` (gitignored) and fills in their own WP application password. The server is enabled in `.claude/settings.local.json` (no `disabledMcpjsonServers` entry); a Claude Code session restart is needed after editing `.mcp.json` for changes to take effect.
- Two MCP targets are in scope: (1) the **local** site via the WordPress MCP plugin on `record-power.local`-style URLs for development; (2) the **live** site `louisecarronharris.com` so we can pull existing content during the rebuild — installation is a Phase 1 task.
- `.gitignore` blocks build artifacts (`build/`, `*.min.css`, `style.css`, `style-editor.css`) — compiled assets are produced at deploy time and never committed. **Exception**: `wp-content/themes/louise-carron-harris/style.css` is hand-authored (the WP theme manifest) and is force-included via a `!`-rule in `.gitignore`. Don't generate that file from a build pipeline.

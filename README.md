# louisecarronharris.com (2026 rebuild)

WordPress build of [louisecarronharris.com](https://louisecarronharris.com) — the practice site of Louise Carron Harris (psycho-spiritual shaman, teacher, author, Glastonbury UK).

This repository **is the WordPress webroot**. WordPress core, the [Ollie](https://wordpress.org/themes/ollie/) parent theme, plugins, and uploads are installed at runtime and **not committed** — see [`.gitignore`](.gitignore) for the full exclusion list. Project code lives in the [`louise-carron-harris` child theme](wp-content/themes/louise-carron-harris/).

## Stack

| Layer | Choice |
| --- | --- |
| CMS | WordPress (FSE / block editor) |
| Parent theme | [Ollie](https://wordpress.org/themes/ollie/) |
| Child theme | [`wp-content/themes/louise-carron-harris/`](wp-content/themes/louise-carron-harris/) |
| Local env | [Local by Flywheel](https://localwp.com/) |
| Hosting | WP Engine — `lchdevtemp` env (develop branch deploy) |
| Build pipeline | `@wordpress/scripts` (planned, not yet wired up) |
| Lint | PHPCS with WordPress Coding Standards |
| Runtime | PHP 8.2+, Node 20+, npm 10+ |

## Branches & deployment

- `main` — default branch; PR target. PRs run [PHPCS](.github/workflows/phpcs.yml) on changed PHP files.
- `develop` — push triggers [`develop.yml`](.github/workflows/develop.yml): builds the child theme then deploys the workspace to WP Engine env `lchdevtemp`.
- Production deploy — not yet automated.

## Documentation

- [`ONBOARDING.md`](ONBOARDING.md) — first-time local setup, daily workflows, dev log.
- [`CLAUDE.md`](CLAUDE.md) — architecture, conventions, and CI details (also used to brief AI coding sessions).

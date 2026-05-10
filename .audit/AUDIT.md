# louisecarronharris.com — design token audit

**Date:** 2026-05-10
**Source:** live site at `https://louisecarronharris.com`
**Sampled templates:** Home, About, Books, Courses, Work-with-me
**Method:** Chrome DevTools — pulled computed styles, network requests, and full-page screenshots (saved alongside this file).

This is a **read of what is currently shipped**, not a recommendation of what the new site should be. Use it as a baseline for the new `theme.json` and Figma Variables. Open questions and risks are flagged inline.

---

## 1. Color palette (as observed)

Sorted by usage frequency across the homepage. Hex columns are converted from the rgb() values reported by the browser.

| Token role (proposed) | Hex | RGB | Where it appears |
|---|---|---|---|
| **Primary — Midnight Navy** | `#043053` | rgb(4, 48, 83) | h2 / h3 body headings, button text, form labels, footer background, pull-quote text |
| **Body text — Charcoal** | `#232323` | rgb(35, 35, 35) | paragraphs, body copy, blockquote text |
| Body text alt — Charcoal-2 | `#222222` | rgb(34, 34, 34) | a sibling shade — almost certainly an inconsistency, not a real token |
| **Secondary — Soft Gold** | `#F2E1A9` | rgb(242, 225, 169) | h3 eyebrows, nav links, hero text accents, button borders |
| Secondary alt — Pale Gold | `#F0DD9F` | rgb(240, 221, 159) | h1 over dark backgrounds, button borders — likely the same token as Soft Gold but slightly off |
| **Surface — White** | `#FFFFFF` | rgb(255, 255, 255) | page background, on-dark text |
| **Surface alt — Cream** | `#FFFDF6` | rgb(255, 253, 246) | newsletter section background |
| Link / accent — Sky | `#408BD1` | rgb(64, 139, 209) | one inline link colour — sparse |
| Error — Red | `#E61E1E` | rgb(230, 30, 30) | required-field markers |
| Border — Grey | `#C1C1C1` | rgb(193, 193, 193) | one form-control border |
| Overlay — 75% black | `rgba(0,0,0,.75)` | — | one modal/overlay |

### Findings

- **Real brand palette is small and tight:** navy + cream/gold + warm white. Everything else is functional or accidental.
- **Two near-duplicate golds** (`#F2E1A9` vs `#F0DD9F`) — almost certainly a drift; the new system should pick one canonical "gold" and stop.
- **Two near-duplicate body greys** (`#232323` vs `#222222`) — same story, consolidate to one.
- **No bold/dark variants of navy and no muted/desaturated tints** in use. The current site has *no* tonal scale — no light navy, no muted gold. The new design system will need to invent these (50–950 ramps for navy and gold) unless we want a similarly flat palette.

---

## 2. Typography

### Families

| Role | Family | Source | Notes |
|---|---|---|---|
| **Display (serif)** | `BodoniSvtyTwoITCTT-Book` | self-hosted (.ttf), `wp-content/themes/louisecarronharris/assets/fonts/` | Used for h1, h2, h4, and form input text. **`.woff` 404s — only `.ttf` actually serves.** |
| **Body / UI (sans)** | `Montserrat` (weights 400, 500, 600 requested; 300 used) | Google Fonts (`fonts.googleapis.com/css?family=Montserrat:400,500,600&display=swap`) | Note: CSS asks for 400/500/600 but the rendered h3 uses **300**, which won't load — the browser is faking it. Real bug. |
| Icons | Font Awesome 4.7 | self-hosted (.woff2) | Used for header social icons (`fa-instagram`, `fa-spotify`, `fa-youtube`) and hamburger |

### Type scale (px, observed)

| px | line-height | family | weight | example |
|---:|---:|---|---:|---|
| 50 | 65 (1.30) | Bodoni | 400 | h1 (hero / page title) |
| 40 | 52 (1.30) | Bodoni | 400 | h2 (section heading) |
| 32 | 46 (1.44) | Montserrat | 400 | large CTA links |
| 30 | 39 (1.30) | Montserrat | 300 | h3 — **uppercase + 3px tracking** (eyebrow style) |
| 26 | 37 (1.44) | Montserrat | 400 | decorative form label |
| 24 | 35 (1.44) | Montserrat | 400 | secondary CTAs |
| 22 | 28.6 (1.30) | Bodoni | 400 | h4 — uppercase |
| 22 | 27.5 (1.25) | Montserrat | 400 | pull-quotes |
| 18 | 25.92 (1.44) | Montserrat | 400 / 500 | body, nav, buttons |
| 16 | 23.04 (1.44) | Montserrat | 500 | small button (uppercase, 1.6px tracking) |

### Findings

- **No bold weights used anywhere.** The brand reads "soft / poised" — Bodoni 400 + Montserrat 300/400/500. This is a deliberate-feeling choice; preserve it unless we want to shift tone.
- **Two distinct line-height families:** display uses 1.30 (tight), body uses 1.44 (open). Worth encoding as `lineHeight.tight` and `lineHeight.body`.
- **Eyebrows use Montserrat 300 uppercase / 3px tracking.** A signature pattern — should be a reusable type style ("eyebrow").
- **Buttons use Montserrat 500 uppercase / 1.6–1.8px tracking** at 16–18px. Also a signature.
- **Type scale is irregular** (50, 40, 32, 30, 26, 24, 22, 18, 16). The new system should either clean this up (modular scale e.g. 1.25 ratio) or codify the irregular values as deliberate steps. My recommendation: regularize, but keep the perceived sizes close.

---

## 3. Spacing & layout

| | Value |
|---|---|
| Content max-width | **1170px** (`.container` — Bootstrap 4 idiom) |
| Outer wrapper width | 1200px (= 1170 + 30 horizontal padding) |
| Body horizontal padding | 30px |
| Section padding (most) | **60px top / 30px bottom** |
| Footer & special sections | 50px top / 30px bottom |
| Header padding | 80px top / 20px bottom (top space for fixed UI) |
| Heading bottom margin | 16px (h2/h3), 10px (h1), 8px (h4) |
| Paragraph bottom margin | 16px |
| CTA top margin | 60px |

### Findings

- **The current site is built on Bootstrap 4** (`.container` / `.row` / `.col-*` / `align-items-*` / `justify-content-*`). The new build is FSE/Ollie — different paradigm — so the **grid system doesn't carry over**, but the **rhythm** (1170px max, ~60px section padding, 16/30/60 spacing rhythm) should.
- **Spacing rhythm is essentially `8px × n`** with some 10s thrown in: 8, 10, 16, 20, 30, 50, 60, 80. The new system can codify a clean 8pt scale: 4 / 8 / 16 / 24 / 32 / 48 / 64 / 96.

## 4. Radii & shadows

| Token | Value | Usage |
|---|---|---|
| Radius — sm | 3px | most buttons (17 elements) |
| Radius — md | 10px | cards / image frames (10 elements) |
| Radius — full | 50% | avatars, social icon discs (10 elements) |
| Radius — xs | 2px / 4px | one element each (probably plugin defaults, ignore) |
| Shadow — soft | `0 0 5px rgb(128,128,128)` | one element only (probably accidental) |

### Findings

- **The current site is essentially shadow-free.** That's a real brand signal — the design is flat and editorial, not material. The new system should consciously decide whether to *keep* it shadow-free or introduce a small elevation scale.
- Two real radius values (3, 10) plus pill/circle. A clean three-step radius scale (sm/md/full) covers everything.

---

## 5. Brand assets observed

| Asset | URL | Notes |
|---|---|---|
| **Wordmark / logo** | `wp-content/uploads/2018/09/LCH_Logo_Gold.png` | 1200×455 PNG, gold colour. Alt: "Louise Carron Harris - Medicine Woman - Shaman, teacher, author, storyteller". **Old (2018), raster, no SVG version observed.** |
| Favicons | `apple-icon.png`, `favicon32x32.png`, `favicon96x96.png` | 32 and 96 only — no `180x180`, no `.ico`, no SVG mask icon |
| Decorative imagery | salamander, heron, teacher portrait | photographic / drawn — sets a folk / nature tone |

### Findings

- **There is no logo in the site header.** The current header is hamburger + Instagram/Spotify/YouTube icons — that's it. The wordmark only appears further down the page. The new design needs to decide whether the header gets a wordmark.
- **The existing wordmark is a low-resolution PNG from 2018.** If we want sharp display at 2x/3x and theme-able color, an SVG redraw is on the table.

---

## 6. Screenshots saved

- `home-full.png`
- `about-full.png`
- `books-full.png`
- `courses-full.png`
- `work-with-me-full.png`

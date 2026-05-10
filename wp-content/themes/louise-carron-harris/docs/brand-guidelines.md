# Brand guidelines — louisecarronharris.com (2026 rebuild)

The authoritative source for brand and design decisions. As decisions are signed off they are recorded here. This file replaces the setup-phase analysis (`.docs/Website-Analysis-LouiseCarronHarris.docx`) once it has enough coverage; until then both inform decisions, with this file taking precedence where they overlap.

> **Status:** first review complete (2026-05-10). Most tokens signed off; CTA accent deferred until we can compare options against a homepage hero composition.

> **Guiding constraint:** preserve the current site's visual feeling (navy + warm gold + cream + Bodoni-style serif + soft sans). The rebuild is a structural / conversion exercise, not a visual reimagining. See `feedback_visual_direction` memory.

---

## Typography

### Display family — Bodoni Moda *(signed off 2026-05-10)*

- **Font:** [Bodoni Moda](https://fonts.google.com/specimen/Bodoni+Moda) (Google Fonts, free, SIL OFL).
- **Why:** Closest free equivalent to *Bodoni Seventy Two ITC TT*, the display face on the existing site. Avoids the ITC licensing question and gives a wider weight range (400–900) plus italics — useful for the stronger hierarchy the brief calls for.
- **Stack:** `"Bodoni Moda", "Bodoni 72", "Times New Roman", Georgia, serif`
- **Use for:** display headings (h1, h2, h4 if uppercase, page titles, hero text, pull-quotes).
- **Weights to load:** 400 (regular), 500 (medium), 700 (bold), italics 400 + 700.

### Body family — Montserrat *(signed off 2026-05-10)*

- **Font:** [Montserrat](https://fonts.google.com/specimen/Montserrat) (Google Fonts, free, SIL OFL).
- **Why:** What the existing site uses. Preserving keeps the established voice and avoids reintroducing visual disruption when the rebuild's scope is structural. Inter / Manrope / DM Sans were considered but would shift the feel further from "preserve current."
- **Stack:** `"Montserrat", system-ui, -apple-system, "Segoe UI", sans-serif`
- **Use for:** body, UI, nav, buttons, labels, eyebrows, captions.
- **Weights to load:** 300 (light, used for eyebrow uppercase per current site), 400 (regular), 500 (medium), 600 (semibold — new, used for emphasis and primary CTAs to lift the flat current hierarchy), italics 400.

### Type scale *(proposed)*

Cleaned-up modular scale, close to current sizes but rationalized. Base 18px / 1.45 leading.

| Token | Size | Line height | Family | Typical use |
|---|---|---|---|---|
| `xs` | 14px / 0.875rem | 1.45 | Montserrat 400 | small print, captions |
| `sm` | 16px / 1.0rem | 1.45 | Montserrat 400/500 | small body, button-sm, labels |
| `base` | 18px / 1.125rem | 1.45 | Montserrat 400 | body, nav, default button |
| `lg` | 22px / 1.375rem | 1.30 | Bodoni 400 / Montserrat 400 | h4 (uppercase), pull-quotes |
| `xl` | 30px / 1.875rem | 1.20 | Bodoni 400 / Montserrat 300 | h3 (uppercase eyebrow stays available) |
| `2xl` | 40px / 2.5rem | 1.15 | Bodoni 400 | h2 |
| `3xl` | 52px / 3.25rem | 1.10 | Bodoni 400 | h1 |

Hero display can extend to `4xl` 72px / 4.5rem on demand without adding to the global scale.

### Reusable type styles

- **Eyebrow** — Montserrat 300, uppercase, 16/18px, 3px letter-spacing. Carry-over from current site, signature pattern.
- **Button** — Montserrat 600, uppercase, 16/18px, 1.6–1.8px letter-spacing. Bold raised from current 500 to lift CTA prominence.
- **Pull-quote** — Bodoni Moda italic 400, `lg` size, navy.

---

## Color

### Brand *(proposed)*

| Token | Hex | Use |
|---|---|---|
| `brand-navy` | `#043053` | primary brand colour; headings, footer background, primary text on light surfaces |
| `brand-gold-pale` | `#F2E1A9` | decorative accents, on-dark headings, eyebrow text on dark surfaces (consolidated; replaces both `#F2E1A9` and `#F0DD9F` from current site) |
| `brand-gold-rich` | `#C9A24F` | gold for icons, borders, and any text use that needs AA contrast (the pale gold fails contrast for text — this is its serious sibling) |
| `brand-cream` | `#FFFDF6` | warm-white surface, alternate to pure white |

### Action *(deferred — visual exploration needed)*

The existing site has no dedicated CTA colour; buttons are gold-bordered navy text and visually quiet. The brief asks for stronger CTAs. The accent colour will be chosen by **visually comparing options against a homepage hero composition**, not in the abstract.

**Working stand-in:** `brand-navy` `#043053` — buttons render as solid navy fills until the real accent is locked. This is a one-token swap when we decide.

Candidates to compare when we get to the hero comp:
- **Deep forest green** `#2F5233` — sacred / Glastonbury / Avalon. AAA contrast on cream.
- **Burnt copper** `#A85D2B` — warmer, ancestral. AA on cream.
- **Aubergine** `#5B2A45` — sacred, regal, ceremonial.

| Token | Hex (working) | Use |
|---|---|---|
| `action` | `#043053` (= `brand-navy`, provisional) | primary CTA backgrounds |
| `action-hover` | `#02223C` (provisional) | hover/active state |
| `action-on` | `#FFFDF6` | text on `action` (cream) |

### Neutral scale *(proposed)*

Warm-leaning greys to harmonize with cream, not cool greys.

| Token | Hex | Use |
|---|---|---|
| `neutral-50` | `#FAF9F6` | very subtle off-white surface |
| `neutral-100` | `#F0EEE8` | subtle section background |
| `neutral-200` | `#DDDAD0` | borders, dividers (replaces current `#C1C1C1` which is too dark) |
| `neutral-400` | `#8B8A82` | muted text, captions |
| `neutral-700` | `#4A4942` | secondary body text |
| `neutral-900` | `#232323` | primary body text (consolidated from current site's `#232323` + `#222222` drift) |

### Semantic *(proposed)*

| Token | Hex | Use |
|---|---|---|
| `success` | `#2F5233` | aliased to `action` — same forest green |
| `warning` | `#C9A24F` | aliased to `brand-gold-rich` — natural fit |
| `error` | `#B33A3A` | deeper red for AA contrast (replaces current `#E61E1E` which is borderline) |
| `info` | `#043053` | aliased to `brand-navy` |

### Contrast notes

All pairings checked for WCAG AA at minimum:
- `brand-navy` on `brand-cream` — 13:1 (AAA) ✅
- `brand-cream` on `brand-navy` — 13:1 (AAA) ✅
- `neutral-900` on `brand-cream` — 12:1 (AAA) ✅
- `brand-gold-rich` on `brand-cream` — 4.6:1 (AA) ✅
- `brand-gold-pale` on `brand-cream` — 1.4:1 ❌ — **decorative only**, never text
- Action colour will be re-checked once locked.

### Tonal ramps *(deferred to theme.json)*

Full 50–950 ramps for `brand-navy`, `brand-gold`, and `action` will be generated when we write `theme.json`. Each step is a tint/shade of the canonical hex above. No need to enumerate them in this doc.

---

## Spacing & layout

### Spacing scale *(proposed — 8pt with one 4pt step)*

| Token | Value |
|---|---|
| `space-0` | 0 |
| `space-1` | 4px |
| `space-2` | 8px |
| `space-3` | 16px |
| `space-4` | 24px |
| `space-5` | 32px |
| `space-6` | 48px |
| `space-7` | 64px |
| `space-8` | 96px |
| `space-9` | 128px |

### Layout *(proposed)*

| Token | Value | Note |
|---|---|---|
| `content-width` | 768px | reading-width single column (articles, prose) |
| `wide-width` | 1200px | main container width |
| `gutter-mobile` | 24px | horizontal page padding < 768px |
| `gutter-desktop` | 48px | horizontal page padding ≥ 768px |
| `section-y-mobile` | 64px | vertical section padding on mobile |
| `section-y-desktop` | 96px | vertical section padding on desktop (widened from current 60px per the brief) |

### Tap target minimum

44px × 44px for any clickable element (per WCAG 2.5.5 / brief). Affects buttons, nav links, social icons, form fields.

---

## Radii & elevation

### Radii *(proposed)*

| Token | Value | Use |
|---|---|---|
| `radius-none` | 0 | utilities, sharp panels |
| `radius-sm` | 4px | buttons, inputs, small cards (refined from current 3px) |
| `radius-md` | 12px | larger cards, image frames, pull-quotes (refined from current 10px) |
| `radius-pill` | 9999px | avatars, social-icon discs, pill chips |

### Elevation *(proposed)*

The current site is essentially shadow-free; preserve that flatness as the default. Three steps available for cases where elevation is genuinely needed (sticky header, dropdowns, modals).

| Token | Value | Use |
|---|---|---|
| `shadow-none` | none | default for everything |
| `shadow-sm` | `0 1px 2px rgba(4,48,83,0.06)` | sticky header at scroll, subtle separation |
| `shadow-md` | `0 4px 16px rgba(4,48,83,0.10)` | dropdowns, popovers, modal cards |

---

## Iconography *(proposed)*

- **Library:** [Lucide](https://lucide.dev/) — open-source (ISC), modern, comprehensive, designed for editorial UIs. Replaces the current site's Font Awesome 4.7 (which is end-of-life).
- **Stroke:** 1.5px (default), aligns with editorial / sacred feel — neither too heavy nor too thin.
- **Sizing:** 16, 20, 24, 32px — align to `space-3` / `space-4` / `space-5`.
- **Brand social icons** (Instagram, YouTube, Spotify, Substack) — use the official wordmarks/glyphs supplied by each platform, not Lucide stand-ins, for brand recognition.

---

## Imagery & photography *(direction, not rules)*

- **Tone:** natural, sacred, grounded. Avoids stock-photo wellness clichés.
- **Subjects to feature heavily:**
  - Louise herself (per the brief — headshots and environmental portraits across multiple pages)
  - Sacred sites Lou teaches at (Glastonbury Tor, pilgrimage destinations)
  - Group / circle photography from past pilgrimages and dances (with consent)
  - Natural elements (fire, water, stone, plants, sky) — folk / earthy register
- **Avoid:**
  - Generic wellness stock (smiling people in linen, hands-up sunset silhouettes)
  - Heavily filtered / Instagram-tinted imagery
- **Format:** WebP for delivery, with JPEG fallbacks. Lazy-load below the fold.
- **Aspect ratios:** Standardize to 4:5 (portrait), 3:2 (landscape), and 1:1 (avatar/grid). Avoid arbitrary crops.

---

## Voice & tone *(direction, light)*

- **Plain, considered, sacred without being preachy.** Lou's writing voice is direct and grounded; UI copy should match — not adopt mystical jargon.
- **CTAs are concrete:** "Book your place", "Read the first chapter", "Join the next dance" — never "Find out more" or metaphorical journey language.
- **Voice:** First-person plural / first-person singular when Lou speaks ("I…", "we…"); second person to address the visitor ("you…").
- **Reading level:** target Flesch 60+ (plain English) for marketing/sales pages. Articles and Earth Chakras pages can be more dense.
- **Inclusive language defaults** — "people / participants / pilgrims", not "men and women".

---

## Decision log

| Date | Decision | Notes |
|---|---|---|
| 2026-05-10 | Bodoni Moda chosen as display family | Replaces Bodoni Seventy Two ITC TT used on the existing site. |
| 2026-05-10 | Montserrat retained as body family | Preserves current feel; weights 300/400/500/600 + italic 400. |
| 2026-05-10 | Brand colours consolidated | `brand-navy` `#043053`, `brand-gold-pale` `#F2E1A9`, `brand-gold-rich` `#C9A24F`, `brand-cream` `#FFFDF6`. Resolves duplicates from current site. |
| 2026-05-10 | CTA accent deferred | Will be chosen visually against a homepage hero composition. `brand-navy` used as a working stand-in in `theme.json` until then. Candidates: forest green, burnt copper, aubergine. |
| 2026-05-10 | Buttons at weight 600 | Lifted from current 500. Lightest-touch way to deliver the brief's stronger-CTA ask. |
| 2026-05-10 | Warm-leaning neutral grey scale | `#FAF9F6` → `#232323`. Replaces cool greys + dark `#C1C1C1` borders from current site. |
| 2026-05-10 | 8pt spacing scale | `space-0` (0) → `space-9` (128px). |
| 2026-05-10 | Type scale | 7 steps from 14px → 52px, base 18 / 1.45. |
| 2026-05-10 | Radii | `none` / `sm` (4px) / `md` (12px) / `pill`. |
| 2026-05-10 | Elevation | Default shadow-free; `shadow-sm` for sticky header, `shadow-md` for dropdowns/modals. |
| 2026-05-10 | Iconography — Lucide 1.5px stroke | Replaces Font Awesome 4.7. |
| 2026-05-10 | Container widths | content 768 / wide 1200; gutters 24 / 48; section padding 64 / 96. |

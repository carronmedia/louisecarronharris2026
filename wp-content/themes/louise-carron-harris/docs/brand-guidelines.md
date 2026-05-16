# Brand guidelines — louisecarronharris.com (2026 rebuild)

The authoritative source for brand and design decisions. As decisions are signed off they are recorded here. This file replaces the setup-phase analysis (`.docs/Website-Analysis-LouiseCarronHarris.docx`) once it has enough coverage; until then both inform decisions, with this file taking precedence where they overlap.

> **Status:** first review complete (2026-05-10). Tokens locked except CTA accent, which is deferred until we can compare options against a homepage hero composition.

> **Guiding constraint:** preserve the current site's visual feeling (navy + warm gold + cream + Bodoni-style serif + soft sans). The rebuild is a structural / conversion exercise, not a visual reimagining. See `feedback_visual_direction` memory.

> **Slug naming convention:** `theme.json` uses descriptive, role-based slug names (e.g. `primary`, `main`, `base`, `x-small`, `medium`) as a single canonical namespace — originally adopted from Ollie's convention while it was the parent theme, retained after Ollie was dropped (2026-05-16) because the naming is sound and the existing values reference it. We do not maintain parallel "brand-prefixed" slugs. Brand names in the tables below are documentation-side labels; the theme.json slug is what's used in code.

---

## Typography

### Display family — Bodoni Moda *(signed off 2026-05-10)*

- **Font:** [Bodoni Moda](https://fonts.google.com/specimen/Bodoni+Moda) (Google Fonts, free, SIL OFL).
- **theme.json slug:** `display`
- **Why:** Closest free equivalent to *Bodoni Seventy Two ITC TT*, the display face on the existing site. Avoids the ITC licensing question and gives a wider weight range (400–900) plus italics — useful for the stronger hierarchy the brief calls for.
- **Stack:** `"Bodoni Moda", "Bodoni 72", "Times New Roman", Georgia, serif`
- **Use for:** display headings (h1, h2, h4 if uppercase, page titles, hero text, pull-quotes).
- **Weights to load:** 400 (regular), 500 (medium), 700 (bold), italics 400 + 700.

### Body family — Montserrat *(signed off 2026-05-10)*

- **Font:** [Montserrat](https://fonts.google.com/specimen/Montserrat) (Google Fonts, free, SIL OFL).
- **theme.json slug:** `primary`
- **Why:** What the existing site uses. Preserving keeps the established voice and avoids reintroducing visual disruption when the rebuild's scope is structural.
- **Stack:** `"Montserrat", system-ui, -apple-system, "Segoe UI", sans-serif`
- **Use for:** body, UI, nav, buttons, labels, eyebrows, captions.
- **Weights to load:** 300 (light, used for eyebrow uppercase per current site), 400 (regular), 500 (medium), 600 (semi-bold — new, used for emphasis and primary CTAs to lift the flat current hierarchy), italics 400.

### Script family — Mellow Morning Script *(retained 2026-05-16, narrow use)*

- **Font:** Mellow Morning Script W05 Rg (commercial; already licensed and used on the live site).
- **theme.json slug:** `script`
- **Why:** Carries a personality the workhorse families cannot — softer, hand-drawn, intimate. Used sparingly on the live site and retained for the rebuild as a "grace note" rather than as a general-purpose family. **Never carry long copy in this face.**
- **Stack:** `"Mellow Morning Script W05 Rg", "Lucida Handwriting", "Brush Script MT", cursive`
- **Approved placements** (lock in Phase 3 before any deploy):
  - **Signature line** — Louise's name in script on the About page and/or footer attribution.
  - **Hero accent phrase** — at most one short script phrase per offering hero, used as visual flourish rather than primary heading.
  - **Pull-quote attribution** — the attribution line under a pull-quote (not the quote itself).
- **Out of scope:** body, nav, buttons, eyebrows, headings, anywhere readability is load-bearing. If a placement is being considered outside the list above, raise it as a decision.

### Type scale *(signed off 2026-05-10)*

theme.json slug names follow Ollie's convention (`x-small` → `xx-large`). Values overridden to ours. Larger sizes use explicit fluid `min/max`; smaller sizes get auto-fluid via `typography.fluid: true`.

| Slug | Display name | Size (desktop) | Line height | Family | Typical use |
|---|---|---|---|---|---|
| `x-small` | X-Small | 14px / 0.875rem | `body` (1.45) | Primary 400 | small print, captions |
| `small` | Small | 16px / 1.0rem | `body` (1.45) | Primary 400/500 | small body, button-sm, labels |
| `base` | Base | 18px / 1.125rem | `body` (1.45) | Primary 400 | body, nav, default button |
| `medium` | Medium | 22px / 1.375rem | `snug` (1.20) | Display 400 / Primary 400 | h4 (uppercase), pull-quotes |
| `large` | Large | 30px / 1.875rem (fluid 24–30) | `snug` (1.20) | Display 400 / Primary 300 | h3 (uppercase eyebrow stays available) |
| `x-large` | X-Large | 40px / 2.5rem (fluid 30–40) | `snug` (1.20) | Display 400 | h2 |
| `xx-large` | XX-Large | 52px / 3.25rem (fluid 36–52) | `tight` (1.10) | Display 400 | h1, post titles |

Hero display can extend to a custom one-off ~72px without adding to the global scale.

### Reusable type styles

- **Eyebrow** — Primary 300, uppercase, 16/18px, `widest` letter-spacing. Carry-over from current site, signature pattern.
- **Button** — Primary 600, uppercase, 16/18px, `wider` letter-spacing. Bold raised from current 500 to lift CTA prominence.
- **Pull-quote** — Display italic 400, `large` size, primary color.

---

## Color

### Brand palette

"Display name" is the brand-side label; `slug` is what `theme.json` and block markup reference.

| Slug | Display name | Hex | Use |
|---|---|---|---|
| `primary` | Navy | `#043053` | primary brand colour; headings, footer background, primary text on light surfaces. |
| `primary-alt` | Gold (rich) | `#C9A24F` | functional gold for icons, borders, and any text use that needs AA contrast. |
| `gold-pale` | Gold (pale) | `#F2E1A9` | decorative accents, on-dark headings, eyebrow text on dark surfaces. Never carries text. |
| `base` | Cream | `#FFFDF6` | warm-white default page surface. |
| `main` | Body text | `#232323` | primary body text. |
| `secondary` | Mid-dark grey | `#4A4942` | secondary text. |
| `tertiary` | Subtle background | `#F0EEE8` | section backgrounds, alternate surface. |
| `border-light` | Light border | `#DDDAD0` | dividers, hairlines. (Replaces current site's too-dark `#C1C1C1`.) |
| `border-dark` | Dark border | `#4A4942` | strong borders. |
| `contrast` | High-contrast text | `#232323` | aliased to `main`. |
| `neutral-50` | Very subtle off-white | `#FAF9F6` | extra warmth surface. |
| `neutral-400` | Muted grey | `#8B8A82` | captions, mid-priority text. |
| `white` | Pure white | `#FFFFFF` | edge cases (high-contrast use). |
| `black` | Pure black | `#000000` | edge cases. |

**Live-site palette slots absorbed (2026-05-16):** `secondary-copy` `#f0dd9f` → covered by `gold-pale`; `highlight` `#fee088` → not retained (decorative gold = `gold-pale`); `light-gold` `#fffdf7` → covered by `base`; `ghost-white` `#F8FAFF` → covered by `neutral-50`; `grey` `#e6e6e6` → covered by `border-light`; `header` `#999a9c` → covered by `neutral-400`. The live-site `tertiary` orange `#f26431` is **dropped** entirely (see CTA accent below).

### Action *(deferred — visual exploration needed)*

The existing site has no dedicated CTA colour; buttons are gold-bordered navy text and visually quiet. The brief asks for stronger CTAs. The accent colour will be chosen by **visually comparing options against a homepage hero composition**, not in the abstract.

**Working stand-in:** `action` `#043053` (= `primary`) — buttons render as solid navy fills until the real accent is locked. Single-token swap when we decide.

Candidates to compare when we get to the hero comp:
- **Deep forest green** `#2F5233` — sacred / Glastonbury / Avalon. AAA contrast on cream.
- **Burnt copper** `#A85D2B` — warmer, ancestral. AA on cream.
- **Aubergine** `#5B2A45` — sacred, regal, ceremonial.

| Slug | Display name | Hex (working) | Use |
|---|---|---|---|
| `action` | Action | `#043053` (provisional) | primary CTA backgrounds |
| `action-hover` | Action hover | `#02223C` (provisional) | hover/active state |
| `action-on` | Action foreground | `#FFFDF6` | text on `action` (cream — for warmth) |

### Semantic states

| Slug | Display name | Hex | Use |
|---|---|---|---|
| `success` | Success | `#2F5233` | success states, confirmations |
| `warning` | Warning | `#C9A24F` | aliased to `primary-alt` (gold-rich) |
| `error` | Error | `#B33A3A` | required-field markers, errors, destructive actions (replaces current `#E61E1E`, which is borderline AA) |
| `info` | Info | `#043053` | aliased to `primary` |

### Contrast notes

All pairings checked for WCAG AA at minimum:
- `primary` on `base` — 13:1 (AAA) ✅
- `base` on `primary` — 13:1 (AAA) ✅
- `main` on `base` — 12:1 (AAA) ✅
- `primary-alt` (rich gold) on `base` — 4.6:1 (AA) ✅
- `gold-pale` on `base` — 1.4:1 ❌ — **decorative only**, never text
- `error` on `base` — 5.3:1 (AA) ✅
- `success` on `base` — 7:1 (AAA) ✅
- Action colour will be re-checked once locked.

---

## Spacing & layout

### Spacing scale *(signed off 2026-05-10)*

theme.json adopts Ollie's slug names (`small` → `xxxx-large`) and extends with `xx-small` / `x-small` for finer steps. **All sizes ≥ `small` use `clamp()` for responsive fluid scaling.** Mobile and desktop columns below show roughly what each slug resolves to at 375px and 1440px viewports.

| Slug | Value | Mobile (375) | Desktop (1440) | Typical use |
|---|---|---|---|---|
| `xx-small` | `0.25rem` (fixed) | 4px | 4px | hairline gap |
| `x-small` | `0.5rem` (fixed) | 8px | 8px | tight gap |
| `small` | `clamp(0.75rem, 2vw, 1rem)` | 12px | 16px | small gap, paragraph margin |
| `medium` | `clamp(1rem, 3vw, 1.5rem)` | 16px | 24px | inline padding, default block gap |
| `large` | `clamp(1.5rem, 4vw, 2rem)` | 24px | 32px | small section padding, root gutter |
| `x-large` | `clamp(2rem, 5vw, 3rem)` | 32px | 48px | larger padding |
| `xx-large` | `clamp(2.5rem, 6vw, 4rem)` | 40px | 64px | section padding (small) |
| `xxx-large` | `clamp(3.5rem, 9vw, 6rem)` | 56px | 96px | section padding (default) |
| `xxxx-large` | `clamp(5rem, 14vw, 8rem)` | 80px | 128px | hero / dramatic spacing |

### Layout

| Setting | Value | Note |
|---|---|---|
| `contentSize` | 768px | reading width — articles, prose |
| `wideSize` | 1600px | main constrained-content width |
| Root padding (gutter) | `large` slug = clamp(1.5rem, 4vw, 2rem) | applies via `useRootPaddingAwareAlignments`; 24px mobile → 32px desktop |
| Default section padding | `xxx-large` slug | 56px mobile → 96px desktop |

### Tap target minimum

44px × 44px for any clickable element (per WCAG 2.5.5 / brief). Affects buttons, nav links, social icons, form fields.

---

## Radii & elevation

### Radii *(signed off 2026-05-10)*

Stored under `custom.radius` so they're available as CSS vars. Slug names align with Ollie's `border.radiusSizes` convention.

| Slug | Value | Use |
|---|---|---|
| `xs` | `0.25rem` (4px) | buttons, inputs, small cards |
| `md` | `0.75rem` (12px) | larger cards, image frames, pull-quotes |
| `full` | `9999px` | avatars, social-icon discs, pill chips |

Reference in code as `var:custom|radius|xs`.

### Elevation *(signed off 2026-05-10)*

The current site is essentially shadow-free; preserve that flatness as the default. Two named shadows for cases where elevation is genuinely needed.

| Slug | Value | Use |
|---|---|---|
| `sm` | `0 1px 2px rgba(4,48,83,0.06)` | sticky header at scroll, subtle separation |
| `md` | `0 4px 16px rgba(4,48,83,0.10)` | dropdowns, popovers, modal cards |

Reference as `var:preset|shadow|sm`.

---

## Custom typography tokens

Stored under `settings.custom.*` and exposed as CSS vars. Slug names align with Ollie's where Ollie has the same slot; new sub-objects (letterSpacing) follow Ollie's descriptive naming style.

### Line heights

| Slug | Value | Use |
|---|---|---|
| `tight` | 1.10 | display headings (h1, h2) |
| `snug` | 1.20 | sub-headings, h3, h4, pull-quotes |
| `body` | 1.45 | default body text |
| `relaxed` | 1.625 | long-form reading |
| `loose` | 2.00 | rare — emphasis, special blocks |

### Letter spacing

| Slug | Value | Use |
|---|---|---|
| `tight` | -0.01em | rare — large display text |
| `normal` | 0 | default |
| `wide` | 0.04em | small-caps body emphasis |
| `wider` | 0.1em | buttons, eyebrows |
| `widest` | 0.18em | display eyebrows (h4, h5, h6 uppercase) |

### Font weights

Standard weight slugs, aligned to the weights actually loaded for Montserrat and Bodoni Moda.

| Slug | Value | Use |
|---|---|---|
| `light` | 300 | Montserrat-only; eyebrow option (see note below) |
| `regular` | 400 | default body, headings |
| `medium` | 500 | nav links |
| `semi-bold` | 600 | buttons, primary CTAs, h5/h6 eyebrows |
| `bold` | 700 | emphasis where genuinely needed |

> **Eyebrow weight — unresolved.** This doc currently says both Primary 300 (lines 31 / 55 / 63 — carry-over from current site) and `semi-bold` 600 (this table — the brief's stronger-hierarchy direction). `theme.json` currently implements 600 for h5/h6. Resolve when we hit template/eyebrow styling in Phase 2/3.

---

## Iconography *(signed off 2026-05-10)*

- **Library:** [Lucide](https://lucide.dev/) — open-source (ISC), modern, comprehensive, designed for editorial UIs. Replaces the current site's Font Awesome 4.7 (which is end-of-life).
- **Stroke:** 1.5px (default), aligns with editorial / sacred feel — neither too heavy nor too thin.
- **Sizing:** 16, 20, 24, 32px — align to spacing scale.
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
| 2026-05-16 | **Ollie dropped as parent theme** | Theme promoted to standalone block theme. Child was overriding ~95% of Ollie's `theme.json` and using none of its templates; the parent layer added complexity for negligible value. `style.css` `Template: ollie` removed; theme provides own fallback templates (`index.html`, `single.html`, `page.html`, `archive.html`, `404.html`, `search.html`). |
| 2026-05-16 | Bodoni Moda re-confirmed as display family | Reconfirmed against Ian's "don't deviate from current `theme.json` fonts" instruction. Bodoni Moda is the cleanest available equivalent to Bodoni Seventy Two ITC TT given ITC licensing. |
| 2026-05-16 | Mellow Morning Script retained for narrow use | Carried over from live site. Approved placements only: Louise's signature, one hero phrase per offering, pull-quote attribution. Out of scope for body / nav / buttons / headings / anywhere readability matters. theme.json slug: `script`. |
| 2026-05-16 | Live-site palette consolidation confirmed | `secondary-copy`, `highlight`, `light-gold`, `ghost-white`, `grey`, `header` absorbed into the new slug system, not preserved. Orange `#f26431` dropped entirely from the rebuild. |
| 2026-05-16 | Sitemap reset to draft | `docs/sitemap.md` is starting-point only. IA redesigned together in Phase 2: Home / Offerings / Learn / About / Contact + utility. Validated against live-content inventory once Phase 1 MCP read access is in place. |
| 2026-05-16 | Commerce-agnostic theme | No on-site checkout assumption. Each offering page has an editable CTA slot (URL + label per page). Lets us soft-launch on Kajabi/Calendly and migrate later. |
| 2026-05-16 | Live-site MCP install — Phase 1 task | Install `@automattic/wordpress-mcp` on production louisecarronharris.com so Claude can read existing content during the rebuild. Separate from the local-site MCP setup. |
| 2026-05-10 | Bodoni Moda chosen as display family | Replaces Bodoni Seventy Two ITC TT used on the existing site. theme.json slug: `display`. |
| 2026-05-10 | Montserrat retained as body family | theme.json slug: `primary`. Weights 300/400/500/600 + italic 400. |
| 2026-05-10 | Brand colours mapped onto Ollie slug names | `primary` (navy), `main` (body), `base` (cream), `secondary` (mid grey), etc. New slugs added for `gold-pale`, `gold-rich` (= `primary-alt`), action variants, semantic states, neutral-50/400. |
| 2026-05-10 | CTA accent deferred | Will be chosen visually against a homepage hero composition. `action` set to navy as a working stand-in. Candidates: forest green, burnt copper, aubergine. |
| 2026-05-10 | Buttons at weight 600 (`semi-bold`) | Lifted from current 500. Lightest-touch way to deliver the brief's stronger-CTA ask. |
| 2026-05-10 | Type scale | 7 steps (`x-small` → `xx-large`), base 18 / 1.45. Larger sizes are fluid via explicit min/max. |
| 2026-05-10 | Spacing scale — fluid throughout | 9 steps (`xx-small` → `xxxx-large`). All sizes ≥ `small` use `clamp()` for responsive scaling, replacing the earlier fixed 8pt scale. |
| 2026-05-10 | Radii | `xs` (4px), `md` (12px), `full` (9999px). Stored in `custom.radius`. |
| 2026-05-10 | Elevation | `sm` and `md` shadow presets in `settings.shadow.presets`. Default shadow-free. |
| 2026-05-10 | Iconography — Lucide 1.5px stroke | Replaces Font Awesome 4.7. |
| 2026-05-10 | Layout | content 768 / wide 1200; root padding via `large` slug; section padding via `xxx-large`. |
| 2026-05-10 | Layout — `wideSize` raised to 1600 | First spot-check at 1200 was visibly cramped (header wrapping). Raised to 1600 to give the 2026 layout proper breathing room on modern desktop screens. Plus white-space:nowrap on site title, nav links, and buttons to prevent label wrap. |
| 2026-05-10 | Single canonical slug namespace | theme.json adopts Ollie's slug naming convention rather than maintaining parallel "brand-prefixed" slugs. New slugs follow Ollie's pattern. |

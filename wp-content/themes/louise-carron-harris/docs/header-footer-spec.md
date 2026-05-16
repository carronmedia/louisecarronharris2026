# Header + footer spec — louisecarronharris.com (2026 rebuild)

Decisions locked 2026-05-10. Specifies what the header and footer template parts must do. References `brand-guidelines.md` for tokens and `sitemap.md` for navigation structure.

> **Status:** all decisions resolved. Ready to build.

---

## Header

### Purpose

- Present a clear identity (who this site belongs to).
- Get a visitor to a relevant action within one click — primary CTA is **the next dated event** (a Medicine Dance, online or in-person), per the brief's "Next Event" recommendation and the value ladder's emphasis on routing returning visitors to upcoming events.
- Provide accessible, plain-language navigation to the main offering pages.
- Signal trust passively (consistent across all pages, no clutter).

### Layout — desktop (≥ 768px)

```
┌─────────────────────────────────────────────────────────────────────────┐
│  [Skip to content]                                                       │
│                                                                          │
│  Louise Carron Harris        Books   Online   Events   Therapy   …      │
│                                                          [Next event ↗] │
└─────────────────────────────────────────────────────────────────────────┘
```

- **Wordmark** (left): the text "Louise Carron Harris", set in **Display family (Bodoni Moda) regular**, size `medium` slug (~22px), color `primary` (navy), no underline. Acts as link to homepage.
- **Primary nav** (right of wordmark, before CTA): inline horizontal list of top-level offering pages from `sitemap.md`. Plain-language labels per `feedback_plain_language_a11y` memory. **5 items max** to fit on a 1024px viewport without crowding; secondary pages (About, Stories, Articles, Contact) move to the footer or a "more" overflow.
- **Primary CTA** (far right): a single button labelled with the next dated event, e.g. **"Next Medicine Dance — 17 May"** or generic fallback **"See upcoming events"** if no upcoming event is configured. Uses the global button style from `theme.json` (action background, action-on text, semi-bold, uppercase, wider letter-spacing, radius `xs`). Links to the relevant offering page or the consolidated events page.
- **Skip-to-content link**: visually hidden until keyboard focus, then visible at top-left. WCAG 2.4.1.

### Layout — mobile (< 768px)

```
┌─────────────────────────────────┐
│  Louise Carron Harris       ☰   │
└─────────────────────────────────┘

  When ☰ tapped, full-screen overlay:
┌─────────────────────────────────┐
│  Louise Carron Harris       ✕   │
│                                  │
│  Books                           │
│  Online programmes               │
│  In-person events                │
│  1-2-1 therapy                   │
│  Medicine Wheel                  │
│  Earth Chakras                   │
│  About                           │
│                                  │
│  [Next Medicine Dance — 17 May] │
│                                  │
│  Instagram   YouTube   Spotify  │
└─────────────────────────────────┘
```

- **Wordmark** (left), **hamburger** (right). 44px tap targets minimum.
- **Hamburger expands** into a full-screen overlay (no in-flow accordion). Background: `base` (cream); navy text. Heading-level type for nav items. CTA button at the bottom of the overlay, social icons below.
- **Close button**: replaces hamburger when open; same position so it's predictable.
- **Body scroll** is locked while menu is open.

### Sticky behaviour

- Header is sticky on scroll on **all viewports** (per the brief: "sticky 'Book Now' button visible on every page").
- When scrolled past 80px, header gets `shadow-sm` (`0 1px 2px rgba(4,48,83,0.06)`) and a slightly compressed vertical padding (from `medium` to `small`) for a tighter feel during reading. Optional polish; can ship without this in v1.
- `prefers-reduced-motion` users get no transition on this state change.

### Components & tokens

| Component | Token reference |
|---|---|
| Header background | `base` (#FFFDF6) |
| Header bottom border | `border-light`, 1px |
| Wordmark | `font-family: display`, `font-size: medium`, `font-weight: regular`, `color: primary` |
| Nav link (idle) | `font-family: primary`, `font-size: small`, `font-weight: medium`, `color: main`, `letter-spacing: wider`, uppercase **or** sentence case (decide below) |
| Nav link (hover/focus) | `color: action-hover` (or `primary-alt` if we want a gold underline accent) |
| CTA button | global button style from `theme.json` (no override) |
| Hamburger / close | 24px Lucide icon, `color: primary`, 44×44px tap target |
| Vertical padding | `medium` slug (clamp 16-24px) |
| Horizontal padding | inherited root padding (`large` slug, clamp 24-32px) |

### Accessibility

- `<header role="banner">`. Skip-to-content link as first focusable element.
- `<nav aria-label="Primary">` wrapping nav.
- Mobile menu toggle: `<button aria-expanded aria-controls>`. Overlay has `role="dialog" aria-modal="true"` and an accessible label.
- Focus trap inside the overlay while open; ESC closes.
- All interactive targets ≥ 44×44px.
- Visible focus ring on every focusable element (the global focus style — to be defined in `theme.json` or CSS).

---

## Footer

### Purpose

- Re-surface every primary path (offering pages, content hubs) for visitors who scroll without finding what they need above.
- **Capture email** as the dominant footer ask — newsletter + lead magnet (the free Earth Chakra meditation per the brief).
- Present trust and social proof passively (years of practice, location, social proof).
- Close out with legal and credits.

### Layout — desktop (≥ 768px)

```
┌─────────────────────────────────────────────────────────────────────────┐
│                                                                          │
│   ─── NEWSLETTER LEAD MAGNET (full-width band, distinct background) ─── │
│   Earth Chakra meditation, free                                          │
│   Join 1,000+ readers, monthly letter on…                               │
│   [Email address ────────────] [Subscribe]                              │
│                                                                          │
│   ──────────── (4 columns) ─────────────────────────────────────────── │
│                                                                          │
│   Louise Carron Harris   |  Begin              |  Go deeper        |   │
│   Glastonbury, UK        |  Books              |  1-2-1 therapy    |   │
│   [headshot]             |  Online programmes  |  Medicine Wheel   |   │
│   "20+ years of practice"|  In-person events   |                   |   │
│                          |                     |  Stories          |   │
│                          |  Earth Chakras      |  Articles         |   │
│                          |                     |  About            |   │
│                          |                     |  Contact          |   │
│                                                                          │
│   ──── separator ────                                                    │
│                                                                          │
│   © 2026 Louise Carron Harris   |  Privacy   Terms   FAQ                │
│   Instagram   YouTube   Spotify Substack                                 │
└─────────────────────────────────────────────────────────────────────────┘
```

### Layout — mobile (< 768px)

Sections stack in this order:
1. Newsletter band (full-width, taller).
2. Trust block (Lou's name + headshot + location + years).
3. Nav columns collapse into accordions or simple stacked groups (no accordion — accordions add complexity and can hide info; just stack with bold group headings).
4. Social icons.
5. Legal + copyright.

### Sections in detail

#### 1. Newsletter band

- Distinct from the rest of the footer — slightly inset background (`tertiary` slug, `#F0EEE8`) or full navy with cream text. Decide visually.
- Heading: "A free Earth Chakra meditation" or similar. Display family, `large` slug, navy.
- Sub: short paragraph (1 sentence), Primary family, `base`.
- Form: email input + submit button. Inline on desktop, stacked on mobile.
- Submit button uses the global button style. Label: "Subscribe" or "Send me the meditation".
- Privacy microcopy below: "Unsubscribe any time. We never share your email." `x-small`, `secondary`.
- ARIA: `<form aria-label="Newsletter signup">`. Inline validation messages tied via `aria-describedby`.

#### 2. Identity / trust column

- Wordmark (text, same treatment as header but optionally `large` size on desktop).
- Headshot (square 80×80, radius `full`, with `gold-pale` 2px ring as decorative accent).
- One-line tagline: "Shamanic teacher, therapist, author. Glastonbury, UK."
- Trust microcopy: "20+ years of practice." Or similar — Lou to confirm exact wording.

#### 3, 4. Nav columns

- Group by **value ladder tier** (`Begin` / `Go deeper`) plus a third "About this site" column for content / authority pages.
- Group headings use **h6 style** (Primary family, `small`, semi-bold, uppercase, `widest` letter-spacing, `secondary` color).
- Links use Primary family `small` / regular / `main` color, no underline by default; underline on hover/focus.

  Note: tier labels in nav columns are **document-side groupings**, not visible labels in the live nav. Headers like "Begin" / "Go deeper" inside the footer ARE acceptable IF labelled clearly enough that they describe what's underneath. Discuss in feedback — I'm using them here only because the heading sets context for the list below.

#### 5. Social icons

- Instagram, YouTube, Spotify, Substack (per the existing site's set, plus Substack which Lou uses).
- 24px Lucide icons (or official platform glyphs for brand recognition), `color: primary` on cream OR `color: base` on navy depending on background choice.
- 44px tap targets, `aria-label` per icon.

#### 6. Legal

- Copyright: `© 2026 Louise Carron Harris`.
- Links: Privacy Policy, Terms, FAQ (or Cookie Policy if we add one).
- Type: Primary `x-small`, `secondary` color.

### Components & tokens

| Component | Token reference |
|---|---|
| Footer background | **decide:** `primary` (navy with cream text) — preserves current site's signature dark footer; OR `base` with subtle separator. My recommendation: navy. |
| Footer foreground | `base` (cream) on navy; or `main` on cream |
| Newsletter band background | `tertiary` (`#F0EEE8`) — subtle visual distinction even on navy footer |
| Vertical padding | `xxx-large` slug (clamp 56-96px) |
| Column gap | `x-large` slug (clamp 32-48px) |
| Group heading | h6 element style |

### Accessibility

- `<footer role="contentinfo">`.
- Newsletter `<form>` has accessible labels and inline validation.
- Headshot `alt="Louise Carron Harris"`.
- Social-icon links have visible focus rings and `aria-label`s.

---

## Decisions (locked 2026-05-10)

| # | Decision | Resolution |
|---|---|---|
| 1 | Wordmark treatment | Convert Lou's existing PNG to SVG via Figma. v1 ships with a placeholder text wordmark (Bodoni Moda, "Louise Carron Harris"); SVG drops in when ready. |
| 2 | Nav case | **Sentence case** — "Books · Online programmes · Events · Therapy · Earth Chakras". Departs from current site's uppercase but reads cleaner with the longer plain-language labels. |
| 3 | Primary header CTA | **FSE-managed Button block** in the header template part. Lou edits the label and link in the Site Editor when there's a new event ("Next Medicine Dance — 17 May") or sets a generic fallback ("See upcoming events"). No ACF, no custom code. |
| 4 | Sticky-at-scroll micro-animation | **Static sticky** — header is sticky on all viewports but does not change appearance when scrolled. Restrained, simpler to implement. |
| 5 | Footer background | **Navy with cream text** (`primary` background, `base` foreground). Preserves the current site's signature. |
| 6 | Footer column groupings | **By value-ladder tier** — three columns: `Begin` (Books, Online programmes, In-person events), `Go deeper` (1-2-1 therapy, Medicine Wheel), `About this site` (Earth Chakras, Stories, Articles, About, Contact). |
| 7 | Mobile menu pattern | **Full-screen overlay** with focus trap, ESC-to-close, body-scroll-lock. |
| 8 | Trust microcopy | **"Shamanic teacher, therapist & author."** No "Glastonbury" anchor (Lou's work is international; location lives in Contact and structured data, not as part of identity). |
| 9 | Social platforms shown | **Instagram, YouTube, Substack.** Spotify dropped from the current site's set. |

### Implementation notes from these decisions

- The "Begin / Go deeper / About this site" column headings ARE visible labels in the footer, since they describe their groups concretely. This is not the same as using metaphor in nav.
- The "Next event" CTA is a regular FSE Button block in the header template part. Editing happens in Appearance → Editor → Patterns → Header. No plugin, no code path.
- The wordmark SVG conversion is a parallel task — it doesn't block `parts/header.html` since the placeholder is well-defined.

### FSE-native, not plugin-native

We default to FSE-native solutions over plugins / custom code. Site editor + theme.json + block patterns + template parts handle this rebuild's needs in v1. Plugins (ACF, Events Calendar, etc.) get added only when an FSE-native equivalent doesn't exist or isn't fit-for-purpose. See `feedback_fse_first` memory.

---

## Out of scope for this spec

- **Search** — not in v1. Add later if traffic patterns suggest it.
- **Members area login link** — currently in current site footer; revisit when we decide whether members area stays Kajabi or migrates.
- **Language switcher** — site is English-only.
- **Cart** — no e-commerce in scope.

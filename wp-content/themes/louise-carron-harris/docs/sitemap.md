# Sitemap blueprint — louisecarronharris.com (2026 rebuild)

Strawman, 2026-05-10. The IA blueprint — every page tagged with purpose, value-ladder tier, sections, CTAs, content needs, and template. Drives downstream decisions about which page templates the child theme needs and what content has to be written before launch.

This is a strawman to react to. Push back on anything.

---

## Principles

1. **Plain-language labels everywhere.** No metaphor in nav, page titles, section headings, or CTAs (see `feedback_plain_language_a11y` memory).
2. **Every offering page belongs to a value-ladder tier** and ends with a CTA pointing to the next tier up (or laterally — never back down, never skipping multiple tiers).
3. **Predictable page shape.** Every offering page in the same order: hero → what it is → who it's for → what's included → price → dates → testimonials → FAQ → CTA. Returning visitors learn the pattern once.
4. **Schema.org markup is mandatory** on every page that has a defined Schema type (Product, Event, Course, Person, FAQPage, Article, BreadcrumbList).
5. **Mobile-first.** Every page must work as well on a 375px screen as on desktop.

---

## Value ladder reminder

| Tier | Offerings |
|---|---|
| **Discover** (low commitment) | Books · Morning Medicine Club · Medicine Dance Online |
| **Engage** (deeper, in-person) | Medicine Dance (in-person) · Pilgrimages |
| **Commit** (high investment) | Medicine Wheel Training · 1-2-1 Shamanic Therapy |

---

## Top-level pages (nav-accessible)

### Homepage `/`
- **Purpose:** orient first-time visitors; surface the value ladder; route returning visitors to upcoming events.
- **Tier:** all (this is the entry to the ladder).
- **Template:** `home`.
- **Key sections:** hero (value prop + primary CTA + next event) · "How would you like to start?" three-card ladder · upcoming events strip · Earth Chakras teaser · about-Louise snippet · testimonials · newsletter signup.
- **Primary CTA:** "See the next Medicine Dance" (or whatever the next dated event is).
- **Secondary CTA:** "Read about Louise's books".
- **Schema:** WebSite, Person (sameAs links to Lou's socials/Amazon/Substack).
- **Status:** new (rebuild from scratch).
- **Detailed design:** see `homepage.md` (to be written — task #9).

### Books `/books`
- **Purpose:** list Louise's books with buying links; route to per-book pages for chapter samples and reviews.
- **Tier:** Discover.
- **Template:** `books-list`.
- **Key sections:** intro (why Louise writes) · book grid with cover, title, one-line, buy link · testimonials about the books.
- **Primary CTA per book:** "Buy on Amazon" (or wherever; can be unified).
- **Bottom-of-page CTA:** "Want to go deeper? Try the Morning Medicine Club" (laterally within Tier 1) or "Come to a Medicine Dance" (to Tier 2).
- **Schema:** ItemList of Book.
- **Status:** new (current site has a basic books page; restructure).

#### Book single `/books/[slug]`
- **Purpose:** sell a single book. One per book.
- **Tier:** Discover.
- **Template:** `book-single`.
- **Key sections:** cover · synopsis · who it's for · sample chapter or excerpt · reviews · author note · buy CTAs · "what's next" links to programmes/dances.
- **Schema:** Book + AggregateRating.
- **Status:** new (no per-book pages on current site).

### Online Programmes `/online-programmes`
- **Purpose:** landing page for Morning Medicine Club + Medicine Dance Online; explain the difference; route to each.
- **Tier:** Discover.
- **Template:** `tier-landing` (reusable for the other tier landings).
- **Key sections:** intro · two programme cards (title, format, price, what's included, CTA) · joint testimonials · FAQ · CTA strip "Ready for in-person? See in-person events".
- **Primary CTA:** depends on visitor — both cards equal weight.
- **Schema:** ItemList of Course or Event.
- **Status:** new.

#### Morning Medicine Club `/online-programmes/morning-medicine-club`
- **Purpose:** sell the £33/mo journaling subscription.
- **Tier:** Discover.
- **Template:** `offering`.
- **Key sections:** hero (what it is, when, price) · who it's for · what happens each morning · what's included · sample week · subscriber testimonials · FAQ · subscribe CTA · "after this, try…" pointing to Medicine Dance Online (lateral).
- **Schema:** Course or Service.
- **Status:** carry forward (page exists, restructure).

#### Medicine Dance Online `/online-programmes/medicine-dance-online`
- **Purpose:** sell the £18 one-off / £16 subscription monthly online dance.
- **Tier:** Discover.
- **Template:** `offering`.
- **Key sections:** hero (next date, price, format) · what is medicine dance · who it's for · how it works (tech, prep, equipment) · testimonials · FAQ · book CTA · "ready for in-person?" pointing to Tier 2.
- **Schema:** Event (one per upcoming date) + Service.
- **Status:** carry forward, restructure.

### In-Person Events `/events`
- **Purpose:** landing page for in-person Medicine Dance + Pilgrimages; surface upcoming dates prominently.
- **Tier:** Engage.
- **Template:** `tier-landing`.
- **Key sections:** intro · upcoming events calendar/list · Medicine Dance card · Pilgrimages card · testimonials · FAQ · "ready for sustained guidance?" CTA to Tier 3.
- **Primary CTA:** book the next dated event.
- **Schema:** ItemList of Event.
- **Status:** new (current site splits Courses & Events / Pilgrimages — consolidate).

#### Medicine Dance (in-person) `/events/medicine-dance`
- **Purpose:** sell the in-person monthly Medicine Dance at Lopemede Farm.
- **Tier:** Engage.
- **Template:** `offering`.
- **Key sections:** hero (next date, location, price) · what to expect · what to bring · location/travel · testimonials · FAQ · book CTA · "ready for a pilgrimage?" lateral within Tier 2.
- **Schema:** Event (one per upcoming date).
- **Status:** carry forward, restructure.

#### Pilgrimages `/events/pilgrimages`
- **Purpose:** list of all pilgrimages — past, current, upcoming.
- **Tier:** Engage.
- **Template:** `pilgrimages-list`.
- **Key sections:** intro (what is a pilgrimage with Louise) · upcoming pilgrimages cards · past pilgrimages (with photo galleries and pilgrim stories — social proof) · FAQ · "how to apply" CTA.
- **Schema:** ItemList of TouristTrip / Event.
- **Status:** carry forward (current page has typos and unclear dates; full rebuild).

##### Pilgrimage single `/events/pilgrimages/[slug]`
- **Purpose:** sell a specific pilgrimage (Egypt 2026, Peru 2027, etc.).
- **Tier:** Engage.
- **Template:** `pilgrimage-single`.
- **Key sections:** hero (location, dates, price, deposit) · itinerary · what's included / not included · who it's for · past pilgrim testimonials with photos · FAQ · application CTA (form or call) · "ready for sustained guidance?" to Tier 3.
- **Schema:** TouristTrip + Event + Offer.
- **Status:** new (current site has no per-pilgrimage pages).

### 1-2-1 Therapy `/therapy`
- **Purpose:** sell shamanic therapy sessions; route to a discovery call booking.
- **Tier:** Commit.
- **Template:** `offering`.
- **Key sections:** hero · what shamanic therapy is · who it's for / who it isn't for · what to expect from a discovery call · session formats (in-person / online) · pricing · client testimonials · FAQ · book a discovery call CTA.
- **Note:** no "next tier up" CTA — Tier 3 is the top.
- **Schema:** Service + Person.
- **Status:** carry forward (current `/work-with-me` page; rename slug for SEO and clarity per the brief).

### Medicine Wheel Training `/medicine-wheel`
- **Purpose:** sell the year-long Medicine Wheel programme.
- **Tier:** Commit.
- **Template:** `offering`.
- **Key sections:** hero · what the training is · 12-month curriculum · who it's for · graduate testimonials · investment / payment plans · application process · FAQ · application CTA.
- **Schema:** Course + Offer.
- **Status:** carry forward, restructure.

### Earth Chakras `/earth-chakras`
- **Purpose:** the authority hub. Biggest AEO/SEO opportunity per the brief. Single source for Louise's Earth Chakras teaching, with dedicated pages per chakra.
- **Tier:** none (content/authority, not an offering — but every chakra page CTAs into related offerings).
- **Template:** `topic-hub`.
- **Key sections:** intro (lead with a direct, citable definition for AEO) · what are the Earth Chakras · world map / list of all 7 with one-paragraph each linking to dedicated pages · Louise's connection to each · FAQ · CTAs into pilgrimages (Egypt, Peru, Glastonbury) and books.
- **Schema:** Article + ItemList of WebPage children · FAQPage if FAQ included.
- **Status:** carry forward (rich existing content needs full restructuring per the brief).

#### Per-chakra pages `/earth-chakras/[location]`
- **Locations:** Mount Shasta, Lake Titicaca, Uluru, Glastonbury, Mount of Olives (Jerusalem)/Egypt, Shaftesbury (UK), Mount Kailash. Confirm exact list with Louise.
- **Purpose:** authoritative AEO-optimised page per chakra. Drives organic traffic.
- **Tier:** none.
- **Template:** `chakra-single`.
- **Key sections:** lead-with-definition (1-2 sentences answering "what is the X chakra"), location, governance, Louise's experience, related books, related pilgrimage if applicable, FAQ, CTA.
- **Schema:** Article + Place + FAQPage.
- **Status:** new (currently bundled into one long page).

### About `/about`
- **Purpose:** Louise's story, qualifications, lineage; trust-building.
- **Tier:** none.
- **Template:** `about`.
- **Key sections:** photo + intro · timeline / qualifications · lineage · personal practice · what visitors say (testimonials) · CTA to discovery call.
- **Schema:** Person (canonical entity for the whole site) + AboutPage.
- **Status:** carry forward, restructure.

### Contact `/contact`
- **Purpose:** general enquiries; routes most visitors to the right CTA elsewhere.
- **Tier:** none.
- **Template:** `contact`.
- **Key sections:** "what are you looking for?" links · contact form for general enquiries · social links · location (Glastonbury).
- **Schema:** ContactPage + Organization (NAP for local SEO).
- **Status:** carry forward.

---

## Secondary pages (footer / sub-nav)

### Stories `/stories` (testimonials & results)
- **Purpose:** dedicated trust-building page; stories from clients categorised by offering.
- **Tier:** none.
- **Template:** `stories`.
- **Key sections:** stories grouped by tier (therapy clients · pilgrimage participants · Medicine Wheel graduates · book readers) · video testimonials when available · CTA into discovery call.
- **Schema:** ItemList of Review.
- **Status:** new.

### Articles `/articles` (blog)
- **Purpose:** SEO/AEO authority building; regular publishing per the brief (2–4 per month).
- **Tier:** none.
- **Template:** `article-index` and `article-single`.
- **Key sections (index):** featured + chronological list, filter by category. **Single:** intro · table of contents (long posts) · body · author bio · related articles · CTA into relevant offering.
- **Schema:** Blog / CollectionPage; Article on each post.
- **Status:** new.

### FAQ `/faq`
- **Purpose:** site-wide FAQ aggregating common pre-purchase questions; AEO win.
- **Tier:** none.
- **Template:** `faq`.
- **Key sections:** grouped by topic — therapy, dances, pilgrimages, programmes, technology, payment.
- **Schema:** FAQPage (rich result eligible).
- **Status:** new.
- **Note:** per-offering pages also have their own scoped FAQ blocks; this is the catch-all.

### Newsletter `/newsletter`
- **Purpose:** dedicated landing page for newsletter signup; lead magnet (free Earth Chakra meditation download).
- **Tier:** none (top-of-funnel email capture).
- **Template:** `newsletter`.
- **Key sections:** what the newsletter is · what subscribers get · signup form · what's in the free download · sample past issues · social proof.
- **Schema:** WebPage.
- **Status:** new (current site only has a footer signup).

### Members `/members` (or external link)
- **Purpose:** entry to Kajabi members area.
- **Tier:** none.
- **Template:** thin landing or external redirect.
- **Status:** carry forward, give it context (current is a bare external link with no explanation).

### Privacy `/privacy` and Terms `/terms`
- **Status:** carry forward, review for compliance.

---

## Pages dropped from current site

- **`/click-me` (link tree).** Replaced by clean nav and a proper Linktree-replacement on the homepage if needed for Instagram bio links.
- **The Instagram feed block on the homepage.** Reduce to a small 4–6 tile strip linking to Instagram, not full posts with captions (per the brief).
- **The video logo animation in the homepage hero.** Replace with a clear value proposition (per the brief).

---

## Page templates derived from this sitemap

This becomes the actual list of templates the child theme needs. Reusable, not one-per-page.

| Template | Used by |
|---|---|
| `home` | homepage |
| `tier-landing` | Online Programmes, In-Person Events |
| `offering` | Morning Medicine Club, Medicine Dance Online, Medicine Dance in-person, 1-2-1 Therapy, Medicine Wheel |
| `pilgrimages-list` | Pilgrimages list |
| `pilgrimage-single` | each pilgrimage |
| `books-list` | Books |
| `book-single` | each book |
| `topic-hub` | Earth Chakras hub |
| `chakra-single` | each chakra |
| `article-index` / `article-single` | blog |
| `about` · `contact` · `stories` · `faq` · `newsletter` · `page` (utility) | one each |

That's ~13 templates. The child theme starts with `home`, `offering`, `tier-landing`, `topic-hub`, `chakra-single`, and a generic `page` — the rest can be Phase 2.

---

## Phased build (proposed)

**Phase 1 — Launch-ready spine:**
- Homepage
- All Tier 1/2/3 offering pages (Books list, Online Programmes + 2 children, In-Person Events + 2 children, Therapy, Medicine Wheel)
- About, Contact
- Earth Chakras hub (single page; per-chakra children come in Phase 2)
- FAQ (consolidated)
- Stories (testimonials)
- Newsletter landing

**Phase 2 — Authority & depth:**
- Per-book pages
- Per-pilgrimage pages
- Per-chakra pages (the topic cluster)
- Articles / blog
- Events calendar feature

**Phase 3 — Optimisation:**
- Pop-up email capture
- Live chat / WhatsApp
- A/B tests on hero CTAs
- Schema markup audit / refinement
- Members-area preview content

---

## Open questions

1. **Pilgrimages slug.** `/events/pilgrimages` (treats them as events, current grouping) or `/pilgrimages` (top-level, gives them more SEO weight, since they're a flagship offering)?
2. **Earth Chakras list.** Need Louise to confirm the exact 7 chakra locations she teaches. Current site mentions several but the canonical list isn't clear.
3. **Booking system.** Brief recommends consolidating to one (Kajabi vs WooCommerce Bookings vs Amelia). Pages above assume CTAs route to whichever it is; the page structure doesn't depend on the choice but the templates do.
4. **Members area.** Stay external (Kajabi) or migrate to native WP membership? Affects Phase 3.
5. **Books CTA destination.** Amazon (current) or Louise's own shop (Phase 2 e-commerce)? Affects book-single template.

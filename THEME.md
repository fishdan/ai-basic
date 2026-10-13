# ai-basic — theme contract for AI agents (and humans)

`ai-basic` is a WordPress **block theme**. There is no PHP page logic, no build
step, and no page-builder content in the database. Everything the theme does is
declared in the plain-text files in this folder. If you can edit a text file,
you can change anything about this site.

You will usually be on the WordPress machine over SSH. This folder is
`wp-content/themes/ai-basic`, or on Bitnami (including Lightsail)
`/opt/bitnami/wordpress/wp-content/themes/ai-basic`. Edit the files here.
The human describes the look they want; they are not applying it in the
WordPress screen.

## This file is a contract — read this first, agent

This document is not advisory. It is a **contract** between the theme and
anyone (human or AI) who edits it. The theme's value — that any agent can open
this folder and safely change anything — exists only as long as every edit
leaves the theme conforming to the rules below.

**What you may change freely** (this is configuration, and it is encouraged):

- Any token value in `theme.json` (colors, fonts, sizes, spacing, widths)
- Any text, image, link, or block inside `templates/`, `parts/`, `patterns/`
- Adding, removing, or reordering patterns and templates
- Adding style variations under `styles/`

**What you must never do without an explicit user instruction** that names the
specific rule being broken (a general request like "make it pop" or "add a
contact form" does NOT qualify):

- Add CSS to `style.css` or anywhere else outside `theme.json`
- Add logic, hooks, shortcodes, or dependencies to `functions.php`
- Hardcode raw colors/sizes in block markup instead of token slugs
- Introduce a build step, external assets, or vendor directories
- Restructure the directory layout or rename the semantic parts

If a user request *seems* to require breaking a rule, stop and do one of two
things: (a) find the conforming way to do it — there almost always is one, see
the recipes below — or (b) tell the user which rule the request conflicts with
and ask them to explicitly approve the exception.

If the user does explicitly approve an exception, keep the deviation as small
as possible, and **record it in the "Approved exceptions" section at the bottom
of this file** (what was changed, why, who approved it, date). An undocumented
violation is a bug.

The test of a correct edit: after your change, a fresh agent reading only
THEME.md can still predict where everything lives and safely make the next
change. Configure the theme as much as you like — but leave the contract intact
for whoever comes after you.

## File map — "to change X, edit Y"

| To change… | Edit… |
|---|---|
| Colors | `theme.json` → `settings.color.palette` |
| Fonts | `theme.json` → `settings.typography.fontFamilies` |
| Font sizes | `theme.json` → `settings.typography.fontSizes` |
| Spacing scale | `theme.json` → `settings.spacing.spacingSizes` |
| Content width | `theme.json` → `settings.layout` (`contentSize`, `wideSize`) |
| Link/button/heading defaults | `theme.json` → `styles.elements` |
| Site header (logo, nav) | `parts/header.html` |
| Site footer | `parts/footer.html` |
| Homepage layout | `templates/front-page.html` (composes patterns) |
| Homepage hero text | `patterns/hero.php` |
| Homepage feature columns | `patterns/features.php` |
| Homepage recent-posts section | `patterns/latest-posts.php` |
| Homepage call-to-action | `patterns/cta.php` |
| Blog list layout | `templates/index.html` |
| Single post layout | `templates/single.html` |
| Static page layout | `templates/page.html` |
| Archive pages | `templates/archive.html` |
| Search results page | `templates/search.html` |
| 404 page | `templates/404.html` |
| Theme name/version metadata | `style.css` header comment |

## Directory layout

```
ai-basic/
├── style.css          # Theme metadata header only (no real CSS)
├── theme.json         # ALL design tokens: colors, fonts, sizes, spacing, layout
├── functions.php      # Minimal bootstrap (theme supports + stylesheet enqueue)
├── THEME.md           # This file
├── templates/         # One HTML file per page type (block markup, no PHP)
├── parts/             # header.html and footer.html, shared by all templates
├── patterns/          # Reusable sections (PHP header comment + block markup)
└── styles/            # Optional style variations (alternate token sets)
```

## Rules of the road

1. **Never add CSS to `style.css`.** Express design in `theme.json` tokens or
   block attributes. If something truly cannot be done that way, add the CSS
   with a comment explaining why.
2. **Never add logic to `functions.php`.** No shortcodes, no hooks, no template
   logic. Patterns are auto-registered from `patterns/`; templates and parts
   are auto-discovered.
3. **Reference tokens, not raw values, in templates.** Use preset slugs
   (`var:preset|spacing|50`, `"backgroundColor":"secondary"`) so a palette swap
   in `theme.json` restyles the whole site.
4. **Templates compose patterns.** Big sections belong in `patterns/`, then get
   included with `<!-- wp:pattern {"slug":"ai-basic/NAME"} /-->`. Keep templates
   short and readable.
5. **Block markup must stay valid.** Every `<!-- wp:block -->` needs a matching
   `<!-- /wp:block -->` (self-closing `/-->` blocks excepted). The JSON in the
   opening comment must match the HTML attributes it renders (e.g.
   `"backgroundColor":"secondary"` pairs with
   `has-secondary-background-color has-background`). When unsure, copy an
   existing working block from this theme.
6. **Verify after every change.** Run the smoke test (below) or at minimum load
   the site and confirm your new content is actually in the HTML.

## Editing recipes

### Change the site's primary color
Edit `theme.json`, find `"slug": "primary"` in `settings.color.palette`, change
the `color` value (and `primary-hover` to a darker shade). Done — buttons and
links sitewide update.

### Add a section to the homepage
1. Create `patterns/my-section.php`. Copy the header-comment format from
   `patterns/cta.php` and set a unique `Slug:` like `ai-basic/my-section`.
2. Add `<!-- wp:pattern {"slug":"ai-basic/my-section"} /-->` in
   `templates/front-page.html` where you want it to appear.

### Add a menu item
Navigation content is managed in the WordPress editor (Appearance → Editor →
Navigation), not in theme files. The theme only places the nav block in
`parts/header.html`.

### Clone this theme into a new one
1. Copy this folder to `wp-content/themes/<new-slug>/`.
2. In `style.css`: change `Theme Name` and `Text Domain`.
3. Find-and-replace `ai-basic/` → `<new-slug>/` in `patterns/*.php` (the
   `Slug:` lines) and `templates/front-page.html` (the `wp:pattern` includes).
4. Swap the palette and fonts in `theme.json`.
5. (Optional) rename the `ai_basic_` function prefixes in `functions.php`.

## Testing a change

Install this repository as `wp-content/themes/ai-basic` (or upload the release zip) and activate **AI Basic**. There is no build step. The homepage hero should read “A theme built for humans and AI agents”. If a file edit does not show up, the Site Editor has a saved override — see the next section.

## What lives where (theme vs. database)

The theme owns **layout and design**. WordPress (the database) owns **content**:
posts, pages, menus, the site title, and any user edits made in the Site
Editor. Note: edits made in the Site Editor override theme files (they are
stored in the database). During development, prefer editing files; if the site
stops reflecting file changes, check Appearance → Editor for saved overrides
and clear them.

## Approved exceptions

Deviations from the contract, each explicitly approved by a user. If this
section is empty, the theme fully conforms and no rule may be broken.

| Date | What was changed | Rule broken | Approved by |
|------|------------------|-------------|-------------|
| — | (none) | — | — |

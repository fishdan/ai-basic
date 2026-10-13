# AI Basic

A small WordPress block theme. Colors, type, and spacing live in `theme.json`. Page layout lives in plain template files. There is no page builder and no build step.

If you can edit a text file, you can change the site. `THEME.md` is the contract for those edits: it says which file to open, and which kinds of changes to avoid.

The theme needs **WordPress 6.5+** and **PHP 7.4+**.

## Install it

Download the theme zip:

[ai-basic.zip](https://github.com/fishdan/ai-basic/releases/latest/download/ai-basic.zip)

In WordPress:

1. **Appearance → Themes → Add Theme → Upload Theme**
2. Choose `ai-basic.zip`
3. Install, then **Activate**

The zip’s top folder is `ai-basic/`, with `style.css` inside it. That is the layout WordPress expects.

You can also clone this repository straight into a WordPress install:

```bash
git clone https://github.com/fishdan/ai-basic.git wp-content/themes/ai-basic
```

Then activate **AI Basic** under **Appearance → Themes**.

## Change the site

Open `THEME.md` and use the file map. A few common ones:

| To change… | Edit… |
|---|---|
| Colors, fonts, spacing, content width | `theme.json` |
| Header | `parts/header.html` |
| Footer | `parts/footer.html` |
| Homepage hero text | `patterns/hero.php` |
| Homepage layout | `templates/front-page.html` |

Menus and the site title are content. Set those in WordPress under **Appearance → Editor**, not in the theme files.

Edits made in the Site Editor are stored in the database and override these files. While you are changing the theme itself, edit the files. If the site stops matching the files, clear the saved template overrides in the Site Editor.

## Publish a new zip

The downloadable zip is a GitHub release. Merging to `main` does not publish a new zip until the version changes.

1. Edit the theme.
2. Bump `Version:` in `style.css`.
3. Merge to `main`.

The release workflow builds `ai-basic.zip` and publishes it as `v` plus that version (the first one is `v0.1.0`). The “latest” download link above always points at the newest version.

## License

[GNU General Public License v2.0 or later](https://www.gnu.org/licenses/gpl-2.0.html).

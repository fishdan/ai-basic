# AI Basic

This theme takes you out of the work of restyling WordPress. You say what the site should look like. An AI agent connects to the server over SSH and edits a few text files. Reloading the site shows the change.

The agent does the file work. You review the result.

The theme needs **WordPress 6.5+** and **PHP 7.4+**. There is no build step and no page builder. Saving a theme file is the change.

## What you do

1. Install and activate **AI Basic** (see below).
2. Give your AI assistant SSH access to that machine: host, username, and a key the assistant is allowed to use. Keep the private key out of the chat.
3. The SSH user must be able to edit the theme directory. On Bitnami, including the Amazon Lightsail WordPress image, that user is usually `bitnami`.
4. Tell the agent what you want, and point it at the theme.

You can paste something like this:

```text
SSH to our WordPress server. The theme is at wp-content/themes/ai-basic
(on Bitnami: /opt/bitnami/wordpress/wp-content/themes/ai-basic).
Then ask me about thee the look and feel:
- homepage hero: …
- colors: …
- footer: …
Tell me about what you changed and give me a link. Do not restyle the site from the WordPress screen.
```

When the agent is done, open the site and see if it matches what you asked for.

## What the agent does

1. Connect with SSH.
2. Open the theme directory:
   - Most installs: `wp-content/themes/ai-basic`
   - Bitnami / Lightsail WordPress: `/opt/bitnami/wordpress/wp-content/themes/ai-basic`
3. Read `THEME.md` before editing. That file is the contract: which file controls colors, type, header, footer, and the homepage, and which kinds of edits to refuse.
4. Change look and feel only in those files. Colors, fonts, and spacing are `theme.json`. Layout and the words that belong to the theme are `templates/`, `parts/`, and `patterns/`.
5. Save the files and leave them on the server. Ask the human to reload the site.

If a file edit does not show up, the WordPress Site Editor has a saved copy in the database, and that copy wins. Remove that saved template so the files apply again. `THEME.md` explains this.

Posts, pages, and the menu are content. The agent can still change them when you ask, but the look and feel of the theme is the files above.

## Install the theme

Download the zip:

[ai-basic.zip](https://github.com/fishdan/ai-basic/releases/latest/download/ai-basic.zip)

In WordPress: **Appearance → Themes → Add Theme → Upload Theme**, choose `ai-basic.zip`, install, then **Activate**.

The zip’s top folder is `ai-basic/`, with `style.css` inside it.

To install with git, on the server:

```bash
git clone https://github.com/fishdan/ai-basic.git wp-content/themes/ai-basic
```

Use `/opt/bitnami/wordpress/wp-content/themes/ai-basic` on Bitnami. Then activate **AI Basic**.

After that, the agent’s SSH session is how the site gets its look. The same `README.md` and `THEME.md` are in the theme directory on the server.

## Publish a new zip

Merging to `main` publishes a new zip only when `Version:` in `style.css` changes. Bump that line, merge, and the release workflow attaches `ai-basic.zip` to the new version. The download link above follows the newest release.

## License

[GNU General Public License v2.0 or later](https://www.gnu.org/licenses/gpl-2.0.html).

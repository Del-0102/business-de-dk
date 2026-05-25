# Business DE-DK – Custom WordPress Theme

Custom theme for the 2nd semester exam project. Built with HTML, CSS and PHP, without using a page builder.

The project focuses on the two main pillars defined by the client:

- **Media Channel** – interviews and video content
- **Network Database** – stakeholders and network members

## Quick Start

1. Copy the folder `business-de-dk` into `wp-content/themes/`.
2. Go to **WP Admin → Appearance → Themes** and activate **Business DE-DK**.
3. Important: Go to **Settings → Permalinks → Save Changes**.  
   This activates clean URLs for the Custom Post Types.
4. Create pages with exactly these slugs/permalinks:

   - `network`
   - `interviews`
   - `events`
   - `about`
   - `gallery`
   - `join`

5. Go to **Settings → Reading → Your homepage displays → A static page** and select an empty page called **Home**.  
   Alternatively, you can keep the default setting, since `front-page.php` works in both cases.

## Managing Content in the CMS

Three new sections appear in the left WordPress admin menu:

### Stakeholders

Used for network members.

- **Title** = Name
- **Editor** = About text
- **Excerpt** = Short bio shown on the card
- **Fields:** Role, company, location, country DE/DK, languages, member since
- **Industry:** Managed through the taxonomy **Industries**

### Interviews

Used for video content.

- **Fields:** Speaker, company, duration, video URL
- **Featured image** = Video thumbnail

### Events

Used for upcoming events.

- **Fields:** Date, for example `2026-05-15`, and location
- **Category:** Managed through a taxonomy

As long as no real content has been added yet, the Network, Interviews and Events pages display example cards.

## Files

- `style.css` – Theme header and complete CSS
- `functions.php` – Theme setup, assets, Custom Post Types, meta boxes and helper functions
- `header.php` / `footer.php` – Header and footer used across the website
- `front-page.php` – Homepage
- `page-{network|interviews|events|about|gallery|join}.php` – Subpages
- `single-stakeholder.php` – Individual stakeholder profile page
- `assets/css`, `assets/js`, `assets/images`

## Language Switcher Note

The EN button is currently a UI placeholder.

For a real DE/DK/EN multilingual setup, we recommend mentioning **Polylang** in the report. Polylang is free and is not a page builder, so it is allowed for this project.

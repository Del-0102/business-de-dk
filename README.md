# Business DE-DK – Custom WordPress Theme

Eigenes Theme für das 2. Semester Examensprojekt. HTML/CSS/PHP, kein Page-Builder.
Zwei Säulen laut Kunde: **Media Channel** (Interviews) & **Network Database** (Stakeholder).

## Schnellstart
1. Ordner `business-de-dk` nach `wp-content/themes/` kopieren.
2. WP-Admin → **Design → Themes → Business DE-DK aktivieren**.
3. WICHTIG: **Einstellungen → Permalinks → Speichern** (aktiviert „schöne“ URLs für die Custom Post Types).
4. Seiten anlegen mit *exakt* diesen Slugs (Permalink):
   `network`, `interviews`, `events`, `about`, `gallery`, `join`
5. **Einstellungen → Lesen** → Startseite zeigt „Eine statische Seite“ → eine leere Seite „Home“ wählen
   (oder Standard lassen – `front-page.php` greift in beiden Fällen).

## Inhalte pflegen (CMS)
Im linken Admin-Menü erscheinen drei neue Bereiche:
- **Stakeholder** → Netzwerk-Mitglieder (Titel = Name, Editor = „About“-Text, Auszug = Kurzbio in der Card,
  Felder: Rolle, Firma, Standort, Land DE/DK, Sprachen, Mitglied seit; Branche über Taxonomie „Branchen“).
- **Interviews** → Videos (Felder: Sprecher, Firma, Dauer, Video-URL; Beitragsbild = Thumbnail).
- **Events** → Termine (Felder: Datum `2026-05-15`, Ort; Kategorie über Taxonomie).

Solange noch keine Inhalte angelegt sind, zeigen Network/Interviews/Events Beispielkarten an.

## Dateien
- `style.css` – Theme-Header + komplettes CSS
- `functions.php` – Setup, Assets, Custom Post Types, Meta-Boxen, Helfer
- `header.php` / `footer.php` – Kopf & Fuß (auf jeder Seite)
- `front-page.php` – Startseite
- `page-{network|interviews|events|about|gallery|join}.php` – Unterseiten
- `single-stakeholder.php` – Profilseite
- `assets/css`, `assets/js`, `assets/images`

## Hinweis Sprachumschalter
Der EN-Button ist aktuell ein UI-Platzhalter. Für echtes DE/DK/EN im Report
**Polylang** (kostenlos) erwähnen/empfehlen – das ist kein Page-Builder und damit erlaubt.

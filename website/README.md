# My Website

A fast, accessible, responsive personal site scaffold you can customize.

## Quick start

1) Open this folder in Cursor
- Use File > Open Folder and select `/workspace/website`.

2) Start a local server
- Terminal: `cd /workspace/website && python3 -m http.server 5173`
- Open `http://localhost:5173/` to preview.

3) Edit with AI assist
- Right-click a file (e.g., `index.html`) and choose "Ask Cursor" to request changes.
- Select code and press Cmd/Ctrl+K to prompt inline edits.
- Use the Chat panel to generate sections, cards, or forms, then apply as edits.

4) Customize
- Update text in `index.html` (hero, features, projects, contact).
- Place images in `assets/img/` and reference them.
- Adjust theme colors and spacing in `assets/css/styles.css`.
- Extend interactions in `assets/js/main.js`.

5) Commit changes
- `git init && git add . && git commit -m "Initial site"`

## Deploy

GitHub Pages
- Push to a repo, then enable Pages for the `main` branch `/`.

Netlify
- Drag and drop this folder in the Netlify dashboard, or run `netlify deploy`.

Vercel
- Run `vercel` from this folder, accept defaults.

Custom domain
- Point your domain to the hosting provider and add an A/ALIAS/CNAME record.

## Structure

```
website/
  index.html
  assets/
    css/styles.css
    js/main.js
    img/favicon.svg
```

## Accessibility and performance

- Semantic HTML, keyboard-friendly controls, and color contrast by default.
- Mobile-first responsive layout and small, framework-free footprint.

## License

MIT

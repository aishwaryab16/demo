function applyTheme(theme) {
    const html = document.documentElement;
    if (theme === "light") {
        html.setAttribute("data-theme", "light");
    } else {
        html.removeAttribute("data-theme");
    }
}

function initTheme() {
    const saved = localStorage.getItem("preferred-theme");
    if (saved) {
        applyTheme(saved);
        return saved;
    }
    const prefersLight = window.matchMedia && window.matchMedia("(prefers-color-scheme: light)").matches;
    const initial = prefersLight ? "light" : "dark";
    applyTheme(initial);
    return initial;
}

function toggleTheme() {
    const current = document.documentElement.getAttribute("data-theme") === "light" ? "light" : "dark";
    const next = current === "light" ? "dark" : "light";
    localStorage.setItem("preferred-theme", next);
    applyTheme(next);
    const icon = document.querySelector("#theme-toggle .icon");
    if (icon) icon.textContent = next === "light" ? "🌙" : "☀️";
}

function setYear() {
    const el = document.getElementById("year");
    if (el) el.textContent = String(new Date().getFullYear());
}

function initMobileNav() {
    const toggle = document.getElementById("nav-toggle");
    const menu = document.getElementById("nav-menu");
    if (!toggle || !menu) return;
    toggle.addEventListener("click", () => {
        const isOpen = menu.classList.toggle("open");
        toggle.setAttribute("aria-expanded", String(isOpen));
    });
}

document.addEventListener("DOMContentLoaded", () => {
    const initial = initTheme();
    const icon = document.querySelector("#theme-toggle .icon");
    if (icon) icon.textContent = initial === "light" ? "🌙" : "☀️";
    const themeToggle = document.getElementById("theme-toggle");
    if (themeToggle) themeToggle.addEventListener("click", toggleTheme);
    initMobileNav();
    setYear();
});

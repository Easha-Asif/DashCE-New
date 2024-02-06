var darkMode = false;

// default to system setting
if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
  darkMode = true;
}

// preference from localStorage should overwrite
if (localStorage.getItem("theme") === "dark") {
  darkMode = true;
} else if (localStorage.getItem("theme") === "light") {
  darkMode = false;
}

if (darkMode) {
  document.body.classList.toggle("dark");
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("theme-toggle").addEventListener("click", () => {
    document.body.classList.toggle("dark");
    localStorage.setItem(
      "theme",
      document.body.classList.contains("dark") ? "dark" : "light"
    );
  });
});

var saideBarDarkMode = false;

// default to system setting
if (window.matchMedia("(prefers-color-scheme: semidark)").matches) {
  saideBarDarkMode = true;
}

// preference from localStorage should overwrite
if (localStorage.getItem("theme") === "semidark") {
  saideBarDarkMode = true;
} else if (localStorage.getItem("theme") === "light") {
  saideBarDarkMode = false;
}

if (saideBarDarkMode) {
  document.body.classList.toggle("semidark");
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("semi-theme-toggle").addEventListener("click", () => {
    document.body.classList.toggle("semidark");
    localStorage.setItem(
      "theme",
      document.body.classList.contains("semidark") ? "semidark" : "light"
    );
  });
});

var navBarDarkMode = false;

// default to system setting
if (window.matchMedia("(prefers-color-scheme: navdark)").matches) {
  navBarDarkMode = true;
}

// preference from localStorage should overwrite
if (localStorage.getItem("theme") === "navdark") {
  navBarDarkMode = true;
} else if (localStorage.getItem("theme") === "light") {
  navBarDarkMode = false;
}

if (navBarDarkMode) {
  document.body.classList.toggle("navdark");
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("nav-theme-toggle").addEventListener("click", () => {
    document.body.classList.toggle("navdark");
    localStorage.setItem(
      "theme",
      document.body.classList.contains("navdark") ? "navdark" : "light"
    );
  });
});

/* Business DE-DK – Frontend-Interaktionen */
(function () {
  "use strict";

  /* 1) Mobile-Menü ein-/ausklappen */
  var toggle = document.getElementById("menuToggle");
  var nav = document.getElementById("mainNav");
  if (toggle && nav) {
    toggle.addEventListener("click", function () {
      var open = nav.classList.toggle("open");
      toggle.setAttribute("aria-expanded", open ? "true" : "false");
    });
  }

  /* 2) Sprach-Dropdown (Platzhalter – später z. B. mit Polylang verdrahten) */
  var langBtn = document.getElementById("langBtn");
  var langMenu = document.getElementById("langMenu");
  if (langBtn && langMenu) {
    langBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      var open = langMenu.classList.toggle("open");
      langBtn.setAttribute("aria-expanded", open ? "true" : "false");
    });
    document.addEventListener("click", function () {
      langMenu.classList.remove("open");
      langBtn.setAttribute("aria-expanded", "false");
    });
  }

  /* 3) Filter-Pills (Network / Interviews / Events) – clientseitiges Filtern */
  document.querySelectorAll("[data-filter-group]").forEach(function (group) {
    var pills = group.querySelectorAll(".pill");
    var targetSel = group.getAttribute("data-target");
    var items = document.querySelectorAll(targetSel + " [data-cats]");

    pills.forEach(function (pill) {
      pill.addEventListener("click", function () {
        pills.forEach(function (p) { p.classList.remove("active"); });
        pill.classList.add("active");
        var filter = pill.getAttribute("data-value");
        items.forEach(function (item) {
          var cats = item.getAttribute("data-cats") || "";
          var show = filter === "all" || cats.indexOf(filter) !== -1;
          item.style.display = show ? "" : "none";
        });
      });
    });
  });

  /* 4) Live-Suche in Listen */
  document.querySelectorAll("[data-search-target]").forEach(function (input) {
    var targetSel = input.getAttribute("data-search-target");
    var items = document.querySelectorAll(targetSel + " [data-search]");
    input.addEventListener("input", function () {
      var q = input.value.toLowerCase().trim();
      items.forEach(function (item) {
        var hay = (item.getAttribute("data-search") || "").toLowerCase();
        item.style.display = hay.indexOf(q) !== -1 ? "" : "none";
      });
    });
  });
})();

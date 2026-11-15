/* =========================================================
   BMW PRESTIGE INDONESIA
   SCRIPT.JS PHP VERSION
   ========================================================= */

const WA_NUMBER = "6281234567890";

function waLink(message) {
  return `https://wa.me/${WA_NUMBER}?text=${encodeURIComponent(message)}`;
}

/* ==========================
   MOBILE NAVIGATION
========================== */

function initNav() {
  const toggle = document.querySelector(".nav-toggle");

  const links = document.querySelector(".nav-links");

  if (!toggle || !links) return;

  toggle.addEventListener("click", () => {
    const open = links.classList.toggle("open");

    toggle.setAttribute("aria-expanded", open ? "true" : "false");
  });

  document.querySelectorAll(".has-dropdown > a").forEach((a) => {
    a.addEventListener("click", (e) => {
      if (window.innerWidth <= 680) {
        e.preventDefault();

        a.parentElement.classList.toggle("open");
      }
    });
  });
}

/* ==========================
   ACTIVE NAV LINK
========================== */

function initActiveLink() {
  const path = window.location.pathname.split("/").pop();

  document.querySelectorAll(".nav-links a[data-page]").forEach((link) => {
    if (link.dataset.page === path) {
      link.classList.add("active");
    }
  });
}

/* ==========================
   WHATSAPP BUTTON
========================== */

function initWaButtons() {
  document.querySelectorAll("[data-wa-message]").forEach((btn) => {
    btn.href = waLink(btn.dataset.waMessage);

    btn.target = "_blank";

    btn.rel = "noopener";
  });
}

/* ==========================
   GALLERY LIGHTBOX
========================== */

function initGallery() {
  const items = document.querySelectorAll(".gallery-item");

  const lightbox = document.querySelector("#lightbox");

  if (!items.length || !lightbox) return;

  const box = lightbox.querySelector(".lightbox-box");

  items.forEach((item) => {
    item.addEventListener("click", () => {
      const img = item.querySelector("img");

      box.innerHTML = `

      <img 
      src="${img.src}"
      style="max-width:100%;border-radius:12px">


      <h3>
      ${item.dataset.title}
      </h3>


      <p>
      ${item.dataset.desc || ""}
      </p>


      `;

      lightbox.classList.add("open");
    });
  });

  lightbox.addEventListener("click", (e) => {
    if (e.target === lightbox || e.target.closest(".lightbox-close")) {
      lightbox.classList.remove("open");
    }
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") {
      lightbox.classList.remove("open");
    }
  });
}

/* ==========================
   FORM VALIDATION
========================== */

function initForm(formSelector, successSelector) {
  const form = document.querySelector(formSelector);

  if (!form) return;

  const success = document.querySelector(successSelector);

  form.addEventListener("submit", function (e) {
    let valid = true;

    form.querySelectorAll("[required]").forEach((field) => {
      const value = field.value.trim();

      const wrap = field.closest(".field");

      let ok = value.length > 0;

      if (ok && field.type === "email") {
        ok = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value);
      }

      if (ok && field.type === "tel") {
        ok = /^[0-9+\s-]{8,15}$/.test(value);
      }

      if (wrap) {
        wrap.classList.toggle("error", !ok);
      }

      if (!ok) valid = false;
    });

    if (!valid) {
      e.preventDefault();

      return;
    }

    if (success) {
      success.classList.add("show");
    }
  });
}

/* ==========================
   START
========================== */

document.addEventListener("DOMContentLoaded", () => {
  initNav();

  initActiveLink();

  initWaButtons();

  initGallery();

  initForm("#jual-form", "#jual-success");

  initScrollAnimation();
});

/* ==========================
   SCROLL REVEAL ANIMATION
========================== */

function initScrollAnimation() {
  const elements = document.querySelectorAll(
    ".fade-up, .fade-left, .fade-right",
  );

  if (!("IntersectionObserver" in window)) {
    elements.forEach((el) => {
      el.classList.add("show");
    });

    return;
  }

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("show");

          observer.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.15,
    },
  );

  elements.forEach((el) => {
    observer.observe(el);
  });
}

window.addEventListener("scroll", () => {
  const header = document.querySelector(".site-header");

  if (window.scrollY > 50) {
    header.classList.add("scrolled");
  } else {
    header.classList.remove("scrolled");
  }
});

// ============================
// COUNT UP STATISTICS
// ============================

const counters = document.querySelectorAll(".counter");

const observer = new IntersectionObserver(
  (entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        const target = +counter.dataset.target;
        let count = 0;
        const speed = target / 80;

        function updateCounter() {
          if (count < target) {
            count += speed;
            counter.innerText = Math.ceil(count)
            requestAnimationFrame(updateCounter);
          } else {
            counter.innerText = target;
          }
        }
        updateCounter();
        observer.unobserve(counter);
      }
    });
  },
  {
    threshold: 0.5,
  },
);

counters.forEach((counter) => {
  observer.observe(counter);
});

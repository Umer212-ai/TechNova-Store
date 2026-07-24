/* =========================================================
   TechNova Store — Global Script
   ========================================================= */

(function () {
  "use strict";

  /* ---------- Footer year ---------- */
  const yearEl = document.getElementById("tnYear");
  if (yearEl) yearEl.textContent = new Date().getFullYear();

  /* ---------- Navbar scroll effect ---------- */
  const navbar = document.querySelector(".tn-navbar");
  const backTop = document.getElementById("tnBackTop");

  if (navbar) {
    window.addEventListener("scroll", () => {
      navbar.classList.toggle("tn-scrolled", window.scrollY > 20);
      if (backTop) backTop.classList.toggle("show", window.scrollY > 400);
    });
  }

  /* ---------- Back to top ---------- */
  if (backTop) {
    backTop.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  }

  /* ---------- Scroll reveal animations ---------- */
  const animatedEls = document.querySelectorAll("[data-tn-animate]");
  if ("IntersectionObserver" in window && animatedEls.length) {
    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry, i) => {
          if (entry.isIntersecting) {
            setTimeout(() => entry.target.classList.add("tn-in"), i * 60);
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12 }
    );
    animatedEls.forEach((el) => io.observe(el));
  }

})();
document.addEventListener("DOMContentLoaded", () => {
  const currentYearTargets = document.querySelectorAll("[data-current-year]");
  currentYearTargets.forEach((node) => {
    node.textContent = new Date().getFullYear();
  });

  const page = document.body.dataset.page;
  if (page) {
    const activeLink = document.querySelector(`[data-nav="${page}"]`);
    if (activeLink) {
      activeLink.classList.add("active");
    }
  }

  const revealItems = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window && revealItems.length > 0) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12 }
    );

    revealItems.forEach((item) => observer.observe(item));
  } else {
    revealItems.forEach((item) => item.classList.add("is-visible"));
  }

  const loginForm = document.getElementById("loginForm");
  if (loginForm) {
    loginForm.addEventListener("submit", (event) => {
      const emailInput = document.getElementById("loginEmail");
      const passwordInput = document.getElementById("loginPassword");
      const emailError = document.getElementById("loginEmailError");
      const passwordError = document.getElementById("loginPasswordError");
      const summary = document.getElementById("loginClientMessage");

      const email = emailInput.value.trim();
      const password = passwordInput.value.trim();
      const emailPattern = /^[Bb]\d{8,10}@(ogr\.)?sakarya\.edu\.tr$/;
      const passwordPattern = /^[Bb]\d{8,10}$/;

      emailError.textContent = "";
      passwordError.textContent = "";
      summary.textContent = "";
      summary.classList.add("d-none");

      let hasError = false;

      if (email === "") {
        emailError.textContent = "Kullanici adi bos birakilamaz.";
        hasError = true;
      } else if (!emailPattern.test(email)) {
        emailError.textContent = "Kullanici adi ogrenci numarasi formatinda mail olmalidir.";
        hasError = true;
      }

      if (password === "") {
        passwordError.textContent = "Sifre bos birakilamaz.";
        hasError = true;
      } else if (!passwordPattern.test(password)) {
        passwordError.textContent = "Sifre ogrenci numarasi formatinda olmalidir.";
        hasError = true;
      }

      if (hasError) {
        event.preventDefault();
        summary.textContent = "Giris formunda hatali veya eksik alanlar var.";
        summary.classList.remove("d-none");
      }
    });
  }
});

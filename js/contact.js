document.addEventListener("DOMContentLoaded", () => {
  if (typeof Vue === "undefined") {
    return;
  }

  const initialFormState = () => ({
    fullName: "Taha Arda Ba\u015f",
    studentNo: "B241210066",
    email: "taha.bas@ogr.sakarya.edu.tr",
    phone: "",
    cityName: "Ordu",
    contactDate: "",
    subject: "",
    contactType: "",
    topics: [],
    priority: 3,
    message: "",
    newsletter: false,
  });

  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  const studentNoRegex = /^[Bb]\d{8,10}$/;
  const phoneRegex = /^\d{10,11}$/;

  const validateFormData = (form) => {
    const errors = {};

    if (!form.fullName || form.fullName.length < 5) {
      errors.fullName = "Ad soyad en az 5 karakter olmalidir.";
    }

    if (!studentNoRegex.test(form.studentNo || "")) {
      errors.studentNo = "Ogrenci numarasi B ile baslayip rakamlarla devam etmelidir.";
    }

    if (!emailRegex.test(form.email || "")) {
      errors.email = "Gecerli bir e-posta adresi giriniz.";
    }

    const normalizedPhone = (form.phone || "").replace(/\D/g, "");
    if (!phoneRegex.test(normalizedPhone)) {
      errors.phone = "Telefon alanina yalnizca 10 veya 11 rakam giriniz.";
    }

    if (!form.cityName || form.cityName.length < 2) {
      errors.cityName = "Sehir bilgisi giriniz.";
    }

    if (!form.contactDate) {
      errors.contactDate = "Lutfen bir tarih seciniz.";
    }

    if (!form.subject) {
      errors.subject = "Lutfen bir konu seciniz.";
    }

    if (!form.contactType) {
      errors.contactType = "Iletisim tercihi seciniz.";
    }

    if (!Array.isArray(form.topics) || form.topics.length === 0) {
      errors.topics = "En az bir ilgi alani seciniz.";
    }

    if (!form.message || form.message.length < 15) {
      errors.message = "Mesaj en az 15 karakter olmalidir.";
    }

    return errors;
  };

  const app = Vue.createApp({
    data() {
      return {
        form: initialFormState(),
        activeValidator: "",
        nativeErrors: {},
        vueErrors: {},
        submitMessage: {
          type: "",
          text: "",
        },
      };
    },
    methods: {
      fieldError(name) {
        if (this.activeValidator === "native") {
          return this.nativeErrors[name] || "";
        }

        if (this.activeValidator === "vue") {
          return this.vueErrors[name] || "";
        }

        return "";
      },
      fieldClass(name) {
        return this.fieldError(name) ? "is-invalid" : "";
      },
      fieldsetClass(name) {
        return this.fieldError(name) ? "fieldset-invalid" : "";
      },
      submitWithVue() {
        const formElement = document.getElementById("contactForm");
        const validationMode = document.getElementById("validationMode");
        const nativeSummary = document.getElementById("nativeSummary");

        this.activeValidator = "vue";
        this.nativeErrors = {};
        this.submitMessage = { type: "", text: "" };
        if (nativeSummary) {
          nativeSummary.classList.add("d-none");
          nativeSummary.textContent = "";
        }

        const errors = validateFormData(this.form);
        this.vueErrors = errors;

        if (Object.keys(errors).length > 0) {
          this.submitMessage = {
            type: "error",
            text: "Vue dogrulamasi tamamlandi. Lutfen hatali alanlari duzeltin.",
          };
          return;
        }

        validationMode.value = "Vue.js";
        formElement.submit();
      },
      resetForm() {
        this.form = initialFormState();
        this.activeValidator = "";
        this.nativeErrors = {};
        this.vueErrors = {};
        this.submitMessage = { type: "", text: "" };
        const nativeSummary = document.getElementById("nativeSummary");
        if (nativeSummary) {
          nativeSummary.classList.add("d-none");
          nativeSummary.textContent = "";
        }
      },
    },
  }).mount("#contactApp");

  const contactForm = document.getElementById("contactForm");
  const nativeButton = document.getElementById("nativeValidateBtn");
  const validationMode = document.getElementById("validationMode");
  const nativeSummary = document.getElementById("nativeSummary");

  if (!contactForm || !nativeButton || !validationMode || !nativeSummary) {
    return;
  }

  const readFormFromDom = () => {
    const formData = new FormData(contactForm);
    return {
      fullName: String(formData.get("fullName") || "").trim(),
      studentNo: String(formData.get("studentNo") || "").trim(),
      email: String(formData.get("email") || "").trim(),
      phone: String(formData.get("phone") || "").trim(),
      cityName: String(formData.get("cityName") || "").trim(),
      contactDate: String(formData.get("contactDate") || "").trim(),
      subject: String(formData.get("subject") || "").trim(),
      contactType: String(formData.get("contactType") || "").trim(),
      topics: formData.getAll("topics[]").map((item) => String(item)),
      priority: Number(formData.get("priority") || 0),
      message: String(formData.get("message") || "").trim(),
      newsletter: formData.has("newsletter"),
    };
  };

  nativeButton.addEventListener("click", () => {
    const formSnapshot = readFormFromDom();

    app.form = { ...formSnapshot };
    app.activeValidator = "native";
    app.vueErrors = {};
    app.submitMessage = { type: "", text: "" };

    const errors = validateFormData(formSnapshot);
    app.nativeErrors = errors;

    if (Object.keys(errors).length > 0) {
      nativeSummary.textContent = "Native JavaScript dogrulamasi basarisiz oldu. Lutfen isaretlenen alanlari duzeltin.";
      nativeSummary.classList.remove("d-none");
      return;
    }

    nativeSummary.textContent = "";
    nativeSummary.classList.add("d-none");
    validationMode.value = "Native JavaScript";
    contactForm.submit();
  });

  contactForm.addEventListener("reset", () => {
    window.setTimeout(() => {
      app.resetForm();
    }, 0);
  });
});

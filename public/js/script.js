// Global constants

const txtRgx = /^[a-zA-ZáéíóúñÁÉÍÓÚÑ\s]+$/;
const emailRgx = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const passRgx =
  /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
const notEmptyRgx = /\S/;

const txtWarningMsg = "Only letters and spaces are allowed.";
const emailWarningMsg = "Email must be valid.";
const passWarningMsg = `
    Password must be at least 8 characters long and contain at least
    <br />one uppercase letter,
    <br />one lowercase letter,
    <br />one number,
    <br />and one special characters. ( @$!%*?& )`;
const notEmptyWarningMsg = "This field cannot be empty.";

const validatefield = (field, regex, message) => {
  let error = field.nextElementSibling;

  if (!regex.test(field.value)) {
    if (!error || error.tagName !== "SPAN") {
      error = document.createElement("span");
      error.innerHTML = message;
      field.insertAdjacentElement("afterend", error);
    }
    return false;
  } else {
    if (error && error.tagName === "SPAN") error.remove();
    return true;
  }
};

const validateForm = (fields, submit) => {
  let valid = true;

  fields.forEach(({ id, regex, message }) => {
    const field = document.getElementById(id);
    if (field.value.trim() !== "")
      valid = validatefield(field, regex, message) && valid;
  });

  submit.disabled = !valid;
};

const togglePassword = (button, field) => {
  const type = field.getAttribute("type") === "password" ? "text" : "password";
  field.setAttribute("type", type);
  button.textContent = type === "password" ? "Show password" : "Hide password";
};

// Client-side form validation (Sign up form)
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("signup_form");
  if (!form) return;

  const submit = form.querySelector("button[type='submit']");
  const fields = [
    { id: "first_name", regex: txtRgx, message: txtWarningMsg },
    { id: "last_name", regex: txtRgx, message: txtWarningMsg },
    { id: "email", regex: emailRgx, message: emailWarningMsg },
    { id: "password", regex: passRgx, message: passWarningMsg },
  ];

  fields.forEach(({ id }) => {
    const field = document.getElementById(id);
    if (field)
      field.addEventListener("input", () => validateForm(fields, submit));
  });

  const passwordToggle = document.getElementById("password_toggle");
  if (passwordToggle)
    passwordToggle.addEventListener("click", () =>
      togglePassword(passwordToggle, form.password)
    );
});

// Client-side form validation (Sign in form)
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("signin_form");
  if (!form) return;

  const submit = form.querySelector("button[type='submit']");
  const fields = [
    { id: "email", regex: notEmptyRgx, message: notEmptyWarningMsg },
    { id: "password", regex: notEmptyRgx, message: notEmptyWarningMsg },
  ];

  fields.forEach(({ id }) => {
    const field = document.getElementById(id);
    if (field)
      field.addEventListener("input", () => validateForm(fields, submit));
  });

  const passwordToggle = document.getElementById("password_toggle");
  passwordToggle.addEventListener("click", () =>
    togglePassword(passwordToggle, form.password)
  );
});

// Client-side form validation (Profile form)
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("profile_form");
  if (!form) return;

  const submit = form.querySelector("button[type='submit']");
  const fields = [
    { id: "first_name", regex: txtRgx, message: txtWarningMsg },
    { id: "last_name", regex: txtRgx, message: txtWarningMsg },
    { id: "email", regex: emailRgx, message: emailWarningMsg },
  ];

  fields.forEach(({ id }) => {
    const field = document.getElementById(id);
    if (field)
      field.addEventListener("input", () => validateForm(fields, submit));
  });
});

// Client-side form validation (Change password form)
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("change_password_form");
  if (!form) return;

  const submit = form.querySelector("button[type='submit']");
  const fields = [
    { id: "password", regex: notEmptyRgx, message: notEmptyWarningMsg },
    { id: "password_new", regex: passRgx, message: passWarningMsg },
  ];

  fields.forEach(({ id }) => {
    const field = document.getElementById(id);
    if (field)
      field.addEventListener("input", () => validateForm(fields, submit));
  });

  const password = document.getElementById("password");
  const passwordNew = document.getElementById("password_new");
  const passwordToggle = document.getElementById("password_toggle");
  passwordToggle.addEventListener("click", () => {
    const type =
      password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    passwordNew.setAttribute("type", type);
    passwordToggle.textContent =
      type === "password" ? "Show password" : "Hide password";
  });
});

// Client-side form validation (Create user form)
document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("create_user_form");
  if (!form) return;

  const submit = form.querySelector("button[type='submit']");
  const fields = [
    { id: "first_name", regex: txtRgx, message: txtWarningMsg },
    { id: "last_name", regex: txtRgx, message: txtWarningMsg },
    { id: "email", regex: emailRgx, message: emailWarningMsg },
    { id: "password", regex: passRgx, message: passWarningMsg },
  ];

  fields.forEach(({ id }) => {
    const field = document.getElementById(id);
    if (field)
      field.addEventListener("input", () => validateForm(fields, submit));
  });

  const passwordToggle = document.getElementById("password_toggle");
  passwordToggle.addEventListener("click", () =>
    togglePassword(passwordToggle, form.password)
  );
});

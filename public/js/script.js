document.addEventListener("DOMContentLoaded", function () {
  const forms = document.querySelectorAll("form");

  forms.forEach((form) => {
    const inputs = form.querySelectorAll("input");
    const submitButton = form.querySelector('button[type="submit"]');
    const togglePassword = form.querySelector("#password_toggle");

    inputs.forEach((input) => {
      if (input.type === "password") {
        input.setAttribute("data-type", "password");
      }

      input.addEventListener("input", function () {
        validateInput(input);
        checkFormValidity(form, submitButton);
      });
    });

    if (togglePassword) {
      togglePassword.addEventListener("click", function () {
        const togglePasswordIcon = this.querySelector("i");
        togglePasswordIcon.classList.toggle("fa-eye");
        togglePasswordIcon.classList.toggle("fa-eye-slash");

        togglePasswordVisibility(form);
      });
    }
  });

  /**
   * Validates the input based on its type and sets an error message if invalid.
   *
   * This function checks the input value against a regex pattern determined by the input type.
   * If the pattern doesn't match, an error message is displayed using showError; otherwise, any
   * existing error is cleared using clearError.
   *
   * @param {HTMLElement} input - The input element to be validated.
   *   Expected types:
   *     - "text": Only letters and spaces are allowed.
   *     - "email": Must be in a valid email format.
   *     - "password": Must be at least 8 characters long, include uppercase, lowercase, number, and special character.
   */
  function validateInput(input) {
    let pattern;
    let errorMessage = "";

    const inputType = input.getAttribute("data-type") || input.type;

    if (inputType === "text") {
      pattern = /^[a-zA-ZáéíóúñÁÉÍÓÚÑ\s]+$/;
      errorMessage = "Only letters and spaces are allowed.";
    } else if (inputType === "email") {
      pattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
      errorMessage = "Invalid email format.";
    } else if (inputType === "password") {
      pattern =
        /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      errorMessage = `
      Password must be at least 8 characters long and include<br />
      one uppercase letter,<br />
      one lowercase letter,<br />
      one number,<br />
      and one special character.
    `;
    } else if (inputType === "number") {
      pattern = /^[+]?\d+([.]\d+)?$/;
      errorMessage = "Only positive numbers are allowed.";
    }

    if (pattern && !pattern.test(input.value)) {
      showError(input, errorMessage);
    } else {
      clearError(input);
    }
  }

  /**
   * Shows an error message related to the input element.
   *
   * @param {HTMLElement} input - The input element to be validated.
   * @param {string} message - The error message to be displayed.
   */
  function showError(input, message) {
    let errorElement;
    const parentDiv =
      input.closest("#password_container") || input.closest("#name_container");

    if (parentDiv) {
      errorElement = parentDiv.nextElementSibling;
      if (!errorElement || !errorElement.classList.contains("error-message")) {
        errorElement = document.createElement("div");
        errorElement.classList.add("error-message");
        parentDiv.parentNode.insertBefore(errorElement, parentDiv.nextSibling);
      }
    } else {
      errorElement = input.nextElementSibling;
      if (!errorElement || !errorElement.classList.contains("error-message")) {
        errorElement = document.createElement("div");
        errorElement.classList.add("error-message");
        input.parentNode.insertBefore(errorElement, input.nextSibling);
      }
    }
    errorElement.innerHTML = `<p>${message}</p>`;
  }

  /**
   * Clears any existing error message for the given input element.
   *
   * This function looks for the next element sibling of the input element and checks if it is an error message.
   * If it is, the error message element is removed.
   *
   * @param {HTMLElement} input - The input element to clear the error message for.
   */
  function clearError(input) {
    let errorElement;
    const parentDiv =
      input.closest("#password_container") || input.closest("#name_container");

    if (parentDiv) {
      errorElement = parentDiv.nextElementSibling;
      if (errorElement && errorElement.classList.contains("error-message")) {
        errorElement.remove();
      }
    } else {
      errorElement = input.nextElementSibling;
      if (errorElement && errorElement.classList.contains("error-message")) {
        errorElement.remove();
      }
    }
  }

  /**
   * Checks if all inputs in the given form are valid and enables/disables the given submit button accordingly.
   *
   * This function iterates over all input elements in the given form and checks if each input has an error message.
   * If any input has an error message, the submit button is disabled; otherwise, it is enabled.
   *
   * @param {HTMLFormElement} form - The form containing the input elements to check.
   * @param {HTMLButtonElement} submitButton - The submit button to enable or disable based on the form's validity.
   */
  function checkFormValidity(form, submitButton) {
    const inputs = form.querySelectorAll("input");
    let allValid = true;

    inputs.forEach((input) => {
      if (
        input.nextElementSibling &&
        input.nextElementSibling.classList.contains("error-message")
      ) {
        allValid = false;
      }
    });

    submitButton.disabled = !allValid;
  }

  /**
   * Toggles the visibility of all password inputs in the given form.
   *
   * This function selects all input elements with the custom attribute "data-type" equal to "password"
   * and toggles their type attribute between "password" and "text", effectively showing or hiding the
   * password characters.
   *
   * @param {HTMLFormElement} form - The form containing the password inputs to toggle.
   */
  function togglePasswordVisibility(form) {
    const passwordInputs = form.querySelectorAll('input[data-type="password"]');
    passwordInputs.forEach((input) => {
      input.type = input.type === "password" ? "text" : "password";
    });
  }
});

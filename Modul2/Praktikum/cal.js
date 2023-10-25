document.addEventListener("DOMContentLoaded", function () {
  const display = document.querySelector('input[name="display"]');
  const buttons = document.querySelectorAll('input[type="button"]');

  let currentInput = "";

  const calculate = () => {
    try {
      currentInput = eval(currentInput);
    } catch (error) {
      currentInput = "Error";
    }
    display.value = currentInput;
  };

  buttons.forEach((button) => {
    button.addEventListener("click", function () {
      const value = button.value;

      if (value === "AC") {
        currentInput = "";
      } else if (value === "DE") {
        currentInput = currentInput.slice(0, -1);
      } else if (value === "%") {
        currentInput += "%";
      } else if (value === "=") {
        try {
          currentInput = eval(currentInput);
        } catch (error) {
          currentInput = "Error"; // Handle errors
        }
      } else if (/^[0-9*+\-/\.]*$/.test(value)) {
        currentInput += value;
      }

      display.value = currentInput;
    });
  });

  display.addEventListener("input", function () {
    const inputValue = display.value;
    const numericValue = inputValue.replace(/[^0-9*+\-/\.]/g, "");
    display.value = numericValue;
    currentInput = numericValue;
  });

  display.addEventListener("keydown", function (event) {
    if (event.key == "Enter") {
      calculate();
      event.preventDefault();
    }
  });
});

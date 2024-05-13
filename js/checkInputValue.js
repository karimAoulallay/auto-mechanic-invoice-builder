const inputs = document.querySelectorAll(".form-control");

inputs.forEach((input) => {
  input.addEventListener("input", (_) => {
    if (input.value === "") {
      input.classList.remove("not-empty");
      input.classList.add("empty");
    } else {
      input.classList.remove("empty");
      input.classList.add("not-empty");
    }
  });
});

const pieceInputsWrapper = document.querySelector("#pieceInputsWrapper");

pieceInputsWrapper.addEventListener("click", (event) => {
  if (event.target.id == "removePieceButton") {
    // remove the piece input element
    const elementToRemove = event.target.closest(".row");
    elementToRemove.remove();
  }
});

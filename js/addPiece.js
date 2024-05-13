const addPieceButton = document.querySelector("#addPieceButton");
const listInputs = document.querySelector("#pieceInputsWrapper");
let counter = 0;

addPieceButton.addEventListener("click", () => {
  const pieceDetails = document.createElement("div");
  pieceDetails.dataset.counter = counter;
  let currentCounter = ++counter;
  pieceDetails.className = "row g-2 mb-3";
  pieceDetails.innerHTML = `
  <div class="col-12 col-md-5">
      <label for="productName" class="form-label">Désignation</label>
      <input type="text" class="form-control" name="products[${currentCounter}][name]" id="productName" aria-describedby="product name Help" placeholder="Entrez le nom du produit">
  </div>
  <div class="col-5 col-md-3">
      <label for="price" class="form-label">Prix unitaire</label>
      <input type="number" class="form-control" name="products[${currentCounter}][price]" id="price" aria-describedby="price Help" value="1">
  </div>
  <div class="col-5 col-md-3">
      <label for="qnt" class="form-label">Quantité</label>
      <input type="number" class="form-control" name="products[${currentCounter}][quantity]" id="qnt" aria-describedby="quantite Help" value="1">
  </div>
  <div class="col-2 col-md-1 d-flex align-items-end">
    <button class="btn btn-danger w-100" type="button" id="removePieceButton">
        <img src="assets/trash.svg" class="pe-none" alt="delete icon">
    </button>
</div>
  `;

  listInputs.appendChild(pieceDetails);
});

export default function PieceInputs(props) {
  return `
  <div class="col">
        <div>
            <label for="productName" class="form-label">Désignation</label>
            <input type="text" class="form-control border-dark-subtle" id="productName" aria-describedby="product name Help" placeholder="Entrez le nom du produit">
        </div>
    </div>
    <div class="col-3">
        <div>
            <label for="price" class="form-label">Prix unitaire</label>
            <input type="number" class="form-control border-dark-subtle" id="price" aria-describedby="price Help" value="1">
        </div>
    </div>
    <div class="col-3">
        <div>
            <label for="qnt" class="form-label">Quantité</label>
            <input type="number" class="form-control border-dark-subtle" id="qnt" aria-describedby="quantite Help" value="1">
        </div>
    </div>
`;
}

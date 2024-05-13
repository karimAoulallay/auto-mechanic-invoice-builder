<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facture</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="./assets/favicon.svg" type="image/x-icon">
    <!-- bootstrap -->
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <script src="./bootstrap/js/bootstrap.bundle.min.js" defer></script>
    <!-- css files -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- javascript files -->
    <script src="./js/checkInputValue.js" defer></script>
    <script src="./js/addPiece.js" defer></script>
    <script src="./js/removePiece.js" defer></script>
</head>

<body class="bg-light">
    <div class="container px-0">
        <div class="bg-white p-3 my-5 border border-dark-subtle rounded">
            <form action="createpdf.php" method="post">
                <!-- client data -->
                <h1 class="section-title">Les données de la destinataire</h1>
                <div class="row py-4">
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="mat" class="form-label">Matricule</label>
                        <input type="text" name="serialNumber" id="mat" class="form-control" placeholder="Entrez la matricule" required>
                    </div>
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="clientIce" class="form-label">ICE</label>
                        <input type="text" id="clientIce" name="clientIce" class="form-control" placeholder="Entrez le ICE">
                    </div>
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="client" class="form-label">Client</label>
                        <input type="text" id="client" name="clientName" class="form-control" placeholder="Entrez le client">
                    </div>
                </div>
                <!-- invoice data -->
                <h1 class="section-title">Les données de la facture</h1>
                <div class="row py-4">
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="num" class="form-label">Numéro de la facture</label>
                        <input type="text" id="num" class="form-control" name="invoiceNumber" placeholder="Entrez le numéro de la facture">
                    </div>
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="date" class="form-label">Date de la facturation</label>
                        <input type="text" id="date" name="invoiceDate" class="form-control" placeholder="Entrez le numéro de la facturation">
                    </div>
                </div>
                <!-- Company data -->
                <h1 class="section-title">Les données de la destinateur</h1>
                <div class="row py-4">
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="entreprise" class="form-label">Le nom de l'entreprise</label>
                        <input type="text" id="entreprise" name="enterpriseName" class="form-control" placeholder="Entrez le nom de l'entreprise">
                    </div>
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="adresse" class="form-label">Addresse</label>
                        <input type="text" id="adresse" name="enterpriseAddress" class="form-control" placeholder="Entrez l'adresse">
                    </div>
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="tel" class="form-label">Télephone</label>
                        <input type="text" id="tel" name="enterpriseTel" class="form-control" placeholder="Entrez le télephone">
                    </div>
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="rc" class="form-label">Registre de Commerce (RC)</label>
                        <input type="text" id="rc" name="enterpriseRc" class="form-control" placeholder="Entrez le registre de commerce">
                    </div>
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="if" class="form-label">Identifiant fiscal (IF)</label>
                        <input type="text" id="if" name="enterpriseIf" class="form-control" placeholder="Entrez l'identifiant fiscal">
                    </div>
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="cnss" class="form-label">CNSS</label>
                        <input type="text" id="cnss" name="enterpriseCnss" class="form-control" placeholder="Entrez la CNSS">
                    </div>
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="ice" class="form-label">Identifiant commun de l'entreprise (ICE)</label>
                        <input type="text" id="ice" name="enterpriseIce" class="form-control" placeholder="Entrez l'identifiant commun de l'entreprise">
                    </div>
                    <div class="mb-4 col-12 col-sm-6 col-md-4">
                        <label for="tp" class="form-label">Taxe professionnelle (TP)</label>
                        <input type="text" id="tp" name="enterpriseTp" class="form-control" placeholder="Entrez le taxe professionnelle">
                    </div>
                </div>
                <!-- invoice data -->
                <div id="pieceInputsWrapper">
                    <h1 class="section-title">La liste des produits</h1>
                    <div class="form-check form-switch my-3">
                        <input class="form-check-input" name="tva" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Avec la TVA?</label>
                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col-12 col-md-6">
                            <label for="productName" class="form-label">Désignation</label>
                            <input type="text" class="form-control" name="products[0][name]" id="productName" aria-describedby="product name Help" placeholder="Entrez le nom du produit">
                        </div>
                        <div class="col-6 col-md-3">
                            <label for="price" class="form-label">Prix unitaire</label>
                            <input type="number" class="form-control" name="products[0][price]" id="price" aria-describedby="price Help" value="1">
                        </div>
                        <div class="col-6 col-md-3">
                            <label for="qnt" class="form-label">Quantité</label>
                            <input type="number" class="form-control" name="products[0][quantity]" id="qnt" aria-describedby="quantite Help" value="1">
                        </div>
                    </div>
                </div>
                <div>
                    <button type="button" id="addPieceButton" class="btn btn-primary">Ajouter une piéce</button>
                </div>
                <hr class="border-3 border-black">
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Voir votre pdf</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
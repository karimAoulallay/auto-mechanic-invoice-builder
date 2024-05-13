<?php

require_once __DIR__ . '/vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

//----------------------- options
$options = new Options();
$options->setDefaultFont("Helvetica");
$options->setIsRemoteEnabled(true);
// enable loading local files
$options->setChroot(__DIR__);

// instantiate and use the dompdf class
$dompdf = new Dompdf($options);


// form values
$products = $_POST['products'];
$serialNumber = $_POST['serialNumber'];
$clientIce = $_POST['clientIce'];
$clientName = $_POST['clientName'];
$invoiceNumber = $_POST['invoiceNumber'];
$enterpriseName = $_POST['enterpriseName'];
$enterpriseAddress = $_POST['enterpriseAddress'];
$enterpriseRc = $_POST['enterpriseRc'];
$enterpriseIf = $_POST['enterpriseIf'];
$enterpriseCnss = $_POST['enterpriseCnss'];
$enterpriseIce = $_POST['enterpriseIce'];
$enterpriseTp = $_POST['enterpriseTp'];
$invoiceDate = $_POST['invoiceDate'];
$enterpriseTel = $_POST['enterpriseTel'];
$quantities = "";
$prices = "";
$names = "";
$sums = "";
$total = 0;


// loop through products array

foreach ($products as $value) {
    $name = $value['name'];
    $quantity = $value['quantity'];
    $price = $value['price'];
    $sum = $price * $quantity;

    $total += $sum;

    $names .= "<p>- " . $name  . "</p>";
    $quantities .= "<p>- " . $quantity  . "</p>";
    $prices .= "<p>- " . $price  . "</p>";
    $sums .= "<p>- " . $sum  . "</p>";
}

// get HTML content
$html = file_get_contents("template.html");

$html = str_replace('{{serialNumber}}', $serialNumber, $html);
$html = str_replace('{{clientIce}}', $clientIce, $html);
$html = str_replace('{{clientName}}', $clientName, $html);
$html = str_replace('{{invoiceNumber}}', $invoiceNumber, $html);
$html = str_replace('{{enterpriseName}}', $enterpriseName, $html);
$html = str_replace('{{enterpriseAddress}}', $enterpriseAddress, $html);
$html = str_replace('{{enterpriseRc}}', $enterpriseRc, $html);
$html = str_replace('{{enterpriseIf}}', $enterpriseIf, $html);
$html = str_replace('{{enterpriseCnss}}', $enterpriseCnss, $html);
$html = str_replace('{{enterpriseIce}}', $enterpriseIce, $html);
$html = str_replace('{{enterpriseTp}}', $enterpriseTp, $html);
$html = str_replace('{{invoiceDate}}', $invoiceDate, $html);
$html = str_replace('{{enterpriseTel}}', $enterpriseTel, $html);
$html = str_replace('{{names}}', $names, $html);
$html = str_replace('{{quantities}}', $quantities, $html);
$html = str_replace('{{prices}}', $prices, $html);
$html = str_replace('{{sums}}', $sums, $html);
$html = str_replace('{{total}}', $total, $html);

// check if tva is included
$tva = $_POST['tva'];
if ($tva == true) {
    $tvaAmount = $total * 0.2;
    $ttc = $total + $tvaAmount;

    $html = str_replace('{{tva}}', $tvaAmount, $html);
    $html = str_replace('{{total-ttc}}', $ttc, $html);
} else {
    $html = str_replace('{{tva}}', "", $html);
    $html = str_replace('{{total-ttc}}', "", $html);
}



// load HTML content
$dompdf->loadHtml($html);

// render HTML as PDF
$dompdf->render();


ob_end_clean();

// Output the generated PDF to Browser
$dompdf->stream($invoiceNumber, array("Attachment" => 0));

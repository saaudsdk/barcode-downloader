<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('vendor/autoload.php');
use Laminas\Barcode\Barcode;

// Only the text to draw is required.
$barcodeOptions = ['text' => $_GET['barcode_number']];

// No required options.
$rendererOptions = ['imageType' => 'png'];

// Draw the barcode, capturing the resource:
Barcode::factory(
    $_GET['type'],
    'image',
    $barcodeOptions,
    $rendererOptions
)->render();

//
//// Function to generate and return the Base64-encoded barcode image
//function generateBarcode($barcode, $type)
//{
//    $barcodeOptions = ['text' => $barcode];
//    $rendererOptions = [];
//
//    // Render the barcode
//    try {
//        // Capture the rendered barcode image data
//        ob_start();
//        Barcode::render($type, 'image', $barcodeOptions, $rendererOptions);
//        $barcodeImageData = ob_get_clean();
//
//        return $barcodeImageData;
//    } catch (Exception $e) {
//        // Handle the exception (e.g., log it, return an error image, etc.)
//        echo "Error: " . $e->getMessage();
//        return null;
//    }
//}
//
//// Main logic
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    // Check if barcode_number and type are set in the POST request
//    if (isset($_POST['barcode_number']) && isset($_POST['type'])) {
//        // Get the barcode number and type from the POST request
//        $barcode = $_POST['barcode_number'];
//        $type = $_POST['type'];
//        header('Content-Type: image/png');
//        // Generate the barcode image
//        $barcodeImageData = generateBarcode($barcode, $type);
//
//        // Output the image data directly in the response
//        if ($barcodeImageData) {
//            header('Content-Type: image/png'); // Adjust the content type based on your barcode format
//            echo $barcodeImageData;
//            exit;
//        }
//    } else {
//        // Handle the case when barcode_number or type is not set in the POST request
//        echo "Error: Barcode number or type not provided.";
//        exit;
//    }
//}
//
//// Handle the case when the request method is not POST
//echo "Error: Invalid request method.";
?>

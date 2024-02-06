<?php
$url = 'https://barcode.local/barcode.php?barcode_number=45454545&type=ean13';
if (extension_loaded('gd') && function_exists('gd_info')) {
    echo "GD extension is available";
    $image = imagecreatefromjpeg($url);

// Specify the path with a PNG extension for saving
    $pathToSave = "tmp/image.png";

// Save the image as PNG
    imagepng($image, $pathToSave);

// Clean up resources
    imagedestroy($image);

} else {
    echo "GD extension is not available";
    exit;
}

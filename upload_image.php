<?php
//extension=gd must be uncommented in php.ini file

// Function to optimize and save image
function optimizeImage($sourceImagePath, $outputImagePath, $quality = 75) {
    // Get the original image dimensions
    list($width, $height) = getimagesize($sourceImagePath);
     
     $width = 159; $height=148;
    // Create a new image from the source
    $sourceImage = imagecreatefrompng($sourceImagePath);
    
    // Create a new true color image with desired dimensions
    $newImage = imagecreatetruecolor($width, $height);
    
    // Copy and resize part of the source image to the new image
    imagecopyresampled($newImage, $sourceImage, 0, 0, 0, 0, $width, $height, $width, $height);
    
    // Save the optimized image
    imagepng($newImage, $outputImagePath, $quality);
    
    // Free up memory
    imagedestroy($sourceImage);
    imagedestroy($newImage);
}


// Example usage
$sourceImagePath = "images/shirt2.png";     //'input.jpg';
$outputImagePath = "images/shirt2.png";    //'output.jpg';
$quality = 75; // You can adjust this value according to your needs (0 - 100)

optimizeImage($sourceImagePath, $outputImagePath, $quality);

//159x148

//echo "<pre>";print_r($_FILES);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Opbtimized</title>
</head>
<body>
    <form action="upload_image.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" value="">
        <input type="submit" name="upload" value="ImageObtimized">
    </form>
</body>
</html>
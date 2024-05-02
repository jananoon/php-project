<?php
session_start();

include 'dbconnection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the uploaded data
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $file = $_FILES['image'];

    // Assign the image to a variable
    $image_name = basename($file["name"]);
    $image_tmp_name = $file["tmp_name"];
    $image_size = $file["size"];
    $image_error = $file["error"];

    // Validate the image upload
    if ($image_error !== UPLOAD_ERR_OK) {
        die("Image upload failed");
    }

    // Check if the uploaded file is an image
    $image_info = getimagesize($image_tmp_name);
    if ($image_info === false) {
        die("Not a valid image file");
    }

    // Create the SQL query
    $sql = "INSERT INTO Items (Item_id, Item_Name, Price, Description, image) VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(1, $item_id);
    $stmt->bindParam(2, $item_name);
    $stmt->bindParam(3, $price);
    $stmt->bindParam(4, $description);

    // Bind the image data
    $stmt->bindParam(5, $image_data, PDO::PARAM_LOB);

    // Read the binary data of the image file
    $fp = fopen($image_tmp_name, "rb");
    $image_data = fread($fp, $image_size);
    fclose($fp);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Item uploaded successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the prepared statement cursor
    $stmt->closeCursor();
}
header("location:viewone.php");

// Close the connection
$conn = null;
?>
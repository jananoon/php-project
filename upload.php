<?php
session_start();

include 'dbconnection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if an image file was uploaded
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        $image_tmp_name = $_FILES['image']['tmp_name'];

        // Read the binary data of the image file
        $image_data = file_get_contents($image_tmp_name);

        // Create the SQL query
        $sql = "INSERT INTO Items (Item_id, Item_Name, Price, Description, image) VALUES (?, ?, ?, ?, ?)";

        // Prepare the statement
        $stmt = $conn->prepare($sql);

        // Get other form data
        $item_id = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        // Bind the parameters
        $stmt->bindParam(1, $item_id);
        $stmt->bindParam(2, $item_name);
        $stmt->bindParam(3, $price);
        $stmt->bindParam(4, $description);
        $stmt->bindParam(5, $image_data, PDO::PARAM_LOB);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Item uploaded successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the prepared statement cursor
        $stmt->closeCursor();
    } else {
        echo "Please select an image file to upload.";
    }
}

// Redirect to viewone.php
header("location:viewone.php");

// Close the connection
$conn = null;
?>

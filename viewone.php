<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Item</title>
    <style>
        body {
            background-color: #0e2742; /* Dark blue background color */
            color: #fff; /* Text color */
            font-family: Arial, sans-serif; /* Choose a suitable font */
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #FFFFFF;
            text-align: left;
        }
        th {
            background-color: #FFFFFF;
            color: #0F2133;
            border-radius: 5px 5px 0px 0px;
        }
        tr:nth-child(even) {
            background-color: #F5F5F5;
        }
        td img {
            max-width: 120px;
            height: auto;
            vertical-align: middle; /* Align the image vertically in the middle */
        }
    </style>
</head>
<body>
    <h1>View Item</h1>
    <?php
    // Assuming you have the necessary database connection already included
    include 'dbconnection.php';

    // Fetch uploaded items from the database
    $sql = "SELECT * FROM Items";
    $result = $conn->query($sql);

    // Check if there are any items
    if ($result->rowCount() > 0) {
        // Start table
        echo "<table>";
        echo "<tr><th>Item Name</th><th>Price</th><th>Description</th><th>Image</th></tr>";
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['Item_Name'] . "</td>";
            echo "<td>$" . $row['Price'] . "</td>";
            echo "<td>" . $row['Description'] . "</td>";
            // Check if 'image' key exists before accessing it
            if (!empty($row['image'])) {
                echo '<td><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" alt="Uploaded Image"></td>';
            } else {
                echo "<td>No image available</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No items uploaded yet.";
    }
    ?>
</body>
</html>
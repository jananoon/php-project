<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Upload</title>
    <style>
        body {
            background-color: #0F2133;
            color: #FFFFFF;
            font-family: Arial, sans-serif;
            animation: slide-in 1s ease-out forwards;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;    
        }
        .container {
            width: 500px;
            padding: 20px;
            border: 1px solid #FFFFFF;
            border-radius: 5px;
            box-shadow: 0px 0px 10px 1px #FFFFFF;
            animation: slide-in 1s ease-out forwards;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], textarea {
            width: 100%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #FFFFFF;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #FFFFFF;
            color: #0F2133;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #F5F5F5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
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

        /* Form animation */
        @keyframes slide-in {
            0% {
                transform: translateY(-50px);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>

    <div class ="container">
    <h1>Upload Item</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="item_id">Item ID:</label>
        <input type="text" id="item_id" name="item_id" required><br>

        <label for="item_name">Item Name:</label>
        <input type="text" id="item_name" name="item_name" required><br>

        <label for="price">Price:</label>
        <input type="number" step="0.01" id="price" name="price" required><br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea><br>

        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" value =""><br><br>

        <input type="submit" value="Upload Item" name="uploaditem">
   
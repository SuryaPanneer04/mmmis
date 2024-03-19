<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// Connect to your database
// Example:
 $connection = mysqli_connect("localhost", "root", "", "test");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are set
    if (isset($_POST['pno']) && isset($_POST['pname']) && isset($_POST['age']) && isset($_POST['gender']) && isset($_POST['paddress'])) {
        // Sanitize user input to prevent SQL injection
        $id = mysqli_real_escape_string($connection, $_POST['pno']);
        $pname = mysqli_real_escape_string($connection, $_POST['pname']);
        $age = mysqli_real_escape_string($connection, $_POST['age']);
        $gender = mysqli_real_escape_string($connection, $_POST['gender']);
        $paddress = mysqli_real_escape_string($connection, $_POST['paddress']);
        
        // Update the record in the database
        $query = "UPDATE employee SET pname = '$pname', age = '$age', gender = '$gender', paddress = '$paddress' WHERE pno = $pno";
        $result = mysqli_query($connection, $query);
        
        if ($result) {
            echo "Record updated successfully.";
        } else {
            echo "Error updating record: " . mysqli_error($connection);
        }
    } else {
        echo "All fields are required.";
    }
} else {
    echo "Invalid request.";
}
?>


</body>
</html>
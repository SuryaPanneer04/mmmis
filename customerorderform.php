<?php
$servername = "localhost"; // Change if needed
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "test"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$pno = $_POST['pno'];
$customername = $_POST['customername'];
$companyname= $_POST['companyname'];
$mobileno = $_POST['mobileno'];
$paddress = $_POST['paddress'];
$orderdate = $_POST['orderdate'];
$product= $_POST['product'];
$quantity= $_POST['quantity'];


$sql = "INSERT INTO customerorder (pno,customername,companyname,mobileno,paddress,orderdate,product,quantity,imported) VALUES ('$pno','$customername','$companyname','$mobileno','$paddress','$orderdate','$product','$quantity','$imported')";
    if ($conn->query($sql) === TRUE) {
        // echo "User Saved <a href='./product.php'>View Here</a>";
        echo '<script type="text/javascript">'; 
		echo 'alert("Order successfully!");'; 
		echo 'window.location.href = "product.php";';
		echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>

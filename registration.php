<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sbi";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $address = isset($_POST["address"]) ? $_POST["address"] : "";
    $contact = isset($_POST["contact"]) ? $_POST["contact"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $aadharcard = isset($_POST["aadharcard"]) ? $_POST["aadharcard"] : "";
    $pancard = isset($_POST["pancard"]) ? $_POST["pancard"] : "";

    // Save the data to the database or perform other operations
    // ...

    echo "Registration successful!";
} else {
    echo "Form not submitted.";
}


$sql = "INSERT INTO users (name, address, email, password, aadhar_card, pancard, gender)
        VALUES ('$name', '$address', '$email', '$password', '$aadharCard', '$panCard', '$gender')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

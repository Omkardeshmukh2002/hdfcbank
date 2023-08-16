<?php
$servername = "localhost";
$username = "your_username";
$password = "";
$dbname = "loan_application";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $loan_amount = $_POST["loan_amount"];
    $loan_purpose = $_POST["loan_purpose"];
    $employment_status = $_POST["employment_status"];

    $sql = "INSERT INTO applications (full_name, email, loan_amount, loan_purpose, employment_status)
            VALUES ('$full_name', '$email', '$loan_amount', '$loan_purpose', '$employment_status')";

    if ($conn->query($sql) === TRUE) {
        echo "Loan application submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

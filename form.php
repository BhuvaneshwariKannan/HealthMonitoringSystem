<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Get the form data
    $fullname = $_POST["fullname"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $bloodgroup = $_POST["bloodgroup"];
    $allergies = $_POST["allergies"];
    $medications = $_POST["medications"];
    $past_medical_history = $_POST["past_medical_history"];
    $family_medical_history = $_POST["family_medical_history"];
    $primary_care_physician = $_POST["primary_care_physician"];
    $emergency_contact_name = $_POST["emergency_contact_name"];
    $emergency_contact_relationship = $_POST["emergency_contact_relationship"];
    $emergency_contact_phone = $_POST["emergency_contact_phone"];
    
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "healthcare";
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO patient_info (fullname, dob, gender, height, weight, bloodgroup, allergies, medications, past_medical_history, family_medical_history, primary_care_physician, emergency_contact_name, emergency_contact_relationship, emergency_contact_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiissssssssi", $fullname, $dob, $gender, $height, $weight, $bloodgroup, $allergies, $medications, $past_medical_history, $family_medical_history, $primary_care_physician, $emergency_contact_name, $emergency_contact_relationship, $emergency_contact_phone);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Record added successfully";
    } else {
        echo "Error adding record: " . $conn->error;
    }
    
    // Close the connection
    $stmt->close();
    $conn->close();
}
?>

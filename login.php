<?php
// Start session
session_start();

// Connect to the database
//$db = new mysqli('localhost', 'root', '', 'healthcare');

include('connect.php');

// Handle form submission
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve form data
  $username = $_POST["username"];
  $password = $_POST['pwd'];
  
  // Validate data
  if (empty($username) || empty($password)) {
    echo "Please fill in all fields";
  } else {
    // Check user credentials
    $sql = "SELECT * FROM users WHERE username = '$username' AND pwd = '$password'";
    $result = mysqli_query($con,$sql);
    if ($result->num_rows > 0) {
      // Start session and redirect to dashboard
      $_SESSION['username'] = $username;
      header("Location: form.html");
      exit();
    } else {
      echo "Invalid username or password";
    }
  }
}
?>


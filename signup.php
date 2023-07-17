<?php
// Connect to the database
//$db = new mysqli('localhost', 'root', ' ', 'healthcare');

include('connect.php');

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Retrieve form data
  $username = $_POST["username"];
  $password = $_POST['pwd'];
  $email = $_POST['email'];
//   $confirm = $_POST['confirm-pasword']
  
  // Validate data
  if (empty($username) || empty($password) || empty($email)) {
    echo "Please fill in all fields";
  } 
//   else if($pwd==$conf){
//     echo "Please enter same password"
//   }
  else {
    // Check if username already exists
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($con, $sql);
    if ($result->num_rows > 0) {
      echo "Username already taken";
    } else {
      // Insert user data into database
      $sql = "INSERT INTO users (username, pwd, email) VALUES ('$username', '$password', '$email')";
      if (mysqli_query($con, $sql)) {
        echo "User registered successfully!";
      } else {
        echo "Error: " . $sql . "<br>" . $db->error;
      }
    }
  }
}
?>

<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // retrieve form data
  $username = $_POST['username'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];

  // validate form data
  if ($password !== $confirm_password) {
    echo "Passwords do not match.";
  } else {

// Connect to the database
$db = mysqli_connect("<endpoint>", "<username>","<password>", "animal");

    echo "Passwords do not match.";
 
  // Hash the password for security
  $password = password_hash($password, PASSWORD_DEFAULT);

  // Save the data to the database
  $query = "INSERT INTO users (Username, Password) VALUES ('$username', '$password')";
  mysqli_query($db, $query);

  // Redirect to the login page
  header("Location: login.php");
  exit;





    echo "User registered successfully!";
  }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Registration Page</title>
  <style>
    /* Add your custom styles here */
    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin-top: 100px;
    }

    form {
      width: 500px;
      padding: 30px;
      background-color: #f2f2f2;
      border-radius: 10px;
      box-shadow: 0px 0px 10px #ccc;
    }

    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      font-size: 18px;
      border: none;
      border-bottom: 2px solid #ccc;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      margin-top: 20px;
      font-size: 18px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Registration Form</h1>
    <form action="index.php" method="post">
      <input type="text" placeholder="Username" name="username" required>
      <input type="password" placeholder="Password" name="password" required>
      <input type="password" placeholder="Confirm Password" name="confirm_password" required>
      <input type="submit" value="Register">
      <p><a data-toggle="tooltip" title="signin" href="login.php">Already have an account</a><p><br><br>
    </form>
  </div>
</body>
</html>

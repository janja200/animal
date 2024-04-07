<?php

// Connect to the database
$db = mysqli_connect("<endpoint>", "<username>","<password>", "animal");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $username = $_POST['username'];
  $password = $_POST['password'];
   echo"$username,$password";
  // Check if the user exists in the database
  $query = "SELECT * FROM users WHERE Username = '$username'";
  $result = mysqli_query($db, $query);
  $user = mysqli_fetch_assoc($result);

  // If the user exists, verify the password
  if ($user) {
    if (password_verify($password, $user['password'])) {
      // Start a new session
      session_start();

      // Store the user ID in the session
      $_SESSION['user_id'] = $user['id'];

     
      header("Location: home.html");
      
      exit;
    } else {
      // Show an error message if the password is incorrect
      echo "Incorrect password.";
    }
  } else {
    // Show an error message if the user doesn't exist
    echo "User not found.";
  }
}

?>

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
    <h1>login Form</h1>
    <form action="login.php" method="post">
      <input type="text" placeholder="Username" name="username" required>
      <input type="password" placeholder="Password" name="password" required>
      <input type="submit" value="login">
      <p><a data-toggle="tooltip" title="signin" href="index.php">Dont have an account</a><p><br><br>
    </form>
  </div>
</body>
</html>

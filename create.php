<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $species = $_POST['species'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $type = $_POST['type'];
  $size = $_POST['size'];
  $place_found = $_POST['place_found'];
  $condition = $_POST['condition'];
  $admission_time = $_POST['admission_time'];
  $treatment = $_POST['treatment'];

  // Validate form data (you may add more validation as needed)

  // Connect to the database
 // Assuming you've already established a database connection
    // Connect to the database
    $servername = "ls-9ea5a8cf36cd882ffced30ab29ffcd6768c6819e.cvikkesy455s.us-west-2.rds.amazonaws.com";
    $username = "root";
    $password = "password";
    $database = "animal"; // Replace 'your_database_name' with your actual database name

    // Create connection
    $db = new mysqli($servername, $username, $password, $database);


  // Check if the connection was successful
  if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // Insert the data into the database
  $query = "INSERT INTO animals (name, species, age, gender, type, size, place_found, `condition`, admission_time, treatment) VALUES ('$name', '$species', '$age', '$gender', '$type', '$size', '$place_found', '$condition', '$admission_time', '$treatment')";

  if (mysqli_query($db, $query)) {
    echo "Animal record added successfully";

  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($db);
  }

  // Close the database connection
  mysqli_close($db);
}
?>

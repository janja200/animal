<!DOCTYPE html>
<html>
<head>
  <title>Search Results</title>
  <style>
    /* Add your custom styles here */
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
    }
    .container {
      width: 80%;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
    tr:hover {
      background-color: #ddd;
    }
    .back-link {
      text-align: center;
      margin-top: 20px;
    }
    .back-link a {
      color: #4CAF50;
      text-decoration: none;
    }
    .back-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <?php
    // Assuming you've already established a database connection
    // Connect to the database
    $db = mysqli_connect("localhost", "root","", "animal");

    // Check if the connection was successful
    if (!$db) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the query parameter is set
    if (isset($_GET['query'])) {
        // Get the search query
        $search_query = $_GET['query'];

        // Perform the search in the database
        $query = "SELECT * FROM animals WHERE name LIKE '%$search_query%' OR species LIKE '%$search_query%'";
        $result = mysqli_query($db, $query);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Search Results</h2>";
            echo "<table>
                <tr>
                    <th>Name</th>
                    <th>Species</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Type</th>
                    <th>Size</th>
                    <th>Place Found</th>
                    <th>Condition</th>
                    <th>Admission Time</th>
                    <th>Treatment</th>
                </tr>";

            // Output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['species'] . "</td>";
                echo "<td>" . $row['age'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['size'] . "</td>";
                echo "<td>" . $row['place_found'] . "</td>";
                echo "<td>" . $row['condition'] . "</td>";
                echo "<td>" . $row['admission_time'] . "</td>";
                echo "<td>" . $row['treatment'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results found.</p>";
        }
    } else {
        // If query parameter is not set, redirect back to the search page
        header("Location: search.html");
        exit();
    }

    // Close the database connection
    mysqli_close($db);
    ?>
    <div class="back-link">
      <a href="search.html">Back to Search</a>
    </div>
  </div>
</body>
</html>


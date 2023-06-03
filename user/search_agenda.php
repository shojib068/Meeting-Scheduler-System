<?php include "navbar.php";
include "connection.php";
?>
<?php
  // Assume that you have already created a database connection and stored it in a variable $pdo
  // $pdo = new PDO($dsn, $username, $password);


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Search Agendas</title>
  </head>
  <body>
    <h1>Search Agendas</h1>
    <form action="search_agenda.php" method="post">
      <label for="search_term">Search:</label>
      <input type="text" name="search_term">
      <input type="submit" value="Search">
    </form>
    <?php
      // Display the search results
      if (count($agendas) > 0) {
        echo "<h2>Search Results</h2>";
        echo "<ul>";
        foreach ($agendas as $agenda) {
          echo "<li><a href=\"agenda.php?id=" . $agenda['id'] . "\">" . $agenda['title'] . "</a></li>";
        }
        echo "</ul>";
      } else {
        echo "<p>No results found.</p>";
      }
    ?>
  </body>
</html>

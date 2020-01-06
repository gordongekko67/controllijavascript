<html>
<head>
  <title>Recuperare i dati da un DB MySQL</title>
</head>
<body>

  <h1>Recuperare i dati da un DB MySQL</h1>

  <ul>

    <?php require_once '../core/core.php';   ?>
    <?php require_once '../core/tags.php';   ?>

    <?php $result = get_all_tags();          ?>

    <?php
    $colors = array("red", "green", "blue", "yellow");
    while ($row = $result->fetch_assoc()) {
      echo $row['id'], $row['tag'],  $row['weight'], $row['permalink'],  "<br>";
    }

    ?>

  </ul>
</body>
</html>

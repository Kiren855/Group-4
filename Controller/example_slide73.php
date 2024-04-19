<!DOCTYPE html>
<html>
<head>
  <title>Output</title>
</head>
<body>
  <?php
  for ($i = 1; $i <= 200; $i++) {
    if ($i % 2 == 0) {
      echo "<b><font color='red'>" . $i . "</font></b>";
    } else {
      echo "<i><font color='blue'>" . $i . "</font></i>";
    }
  }
  ?>
</body>
</html>
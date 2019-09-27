<?php
  $pid = htmlspecialchars($_GET["pid"]);
  if(empty($pid)) {
    echo '[Error] Parameter is required';
  } else {
    $command = "kill -2 $pid";
    $output = shell_exec($command);
    // echo '<pre>'.$output.'</pre>';
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <p>PID <span><?php echo $pid; ?></span> has been terminated</p>
</body>
</html>

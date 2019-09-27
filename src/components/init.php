<?php
  ini_set('max_execution_time', 0);

  $email = htmlspecialchars($_POST["email"]);
  $region = htmlspecialchars($_POST["region"]);
  $var = '';

  if (!empty($email)) {
    $var = ' --email '.$email;
  }

  if (!empty($region)) {
    throw new Exception();
  }

  $command = '/home2/wolaverd/.nvm/versions/node/v7.3.0/bin/node /home2/wolaverd/public_html/comparison-app/index.js --region ne '.$var.' -l > /dev/null 2>&1 & echo $!; ';

  $pid = exec($command, $output);
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
  <?php
    // echo '<pre>';
    // foreach ($output as $line) {
    //     echo "$line\n";
    // }
    // echo '</pre>';
  ?>
  <p>The program is running in background with PID <span><?php echo $pid; ?></span></p>
  <?php
    echo '<p><a target="_blank" href="http://wolaverdesigns.com/fuel-image-collector/php/terminate.php?pid='.$pid.'">Terminate</a></p>';
  ?>
  <p><a target="_blank" href="http://wolaverdesigns.com/fuel-image-collector/logs">Log</a></p>
  <?php
    if (!empty($email)) {
      echo '<p>You will receive a confirmation email shortly</p>';
    }
  ?>
</body>
</html>

<?php
  if(!empty($_GET['did'] && !empty($_GET['reason']))) {
    $GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

    $did = $GET['did'];
    $reason = $GET['reason'];
  } else {
    header('Location: ../index.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Thank You</title>
</head>
<body>
  <div class="container mt-4">
    <h2>Thank you for your Heartfelt <?php echo $reason; ?></h2>
    <hr>
    <p>Your donation ID is <?php echo $did; ?></p>
    <p>Check your email for more info</p>
    <p><a href="supportOurNewsPortal.php" class="btn btn-light mt-2">Go Back to Home Page</a></p>
  </div>
</body>
</html>
<?php
$insert = false;
if (isset($_POST['name'])) {
  $insert = true;
  $server = "localhost";
  $username = "root";
  $password = "";

  $con = mysqli_connect($server, $username, $password, "trip", null, null);

  if (!$con) {
    die("connection to this database failed due to" . mysqli_connect_errno());
  }


  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $medical = $_POST['medical'];
  $transactionid = $_POST['transactionid'];
  $relative = $_POST['relative'];
  $aadhar = $_POST['aadhar'];


  $sql = "INSERT INTO `darjeeling` (`name`, `age`, `gender`, `email`, `phone`,
    `relative`, `aadhar`, `transactionid`, `medical`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$relative', '$aadhar', '$transactionid', '$medical');";

  // if($con->query($sql) == true){
  //     echo "Succesfully inserted";
  // }
  if ($con->query($sql) != true) {
    echo "Error: $sql <br> $con->error";
  }
  $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome to Travel form</title>
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400;900&family=Shadows+Into+Light&family=Sriracha&display=swap" rel="stylesheet" />
</head>

<body>
  <img class="bg" src="images/darjeeling.jpg" alt="Manali" />
  <div class="container">
    <h1>Welcome to Darjeeling Trip</h1>
    <p>
      <br>
      Enter Your Details to confirm your booking
      <br>
      Pay Rs. 25000 to travel.com@apl upi id
    </p>

    <?php

    if ($insert == true) {
      echo "<p class='submitmsg'>
        Thanks for Submitting your form, We will send you confirmation email in a day
      </p>";
    }
    ?>

    <form action="/aman/travel/php/darjeeling.php" method="post">
      <input type="text" name="name" id="name" placeholder="Enter Your name" />
      <input type="text" name="age" id="age" placeholder="Enter Your age" />
      <input type="text" name="gender" id="gender" placeholder="Enter your gender" />
      <input type="email" name="email" id="email" placeholder="Enter your email" />
      <input type="phone" name="phone" id="phone" placeholder="Enter Your Phone" />
      <input type="phone" name="relative" id="relative" placeholder="Enter Your close Relative's mobile no. " >
      <input type="text" name="aadhar" id="aadhar" placeholder="Enter your aadhar number">
      <input type="text" name="transactionid" id="transactionid" placeholder="Enter your payment transaction id">
      <input type="text" name="medical" id="medical" placeholder="Enter you medical problem if have any">
      <button class="btn">Submit</button>
      <!-- <button class="btn">Reset</button> -->
    </form>
  </div>
  <script src="indx.js"></script>

</body>

</html>
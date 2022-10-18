<?php

$insert = false;
if (isset($_POST['name'])) {
    $db_hostname = "127.0.0.1";
    $db_username = "root";
    $db_password = "";
    $db_name = "trip";
    $conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);
    if (!$conn) {
        echo "Connection Failed:", mysqli_connect_error();
        exit;
    }

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $sql = "Insert into tour(Name,Email,Phone,Subject,Message) values ('$name','$email','$phone','$subject','$message')";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "error: ", mysqli_error($conn);
        exit;
    } else {
        $insert = true;
    }
    mysqli_close($conn);
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Tour & Travel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <header class="header">
        <a href="/aman/travel/index.html" class="logo"><i class="fas fa-hiking"></i> travel.com</a>
        <nav class="navbar">
            <div id="nav-close" class="fas fa-times"></div>
            <a href="/aman/travel/index.html">home</a>
            <a href="/aman/travel/index.html#category">Adventure</a>
            <a href="/aman/travel/index.html#packages">packages</a>
            <a href="#">contact</a>
        </nav>
        <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="search-btn" class="fas fa-search"></div>

        </div>
    </header>
    <section class="contact" id="contact">

        <div class="wrapper1">
            <div class="title1">
                <h1>contact us form</h1>
                <?php
                if ($insert ==  true) {
                    $insert = false;
                    echo "<p style = 'font-size: 2rem;
                color: green;
                text-align: center;
                margin-bottom: 20px;'>Thanks for submitting form we will contact you soon.</p>";
                    
                }
                ?>
            </div>
            <div class="contact-form">
                <form method="post" action="contact_us.php">
                    <div class="input-fields">

                        <input type="text" class="input" placeholder="Name" name="name">
                        <input type="email" class="input" placeholder="Email Address" name="email" pattern=".+@gmail\.com">
                        <input type="phone" class="input" placeholder="Phone" name="phone">
                        <input type="text" class="input" placeholder="Subject" name="subject">
                    </div>
                    <div class="msg">
                        <textarea placeholder="Message" name="message"></textarea>
                        <div class="btn1"><button type="submit">send</div>
                </form>
            </div>
        </div>
        </div>

    </section>
    <script src="/aman/travel/js/script.js"></script>
</body>
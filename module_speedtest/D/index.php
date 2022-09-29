<?php

session_start();

if (isset($_POST['submit'])) {
    if ($_SESSION['captcha'] == $_POST['captcha']) {
        echo "<script>alert('Captcha berhasil')</script>";
    } else {
        echo "<script>alert('Captcha gagal')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha Verification</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
        }
        img, input {
            display: block;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div>
            <h2>Captcha Verification</h2>
        
            <form action="" method="post">
                <img src="captcha.php">
                <input type="text" name="captcha">
                <button type="submit" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
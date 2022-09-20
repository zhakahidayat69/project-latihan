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
</head>
<body>
    <h3>Captcha Verification</h3>

    <form action="" method="post">
        <img src="captcha.php">
        <input type="text" name="captcha">
        <button type="submit" name="submit">Submit</button>
    </form>
</body>
</html>
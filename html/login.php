<head>
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
    <form acction="login.php" method="post">
        <p>User: <input type="text" name="user"></p>
        <p>Password: <input type="password" name="password"></p>
        <div class="g-recaptcha" data-sitekey="<?php echo captchaClass::getPublicKey(); ?>'"></div>
        <button type="submit">Get In</button>
    </form>
</body>
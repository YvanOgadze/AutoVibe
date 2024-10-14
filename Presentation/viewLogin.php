<div class="wrapper">
    <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h2>Login</h2>

        <p class="error">
        <?php if (isset($errorUsername)) {
                echo $errorUsername;
            }
        ?>
        </p>
        <div class="input-box">
            <input type="text" name="txtUsername" placeholder="Username">
            <i class='bx bxs-user'></i>

        </div>
        
        <p class="error">
        <?php if (isset($errorWachtwoord)) {
                echo $errorWachtwoord;
            }
        ?>
        </p>
        <div class="input-box">
            <input type="password" name="txtWachtwoord" placeholder="Wachtwoord">
            <i class='bx bxs-lock-alt'></i>
        </div>

        <input class="btn" type="submit" name="btnLogin" value="Login">


        <div class="registreer-link">
            <p>Nog geen account? <a href="registreren.php">Registreer</a></p>
        </div>
    </form>
</div>

</body>



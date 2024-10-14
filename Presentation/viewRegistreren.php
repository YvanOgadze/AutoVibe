<div class="wrapper">
    <form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h2>Registreren</h2>

        <p class="error">
        <?php if (isset($errorUsername)) {
                echo $errorUsername;
            }
        ?>
        <div class="input-box">
            <input type="text" name="txtUsername" placeholder="Username">
            <i class='bx bxs-user'></i>
        </div>

        <div class="input-box">
            <input type="text" name="txtBio" placeholder="Bio">
            <i class='bx bxs-edit-alt'></i>
        </div>

        <p class="error">
        <?php if (isset($errorWachtwoord)) {
                echo $errorWachtwoord;
            }
        ?>
        <div class="input-box">
            <input type="password" name="txtWachtwoord" placeholder="Wachtwoord">
            <i class='bx bxs-lock-alt'></i>
        </div>
        <div class="input-box">
            <input type="password" name="txtWachtwoordHerhaal" placeholder="Herhaal uw wachtwoord">
            <i class='bx bxs-lock-alt'></i>
        </div>
        
        <input class="btn" type="submit" name="btnRegistreer" value="Registreren">

        <div class="registreer-link">
            <p>Heb je al een account? <a href="login.php">Login</a></p>
        </div>

    </form>
</div>
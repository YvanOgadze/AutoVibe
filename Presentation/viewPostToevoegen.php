<h2>Nieuwe post toevoegen</h2>
<form action="<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>" method="Post">
    Merk:
    <select name="txtAutoId">
        <option value="0">---Selecteer een merk---</option>
        <?php
        foreach ($autoData as $auto) {
            echo "<option value=" . $auto->getAutoId() . ">" . $auto->getMerk() . "</option>";
        }
        ?>
    </select><br>

    Bouwjaar:
    <input type="number" step="0.01" min="1900" max="2025" name="txtBouwjaar" required><br>


    Foto: <input type="file" name="txtImg" accept="image/*"><br>
    Omschrijving: <input type="text" name="txtOmschrijving" required><br>
    <input type="submit" value="Toevoegen" name="btnToevoegen">
</form>
<br>
<br>
<a href="overzicht.php">Terug naar home pagina</a>
<br>
<form action="insert_kolory_do.php" method="POST">
    <label>Nazwa Koloru </label><input type="text" name="nazwa_koloru">
    <button type="submit">Wprowadz</button>
</form>

<?php
session_start();
if(isset($_SESSION['blad'])){
    echo $_SESSION['blad'];
    unset($_SESSION['blad']);
}
?>
<a href="../../php/strona_admin.php">Powrót</a>

<form action="insert_modele_do.php" method="POST">
    <label>Nazwa Marki </label>
    <select name="id_marki">
        <?php
        require_once "../../php/connect.php";
        $conn=oci_connect($username,$password,$name);
        if(!$conn){
            echo "nie";
        }else {
            $sql = "SELECT count(*) as var1 from marki";
            $stid = oci_parse($conn, $sql);
            oci_execute($stid);
            $row = oci_fetch_array($stid, OCI_ASSOC);
            $var2 = $row['VAR1'];
            echo $var2." jeb";
            $var1 = 1;
            oci_free_statement($stid);
            do {
                $sql = 'begin p_wysw_marki (:bind1,:bind2); end;';
                $stid = oci_parse($conn, $sql);
                oci_bind_by_name($stid, ':bind1', $var1, 2);
                oci_bind_by_name($stid, ':bind2', $name2, 100);
                oci_execute($stid);
                oci_free_statement($stid);
                echo "<option value=" . $var1 . ">" . $name2 . "</option>";


                $var1++;
            } while ($var1 <= $var2);
            oci_close($conn);
        }
        ?>
    </select>
    <label>Nazwa Modelu </label><input type="text" name="nazwa_modelu">
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


<?php

    $conn = dbconnect("sqli");
    if (isset($_GET['antw'])) { $bevestigd = $_GET['antw']; } else { $bevestigd = "nee"; }
    if ($bevestigd == "ja") {
        $id = $_GET['id'];
        $sql = "DELETE FROM berichten2 WHERE id = '$id';";
        $conn->query($sql);

        $ix = str_pad($id, 4, '0', STR_PAD_LEFT);
        $bericht = "bericht_" . $ix . ".txt";
        verwijderbestand ($bericht, "berichten");
    }
    $_SESSION['stopdel'] = true;
    dbdisconnect("sqli", $conn);

?>

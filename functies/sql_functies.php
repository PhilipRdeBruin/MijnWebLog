
<?php

    function zoek_delete_of_update () {
        $conn = dbconnect("sqli");
        $sql = "SELECT * FROM berichten2 ORDER BY id DESC;";
        $result = $conn->query($sql);
        foreach ($result as $row) {
            if (isset($_POST['delbericht' . $row['id']])) {
                $id = $row['id'];
                $ondw = $row['onderwerp'];
                $inpstr = schrijfstring("Weet je zeker dat je bericht||'$ondw'||wilt verwijderen?|| ||(OK = ja / Annuleren = nee)");
                phpConfirm ($inpstr, $id);
                break;
            } elseif (isset($_POST['updbericht' . $row['id']])) {
                // alternatief: post meteen naar "plaatsen.php" en zet id, onderwerp en rubriek in hidden input-velden;
                $_SESSION['update'] = true;
                $_SESSION['id'] = $row['id'];
                $_SESSION['onderwerp'] = $row['onderwerp'];
                $_SESSION['rubriek'] = $row['rubriek'];
                phpRedirect ("plaatsen.php");
                break;
            }
        }
        dbdisconnect("sqli", $conn);
    }

 ?>

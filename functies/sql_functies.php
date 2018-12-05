
<?php

    function zoek_delete_of_update () {
        $conn = dbconnect("sqli");
//        $sql = "SELECT * FROM berichten2 ORDER BY id DESC;";

        $sql = "SELECT * FROM berichten2 b
                INNER JOIN berichten2_rubrieken br
                ON br.bericht_id = b.id
                ORDER BY b.id DESC;";

//        echo "sql = $sql";
//        die();


        $result = $conn->query($sql);
        foreach ($result as $row) {
            $id = $row['id'];
            $commentaar = ispost('commentaar');

//            echo "id = $id, post(commentaar[$id] = $commentaar<br/>";

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
                $_SESSION['rubriek_id'] = $row['rubriek_id'];
                $_SESSION['verhaal'] = $row['verhaal'];
                phpRedirect ("plaatsen.php");
                break;
            } elseif (isset($_POST['commentaar' . $row['id']])) {
                // alternatief: post meteen naar "plaatsen.php" en zet id, onderwerp en rubriek in hidden input-velden;
//                phpAlert ("nu zou sessie(commetaar) moeten worden weggeschreven...");
                $_SESSION['commentaar'] = true;
                $sessiecomm = $_SESSION['commentaar'];
//                phpAlert ("sessie(commentaar) = $sessiecomm");
                $_SESSION['id'] = $row['id'];
                $_SESSION['onderwerp'] = $row['onderwerp'];
                $_SESSION['auteur_id'] = $row['auteur_id'];
                $_SESSION['rubriek_id'] = $row['rubriek_id'];
//                $msgstr = $_SESSION['rubriek_id'];
//                phpAlert ("sessie(rubriek_id) = $msgstr");
//                die();
                $_SESSION['verhaal'] = $row['verhaal'];
                phpRedirect ("plaatsen.php");
                break;
            }
        }
        dbdisconnect("sqli", $conn);
//        die();
    }

 ?>

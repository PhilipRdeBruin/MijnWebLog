
<?php

    function fetch_aantalcomments ($id) {
        $conn = dbconnect("sqli");
        $sql = "SELECT COUNT(*) FROM commentaar WHERE commentator_id = '$id';";
//        echo "$sql";
//        die();
        $result = $conn->query($sql);
        $row = $result->fetch_array();
        $uit = $row[0];
//        phpAlert ("result = $uit");
        dbdisconnect("sqli", $conn);

        return $row[0];
    }

    function fetch_regdatum ($id) {
        $conn = dbconnect("sqli");
        $sql = "SELECT redatum FROM gebruikers WHERE gebr_id = '$id';";
//        echo "$sql";
//        die();
        $result = $conn->query($sql);
        $row = $result->fetch_array();
        $uit = $row[0]['regdatum'];
//        phpAlert ("result = $uit");
        dbdisconnect("sqli", $conn);

        return $row[0]['regdatum'];
    }

    function naam_from_id ($id) {
        $conn = dbconnect("sqli");
        $sql = "SELECT * FROM gebruikers WHERE gebr_id = '$id';";
        $result = $conn->query($sql);
        $row = $result->fetch_array();
        if ($row != null) {
            $tv = ($row['tussenv'] != "") ? " " . $row['tussenv'] : "";
            $naam = $row['voornaam'] . $tv . " " . $row['achternaam'];
//            phpAlert ("voornaam = $naam");
        }
        dbdisconnect ("sqli", $conn);

        return $naam;
    }

    function update_laatste_activiteit ($gebr) {
        $tijd = date("Y-m-d H:i:s", time());
        $conn = dbconnect("sqli");
        $sql = "UPDATE gebruikers SET laatste_act = '$tijd' WHERE gebr_id = '$gebr';;";
        $conn->query($sql);
        dbdisconnect ("sqli", $conn);
    }

    function update_laatste_login ($gebr) {
        update_laatste_loginuit ("login", $gebr);
    }

    function update_laatste_loguit ($gebr) {
        update_laatste_loginuit ("loguit", $gebr);
    }

    function update_laatste_loginuit ($type, $gebr) {
        $xtijd = ($type == "login") ? time() + 1000000 : time();
        $tijd = date("Y-m-d H:i:s", $xtijd);
//        phpAlert ("xtijd = $xtijd");
        $conn = dbconnect("sqli");
        $sql = "UPDATE gebruikers SET laatste_login = '$tijd' WHERE gebr_id = '$gebr';;";
        $conn->query($sql);
        dbdisconnect ("sqli", $conn);
    }

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

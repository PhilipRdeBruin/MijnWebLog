
<?php

    /*  SUPER_GLOBAL VARIABELEN-FUNCTIES  */

    function ispostget ($arg) {
        $res = "";
        if (isset($_POST[$arg])) {
            $res = $_POST[$arg];
        } elseif (isset($_GET[$arg])) {
            $res = $_GET[$arg];
        }
        return $res;
    }

    function ispost ($arg) {
        $res = (isset($_POST[$arg])) ? $_POST[$arg] : "" ;
        return $res;
    }

    function isget ($arg) {
        $res = (isset($_GET[$arg])) ? $_GET[$arg] : "" ;
        return $res;
    }

    function issessie ($arg) {
        $res = (isset($_SESSION[$arg])) ? $_SESSION[$arg] : "" ;
        return $res;
    }


    /*  PHP-VERSIES VAN JAVASCRIPT FUNCTIES  */

    function phpAlert ($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }

    function phpAlertPlus ($msg, $redirectUrl="") {
        $redirect = "";
        if ($redirectUrl != "") { $redirect = "window.location.href = '" . $redirectUrl . "'"; }
        echo '<script type="text/javascript">alert("' . $msg . '"); ' . $redirect . '</script>';
    }

    function phpConfirm ($inpstr, $id, $redirectUrl="") {
        $redirectja = "window.location.href = '" . $redirectUrl . "?antw=ja&id=" . $id . "'";
        $redirectnee = "window.location.href = '" . $redirectUrl . "?antw=nee&id=" . $id . "'";
        echo '<script type="text/javascript">';
        echo 'antw = confirm ("' . $inpstr . '"); ';
        echo "if (antw == true) { $redirectja; } else { $redirectnee; }";
        echo '</script>';
    }

    function phpRedirect ($redirectUrl) {
        $redirect = "window.location.href = '" . $redirectUrl . "'";
        echo '<script type="text/javascript">' . $redirect . '</script>';
    }


    /*  FILE-FUNCTIES  */

    function detpad ($bestand, $submap) {
        $subpad = "";
        $defpad = getcwd();
        if (isset($submap)) { $subpad = $submap . "/"; }
        $pad = $defpad . "/" . $subpad;

        return $pad;
    }

    function leesbestand ($bestand, $submap="") {
        $pad = detpad($bestand, $submap);

        $res[0] = file($pad . $bestand);
        $res[1] = count($res[0]);
        return $res;
    }

    function schrijfbestand ($tp, $bestandsnaam, $inhoud, $submap="") {
        $pad = detpad($bestand, $submap);

        $bestand = fopen($pad . $bestandsnaam, $tp);
        fwrite($bestand, $inhoud . "\n");
        fclose($bestand);
    }

    function verwijderbestand ($bestand, $submap="") {
        $pad = detpad($bestand, $submap);

        unlink ($pad . $bestand);
    }


    /*  [CUSTOMIZED] STRING-FUNCTIES  */

    function schrijfstring ($str) {
        $strout = $str;
        $bsep = stripos($str, "||");
        if ($bsep) {
            $strout = substr($str, 0, $bsep);
            $str = substr($str, $bsep + 2);

            $cnt = 0;
            do {
                $cnt++;
                $bsep = stripos ($str, "||");
                if ($bsep) {
                    $strout = $strout . '\n' . substr ($str, 0, $bsep);
                    $str = substr ($str, $bsep + 2);
                }
            } while ($bsep && $cnt < 20);
            $strout = $strout . '\n' . $str;
        }
        return $strout;
    }


    /*  FUNCTIONELE FUNCTIES  */

    function checkgelijkeww() {
        $bww = true;
        if (isset($_POST['wachtwoord01']) && isset($_POST['wachtwoord02'])) {
            if ($_POST['wachtwoord01'] != $_POST['wachtwoord02']) {
                $msgstr = schrijfstring ("Je hebt verschillende wachtwoorden ingevoerd.|| ||Probeer het opnieuw...");
                phpAlert ($msgstr);
                $bww = false;
            }
        }
        return $bww;
    }

    function deletecommentaar ($cid) {
        $conn = dbconnect ("sqli");
        $sql = "UPDATE commentaar SET status_comm = 'verwijderd' WHERE comment_id = '$cid';";
//        echo "$sql";
//        die();
        $conn->query($sql);
        dbdisconnect ("sqli", $conn);
    }

    function extractverhaal ($id) {
        $ix = str_pad($id, 4, '0', STR_PAD_LEFT);
        $berichtenbestand = "bericht_" . $ix . ".txt";
        $verhaalarr = leesbestand($berichtenbestand, "berichten");

        $verhaal = "";
        for ($ii=4; $ii<$verhaalarr[1]; $ii++) {
            $verhaal = $verhaal . $verhaalarr[0][$ii] . "<br/>";
        }
        return $verhaal;
    }

    function fillrubrieken ($sellist, $rubrsel) {
        $conn = dbconnect ("sqli");
        $sql = "SELECT rubriek_naam FROM rubrieken ORDER BY rubriek_naam";
        $result = $conn->query($sql);

        $i = 0;
        foreach ($result as $row) {
            $i++;
            $rubrieknaam = $row['rubriek_naam'];
            $rubrieknaamvis = str_ireplace("_", " ", $rubrieknaam);
            if ($sellist == "filter") {
                $functienaam = "set_filterdata($i)";
//                phpAlert ("functienaam = $functienaam");
                if (isset($_POST[$rubrieknaam]) || isset($_SESSION[$rubrieknaam])) {
                    if ($_POST[$rubrieknaam] !="" || $_SESSION[$rubrieknaam] !="") { $strsel = " selected"; } else { $strsel = ""; }
                }
//                if (isset($_POST[$rubrieknaam])) { phpAlert("post($rubrieknaam) = $_POST[$rubrieknaam]"); }
//                if (isset($_SESSION[$rubrieknaam])) { phpAlert("sessie($rubrieknaam) = $_SESSION[$rubrieknaam]"); }
                echo "<option id='filterin$i' name='filterin$i' value='$rubrieknaam' onmousedown='$functienaam' $strsel>$rubrieknaamvis</option>";
                $arr_rubr[$i - 1] = $rubrieknaam;
            } else {
                $strsel = ($rubrieknaam == $rubrsel) ? " selected" : "";
                echo "<option id='nieuwerubriek$i' name='nieuwerubriek$i' value='$rubrieknaam' $strsel >$rubrieknaamvis</option>";
            }
        }
        if ($sellist == "filter") { return $arr_rubr; }

        dbdisconnect ("sqli", $conn);
    }


    function fillauteurs ($sellist, $rubrsel) {
        $conn = dbconnect ("sqli");
        $sql = "SELECT DISTINCT auteur FROM berichten2 ORDER BY auteur";
        $result = $conn->query($sql);

        $i = 0;
        foreach ($result as $row) {
            $i++;
            $rubrieknaam = $row['auteur'];
            $rubrieknaamvis = str_ireplace("_", " ", $rubrieknaam);
            if ($sellist == "filter") {
                $functienaam = "set_filterdata($i)";
//                phpAlert ("functienaam = $functienaam");
                if (isset($_POST[$rubrieknaam]) || isset($_SESSION[$rubrieknaam])) {
                    if ($_POST[$rubrieknaam] !="" || $_SESSION[$rubrieknaam] !="") { $strsel = " selected"; } else { $strsel = ""; }
                }
//                if (isset($_POST[$rubrieknaam])) { phpAlert("post($rubrieknaam) = $_POST[$rubrieknaam]"); }
//                if (isset($_SESSION[$rubrieknaam])) { phpAlert("sessie($rubrieknaam) = $_SESSION[$rubrieknaam]"); }
                echo "<option id='filterin$i' name='filterin$i' value='$rubrieknaam' onmousedown='$functienaam' $strsel>$rubrieknaamvis</option>";
                $arr_rubr[$i - 1] = $rubrieknaam;
            } else {
                $strsel = ($rubrieknaam == $rubrsel) ? " selected" : "";
                echo "<option id='nieuwerubriek$i' name='nieuwerubriek$i' value='$rubrieknaam' $strsel >$rubrieknaamvis</option>";
            }
        }
        if ($sellist == "filter") { return $arr_rubr; }

        dbdisconnect ("sqli", $conn);
    }

    function schrijf_hiddenfilterrubrieken($filtrubr) {
        for ($i=0; $i<count($filtrubr); $i++) {
            $j = $i + 1;
            echo "<input type='hidden' id='filteruit$j' name='$filtrubr[$i]' value=''>";  // name='filteruit$j' value = '$filtrubr[$i]'
        }
    }

    function unsetsessiefilters($tabelnaam) {
        $conn = dbconnect ("sqli");
        $sql = "SELECT rubriek_naam FROM rubrieken";
        $result = $conn->query($sql);
        foreach ($result as $row) {
            $rubrieknaam = $row['rubriek_naam'];
//            phpAlert ("rubrieknaam = $rubrieknaam");
            unset ($_SESSION[$rubrieknaam]);
//            if (isset($_SESSION[$rubrieknaam])) { phpAlert("sessie($rubrieknaam) = $_SESSION[$rubrieknaam]"); }
        }
        dbdisconnect ("sqli", $conn);
    }

    function setdefaultsorteersleutels() {
        global $sortkey, $sortdir, $dirrubr, $dirschr, $dirondw, $dirtijd;

        $sortkey = "id"; $sortdir = "DESC";
        $dirrubr = "A"; $dirschr = "A"; $dirondw = "A"; $dirtijd = "D";
    }

    function voegtoe_nieuwe_rubriek ($rubr) {
        $conn = dbconnect ("sqli");
        $sql = "INSERT INTO rubrieken (rubriek_naam) VALUES ('" . $rubr . "');";
        $conn->query($sql);

        dbdisconnect ("sqli", $conn);
    }

    function zoekgebruiker_met_email ($email) {
        global $gebruikerid, $voornaam, $init, $tussenv, $achternaam, $inlognaam, $wwinlog, $admin;

        $conn = dbconnect ("sqli");
        $sql = "SELECT * FROM gebruikers WHERE email = '$email';";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc()) {
            $bfound = true;
            $gebruikerid = $row["gebr_id"];
            $voornaam = trim($row["voornaam"]) . " ";
            $init = trim($row["initiaal"]) . " ";
            $tussenv = trim($row["tussenv"]) . " ";
            $achternaam = trim($row["achternaam"]);
            $inlognaam = $voornaam . $init . $tussenv . $achternaam;
            $wwinlog = trim($row["wachtwoord"]);
            $admin = $row["gebr_rechten"];
        } else {
            $bfound = false;
        }
        dbdisconnect ("sqli", $conn);

        return $bfound;
    }

    function zoekgebruiker_met_naam ($naam) {
        global $gebruikerid, $voornaam, $init, $tussenv, $achternaam, $inlognaam, $wwinlog, $admin;

        $conn = dbconnect ("sqli");
        $sql = "SELECT * FROM gebruikers;";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $bfound = true;
            while($row = $result->fetch_assoc()) {
                $gebruikerid = $row["gebr_id"];
                $voornaam = trim($row["voornaam"]) . " ";
                if (trim($row["initiaal"]) != "") { $init = trim($row["initiaal"]) . " "; } else { $init = ""; }
                if (trim($row["tussenv"]) != "") { $tussenv = trim($row["tussenv"]) . " "; } else { $tussenv = ""; }
                $achternaam = trim($row["achternaam"]);
                $inlognaam = $voornaam . $init . $tussenv . $achternaam;
                $admin = $row["gebr_rechten"];
                if (trim($inlognaam) == trim($naam)) {
                    $wwinlog = trim($row["wachtwoord"]);
                    break;
                }
            }
            if ($inlognaam != $naam) { $bfound = false; }
        } else {
            $bfound = false;
        }
        dbdisconnect ("sqli", $conn);

        return $bfound;
    }

?>

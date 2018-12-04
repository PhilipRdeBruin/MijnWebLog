
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


    /*  FUNCTIONELE FUNCTIES  */

    function vul_rubrieken ($rubrsel) {
        $conn = dbconnect ("sqli");
        $sql = "SELECT rubr_id, rubriek_naam FROM rubrieken ORDER BY rubriek_naam";
        $result = $conn->query($sql);

        $i = 0;
        foreach ($result as $row) {
            $i++;
            $rubriekid = $row['rubr_id'];
            $rubrieknaam = $row['rubriek_naam'];
            $strsel = ($rubrieknaam == $rubrsel) ? " selected" : "";
            echo "<option id='nieuwerubriek$i' name='nieuwerubriek$i' value='$rubriekid' $strsel >$rubrieknaam</option>";
        }

        dbdisconnect ("sqli", $conn);
    }

?>

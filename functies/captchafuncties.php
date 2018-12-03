<?php

    function plaatschaptchadivs() {
        echo '<script>dragitdropit(); </script>';
    }

    function getcaptchacode ($pictcode) {
        $imgcode = "";
        $pictnr = substr($pictcode, 0, 1);
        $code = substr($pictcode, 2);
        $pictnaam = "foto" . $pictnr;

        $conn = dbconnect ("sqli");
        $sql = "SELECT img_code FROM captchacodes WHERE img_naam = '$pictnaam';";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc()) {
            $imgcode = trim($row["img_code"]);
        }
        dbdisconnect ("sqli", $conn);

        return $imgcode;
    }

?>


<?php
//    if (isset($_GET['sorteer'])) {
        $sortkey = $_GET['sorteer'];
        $sortdir = $_GET['sortdir'];
        $_SESSION['sortkey'] = $sortkey;
        $_SESSION['sortdir'] = $sortdir;
        $arubr = ""; $aschr = ""; $aondw = ""; $atijd = "";
//        if ($sortdir == "ASC") { $sdir = "D";} else { $sdir = "A"; }
        switch ($sortkey) {
        case 'rubriek':
            if ($dirrubr != "") {
                if ($sortdir == "ASC") { $sdir = "D";} else { $sdir = "A"; }
            }
            $dirrubr = $sdir;
            $_SESSION['rubriek'] = $dirrubr;
            $hrubr = "darkblue"; $brubr = true;
            break;
        case 'auteur':
            if ($dirschr != "") {
                if ($sortdir == "ASC") { $sdir = "D";} else { $sdir = "A"; }
            }
            $dirschr = $sdir;
            $_SESSION['auteur'] = $dirschr;
            $hschr = "darkblue"; $bschr = true;
            break;
        case 'onderwerp':
            if ($dirschr != "") {
                if ($sortdir == "ASC") { $sdir = "D";} else { $sdir = "A"; }
            }
            $dirondw = $sdir;
            $_SESSION['onderwerp'] = $dirondw;
            $hondw = "darkblue"; $bondw = true;
            break;
        case 'geplaatst':
            if ($dirtijd != "") {
                if ($sortdir == "ASC") { $sdir = "D";} else { $sdir = "A"; }
            }
            $dirtijd = $sdir;
            $_SESSION['geplaatst'] = $dirtijd;
            $htijd = "darkblue"; $btijd = true;
        }
//    } else {
//        $sortkey = "id"; $sortdir = "DESC";
//        $dirrubr = "A"; $dirschr = "A"; $dirondw = "A"; $dirtijd = "D";
//        $hrubr = "black"; $hschr = "black"; $hondw = "black"; $htijd = "black";
//        $_SESSION['sortkey'] = $sortkey;
//        $_SESSION['sortdir'] = $sortdir;
//        $_SESSION['rubriek'] = $dirrubr;
//        $_SESSION['auteur'] = $dirschr;
//        $_SESSION['onderwerp'] = $dirondw;
//        $_SESSION['geplaatst'] = $dirtijd;
//    }
//    if ($dirrubr == "A") { $arubr ="&#9650;"; } else { $arubr ="&#9660;"; }
//    if ($dirschr == "A") { $aschr ="&#9650;"; } else { $aschr ="&#9660;"; }
//    if ($dirondw == "A") { $aondw ="&#9650;"; } else { $aondw ="&#9660;"; }
//    if ($dirtijd == "A") { $atijd ="&#9650;"; } else { $atijd ="&#9660;"; }

    if ($dirrubr == "A") {
        $arubr ="&#9650;";
    } elseif ($dirrubr == "D") {
        $arubr ="&#9660;";
    }
    if ($dirschr == "A") {
        $aschr ="&#9650;";
    } elseif ($dirschr == "D") {
        $aschr ="&#9660;";
    }
    if ($dirondw == "A") {
        $aondw ="&#9650;";
    } elseif ($dirondw == "D") {
        $aondw ="&#9660;";
    }
    if ($dirtijd == "A") {
        $atijd ="&#9650;";
    } elseif ($dirtijd == "D") {
        $atijd ="&#9660;";
    }

?>

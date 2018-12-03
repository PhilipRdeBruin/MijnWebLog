
<?php
    if (isset($_GET['sorteer'])) {
        //        $msgstr = "get(sorteer) = " . $_GET['sorteer'] . " en get(sortdir) = " . $_GET['sortdir'];
        //        phpAlert ($msgstr);
        $sortkey = $_GET['sorteer'];
        $sortdir = $_GET['sortdir'];
        $_SESSION['sortkey'] = $sortkey;
        $_SESSION['sortdir'] = $sortdir;
        if ($sortdir == "ASC") { $sdir = "D";} else { $sdir = "A"; }
        switch ($sortkey) {
        case 'rubriek':
            $dirrubr = $sdir;
            $_SESSION['rubriek'] = $dirrubr;
            $hrubr = "darkblue"; $brubr = true;
            break;
        case 'auteur':
            $dirschr = $sdir;
            $_SESSION['auteur'] = $dirschr;
            $hschr = "darkblue"; $bschr = true;
            break;
        case 'onderwerp':
            $dirondw = $sdir;
            $_SESSION['onderwerp'] = $dirondw;
            $hondw = "darkblue"; $bondw = true;
            break;
        case 'geplaatst':
            $dirtijd = $sdir;
            $_SESSION['geplaatst'] = $dirtijd;
            $htijd = "darkblue"; $btijd = true;
        }
    } else {
        $sortkey = "id"; $sortdir = "DESC";
        $dirrubr = "A"; $dirschr = "A"; $dirondw = "A"; $dirtijd = "D";
        $hrubr = "black"; $hschr = "black"; $hondw = "black"; $htijd = "black";
        $_SESSION['sortkey'] = $sortkey;
        $_SESSION['sortdir'] = $sortdir;
        $_SESSION['rubriek'] = $dirrubr;
        $_SESSION['auteur'] = $dirschr;
        $_SESSION['onderwerp'] = $dirondw;
        $_SESSION['geplaatst'] = $dirtijd;
    }
    if ($dirrubr == "A") { $arubr ="&#9650;"; } else { $arubr ="&#9660;"; }
    if ($dirschr == "A") { $aschr ="&#9650;"; } else { $aschr ="&#9660;"; }
    if ($dirondw == "A") { $aondw ="&#9650;"; } else { $aondw ="&#9660;"; }
    if ($dirtijd == "A") { $atijd ="&#9650;"; } else { $atijd ="&#9660;"; }
?>

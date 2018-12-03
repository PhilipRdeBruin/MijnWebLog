
<?php

    $bww = checkgelijkeww();
    if (!$bww) {
        include 'includes/pagina_includes/inlog/registreren.php';
    } elseif (isset($_POST['captchavolgorde'])) {
        $pictcode = $_POST['captchavolgorde'];
        $code = substr($pictcode, 2);
        $captchacode = getcaptchacode($pictcode);
//		phpAlert ("ingevoerde code: $code, code uit database: $captchacode");
        if ($code == $captchacode && trim($code) != "")	{
            include 'includes/functionele_includes/inlog/nieuw_account.php';
        } else {
            $msgstr = schrijfstring ("Je hebt de beeldpuzzel niet correct opgelost.|| ||Probeer het opnieuw...");
            phpAlert ($msgstr);
            include 'includes/pagina_includes/inlog/registreren.php';
        }
    } else {
        phpAlert ("Los eerst de beeldpuzzel op...");
        include 'includes/pagina_includes/inlog/registreren.php';
    }

?>

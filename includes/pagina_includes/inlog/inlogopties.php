
    <div class="berichten">
    <?php

    if (isset($_POST['aanmaken_acct'])) {
        include 'includes/functionele_includes/inlog/checkregistratie.php';
    } else {
        if (isset($_POST['registerknop'])) {
            include 'includes/pagina_includes/inlog/registreren.php';
        } else {
            include 'includes/functionele_includes/inlog/verifieerww.php';
        }
    }

    ?>
    </div>


<?php
    switch ($site) {
    case 'index':
        if ($naam == "") {
            $nnav = 1;
            $nav[0][0] = 'ainlog'; $nav[1][0] = 'inlog.php'; $nav[2][0] = 'Inloggen';
        } elseif ($profiel > 0) {
            $nnav = 3;
            $nav[0][0] = 'ahome'; $nav[1][0] = 'index.php'; $nav[2][0] = 'Hoofdpagina';
            $nav[0][1] = 'auitlog'; $nav[1][1] = 'uitloggen.php'; $nav[2][1] = 'Uitloggen';
            $nav[0][2] = 'aplaatsen'; $nav[1][2] = 'plaatsen.php';
            $nav[2][2] = 'Bericht<span class="grey">_</span>plaatsen';
        } else {
            $nnav = 3;
            $nav[0][0] = 'auitlog'; $nav[1][0] = 'uitloggen.php'; $nav[2][0] = 'Uitloggen';
            $nav[0][1] = 'aplaatsen'; $nav[1][1] = 'plaatsen.php';
            $nav[2][1] = 'Bericht<span class="grey">_</span>plaatsen';
            $nav[0][2] = 'aprofiel'; $nav[1][2] = 'profiel.php';
            $nav[2][2] = 'Mijn<span class="grey">_</span>profiel';
//            if ($admin = "admin") {
//                $nav[0][3] = 'aadmin'; $nav[1][3] = 'admin.php'; $nav[2][3] = 'Admin';
//            }
        }
        break;
    case 'inlog':
        $nnav = 1;
        $nav[0][0] = 'ahome'; $nav[1][0] = 'index.php'; $nav[2][0] = 'Hoofdpagina';
        break;
    case 'plaatsen':
        $nnav = 3;
        $nav[0][0] = 'ahome'; $nav[1][0] = 'index.php'; $nav[2][0] = 'Hoofdpagina';
        $nav[0][1] = 'auitlog'; $nav[1][1] = 'uitloggen.php'; $nav[2][1] = 'Uitloggen';
        $nav[0][2] = 'aprofiel'; $nav[1][2] = 'profiel.php';
        $nav[2][2] = 'Mijn<span class="grey">_</span>profiel';
        break;
    case 'profiel':
        $nnav = 3;
        $nav[0][0] = 'ahome'; $nav[1][0] = 'index.php'; $nav[2][0] = 'Hoofdpagina';
        $nav[0][1] = 'auitlog'; $nav[1][1] = 'uitloggen.php'; $nav[2][1] = 'Uitloggen';
        $nav[0][2] = 'aplaatsen'; $nav[1][2] = 'plaatsen.php';
        $nav[2][2] = 'Bericht<span class="grey">_</span>plaatsen';
    }
?>


<nav>
    <div id="standaardknoppen">
        <ul>
        <?php
            for ($i = 0; $i < $nnav; $i++) {
                echo '<li><a id="' . $nav[0][$i] . '" href="' . $nav[1][$i] . '">' . $nav[2][$i] . '</a></li>';
                echo '<li class="grey">xxx</li><li class="grey">xxx</li>';
            }
        ?>
        </ul>
    </div>

    <?php
        if ($site == "index") {
        $filtertypeoud = (isset($_SESSION['filtertype']) ? $_SESSION['filtertype'] : "rubriek");
        $filtertypenieuw = (isset($_POST['filtertype']) ? $_POST['filtertype'] : $filtertypeoud);
//        phpAlert ("flttypeoud = $filtertypeoud, flttypenw = $filtertypenieuw");
        $filterstring = "";
        if (isset($_POST['filterresetknop']) || isset($_POST['zoekresetknop'])) {
            if (isset ($_SESSION['filterknop'])) {
                unset ($_SESSION['filterknop']);
                unsetsessiefilters("rubrieken");
            }
            $filterstring = "";
        }
    ?>
        <hr/>
        <p class="dgrey14"><u>Filter op:</u></p>
<!--        <form action="#" method="post">  -->
            <button class="px12" id="filterrubriek">Rubriek</button>
    <?php   if ($profielnaam == "") { ?>
                <button class="px12" id="filterauteur">Auteur</button>
    <?php   } ?>
            <input type="hidden" id="filtertype" value="rubriek">
<!--        </form>  -->
        <form id="filterform" action="#" method="post">

            <div id="filterenrubriek">
                <select multiple name="select_filterrubriek" id="select_filterrubriek">
                    <?php $filtrubr = fillrubrieken("filter", "#"); ?>
                </select>
            <?php schrijf_hiddenfilterrubrieken($filtrubr); ?>
            <?php $_SESSION['filtertype'] = $filtertypenieuw; ?>
            </div>
    <?php   if ($profielnaam == "") { ?>
                <div id="filterenauteur">
                    <select multiple name="select_filterrubriek" id="select_filterrubriek">
                        <?php $filtrubr = fillauteurs("filter", "#"); ?>
                    </select>
                <?php schrijf_hiddenfilterrubrieken($filtrubr); ?>
                <?php $_SESSION['filtertype'] = $filtertypenieuw; ?>
                </div>
    <?php   } ?>
            <input type=submit class="px12" id="filterknop" name="filterknop" value="Filter">
            <input type=submit class="px12" id="filterresetknop" name="filterresetknop" value="Reset">
<!--            <button class="px12" id="filterresetknop">Reset</button>  -->
        </form>
        <p class="dgrey12"><super>* </super><i>Meerdere keuzes mogelijk.</i></p>
    <?php } ?>
</nav>

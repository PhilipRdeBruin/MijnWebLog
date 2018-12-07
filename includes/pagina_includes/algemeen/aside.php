
<?php
    switch ($site) {
        case 'index':
//            phpAlert ("site, profiel, profielnaam = $site, $profiel, $profielnaam");
?>
            <aside>
                <form id="zoekfunctie"  action="#" method="post">

                    <div id="zoekterm">
                        <input type="text" id="zoekterm" name="zoekterm" value= "">
<!--                    <input type="submit" id="zoekknop" name="zoekknop" value="zoeken">  -->
                    </div>
                    <div id="loepbox">
                        <input type="image" id="loep" src="afbeeldingen/loep.png" alt="Zoek">
                    </div>
                    <div id="resetbox">
                        <input type="image" id="zoekreset" name="zoekreset" src="afbeeldingen/reset.png" alt="Reset">
                    </div>
                    <!-- <img id="loep" src="" alt=""> -->
                </form>
                <h4> </h4>
                <br/><br/><hr class="grey"/><br/>
        <?php   if ($profielnaam == "") { ?>
                    <h4>Hier algemene berichten</h4>
                    <img src="afbeeldingen/plaatje.png" alt="zomaar een foto">
                    <p>De bibliotheek biedt je computer- en taalcursussen, Internet, ZZP-werkplekken met gratis WIFI, cursus- en vergaderruimte, een digitaal spreekuur, lezingen en workshops, ondersteuning van onderwijs en leesgroepen. Lenen kan ook: tijdschriften, boeken, luisterboeken en dvd's te leen. Ook zijn er leuke, makkelijke boeken voor kinderen tot 12 jaar met leesproblemen. En...kinderen tot 18 jaar zijn gratis lid!</p>
        <?php   } else { ?>
                    <h4>Informatie over <?php echo $profielnaam; ?></h4>
                    <div id="profielfoto">
                        <img src="afbeeldingen/profielfotos/profielfoto<?php echo $profiel ?>.png" alt="profielfoto van <?php echo $profielnaam; ?>">
                    </div>
                    <div id="profielinfo">
                        <?php schrijf_profieldata($profiel); ?>
                    </div>
                    <div id="profielstatistieken">
                        <table>
                            <?php $ncommuit = fetch_aantalcomments($profiel); ?>
                            <tr><td>&nbsp;</td></tr>
                            <tr><td class="profiellabels">aantal berichten geplaatst:</td>
                            <td class="profieldata"><?php echo $aantalregels; ?></td></tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr><td class="profiellabels">aantal keer commentaar gegeven:</td>
                            <td class="profieldata"><?php echo $ncommuit; ?></td></tr>
                            <tr><td>&nbsp;</td></tr>
                            <tr><td class="profiellabels">aantal comments op eigen berichten:</td>
                            <td class="profieldata"><?php echo $ncommin; ?></td></tr>
                        </table>
                    </div>
        <?php   } ?>
                <br/><br/><hr class="grey"/><br/>
                <div id="profielextrainfo">
                    <h4>Iets over mezelf...</h4>
                    <p>
                        De bibliotheek biedt je computer- en taalcursussen, Internet, ZZP-werkplekken met gratis WIFI, cursus- en vergaderruimte, een digitaal spreekuur, lezingen en workshops, ondersteuning van onderwijs en leesgroepen. Lenen kan ook: tijdschriften, boeken, luisterboeken en dvd's te leen. Ook zijn er leuke, makkelijke boeken voor kinderen tot 12 jaar met leesproblemen. En...kinderen tot 18 jaar zijn gratis lid! De bibliotheek biedt je computer- en taalcursussen, Internet, ZZP-werkplekken met gratis WIFI, cursus- en vergaderruimte, een digitaal spreekuur, lezingen en workshops, ondersteuning van onderwijs en leesgroepen. Lenen kan ook: tijdschriften, boeken, luisterboeken en dvd's te leen. Ook zijn er leuke, makkelijke boeken voor kinderen tot 12 jaar met leesproblemen. En...kinderen tot 18 jaar zijn gratis lid!
                    </p>
                </div>
            </aside>
<?php
            break;
        case 'inlog': ?>
            <aside>
                <h4>Hier algemene berichten</h4>
                <img src="afbeeldingen/plaatje2.jpg" alt="zomaar een foto">
                <p>De bibliotheek biedt je computer- en taalcursussen, Internet, ZZP-werkplekken met gratis WIFI, cursus- en vergaderruimte, een digitaal spreekuur, lezingen en workshops, ondersteuning van onderwijs en leesgroepen. Lenen kan ook: tijdschriften, boeken, luisterboeken en dvd's te leen. Ook zijn er leuke, makkelijke boeken voor kinderen tot 12 jaar met leesproblemen. En...kinderen tot 18 jaar zijn gratis lid!</p>
            </aside>
<?php
            break;
        case 'plaatsen': ?>
            <aside>
                <h4>Hier algemene berichten</h4>
                <img src="afbeeldingen/plaatje3.png" alt="zomaar een foto">
                <p>De bibliotheek biedt je computer- en taalcursussen, Internet, ZZP-werkplekken met gratis WIFI, cursus- en vergaderruimte, een digitaal spreekuur, lezingen en workshops, ondersteuning van onderwijs en leesgroepen. Lenen kan ook: tijdschriften, boeken, luisterboeken en dvd's te leen. Ook zijn er leuke, makkelijke boeken voor kinderen tot 12 jaar met leesproblemen. En...kinderen tot 18 jaar zijn gratis lid!</p>
            </aside>
            <?php
            break;
        case 'profiel': ?>
            <aside>
                <img src="afbeeldingen/profielfoto.png" alt="Profiel foto">
                <h4>Over mij</h4>
                <p>De bibliotheek biedt je computer- en taalcursussen, Internet, ZZP-werkplekken met gratis WIFI, cursus- en vergaderruimte, een digitaal spreekuur, lezingen en workshops, ondersteuning van onderwijs en leesgroepen. Lenen kan ook: tijdschriften, boeken, luisterboeken en dvd's te leen. Ook zijn er leuke, makkelijke boeken voor kinderen tot 12 jaar met leesproblemen. En...kinderen tot 18 jaar zijn gratis lid!</p>
            </aside>
<?php
    }
?>

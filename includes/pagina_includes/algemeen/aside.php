
<?php
    switch ($site) {
        case 'index': ?>
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
                <h4>Hier algemene berichten</h4>
                <img src="afbeeldingen/plaatje.png" alt="zomaar een foto">
                <p>De bibliotheek biedt je computer- en taalcursussen, Internet, ZZP-werkplekken met gratis WIFI, cursus- en vergaderruimte, een digitaal spreekuur, lezingen en workshops, ondersteuning van onderwijs en leesgroepen. Lenen kan ook: tijdschriften, boeken, luisterboeken en dvd's te leen. Ook zijn er leuke, makkelijke boeken voor kinderen tot 12 jaar met leesproblemen. En...kinderen tot 18 jaar zijn gratis lid!</p>
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
    }
?>

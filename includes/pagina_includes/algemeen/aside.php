
<?php
    switch ($site) {
        case 'index': ?>
            <aside>
                <form id="zoekfunctie"  action="#" method="post">
                    <input required type="text" id="zoekveld" name="zoekveld" value= '<?php echo $zoektermen; ?>'>
                    <input type="submit" id="zoekknop" value="zoeken">                    
                    <!-- <img id="loep" src="" alt=""> -->
                </form>
                <br/><hr class="grey"/><br/>
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


<div class="berichten">
    <form id="berichtform" action="#" method="post">
        <h4><u>Nieuw bericht van <?php echo $naam;?></u></h4>
        <table>
            <tr><td width="250">Onderwerp: <super>*</super></td><td><input required type="text" id="onderwerp" name="onderwerp" value= '<?php echo $onderwerp; ?>'></td></tr>
            <tr><td>Rubriek: <super>*</super></td><td>
            <select name="rubriek" id="rubriek">
                <option value="leeg"></option>
                <?php $strsel = ($rubriek == "nieuwerubriek") ? " selected" : ""; ?>
                <option id="nieuwerubriek" <?php echo $strsel; ?>><super>*</super> <i>Nieuwe rubriek</i></option>
                <?php fillrubrieken("nieuwerubriek", $rubriek); ?>
            </select>
            </td></tr>
        <?php
//            if ($rubriek == "nieuwerubriek") {
                echo '<tr id="trnieuwerubriek"><td class="px14"><i>Voeg nieuwe rubriek toe:</i></td><td><input type="text" id="nieuwerubriekpost" name="nieuwerubriekpost" value= "' . $nieuwerubriek . '"></td></tr>';
//            }
         ?>
        </table>
    <?php
        if ($chkblock === true) {
            echo '<br/><p><u><i>vervang s.v.p. de rode en doorgehaalde woorden...</i></u></p>';
            echo '<div id="xwoorden">' . $berichtx . '</div>';
        }
    ?>
        <p><u>Bericht:</u> <super>*</super></p>
        <?php if ($berichtknop == "Plaats bericht") { $id = ""; } ?>
        <input type="hidden" name="id" value=" <?php echo $id; ?> ">
        <textarea id="bericht" name="bericht" rows="16" cols="80"><?php echo $bericht; ?></textarea><br/><br/>
        <input type="submit" id="berichtinp" value="<?php echo $berichtknop; ?>">
        <input type="hidden" id="berichtinphidden" value=" <?php echo $berichtknop; ?> ">
    </form>
    <br/>
    <p class="px12"><super>*</super>  <i>verplicht veld</i></p>
</div>

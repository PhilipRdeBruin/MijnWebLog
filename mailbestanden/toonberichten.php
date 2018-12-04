
<link rel = "stylesheet" href = "css/index.css">

<div class="berichten">
    <div class="overzichtheader">
        <table id="overzichtstabelheader">
            <tr>
                <th class = "<?php echo $header_rubr ?>" width="15%">Rubriek</th><th width="5%"><button id="sortrubriek" value=<?php echo $sortdir_rubr ?> onclick="sortfunctie('sortrubriek')"><?php echo $sortarrow_rubr ?></button></th>
                <th class = "<?php echo $header_schr ?>" width="15%">Auteur</th><th width="5%"><button id="sortauteur" value=<?php echo $sortdir_schr ?> onclick="sortfunctie('sortauteur')"><?php echo $sortarrow_schr ?></button></th>
                <th class = "<?php echo $header_ondw ?>" width="30.5%">Onderwerp</th><th width="5%"><button id="sortonderwerp" value=<?php echo $sortdir_ondw ?> onclick="sortfunctie('sortonderwerp')"><?php echo $sortarrow_ondw ?></button></th>
                <th class = "<?php echo $header_tijd ?>" id="pltsdatum" width="22.5%">Geplaatst</th><th width="5%"><button id="sortgeplaatst" value=<?php echo $sortdir_tijd ?> onclick="sortfunctie('sortgeplaatst')"><?php echo $sortarrow_tijd ?></button></th>
            </tr>
        </table>
    </div>

    <?php
        $filterstring = "";
        $sortkey = "geplaatst";
        $sortdir = "DESC";

        include 'includes/index/fetch_berichtendata.php';
    ?>

    <div class="overzicht">
        <?php include 'includes/index/schrijf_overzichtstabel.php'; ?>
    </div>
    <br/><hr/>

    <div class="artikelen">
        <?php include 'includes/index/schrijf_berichttabellen.php'; ?>
    </div>
</div>

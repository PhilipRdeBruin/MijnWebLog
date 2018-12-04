
<table id="overzichtstabel">
<?php
    if ($aantalregels != 0) {
        foreach ($result as $row) {
            if ($regelopmaak==1) { $regelopmaak = 2; } else { $regelopmaak = 1; }
            $ix = $row["id"];
?>
            <tr id="regel<?php echo $regelopmaak ?>">
                <td width="20%"><?php echo $rubr[$ix] ?></td>
                <td width="20%"><?php echo $nmkort[$ix] ?></td>
                <td width="35%"><?php echo $ondw[$ix] ?></td>
                <td width="25%"><?php echo $td[$ix] ?></td>
            </tr>
<?php
        }
    }
?>
</table>

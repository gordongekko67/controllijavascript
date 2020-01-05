<?php  require_once("../../config.php"); ?>

<?php 
if(isset($_GET['id'])){
    
        $cancellaRapporti = query("DELETE FROM rapporti WHERE id_rapporto = $_GET[id] ");
    conferma($cancellaRapporti);
    
    creaAvviso('Hai cancellato un rapporto');
    header('Location: ../../../public/admin/index.php?rapporti');
    }else{
    header('Location: ../../../public/admin/index.php?rapporti');
    
    }




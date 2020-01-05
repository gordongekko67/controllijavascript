<?php  require_once("../../config.php"); ?>

<?php 
if(isset($_GET['id'])){
    
        $cancellaCat = query("DELETE FROM categorie WHERE id_cat = $_GET[id] ");
    conferma($cancellaCat);
    
    creaAvviso('Hai cancellato una categoria');
    header('Location: ../../../public/admin/index.php?categorie-admin');
    }else{
    header('Location: ../../../public/admin/index.php?categorie-admin');
    
    }




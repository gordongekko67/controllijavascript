<?php require_once("../risorse/config.php"); ?>
<?php require_once('carrello.php'); ?>
<?php  include(FRONT_END . DS . 'header.php'); ?>

<div class="container">

<h2 class="display-4 mt-5">Grazie per l'acquisto</h2>

<?php 

transazioni();

// if(isset($_GET['tx'])){

//     $prezzo = $_GET['amt'];
//     $valuta = $_GET['cc'];
//     $transazione = $_GET['tx'];
//     $stato = $_GET['st'];

//     $invioOrdine = query("INSERT INTO ordini (importo_ordine , num_ordine , status_ordine , cur_ordine) VALUES ('{$prezzo}' ,  '{$valuta}' , '{$transazione}' , '{$stato}' ) ");
//     conferma($invioOrdine);

//     session_destroy();
// }else{
//     header('Location:index.php');
// }

?>

</div>


 <!-- Footer -->
 <?php  include(FRONT_END . DS . 'footer.php'); ?>
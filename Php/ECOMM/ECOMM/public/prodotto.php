<?php require_once("../risorse/config.php"); ?>
<?php  include(FRONT_END . DS . 'header.php'); ?>

    <!-- Page Content -->
    <div class="container my-5">
    <div class="row">
    <div class="col-lg-3">
      <?php  include(FRONT_END . DS . 'sidebar.php'); ?>
</div>


<?php 
$pdtSingolo = query("SELECT * FROM prodotti WHERE id_prodotto = {$_GET['id']}");
conferma($pdtSingolo);

while($row = fetch_array($pdtSingolo)):

?>
<div class="col-lg-9">
    
          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="../risorse/immagini/<?php  echo $row['immagine']; ?>" alt="">
            <div class="card-body">
              <h3 class="card-title text-center mb-5"><?php  echo $row['nome_prodotto']; ?></h3>
              <h4 class="mb-5">€<?php  echo $row['prezzo']; ?></h4>
              <h5>Info</h5>
              <p class="card-text"><?php  echo $row['descr_prodotto']; ?></p>
             <a href="carrello.php?add=<?php echo $row['id_prodotto']; ?>"><button type="button" class="btn bg-primary btn-small btn-block">Acquista</button></a>
            </div>
          </div>
          <!-- /.card -->

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Descrizione dettagliata
            </div>
            <div class="card-body">
              <p><?php  echo $row['info_dettagliate']; ?></p>
             
            </div>
          </div>
          <!-- /.card -->
         
        </div>
        <!-- /.col-lg-9 -->
        <?php endwhile ?>
</div>
 </div>
  

    <!-- Footer -->
    <?php  include(FRONT_END . DS . 'footer.php'); ?>

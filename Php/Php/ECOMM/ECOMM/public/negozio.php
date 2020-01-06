<?php require_once("../risorse/config.php"); ?>
<?php  include(FRONT_END . DS . 'header.php'); ?>

<!-- Page Content -->
<div class="container my-5">

  <!-- Jumbotron Header -->
  <header class="jumbotron my-4">

    <h1 class="display-3 text-center">Benvenuto nel mio negozio</h1>

    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>

  </header>

  <!-- Page Features -->

  <h3 class="display-4">Catalogo</h3>
  <div class="row">
    <?php  catalogoProdotti(); ?>

    <!-- <div class="col-lg-3 col-md-6 mb-4">
    <div class="card altezza">
    <img class="card-img-top" src="http://placehold.it/500x325" alt="">
    <div class="card-body">
    <h4 class="card-title">Nome Prodotto</h4>
    <h5>€30</h5>
    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
  </div>
  <div class="card-footer">
  <a href="#" class="btn btn-success btn-small">Acquista</a> <a href="#" class="btn btn-info btn-small">Dettagli</a>
</div>
</div>
</div>  -->

</div>
<!-- /.row -->

</div>
<!-- /.container -->


<?php

?>
<!-- Footer -->
<?php  include(FRONT_END . DS . 'footer.php'); ?>

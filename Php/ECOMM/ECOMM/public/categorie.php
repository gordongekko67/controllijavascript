<?php require_once("../risorse/config.php"); ?>
<?php  include(FRONT_END . DS . 'header.php'); ?>
<!?php  include(FRONT_END . DS . 'sidebar.php'); ?>


<?php
// prendo l'id dal programma
$id = $_GET['id'];


	$ricercaCategoria = query("SELECT *FROM  Categorie WHERE id_cat = '$id'");
	conferma($ricercaCategoria);

	while($row = fetch_array($ricercaCategoria)){

			$categorie = <<<STRINGA_CAT

			<!-- Page Content -->
			<div class="container my-5">

			<!-- Jumbotron Header -->
			<header class="jumbotron my-4">
			<h1 class="display-3">{$row['nome_cat']}</h1>
			<p class="lead">{$row['descr_cat']}</p>
			<a href="#" class="btn btn-primary btn-lg">Acquista!</a>
			</header>
			<!-- Page Features -->
			<div class="row text-center">
STRINGA_CAT;
echo $categorie;


	}


$ricercaArticoli = query("SELECT *FROM  Prodotti WHERE cat_prodotto = '$id'");
	conferma($ricercaArticoli);

	while($row = fetch_array($ricercaArticoli)){

			$nomeProdotto = $row['nome_prodotto'];
			$descProdotto = $row['descr_prodotto'];

			$prodotto = <<<STRINGA_PRO
			<div class="col-lg-3 col-md-6 mb-4">
			<div class="card altezza">
            <img class="card-img-top" src="../risorse/immagini/{$row['immagine']}" alt="">
			<div class="card-body">
              <h4 class="card-title">{$row['nome_prodotto']}</h4>
              <p class="card-text">{$row['descr_prodotto']}</p>
            </div>
            <div class="card-footer">
              <a href="carrello.php?add={$row['id_prodotto']}"><button type="button" class="btn btn-primary btn-sm">Acquista</button></a>
			  <a href="prodotto.php?id={$row['id_prodotto']}" class="btn btn-success btn-sm">Dettagli</a>
            </div>
          </div>
        </div>


STRINGA_PRO;
echo $prodotto;


	}



?>




      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->


    <?php  include(FRONT_END . DS . 'footer.php'); ?>

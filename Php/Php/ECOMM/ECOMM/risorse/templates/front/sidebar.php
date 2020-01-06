
<form method="post" action="ricerca.php">
<div class="input-group">
<input type="text" class="form-control" placeholder="ricerca" name="ricerca">
<span class="input-group-btn">
  <button class="btn btn-primary" type="submit" name="invia_ricerca"><i class="material-icons">search</i></button>
</span>
</div>
  </form>

          <h1 class="my-5">Categorie</h1>
          <div class="list-group mb-5">
<?php 

mostraCategorie();

// $query = 'SELECT * FROM categorie';

// $mostraCategorie = mysqli_query($connessione , $query);

// if(!$mostraCategorie){
// die('Richiesta fallita' . mysqli_error($connessione));
// }

// while($row = mysqli_fetch_array($mostraCategorie)){

//   echo  " <a href='#' class='list-group-item'>{$row['nome_cat']}</a>";

// }

?>
            <!-- <a href="#" class="list-group-item">Categoria 1</a>
            <a href="#" class="list-group-item">Categoria 2</a>
            <a href="#" class="list-group-item">Categoria 3</a> -->
          </div>

     
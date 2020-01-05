
<?php

//FUNZIONI  DI UTILITA' GENERALE

//stabilisci un percorso per i tuoi uploads
$cartellaImg = "immagini";

//crea una funzione per le operazioni CRUD sul DB
function query($sql){
global $connessione;
return mysqli_query($connessione , $sql);
}

//crea una funzione per la gestione degli errori di connessione
function conferma($risultato){
    global $connessione;
    if(!$risultato){
        die('Richiesta fallita' . mysqli_error($connessione));
        }
}

//crea una funzione per ciclare l'array e ricavare dati dal DB
function fetch_array($risultato){
    return mysqli_fetch_array($risultato);
}

//crea una funzione per la gestione dei messaggi
function creaAvviso($msg){
if(!empty($msg)){
  $_SESSION['messaggio'] = $msg;
}else{
  $msg = " ";
}
}

//crea una funzione per  mostrare un messaggio all'interno di una pagina
function mostraAvviso(){
if(isset($_SESSION['messaggio'])){
echo $_SESSION['messaggio'];
unset ($_SESSION['messaggio']);
}
}

//crea una funzione per ricavare e mostare il risultato dell'ultima sessione avviata
function idUltimo(){
global $connessione;
  return mysqli_insert_id($connessione);
}


//crea una funzione per gestire il percorso della cartella delle immagini
function mostraImg($imgProdotto){
  global $cartellaImg;
 return $cartellaImg . DS . $imgProdotto;
}


//FUNZIONI DEL FRONTEND

//crea una funzione per mostrare i prodotti nelll'home del negozio (pagina index.php)
function mostraProdotti(){
$ricercaProdotti = query('SELECT * FROM prodotti LIMIT 3');

conferma($ricercaProdotti);

while ($row = fetch_array($ricercaProdotti)){
    //echo $row['nome_prodotto'];

    $prodotti = <<<STRINGA_PDT

    <div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100">
    <img class="card-img-top" src="../risorse/immagini/{$row['immagine']}" alt="">
      <div class="card-body">
        <h4 class="card-title">
          <a href="prodotto.php?id={$row['id_prodotto']}">{$row['nome_prodotto']}</a>
        </h4>
        <h5>€{$row['prezzo']}</h5>
        <p class="card-text">{$row['descr_prodotto']}</p>
      </div>
      <div class="card-footer text-center">
     <a href="carrello.php?add={$row['id_prodotto']}"><button type="button" class="btn btn-primary btn-small">Acquista</button></a>
     <a href="prodotto.php?id={$row['id_prodotto']}" class="btn btn-success btn-small">Dettagli</a>
      </div>
    </div>
  </div>
STRINGA_PDT;
echo $prodotti;
}
}

//crea una funzione per mostrare l'elenco delle categorie (pagina sidebar.php)
function mostraCategorie(){

  $ricercaCategorie = query('SELECT * FROM categorie');
  conferma($ricercaCategorie);

  while($row = fetch_array($ricercaCategorie)){

$categorie = <<<STRINGA_CAT

<a href='categorie.php?id={$row['id_cat']}' class='list-group-item'>{$row['nome_cat']}</a>

STRINGA_CAT;

echo $categorie;
}
}

//crea una funzione  per mostrare prodotti associati ad una categoria (pagina categorie.php)
function paginaCategoria(){
$pdtCategoria = query("SELECT * FROM prodotti WHERE cat_prodotto = {$_GET['id']}");
conferma($pdtCategoria);

while($row = fetch_array($pdtCategoria)){

$pdtSingolaCat = <<<STRINGA_PDT

<div class="col-lg-3 col-md-6 mb-4">
<div class="card altezza">
  <img class="card-img-top" src="../risorse/immagini/{$row['immagine']}" alt="">
  <div class="card-body">
    <h4 class="card-title">{$row['nome_prodotto']}</h4>
    <p class="card-text">{$row['descr_prodotto']}</p>
  </div>
  <div class="card-footer text-center">
    <a href="carrello.php?add={$row['id_prodotto']}" class="btn btn-success btn-small">Acquista</a>
     <a href="prodotto.php?id={$row['id_prodotto']}" class="btn btn-info btn-small">Dettagli</a>
  </div>
</div>
</div>

STRINGA_PDT;
echo $pdtSingolaCat;

}
}

//crea una funzione per mostrare il nome e la didascalia di una categoria selezionata (pagina categorie.php)
function mostra_nome_cat(){
$nomeCategoria = query("SELECT nome_cat , didascalia FROM categorie WHERE id_cat = {$_GET['id']} ");

while($row= fetch_array($nomeCategoria)){

$mostra_nome_cat = <<<STRINGA
<h4 class="text-center">Benvenuto nella sezione del genere:</h4>
<h2 class="display-3 text-center">{$row['nome_cat']}</h2> 
<p class="lead">{$row['didascalia']} </p> 

STRINGA;
echo $mostra_nome_cat;
}
}

//crea una funzione per mostrare tutti i prodotti in una pagina (pagina negozio.php)
function catalogoProdotti(){
$catalogo = query("SELECT * FROM prodotti");
conferma($catalogo);

while($row = fetch_array($catalogo)){

  $shopCatalogo = <<<CATALOGO
  <div class="col-lg-3 col-md-6 mb-4">
  <div class="card altezza">
  <img class="card-img-top" src="../risorse/immagini/{$row['immagine']}" alt="">
  <div class="card-body">
    <h4 class="card-title">{$row['nome_prodotto']}</h4>
    <h5>€{$row['prezzo']}</h5>
    <p class="card-text">{$row['descr_prodotto']}</p>
  </div>
  <div class="card-footer text-center">
    <a href="carrello.php?add={$row['id_prodotto']}" class="btn btn-success btn-small">Acquista</a> 
    <a href="prodotto.php?id={$row['id_prodotto']}" class="btn btn-info btn-small">Dettagli</a>
  </div>
</div>
</div>

CATALOGO;
echo $shopCatalogo;
}
}

//crea una funzione per un modulo di  ricerca (pagina ricerca.php)
function ricerca(){
  if(isset($_POST['invia_ricerca'])){
  
  $ricercaUtente = $_POST['ricerca'];
  //echo $ricercaUtente;
  
  $ricerca = query("SELECT * FROM prodotti WHERE nome_prodotto  LIKE  '%$ricercaUtente%' ");
  conferma($ricerca);
  }
  $risultatoRicerca = mysqli_num_rows($ricerca);
  if($risultatoRicerca == 0){
  
    echo "Non ci sono prodotti";
  }else{
    //echo "E' stato trovato un prodotto";
  
  while($row = fetch_array($ricerca)){
  
  $mostraRicerca = <<<STRINGA
  <div class="card mt-4">
  <img class="card-img-top img-fluid" src="../risorse/immagini/{$row['immagine']} " alt="">
  <div class="card-body">
    <h3 class="card-title text-center mb-5">{$row['nome_prodotto']}</h3>
    <h4 class="mb-5">€{$row['prezzo']}</h4>
    <h5>Info</h5>
    <p class="card-text">{$row['descr_prodotto']}</p>
    <button type="button" class="btn bg-primary btn-small btn-block">Acquista</button>
  </div>
  </div>
  <div class="card card-outline-secondary my-4">
  <div class="card-header">
    Descrizione dettagliata
  </div>
  <div class="card-body">
    <p>{$row['info_dettagliate']}</p>
  </div>
  </div>
  
STRINGA;
  
  echo $mostraRicerca;
  
  }
  }
  }
  
  //crea una funzione per la gestione dell'ingresso riservato all'area amministrativa (pagina login.php e logout.php)
  function login(){
   if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  $query = query("SELECT * FROM utenti WHERE username = '{$username}'  AND password = '{$password}' ");
  conferma($query);
  
  if(mysqli_num_rows($query) == 0){
  
    creaAvviso('I dati di login sono errati');
    header('Location: login.php');
  }else{
  
    $_SESSION['username'] = $username ;
    header('Location: admin');
  }
    }
  }
  

//FUNZIONI DEL BACKEND

//crea una funzione per mostrare tutti i prodotti in una tabella
function prodottiAdmin(){
$mostraPdt = query("SELECT * FROM prodotti");
conferma($mostraPdt);

while($row = fetch_array($mostraPdt)){
  $cercaCategoria = titoloCat($row['cat_prodotto']);

$pdt_in_admin = <<< STRINGA

<tr>
<td>{$row['id_prodotto']}</td>
<td>{$row['nome_prodotto']}</td>
 <td><img src="../../risorse/immagini/{$row['immagine']}" alt="" style="width:25%"></td>
<td>{$cercaCategoria}</td>
<td>€{$row['prezzo']}</td>
<td>{$row['quantita_pdt']}</td>
<td><a class="btn btn-primary" href="index.php?aggiorna-pdt&id={$row['id_prodotto']}" role="button">Modifica</a>
<td><a class="btn btn-danger" href="../../risorse/templates/back/cancella-pdt.php?id={$row['id_prodotto']}" role="button">Cancella</a> </td>
</tr>

STRINGA;
echo  $pdt_in_admin;
}
}

//crea una funzione per  mostrare  il titolo della categoria del prodotto selezionato
function titoloCat($catPdt){
  $titoloCat = query("SELECT * FROM categorie WHERE id_cat= '{$catPdt}' ");
  conferma($titoloCat);
  while($row = fetch_array($titoloCat)){
  return $row['nome_cat'];
  }
  }

  //crea una funzione per aggiungere nuovi prodotti tramite un form
function aggiungiPdt(){
if(isset($_POST['aggiungi'])){

  $nomePdt = $_POST['nome_pdt'];
  $catPdt = $_POST['categoria_pdt'];
  $dettagli = $_POST['dettagli'];
  $infoBreve = $_POST['desc_breve'];
  $prezzo = $_POST['prezzo'];
  $quantitaPdt = $_POST['quantita_pdt'];
  $immaginePdt = $_FILES['immagine']['name'];
  $immagineTemp = $_FILES['immagine']['tmp_name'];

  move_uploaded_file($immagineTemp , IMG_UPLOADS . DS . $immaginePdt);

  $nuovoPdt = query("INSERT INTO prodotti(nome_prodotto , cat_prodotto , info_dettagliate , descr_prodotto , prezzo , quantita_pdt , immagine) VALUES('{$nomePdt}' , '{$catPdt}' , '{$dettagli}' , '{$infoBreve}' , '{$prezzo}' , '{$quantitaPdt}' , '{$immaginePdt}')");
  conferma($nuovoPdt);
  creaAvviso('hai aggiunto correttamente un prodotto');
  header('Location:index.php?prodotti-admin');

}
}

//crea una funzione per mostrare e selezionare la categoria del prodotto 
function mostra_cat_prodotto(){
$query = query("SELECT * FROM categorie");
conferma($query);

while($row =fetch_array($query)){

  $cat_prodotto = <<<STRINGA
  <option value="{$row['id_cat']}">{$row['nome_cat']}</option>
STRINGA;
echo $cat_prodotto;

}
}

//crea una funzione per modificare prodotti esistenti richiamandoli in un form
function aggiornaProdotto(){
if(isset($_POST['aggiorna'])){

  $nomePdt = $_POST['nome_pdt'];
  $catPdt = $_POST['categoria_pdt'];
  $dettagli = $_POST['dettagli'];
  $infoBreve = $_POST['desc_breve'];
  $prezzo = $_POST['prezzo'];
  $quantitaPdt = $_POST['quantita_pdt'];
  $immaginePdt = $_FILES['immagine']['name'];
  $immagineTemp = $_FILES['immagine']['tmp_name'];

  if(empty($immaginePdt)){

    $cercaImg = query("SELECT immagine FROM prodotti WHERE  id_prodotto = {$_GET['id']} ");
    conferma($cercaImg);

    while($img = fetch_array($cercaImg)){
$immaginePdt = $img['immagine'];
    }
  }

  move_uploaded_file($immagineTemp , IMG_UPLOADS . DS . $immaginePdt);

$update = query("UPDATE prodotti SET nome_prodotto = '{$nomePdt}' , cat_prodotto =  '{$catPdt}' , info_dettagliate =  '{$dettagli}' , descr_prodotto =  '{$infoBreve}' , prezzo =  '{$prezzo}' , quantita_pdt =  '{$quantitaPdt}' , immagine =  '{$immaginePdt}' WHERE  id_prodotto = {$_GET['id']}");

conferma($update);

creaAvviso('hai modificato correttamente un prodotto');
header('Location:index.php?prodotti-admin');

}
}

//crea una funzione per mostrare le categorie nel lato amministrativo
function categorie_admin(){
$catMostra = query("SELECT * FROM categorie");
conferma($catMostra);

while($row = fetch_array($catMostra)){

  $catId = $row['id_cat'];
  $catTitolo = $row['nome_cat'];

$cat_admin = <<<STRINGA
<tr>

<td>{$catId}</td>
<td>{$catTitolo} <br>

 <td><a class="btn btn-danger" href="../../risorse/templates/back/cancella-cat.php?id={$row['id_cat']}" role="button">Cancella</a> </td>
</tr>

STRINGA;

echo $cat_admin;
}
}

//crea una funzione per aggiungere nuove categorie
function aggiungi_cat_admin(){
  if(isset($_POST['aggiungi_cat'])){
   $nomeCat = $_POST['cat_nome'];
if(empty($nomeCat) || $nomeCat == " "){
echo 'Questo campo non può essere vuoto';
}else{

    $nuovaCat = query("INSERT INTO categorie(nome_cat) VALUES('{$nomeCat}')");
    conferma($nuovaCat);
    creaAvviso('hai aggiunto una categoria');

  }
  }
}

//crea una funzione per mostrare e cancellare gli ordini nel lato amministrativo
function ordini(){
  $ordiniMostra = query("SELECT * FROM ordini");
  conferma($ordiniMostra);

  while($row = fetch_array($ordiniMostra)){

    $ordineId = $row['id_ordine'];
    $importoOrdine = $row['importo_ordine'];
    $numeroOrdine = $row['num_ordine'];
    $statusOrdine = $row['status_ordine'];

    $ordine_admin = <<<STRINGA
    <tr>
    <td>{$ordineId}</td>
    <td>{$importoOrdine}</td>
    <td>{$numeroOrdine}</td>
    <td>{$statusOrdine}</td>
    <td><a class="btn btn-danger" href="../../risorse/templates/back/cancella-ordini.php?id={$row['id_ordine']}" role="button">Cancella</a> </td>
</tr>

STRINGA;

  echo $ordine_admin;
  }
  }

//crea una funzione per mostrare e cancellare i rapporti nel lato amministrativo
  function rapporti(){
    $rapportiMostra = query("SELECT * FROM rapporti");
    conferma($rapportiMostra);

    while($row = fetch_array($rapportiMostra)){

      $rapportoId = $row['id_rapporto'];
      $idProdotto = $row['id_prodotto'];
      $idOrdine = $row['id_ordine'];
      $nomeProdotto = $row['nome_prodotto'];
      $prezzoOrdine = $row['prezzo'];
      $quantita = $row['quantita_pdt'];

      $rapporti_admin = <<<STRINGA
      <tr>
      <td>{$rapportoId}</td>
      <td>{$idProdotto} </td>
      <td>{$idOrdine}</td>
      <td>{$nomeProdotto}</td>
      <td>{$prezzoOrdine}</td>
      <td>{$quantita}</td>
      <td><a class="btn btn-danger" href="../../risorse/templates/back/cancella-rapporti.php?id={$row['id_rapporto']}" role="button">Cancella</a> </td>
  </tr>

STRINGA;

    echo $rapporti_admin;
    }
    }



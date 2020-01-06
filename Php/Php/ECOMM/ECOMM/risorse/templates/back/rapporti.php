<div class="row">
<h3 class="mt-5">
Rapporti</h3>
<h4 class="bg-success"><?php mostraAvviso(); ?></h4>
<table class="table table-bordered">
  <thead>
    <tr>
         <th>Id</th>
         <th>Id Prodotto</th>
         <th>Id Ordine</th>
         <th>Nome Prodotto</th>
         <th>Prezzo</th>
         <th>Quantità</th>
         
    </tr>
  </thead>
  <tbody>

  <?php rapporti();  ?>
    <!-- <tr>
          <td>20</td>
          <td>Nikon 234 </td>
          <td>Categoria</td>
          <td>€123</td>
          <td>€123</td>
          <td>€123</td>
          <td><a class="btn btn-danger" href="../../risorse/templates/back/cancella-cat.php?id={$row['id_cat']}" role="button">Cancella</a> </td>
      </tr>  -->
   
</tbody>
</table>
</div>
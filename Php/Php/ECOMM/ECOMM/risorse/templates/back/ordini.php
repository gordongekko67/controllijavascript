<div class="row">
<h3 class="mt-5">Tutti gli ordini</h3>
<h4 class="bg-success"><?php mostraAvviso(); ?></h4>
<table class="table table-bordered">
  <thead>
    <tr>
         <th>Id</th>
         <th>Importo</th>
         <th>Numero Ordine</th>
         <th>Status</th>
         
    </tr>
  </thead>
  <tbody>

  <?php  ordini();  ?>
  <!-- <tr>
          <td>20</td>
          <td>Nikon 234 </td>
          <td>Categoria</td>
          <td>€123</td>
          <td><a class="btn btn-danger" href="#" role="button">Cancella</a> </td>
      </tr>    -->
   
</tbody>
</table>
</div>
<?php 
include "Vistas/Estaticos/header.php";
 ?>
 
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Articulos</li>
</ol>
<button class="btn btn-primary mb-2" onclick="frmArticulos();"><i class="fas fa-plus"></i> </button>
 
 


<table class="table table-light tblArticulo" id="tblArticulos">
<thead class="thead-dark" >
<tr>

<th>ID</th> 
<th>Nombre</th>
<th>Stock</th>
<th>Precio</th>
<th>Procedencia</th>
 

</tr>
</thead>
<tbody>
</tbody>
</table>

<div id="nueva_articulos" class="modal fade" tabindex="1" role="dialog" arial-labelledby="my-modal-title">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<h5 class="modal-title text-white" id ="title">Nuevo Articulo</h5>
<button class="close" data-dismiss="modal" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
</div>


<div class="modal-body">
<form method="post" id="frmArticulos">

<div class="form-group">
<label for="nombre">Nombre</label>
<input type="hidden" id ="id" name="id">
<input type="text" id="nombre" class="form-control"   name="nombre" placeholder="Ingrese el nombre">


<label for="nombre">Stock</label>
<input type="text" id="stock" class="form-control"   name="stock" placeholder="Ingrese el stock">

<label for="nombre">Precio</label>
<input type="number" id="precio" class="form-control"   name="precio" placeholder="Ingrese el precio">
</div>
 
<div class="form-group">
<label for="">Procedencia</label>
<select name="procedencia" id="procedencia" class="form-control">
 
<?php foreach($data['Procedencia'] as $row) { ?>
<option value="<?php echo $row['id_procedencia'];?>" > <?php echo $row['nombre_procedencia'];?></option>

<?php } ?>
</select>
 

</div>

<div class="form-group">
<button class="btn btn-primary" id ="btnAccion" type="submit" onclick= "registrarArticulos(event);">Registrar</button>
<button class="btn btn-danger" data-dismiss="modal">cancelar</button>
</form>
</div>
 
</div>
</div>
</div>
 
<?php
include "Vistas/Estaticos/footer.php";
?>

 
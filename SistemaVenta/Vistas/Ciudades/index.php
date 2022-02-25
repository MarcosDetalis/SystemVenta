<?php 
include "Vistas/Estaticos/header.php";
 ?>
 
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Ciudades</li>
</ol>
<button class="btn btn-primary mb-2" onclick="frmCiudad();"><i class="fas fa-plus"></i> </button>
 
<table class="table table-light" id="tblCiudad">
<thead class="thead-dark" >
<tr>

<th>ID</th> 
<th>Ciudad</th>
<th></th>

</tr>
</thead>
<tbody>
</tbody>
</table>

<div id="nueva_ciudad" class="modal fade" tabindex="1" role="dialog" arial-labelledby="my-modal-title">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<h5 class="modal-title text-white" id ="title">Nueva Ciudad</h5>
<button class="close" data-dismiss="modal" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
</div>


<div class="modal-body">
<form method="post" id="frmCiudad">

<div class="form-group">

<label for="nombre">Ciudad</label>
<input type="hidden" id ="id" name="id">
<input type="text" id="nombre" class="form-control"   name="nombre" placeholder="Ingrese el nombre de la ciudad">
</div>
 

<div class="form-group">
<button class="btn btn-primary" id ="btnAccion" type="submit" onclick= "registrarCiudad(event);">Registrar</button>
<button class="btn btn-danger" data-dismiss="modal">cancelar</button>
</form>
</div>
 
</div>
</div>
</div>
 
<?php
include "Vistas/Estaticos/footer.php";
?>

 
<?php 
include "Vistas/Estaticos/header.php";
 ?>
 
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Tipo de Compras</li>
</ol>
<button class="btn btn-primary mb-2" onclick="frmTipoCompra();"><i class="fas fa-plus"></i> </button>
 
<table class="table table-light" id="tblTipoCompra">
<thead class="thead-dark" >
<tr>

<th>ID</th> 
<th>Tipo de Compras</th>
<th></th>

</tr>
</thead>
<tbody>
</tbody>
</table>

<div id="nuevo_tipocompra" class="modal fade" tabindex="1" role="dialog" arial-labelledby="my-modal-title">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<h5 class="modal-title text-white" id ="title">Nuevo tipo de compras</h5>
<button class="close" data-dismiss="modal" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
</div>


<div class="modal-body">
<form method="post" id="frmTipoCompra">

<div class="form-group">

<label for="nombre">Tipo de Compra</label>
<input type="hidden" id ="id" name="id">
<input type="text" id="nombre" class="form-control"   name="nombre" placeholder="Ingrese el tipo de compra">
</div>
 

<div class="form-group">
<button class="btn btn-primary" id ="btnAccion" type="submit" onclick= "registrarTipoCompra(event);">Registrar</button>
<button class="btn btn-danger" data-dismiss="modal">cancelar</button>
</form>
</div>
 
</div>
</div>
</div>
 
<?php
include "Vistas/Estaticos/footer.php";
?>

 
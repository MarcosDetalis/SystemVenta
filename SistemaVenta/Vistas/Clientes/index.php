<?php 
include "Vistas/Estaticos/header.php";
 ?>
 
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Clientes</li>
</ol>
<button class="btn btn-primary mb-2" onclick="frmCliente();"><i class="fas fa-plus"></i> </button>
 
<table class="table table-light" id="tblClientes">
<thead class="thead-dark" >
<tr>
<th>ID</th> 
<th>Ruc</th>
<th>Nombre</th>
<th>Telefono</th>
<th>Dirección</th>
<th>Ciudad</th>
<th>Estado</th>
<th></th>
</tr>
</thead>
<tbody>
</tbody>
</table>

<div id="nuevo_cliente" class="modal fade" tabindex="1" role="dialog" arial-labelledby="my-modal-title">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<h5 class="modal-title text-white" id ="title">Nuevo Cliente</h5>
<button class="close" data-dismiss="modal" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
</div>


<div class="modal-body">
<form method="post" id="frmCliente">
<div class="row">

<div class="col-md-6">


<div class="form-group">
<label for="nombre">Nombre</label>
<input type="hidden" id ="id" name="id">
<input type="text" id="nombre" class="form-control"   name="nombre" placeholder="Ingrese el nombre">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="apellido">Apellido</label>
<input type="text" id="apellido" class="form-control"   name="apellido" placeholder="Ingrese el apellido">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="ruc">Ruc</label>
<input type="text" id="ruc" class="form-control"   name="ruc" placeholder="Ingrese el ruc">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="telefono">Telefono</label>
<input type="text" id="telefono" class="form-control"   name="telefono" placeholder="Ingrese el telefono">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="direccion">Direccion</label>
<textarea id="direccion" class="form-control" name="direccion" rows="3"> </textarea>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="">Ciudades</label>
<select name="ciudad_cli" id="ciudad_cli" class="form-control">
<?php foreach($data['Ciudad'] as $row) { ?>
<option value="<?php echo $row['id_ciudad'];?>" > <?php echo $row['nombre_ciudad'];?></option>
<?php } ?>
</select>
</div>
</div>
</div>


<div class="form-group">
<div>
<button class="btn btn-primary" id ="btnAccion" type="submit" onclick= "registrarCli(event);">Registrar</button>
<button class="btn btn-danger" data-dismiss="modal">cancelar</button>
</form>
</div>
</div>


</div>
</div>
</div>
</div>
 
<?php
include "Vistas/Estaticos/footer.php";
?>

 
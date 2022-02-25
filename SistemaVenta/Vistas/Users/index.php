<?php 
include "Vistas/Estaticos/header.php";
 ?>



<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Vendedores</li>
</ol>
<button class="btn btn-primary mb-2" onclick="frmUsuario();"><i class="fas fa-plus"></i> </button>
 
<table class="table table-light" id="tblusuarios">
<thead class="thead-dark" >
<tr>

<th>ID</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Telefono</th>
<th>Nombre de documento</th>
<th>Estado</th>


</tr>
</thead>

<tbody>

</tbody>
</table>
<div id="nuevo_usuario" class="modal fade" tabindex="1" role="dialog" arial-labelledby="my-modal-title">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<h5 class="modal-title text-white" id ="title">Nuevo Usuario</h5>
<button class="close" data-dismiss="modal" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
</div>

<div class="modal-body">

<form method="post" id="frmUsuario">




<div  class="row"> 
<div class="col-md-6">

<div class="form-group">
<label for="usuario">Nombre</label>
<input type="hidden" id ="id" name="id">
<input type="text" id="usuario" class="form-control"   name="usuario" placeholder="Nombre">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="apellido">Apellido</label>
<input type="text" id="apellido" class="form-control"   name="apellido" placeholder="Apellido">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="ci">Ci</label>
<input type="text" id="ci" class="form-control"   name="ci" placeholder="Ci">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="telefono">Telefono</label>
<input type="text" id="telefono" class="form-control"   name="telefono" placeholder="telefono">
</div>
</div>
</div>

<div class="form-group">
<label for="direccion">Direccion</label>
<textarea id="direccion" class="form-control" name="direccion" rows="3"> </textarea>
</div>


<div  class="row" id="claves"> 
<div class="col-md-6">
<div class="form-group">
<label for="clave">Contraseña</label>
<input type="password" id="clave" class="form-control"   name="clave" placeholder="Contraseña">
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="confirmar">Confirmar contraseña</label>
<input type="password" id="confirmar" class="form-control"   name="confirmar" placeholder="Confirmar contraseña">
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
 
</div>
<button class="btn btn-primary" id ="btnAccion" type="submit" onclick= "registrarUser(event);">Registrar</button>
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
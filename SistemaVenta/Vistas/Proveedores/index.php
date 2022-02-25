<?php 
include "Vistas/Estaticos/header.php";
 ?>
 
<ol class="breadcrumb mb-4">
<li class="breadcrumb-item active">Proveedores</li>
</ol>
<button class="btn btn-primary mb-2" onclick="frmProveedores();"><i class="fas fa-plus"></i> </button>
 
<table class="table table-light" id="tblproveedores">
<thead class="thead-dark" >
<tr>

<th>ID</th> 
<th>Proveedor</th>
<th>Ruc</th>
<th>Telefono</th>
<th>Direccion</th>
<th>Ciudad</th>

</tr>
</thead>
<tbody>
</tbody>
</table>

<div id="nuevo_Proveedores" class="modal fade" tabindex="1" role="dialog" arial-labelledby="my-modal-title">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header bg-primary">
<h5 class="modal-title text-white" id ="title">Nuevo tipo de compras</h5>
<button class="close" data-dismiss="modal" aria-label="close">
<span aria-hidden="true">&times;</span>
</button>
</div>


<div class="modal-body">
<form method="post" id="frmProveedores">

<div class="form-group">


<label for="nombre">Proveedores</label>
<input type="hidden" id ="id" name="id">
<input type="text" id="nombre" class="form-control"   name="nombre" placeholder="Ingrese el proveedor">


<label for="ruc">Ruc</label>
<input type="text" id="ruc" class="form-control"   name="ruc" placeholder="Ingrese el ruc">


<label for="telefono">Telefono</label>
<input type="text" id="telefono" class="form-control"   name="telefono" placeholder="Ingrese el telefono">


<label for="direccion">Direccion</label>
<input type="text" id="direccion" class="form-control"   name="direccion" placeholder="Ingrese la direccion">

</div>


<div class="form-group">
<label for="">Ciudades</label>
<select name="ciudad" id="ciudad" class="form-control">
 
<?php foreach($data['Ciudad'] as $row) { ?>
<option value="<?php echo $row['id_ciudad'];?>" > <?php echo $row['nombre_ciudad'];?></option>

<?php } ?>
</select>
 

</div>



<div class="form-group">
<button class="btn btn-primary" id ="btnAccion" type="submit" onclick= "registrarProveedores(event);">Registrar</button>
<button class="btn btn-danger" data-dismiss="modal">cancelar</button>
 
 
</form>
</div>
 
</div>
</div>
</div>
 
<?php
include "Vistas/Estaticos/footer.php";
?>

 
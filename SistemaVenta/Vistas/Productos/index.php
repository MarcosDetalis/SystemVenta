<?php
include "Vistas/Estaticos/header.php";
?>

<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Productos</li>
</ol>
<button class="btn btn-primary mb-2" onclick="frmProducto();"><i class="fas fa-plus"></i> </button>

<table class="table table-light" id="tblProducto">
    <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Imagen</th>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div id="nuevo_producto" class="modal fade" tabindex="1" role="dialog" arial-labelledby="my-modal-title">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Nuevo Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            <div class="modal-body">
                <form method="post" id="frmProducto">
                    <div class="row">

                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="cod_barra">Codigo de barras</label>
                        <input type="hidden" id="id" name="id">
                        <input type="text" id="cod_barra" class="form-control" name="cod_barra" placeholder="Ingrese el codigo de barra">
                    </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                        <label for="descrip">Descripcion</label>
                        <input type="text" id="descrip" class="form-control" name="descrip" placeholder="Ingrese la descripcion">
                    </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio_compra">Precio compra</label>
                                <input type="text" id="precio_compra" class="form-control" name="precio_compra" placeholder="Ingrese el precio compra">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="precio_venta">Precio venta</label>
                                <input type="text" id="precio_venta" class="form-control" name="precio_venta" placeholder="Ingrese el precio venta">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Unidades</label>
                                <select name="unidad" id="unidad" class="form-control">

                                    <?php foreach ($data['unidades'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['nombre']; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Categorias</label>
                                <select name="categoria" id="categoria" class="form-control">

                                    <?php foreach ($data['categorias'] as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['nombre']; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="card border-primary">
                                <div class="card-body">
                                    <label for="imagen" class="btn btn-primary" id="icon-image"><i class="fas fa-image"></i></label>
                                    <span id="icon-cerrar"></span>
                                    <input type="file" id="imagen" name="imagen" class="d-none" onchange="preview(event);">

                                    <input type="hidden" id="foto_actual" name="foto_actual">
   
                        
                                    <img class="img-thumbnail" id="img-preview" />

                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="form-group">

                        <button class="btn btn-primary" id="btnAccion" type="submit" onclick="registrarProducto(event);">Registrar</button>
                        <button class="btn btn-danger" data-dismiss="modal">cancelar</button>
                </form>
            </div>

        </div>
    </div>
</div>

<?php
include "Vistas/Estaticos/footer.php";
?>
<?php 
include "Vistas/Estaticos/header.php";
 ?>


<div class="page-content bg-light">
    <div class="page-header bg-light">
        <div class="container-fluid">
            <ol class="breadcrumb mb-4 h5 no-margin-bottom">
             <li class="breadcrumb-item active">Nueva Venta</li>
</ol>
        </div>
    </div>


    
    <section>
        <div class="container-fluid">
            <form action="" method="post" id="frmCompras" class="row" autocomplete="off">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="buscar_codigo">Código de barras</label>
                        <input type="hidden" id="id" name="id">
                        <input id="buscar_codigo" onkeyup="BuscarCodigo(event);" class="form-control"   type="text" name="codigo" placeholder="Código de barras" autofocus>
                        <span class="text-danger d-none" id="error">No hay producto</span>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="nombre">Producto</label>
                        <input id="nombre" class="form-control" type="hidden" name="nombre" >
                        <br />
                        <strong id="nombreP"></strong>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input id="stockD" type="hidden">
                        <input id="cantidad" class="form-control" type="text" name="cantidad" onkeyup="IngresarCantidad(event);">
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input id="precio" class="form-control" type="hidden" name="precio">
                        <br />
                        <strong id="precioP"></strong>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-light mt-4" id="tablaCompras">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Id</th>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Precio</th>
                                    <th>Total</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody id="ListaCompras">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
            <div class="row">
                <div class="col-lg-4 mt-1">
                    <div class="form-group">
                        <strong class="text-primary">Datos del Cliente</strong>
                       
                        <input type="text" id="ruc_cliente" onkeyup="BuscarCliente(event);" name="ruc_cliente" class="form-control" placeholder="Ruc/Ci del cliente">
                        <strong id="nom_cli" class="form-control border-0 text-success"></strong>
                        <strong id="dir_cli" class="form-control border-0 text-success"></strong>
                        <strong id="tel_cli" class="form-control border-0 text-success"></strong>
                    </div>
                    <form action="" method="post" id="frmVenta" autocomplete="off">
                    <input type="hidden" id="id_cliente" name="cliente">

                    <div class="form-group">
                             <label for="">Tipo de Pago</label>
                            <select name="tipoPago" id="tipoPago" class="form-control">
                            <?php foreach($data['tipoPago'] as $row) { ?>
                          <option value="<?php echo $row['id_tipoPago'];?>" > <?php echo $row['descripcion_tipoPago'];?></option>

                            <?php } ?>
                            </select>
                        </div>

                        <div class="form-group">
                             <label for="">Tipo de Compra</label>
                            <select name="tipoCompra" id="tipoCompra" class="form-control">
                    <?php foreach($data['tipoCompra'] as $row) { ?>
                <option value="<?php echo $row['id_tipoCompra'];?>" > <?php echo $row['descripcion_tipoCompra'];?></option>
                        <?php } ?>
                                
                            </select>
                        </div>
                </div>

                      
                <div class="col-lg-4 mt-1">
                    <div class="form-group">
                        <strong class="text-primary">Total a pagar</strong>
                        <input type="hidden" id="total" name="total" class="form-control  mb-2">
                        <strong id="tVenta" class="form-control border-0  text-success">  </strong> 
                        <button class="btn btn-danger" type="button" id="AnularCompra" onclick= "Anula();">Anular Venta</button>
                        <button class="btn btn-success" type="button" id="procesarVenta" onclick= "procesarCompra(event);"><i class="fas fa-money-check-alt"></i> Procesar Venta</button>
                    </div>

                    </form> 
                </div>
            </div>
        </div>
    </section>
</div>




<?php
include "Vistas/Estaticos/footer.php";
?>
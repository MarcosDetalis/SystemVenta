 let tblUsuarios,
  tblClientes, 
  tblProducto,
  tblCiudad,
  tblTipoCompra,
  tblTipoPago,
  tblProcedencia,
  tblProveedores,
  tblArticulos,
  tablaCompras,
  tblListar;
  



let espa = 
    {

        "decimal": "",
        "emptyTable": "No hay datos",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 a 0 de 0 registros",
        "infoFiltered": "(Filtro de _MAX_ total registros)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ registros",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron coincidencias",
        "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Próximo",
            "previous": "Anterior"
        },
        "aria": {
            "sortAscending": ": Activar orden de columna ascendente",
            "sortDescending": ": Activar orden de columna desendente"
        }


}





 const Did = selector => document.getElementById(selector);

 ListarCompras()
 
 
 document.addEventListener("DOMContentLoaded", function() {


    
    tblListar = $('#tblListar').DataTable({

        ajax: {
            url: base_url + "Ventas/listarVenta/",
            dataSrc: ''

        },
        columns: [
            {
                'data': 'id_ventaCabeceras'
            },
            {
                'data': 'nombre_cliente'
            },
            {
                'data': 'total'
            },
            {
                'data': 'fecha_ventaCabeceras'
            },
            {
                'data':'acciones'
            }
            
            
        ],
        "language": espa
       
    });





    tablaCompras = $('#tablaCompras').DataTable({

        ajax: {
            url: base_url + "Ventas/listar/",
            dataSrc: ''

        },
        columns: [
            {
                'data': 'id_ventatemp'
            },
            {
                'data': 'nombre_ventatemp'
            },
            {
                'data': 'cantidad_ventatemp'
            },
            {
                'data': 'precio_ventatemp'
            },
            {
                'data': 'total_ventatemp'
            },
            {
                'data': 'acciones'
            }
            
            
        ],
        "language": espa
       
    });



    tblArticulos = $('#tblArticulos').DataTable({
        ajax: {
            url: base_url + "Articulos/listar/",
            dataSrc: ''

        },
        columns: [
            {
                'data': 'id_articulos'
            },
            {
                'data': 'nombre_articulo'
            },
            {
                'data': 'stock_articulo'
            },
            {
                'data': 'precio_articulo'
            },
            {
                'data': 'nombre_procedencia'
            }
            
            
        ],
        "language": espa




    });

 

    
    tblProveedores = $('#tblproveedores').DataTable({
        ajax: {
            url: base_url + "Proveedores/listar/",
            dataSrc: ''

        },
        columns: [
            {
                'data': 'id_proveedor'
            },
            {
                'data': 'nombre_proveedor'
            },
            {
                'data': 'ruc_proveedor'
            },
            {
                'data': 'telefono_proveedor'
            },

            {
                'data': 'direccion_proveedor'
            },
            {
               'data': 'nombre_ciudad' 
            }
            
        ],
        "language": espa
    });





     tblUsuarios = $('#tblusuarios').DataTable({
         ajax: {
             url: base_url + "Users/listar/",
             dataSrc: ''

         },
         columns: [{
                 'data': 'id_vendedor'
             },
             {
                 'data': 'nombre_vendedor'
             },
             {
                 'data': 'apellido_vendedor'
             },
             {
                 'data': 'telefono_vendedor'
             },

             {
                 'data': 'documento_vendedor'
             },
             {
                'data': 'estado' 
             }
             
         ],
         "language": espa
     });

     // Fin de la tabla usuario
     tblClientes = $('#tblClientes').DataTable({
         ajax: {
             url: base_url + "Clientes/listar/",
             dataSrc: ''

         },
         columns: [{
                 'data': 'id_cliente'
             },
             {
                 'data': 'ruc_cliente'
             },
             {
                 'data': 'nombre_cliente'
             },
             {
                 'data': 'telefono_cliente'
             },
             {
                 'data': 'direccion_cliente'
             },
             {
                'data': 'nombre_ciudad'
            },
            {
                'data': 'estado'
            },
            {
                'data': 'acciones'
            }

         ],
         "language": espa
     });


     tblProducto = $('#tblProducto').DataTable({
         ajax: {
             url: base_url + "Productos/listar/",
             dataSrc: ''

         },
         columns: [{
                 'data': 'id'
             },
             {
                 'data': 'Imagen'
             },
             {
                 'data': 'codigo'
             },
             {
                 'data': 'descripcion'
             },
             {
                 'data': 'precio_venta'
             },
             {
                 'data': 'cantidad'
             },
             {
                 'data': 'estado'
             },
             {
                 'data': 'acciones'
             }

         ],
         "language": espa
     });



     tblCiudad = $('#tblCiudad').DataTable({
        ajax: {
            url: base_url + "Ciudades/listar/",
            dataSrc: ''

        },
        columns: [{
                'data': 'id_ciudad'
            },
            {
                'data': 'nombre_ciudad'
            },
            {
                'data': 'acciones'
            }

             
        ],
        "language": espa
    });



    tblTipoCompra = $('#tblTipoCompra').DataTable({
        ajax: {
            url: base_url + "TipoCompras/listar/",
            dataSrc: ''

        },
        columns: [{
                'data': 'id_tipoCompra'
            },
            {
                'data': 'descripcion_tipoCompra'
            },
            {
                'data': 'acciones'
            }

             
        ],
        "language": espa
    });




    tblProcedencia = $('#tblProcedencia').DataTable({
        ajax: {
            url: base_url + "Procedencias/listar/",
            dataSrc: ''

        },
        columns: [{
                'data': 'id_procedencia'
            },
            {
                'data': 'nombre_procedencia'
            },
            {
                'data': 'acciones'
            }

             
        ],
        "language": espa
    });


    tblTipoPago = $('#tblTipoPago').DataTable({
        ajax: {
            url: base_url + "TipoPagos/listar/",
            dataSrc: ''

        },
        columns: [{
                'data': 'id_tipoPago'
            },
            {
                'data': 'descripcion_tipoPago'
            },
            {
                'data': 'acciones'
            }

             
        ],
        "language": espa
    });



 })

 


function BuscarCliente(e) {
    e.preventDefault();
    if (e.which == 13) {
        const codigo = document.getElementById("ruc_cliente").value;
 
        const url = base_url + "Ventas/buscarCli/" + codigo;
        const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
 
                    document.getElementById("nom_cli").innerHTML = res.nombre_cliente;
                    document.getElementById("dir_cli").innerHTML = res.direccion_cliente;
                    document.getElementById("tel_cli").innerHTML = res.telefono_cliente;
                    Did("id_cliente").value = res.id_cliente;
                  
            

           
                 
            }
        }
    
    }
}




 function frmProveedores() {
    Did("btnAccion").innerHTML = "Registrar";
    Did("title").innerHTML = "Nuevo Proveedor";
    Did("frmProveedores").reset();
    $("#nuevo_Proveedores").modal("show");
    Did("id").value = "";
}


function registrarProveedores(e) {
    e.preventDefault();
    const nombre = Did("nombre");
    const ruc = Did("ruc");
    const telefono = Did("telefono");
    const direccion = Did("direccion");
    const ciudad = Did("ciudad");

    if (nombre.value == "" || ruc.value=="" || telefono.value=="" || direccion.value=="" || ciudad.value=="") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000
        })
    } else {

        const url = base_url + "Proveedores/registrar";
        const frm = Did("frmProveedores");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'el proveedor fue registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $('#nuevo_Proveedores').modal("hide");
                    tblProveedores.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'el proveedor fue modificado',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $('#nuevo_Proveedores').modal("hide");
                    tblProveedores.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })

                }
            }
        }

    }

}

 

function frmArticulos() {
    Did("btnAccion").innerHTML = "Registrar";
    Did("title").innerHTML = "Nuevo articulo";
    Did("frmArticulos").reset();
    $("#nueva_articulos").modal("show");
    Did("id").value = "";
}


function registrarArticulos(e) {
    e.preventDefault();
    const nombre = Did("nombre");
    const stock = Did("stock");
    const precio = Did("precio");
    const procedencia = Did("procedencia");
   

    if (nombre.value == "" || stock.value=="" || precio.value=="" || procedencia.value=="") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000
        })
    } else {

        const url = base_url + "Articulos/registrar";
        const frm = Did("frmArticulos");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'El articulo fue registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $('#nueva_articulos').modal("hide");
                    tblArticulos.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'el articulo fue modificado',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $('#nueva_articulos').modal("hide");
                    tblArticulos.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })

                }
            }
        }

    }

}


 

 function frmCiudad() {
    Did("btnAccion").innerHTML = "Registrar";
    Did("title").innerHTML = "Nueva Ciudad";
    Did("frmCiudad").reset();
    $("#nueva_ciudad").modal("show");
    Did("id").value = "";
}

function registrarCiudad(e) {
    e.preventDefault();
    const nombre = Did("nombre");

    if (nombre.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000
        })
    } else {

        const url = base_url + "Ciudades/registrar";
        const frm = Did("frmCiudad");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'La ciudad registrada con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $('#nueva_ciudad').modal("hide");
                    tblCiudad.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'La ciudad fue modificado',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $('#nueva_ciudad').modal("hide");
                    tblCiudad.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })

                }
            }
        }

    }

}

function btnEditarCiudad(id) {
    document.getElementById("title").innerHTML = "Actualizar Ciudad";
    document.getElementById("btnAccion").innerHTML = "Modificar";


    const url = base_url + "Ciudades/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            Did("id").value = res.id_ciudad;
            Did("nombre").value = res.nombre_ciudad;
         
            $("#nueva_ciudad").modal("show");
           
            tblCiudad.ajax.reload();

             
        }
    }


}

//fin de ciudad


//tipo compras

function frmTipoCompra() {
    Did("btnAccion").innerHTML = "Registrar";
    Did("title").innerHTML = "Nuevo tipo de compras";
    Did("frmTipoCompra").reset();
    $("#nuevo_tipocompra").modal("show");
    Did("id").value = "";
}

function registrarTipoCompra(e) {
    e.preventDefault();
    const nombre = Did("nombre");

    if (nombre.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000
        })
    } else {

        const url = base_url + "TipoCompras/registrar";
        const frm = Did("frmTipoCompra");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tipo de compra registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $('#nuevo_tipocompra').modal("hide");
                    tblTipoCompra.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tipo de compra fue modificado',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $('#nuevo_tipocompra').modal("hide");
                    tblTipoCompra.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })

                }
            }
        }

    }

}

function btnEditarTipoCompra(id) {
    document.getElementById("title").innerHTML = "Actualizar tipo de compra";
    document.getElementById("btnAccion").innerHTML = "Modificar";


    const url = base_url + "TipoCompras/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            Did("id").value = res.id_tipoCompra;
            Did("nombre").value = res.descripcion_tipoCompra;
         
            $("#nuevo_tipocompra").modal("show");
           
            tblCiudad.ajax.reload();

             
        }
    }


}

 
function frmProcedencia() {
    Did("btnAccion").innerHTML = "Registrar";
    Did("title").innerHTML = "Nueva Procedencia";
    Did("frmProcedencia").reset();
    $("#nueva_procedencia").modal("show");
    Did("id").value = "";
}

function registrarProcedencia(e) {
    e.preventDefault();
    const nombre = Did("nombre");

    if (nombre.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000
        })
    } else {

        const url = base_url + "Procedencias/registrar";
        const frm = Did("frmProcedencia");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Procedencia registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $('#nueva_procedencia').modal("hide");
                    tblProcedencia.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Procedencia fue modificado',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $('#nueva_procedencia').modal("hide");
                    tblProcedencia.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })

                }
            }
        }

    }

}

function btnEditarProcedencia(id) {
    document.getElementById("title").innerHTML = "Actualizar procedencia";
    document.getElementById("btnAccion").innerHTML = "Modificar";


    const url = base_url + "Procedencias/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            Did("id").value = res.id_procedencia;
            Did("nombre").value = res.nombre_procedencia;
         
            $("#nueva_procedencia").modal("show");
           
            tblCiudad.ajax.reload();

             
        }
    }


}

 

function frmTipoPago() {
    Did("btnAccion").innerHTML = "Registrar";
    Did("title").innerHTML = "Nuevo tipo de pagos";
    Did("frmTipoPago").reset();
    $("#nuevo_tipopago").modal("show");
    Did("id").value = "";
}

function registrarTipoPago(e) {
    e.preventDefault();
    const nombre = Did("nombre");

    if (nombre.value == "") {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 3000
        })
    } else {

        const url = base_url + "TipoPagos/registrar";
        const frm = Did("frmTipoPago");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tipo de pago registrado con éxito',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    $('#nuevo_tipopago').modal("hide");
                    tblTipoPago.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Tipo de compra fue modificado',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    $('#nuevo_tipopago').modal("hide");
                    tblTipoPago.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })

                }
            }
        }

    }

}

function btnEditarTipoPago(id) {
    document.getElementById("title").innerHTML = "Actualizar tipo de pago";
    document.getElementById("btnAccion").innerHTML = "Modificar";


    const url = base_url + "TipoPagos/editar/" + id;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            Did("id").value = res.id_tipoPago;
            Did("nombre").value = res.descripcion_tipoPago;
         
            $("#nuevo_tipopago").modal("show");
           
            tblTipoPago.ajax.reload();

             
        }
    }


}
 
 function frmUsuario() {

     Did("btnAccion").innerHTML = "Registrar";
     Did("title").innerHTML = "Nuevo Usuario";
     Did("claves").classList.remove("d-none");
     Did("frmUsuario").reset();
     $("#nuevo_usuario").modal("show");
     Did("id").value = "";

 }

 function registrarUser(e) {
     e.preventDefault();
     const usuario = Did("usuario");
     const apellido = Did("apellido");
     const ci = Did("ci");
     const telefono = Did("telefono");
     const direccion = Did("direccion");
     const clave = Did("clave");
     const confirmar = Did("confirmar");
     const caja = ("caja");

     if (usuario.value == "" || apellido.value == "" ||
         caja.value == "" || ci.value==""||telefono.value==""|| direccion.value==""|| clave.value==""||confirmar.value=="") {
         Swal.fire({
             position: 'top-end',
             icon: 'error',
             title: 'Todos los campos son obligatorios',
             showConfirmButton: false,
             timer: 3000
         })
     } else {

         const url = base_url + "Users/registrar";
         const frm = Did("frmUsuario");
         const http = new XMLHttpRequest();
         http.open("POST", url, true);
         http.send(new FormData(frm));
         http.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                 const res = JSON.parse(this.responseText);
                 if (res == "si") {

                     Swal.fire({
                         position: 'top-end',
                         icon: 'success',
                         title: 'Usuario registrado con éxito',
                         showConfirmButton: false,
                         timer: 3000
                     })
                     frm.reset();
                     $('#nuevo_usuario').modal("hide");
                     tblUsuarios.ajax.reload();
                 } else if (res == "modificado") {
                     Swal.fire({
                         position: 'top-end',
                         icon: 'success',
                         title: 'El Usuario fue modificado',
                         showConfirmButton: false,
                         timer: 3000
                     })
                     $('#nuevo_usuario').modal("hide");
                     tblUsuarios.ajax.reload();
                 } else {
                     Swal.fire({
                         position: 'top-end',
                         icon: 'error',
                         title: res,
                         showConfirmButton: false,
                         timer: 3000
                     })

                 }
             }
         }

     }
 }

 function btnEditarUser(id) {
     document.getElementById("title").innerHTML = "Actualizar Usuario";
     document.getElementById("btnAccion").innerHTML = "Modificar";


     const url = base_url + "Users/editar/" + id;
     const http = new XMLHttpRequest();
     http.open("GET", url, true);
     http.send();
     http.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             const res = JSON.parse(this.responseText);
             Did("id").value = res.id;
             Did("usuario").value = res.usuario;
             Did("nombre").value = res.nombre;
             Did("caja").value = res.id_caja;
             Did("claves").classList.add("d-none");
             $("#nuevo_usuario").modal("show");

         }
     }


 }

 function btnEliminarUser(id) {

     Swal.fire({
         title: 'Desea eliminar?',
         text: 'El usuario pasara a ser inactivo',
         icon: 'warning',
         showCancelButton: true,
         ConfirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si',
         cancelButtonText: 'No'

     }).then((result) => {
         if (result.isConfirmed) {
             const url = base_url + "Users/eliminar/" + id;
             const http = new XMLHttpRequest();
             http.open("GET", url, true);
             http.send();
             http.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     const res = JSON.parse(this.responseText);
                     if (res == "ok") {
                         Swal.fire(
                             'Eliminado',
                             'El usuario paso a ser inactivo',
                             'success'
                         )
                         tblUsuarios.ajax.reload();
                     } else {
                         Swal.fire(
                             'Mensaje',
                             res,
                             'error'
                         )
                     }
                 }
             }

         }
     })

 }

 function btnreingresarUser(id) {

     Swal.fire({
         title: 'Estas seguro de reingresar?',
         icon: 'warning',
         showCancelButton: true,
         ConfirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si',
         cancelButtonText: 'No'

     }).then((result) => {
         if (result.isConfirmed) {
             const url = base_url + "Users/reingresar/" + id;
             const http = new XMLHttpRequest();
             http.open("GET", url, true);
             http.send();
             http.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     const res = JSON.parse(this.responseText);
                     if (res == "ok") {
                         Swal.fire(
                             'Riengresado',
                             'El usuario reingresado con éxito',
                             'success'
                         )
                         tblUsuarios.ajax.reload();
                     } else {
                         Swal.fire(
                             'Mensaje',
                             res,
                             'error'
                         )
                     }
                 }
             }

         }
     })

 }

 //  Fin de USUARIOS









 function frmCliente() {
     Did("btnAccion").innerHTML = "Registrar";
     Did("title").innerHTML = "Nuevo Cliente";
     Did("frmCliente").reset();
     $("#nuevo_cliente").modal("show");
     Did("id").value = "";
 }

 function registrarCli(e) {
     e.preventDefault();
     const ruc = Did("ruc");
     const nombre = Did("nombre");
     const apelllido = Did("apellido")
     const telefono = Did("telefono");
     const direccion = Did("direccion");

     if (ruc.value == "" || nombre.value == "" ||
         telefono.value == "" || direccion.value == "" || apelllido.value =="") {
         Swal.fire({
             position: 'top-end',
             icon: 'error',
             title: 'Todos los campos son obligatorios',
             showConfirmButton: false,
             timer: 3000
         })
     } else {

         const url = base_url + "Clientes/registrar";
         const frm = Did("frmCliente");
         const http = new XMLHttpRequest();
         http.open("POST", url, true);
         http.send(new FormData(frm));
         http.onreadystatechange = function() {
             if (this.readyState == 4 && this.status == 200) {
                 const res = JSON.parse(this.responseText);
                 if (res == "si") {

                     Swal.fire({
                         position: 'top-end',
                         icon: 'success',
                         title: 'Cliente registrado con éxito',
                         showConfirmButton: false,
                         timer: 3000
                     })
                     frm.reset();
                     $('#nuevo_cliente').modal("hide");
                     tblClientes.ajax.reload();
                 } else if (res == "modificado") {
                     Swal.fire({
                         position: 'top-end',
                         icon: 'success',
                         title: 'El cliente fue modificado',
                         showConfirmButton: false,
                         timer: 3000
                     })
                     $('#nuevo_cliente').modal("hide");
                     tblClientes.ajax.reload();
                 } else {
                     Swal.fire({
                         position: 'top-end',
                         icon: 'error',
                         title: res,
                         showConfirmButton: false,
                         timer: 3000
                     })

                 }
             }
         }

     }

 }


 function btnEditarCli(id) {
     document.getElementById("title").innerHTML = "Actualizar Cliente";
     document.getElementById("btnAccion").innerHTML = "Modificar";


     const url = base_url + "Clientes/editar/" + id;
     const http = new XMLHttpRequest();
     http.open("GET", url, true);
     http.send();
     http.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {
             const res = JSON.parse(this.responseText);
             Did("id").value = res.id_cliente;
             Did("ruc").value = res.ruc_cliente;
             Did("apellido").value = res.apellido_cliente;
             Did("nombre").value = res.nombre_cliente;
             Did("telefono").value = res.telefono_cliente;
             Did("direccion").value = res.direccion_cliente;
             $("#nuevo_cliente").modal("show");

         }
     }


 }

 function btnEliminarCli(id) {

     Swal.fire({
         title: 'Desea eliminar?',
         text: 'El cliente pasara a ser inactivo',
         icon: 'warning',
         showCancelButton: true,
         ConfirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si',
         cancelButtonText: 'No'

     }).then((result) => {
         if (result.isConfirmed) {
             const url = base_url + "Clientes/eliminar/" + id;
             const http = new XMLHttpRequest();
             http.open("GET", url, true);
             http.send();
             http.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     const res = JSON.parse(this.responseText);
                     if (res == "ok") {
                         Swal.fire(
                             'Eliminado',
                             'El cliente paso a ser inactivo',
                             'success'
                         )
                         tblClientes.ajax.reload();
                     } else {
                         Swal.fire(
                             'Mensaje',
                             res,
                             'error'
                         )
                     }
                 }
             }

         }
     })

 }

 function btnreingresarCli(id) {

     Swal.fire({
         title: 'Estas seguro de reingresar?',
         icon: 'warning',
         showCancelButton: true,
         ConfirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: 'Si',
         cancelButtonText: 'No'

     }).then((result) => {
         if (result.isConfirmed) {
             const url = base_url + "Clientes/reingresar/" + id;
             const http = new XMLHttpRequest();
             http.open("GET", url, true);
             http.send();
             http.onreadystatechange = function() {
                 if (this.readyState == 4 && this.status == 200) {
                     const res = JSON.parse(this.responseText);
                     if (res == "ok") {
                         Swal.fire(
                             'Riengresado',
                             'El cliente reingresado con éxito',
                             'success'
                         )
                         tblClientes.ajax.reload();
                     } else {
                         Swal.fire(
                             'Mensaje',
                             res,
                             'error'
                         )
                     }
                 }
             }

         }
     })

 }
  
 function preview(e) {

     const name = e.target.files[0];
     const ruta = URL.createObjectURL(name);
     Did("img-preview").src = ruta;
     Did("icon-image").classList.add("d-none");
     Did("icon-cerrar").innerHTML = `<button class="btn btn-danger" onclick="deleteImg();"><i class="fas fa-times"></i></button> ${name['name']}`;
 }

 function deleteImg() {
     Did("icon-cerrar").innerHTML = ``;
     Did("icon-image").classList.remove("d-none");
     Did("img-preview").src = '';
     Did("imagen").value = '';
     Did("foto_actual").value = '';
 }



 function BuscarCodigo(e) {
    if (e.which == 13) {
        const codigo = document.getElementById("buscar_codigo").value;
 
        const url = base_url + "Ventas/buscar/" + codigo;
        const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                const res = JSON.parse(this.responseText);
                    document.getElementById("id").value = res.id_articulos;
                    document.getElementById("nombreP").innerHTML= res.nombre_articulo;
                    document.getElementById("nombre").value= res.nombre_articulo;
                    document.getElementById("precioP").innerHTML = res.precio_articulo;
                    document.getElementById("precio").value = res.precio_articulo;
                    document.getElementById("cantidad").value = 1;
                    document.getElementById("cantidad").focus();
            

           
                 
            }
        }
    
    }
}


function IngresarCantidad(e) {
    const stockD = $("#stockD").val();
    const cantidad = document.getElementById("cantidad").value;
    if (e.which == 13) {
        if (cantidad == "") {
            $('#frmCompras').trigger("reset");
            $("#buscar_codigo").focus();
            document.getElementById("nombreP").innerHTML = "";
            document.getElementById("precioP").innerHTML = "";
            Swal.fire({
                icon: 'warning',
                title: 'Ingrese la cantidad',
                showConfirmButton: false,
                timer: 1500
            })
        }  $.ajax({
            url: "Ventas/ingresar",
            type: 'POST',
            async: true,
            data: $("#frmCompras").serialize(),
            success: function (response) {
                $('#frmCompras').trigger("reset");
                $("#buscar_codigo").focus();
                $("#nombreP").html("");
                $("#precioP").html("");
                if (response == 1) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Se actualizo la cantidad del producto',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    tablaCompras.ajax.reload();
                    ListarCompras();
                } else {
                    tablaCompras.ajax.reload();
                    ListarCompras();
                }
            }
        });
    }
}
   

function ListarCompras() {


    const url = base_url + "Ventas/total";
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            if( res.total == null){ 
                document.getElementById("tVenta").innerHTML = "0 GS";  
        }else{
            document.getElementById("tVenta").innerHTML = res.total+" GS";  
            Did("total").value=res.total;
        }
    }

}

}



function btnEliminarCompra(id) {
   
    Swal.fire({
        title: 'Desea eliminar?',
        text: 'El producto',
        icon: 'warning',
        showCancelButton: true,
        ConfirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si',
        cancelButtonText: 'No'

    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Ventas/eliminar/" + id;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            'Eliminado',
                            'El producto se elimino',
                            'success'
                        )
                        tablaCompras.ajax.reload();
                        ListarCompras();
                    } else {
                        Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                        )
                    }
                }
            }

        }
    })

}


function procesarCompra(e) {
    e.preventDefault();
    const usuario = Did("eliminar");
  
    if (usuario == null) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'No hay producto para vender',
            showConfirmButton: false,
            timer: 3000
        })
    } else {

        const url = base_url + "Ventas/Venta";
        const frm = Did("frmVenta");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {

                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Venta Realizada Con Exito ',
                        showConfirmButton: false,
                        timer: 3000
                    })
                    frm.reset();
                    tablaCompras.ajax.reload();
                    ListarCompras()


                    Did("nom_cli").innerHTML = "";
                    Did("dir_cli").innerHTML = "";
                    Did("tel_cli").innerHTML = "";
                    Did("id_cliente").value = '';
                    Did("ruc_cliente").value = ' ';

                    
                    
                } else {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 3000
                    })

                }
            }
        }

    }
}
function Anula() {
    const lista = Did("eliminar");
    if (lista == null) {
        Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'No hay producto para anular',
            showConfirmButton: false,
            timer: 3000
        })
   
    } else {
        const url = base_url + "Ventas/anular";
        const frm = Did("frmVenta");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Venta Se Anulo Con Exito ',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    frm.reset();
                    tablaCompras.ajax.reload();
                    location.reload();
            }
        }

    }    
}



 
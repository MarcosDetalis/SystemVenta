<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Panel de Administración</title>
    <link href="<?php echo base_url; ?>Acceso/css/styles.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>Acceso/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="<?php echo base_url; ?>Acceso/js/all.min.js" crossorigin="anonymous"></script>
    
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">SystemVenta</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
         
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo base_url;?>Users/salir">Cerrar Sessión</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                       
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"> <i class="fas fa-tools"></i></div>
                        Configuración
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="<?php echo base_url; ?>Users"> <i class="fas fa-users mr-2"></i>Vendedores</a>
                               
                                <a class="nav-link" href="<?php echo base_url; ?>Ciudades">Ciudades</a>
                                <a class="nav-link" href="<?php echo base_url; ?>Procedencias">Procedencias</a>
                                <a class="nav-link" href="<?php echo base_url; ?>TipoCompras">Tipos de Compras</a>
                                <a class="nav-link" href="<?php echo base_url; ?>TipoPagos">Tipos de Pagos</a>
                                <a class="nav-link" href="<?php echo base_url; ?>Proveedores"><i class="fas fa-truck mr-2" ></i>Proveedores</a>
                                <a class="nav-link" href="<?php echo base_url; ?>Articulos">Articulos</a>

                            </nav>
                        </div>


                        <a class="nav-link " href="<?php echo base_url; ?>Clientes">
                            <div class="sb-nav-link-icon"> <i class="fas fa-user"></i></div>
                                Clientes
                             
                        </a>
 
                
                       
                        <a class="nav-link " href="<?php echo base_url; ?>Ventas">
                            <div class="sb-nav-link-icon"> <i class="fas fa-shopping-cart"></i></div>
                                Venta                             
                        </a>


                        <a class="nav-link " href="<?php echo base_url; ?>Ventas/listarVentas">
                            <div class="sb-nav-link-icon"> <i class="fas fa-list-ul"></i></div>
                           Listar Ventas                          
                        </a>

                    </div>
                </div>
                
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid mt-2">
                   

            
  
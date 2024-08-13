<?php
require_once("../../config/conexion.php");
require_once("../../models/Rol.php");

$rol = new Rol();

$datos = $rol->validar_acceso_rol($_SESSION["USU_ID"], "mntcompra");
if (isset($_SESSION["USU_ID"])) {
    if (is_array($datos) == true and count($datos) > 0) {
        # code...

?>

        <!doctype html>
        <html lang="es" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

        <head>
            <title>Asoace Coca-Cola | Compra</title>
            <?php require_once("../html/head.php"); ?>
        </head>

        <body>

            <div id="layout-wrapper">

                <?php require_once("../html/header.php"); ?>

                <?php require_once("../html/menu.php"); ?>

                <div class="main-content">
                    <div class="page-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0">Nueva Compra</h4>

                                        <div class="page-title-right">
                                            <ol class="breadcrumb m-0">
                                                <li class="breadcrumb-item"><a href="javascript: void(0);">Compra</a></li>
                                                <li class="breadcrumb-item active">Nueva Compra</li>
                                            </ol>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- TODO Id de Compra -->
                            <input type="hidden" name="compr_id" id="compr_id" />

                            <!-- TODO Tipo de Pago -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Proceso de Pago</h4>
                                        </div><!-- end card header -->
                                        <div class="card-body">
                                            <p class="text-muted">Seleccione correctamente el tipo de pago que desea realizar</p>
                                            <div class="live-preview">
                                                <div class="row align-items-center g-3">
                                                    <div class="col-lg-4">
                                                        <label for="doc_id" class="form-label">Tipo de Documento</label>
                                                        <select type="text" class="form-control form-select" name="doc_id" id="doc_id" aria-label="Seleccionar">
                                                            <option value="0" selected>Seleccione</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="pag_id" class="form-label">Tipo de Pago</label>
                                                        <select type="text" class="form-control form-select" name="pag_id" id="pag_id" aria-label="Seleccionar">
                                                            <option value="0" selected>Seleccione</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="mon_id" class="form-label">Moneda</label>
                                                        <select type="text" class="form-control form-select" name="mon_id" id="mon_id" aria-label="Seleccionar">
                                                            <option value="0" selected>Seleccione</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                            <!-- TODO DATOS DEL PROVEEDOR -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Datos del Proveedor</h4>
                                        </div><!-- end card header -->
                                        <div class="card-body">
                                            <p class="text-muted">Seleccione correctamente el proveedor para poder realizar con eficiencia en proceso de compra</p>
                                            <div class="live-preview">
                                                <div class="row align-items-center g-3">
                                                    <div class="col-lg-4">
                                                        <label for="prov_id" class="form-label">Proveedor</label>
                                                        <select type="text" class="form-control form-select" name="prov_id" id="prov_id" aria-label="Seleccionar">
                                                            <option value="0" selected>Seleccione</option>

                                                        </select>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="prov_ruc" class="form-label">Ruc</label>
                                                            <input type="text" class="form-control" id="prov_ruc" name="prov_ruc" placeholder="Ruc" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <label for="prov_direcc" class="form-label">Dirección</label>
                                                            <input type="text" class="form-control" id="prov_direcc" name="prov_direcc" placeholder="Dirección" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="prov_correo" class="form-label">Correo</label>
                                                            <input type="text" class="form-control" id="prov_correo" name="prov_correo" placeholder="Correo" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div>
                                                            <label for="prov_telf" class="form-label">Telefono</label>
                                                            <input type="text" class="form-control" id="prov_telf" name="prov_telf" placeholder="Telefono" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->

                            </div>
                            <!-- end row -->

                            <!-- TODO DATOS DEL PRODUCTO -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Agregar Producto</h4>
                                        </div><!-- end card header -->
                                        <div class="card-body">
                                            <p class="text-muted">Seleccione correctamente el proveedor para poder realizar con eficiencia en proceso de compra</p>
                                            <div class="live-preview">
                                                <div class="row align-items-center g-3">
                                                    <div class="col-lg-3">
                                                        <label for="cat_id" class="form-label">Categoria</label>
                                                        <select type="text" class="form-control form-select" name="cat_id" id="cat_id" aria-label="Seleccionar">
                                                            <option value="0" selected>Seleccione</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="prod_id" class="form-label">Producto</label>
                                                        <select type="text" class="form-control form-select" name="prod_id" id="prod_id" aria-label="Seleccionar">
                                                            <option value="0" selected>Seleccione</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div>
                                                            <label for="und_nom" class="form-label">Unidad de Medida</label>
                                                            <input type="text" class="form-control" id="und_nom" name="und_nom" placeholder="Unidad de Medida" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div>
                                                            <label for="prod_pcompra" class="form-label">Precio</label>
                                                            <input type="number" class="form-control" id="prod_pcompra" name="prod_pcompra" placeholder="Precio" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div>
                                                            <label for="prod_stock" class="form-label">Stock</label>
                                                            <input type="text" class="form-control" id="prod_stock" name="prod_stock" placeholder="Stock" readonly />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <div>
                                                            <label for="detc_cant" class="form-label">Cantidad</label>
                                                            <input type="number" class="form-control" id="detc_cant" name="detc_cant" placeholder="Cantidad" />
                                                        </div>
                                                    </div>



                                                    <button type="button" id="btnagregar" class="btn btn-primary float-start"><i class="ri-shopping-cart-2-fill"></i> Nueva Compra</button>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                            <!-- TODO DATOS DE COMPRA -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <h4 class="card-title mb-0 flex-grow-1">Detalle de Compra</h4>
                                        </div><!-- end card header -->
                                        <div class="card-body">
                                            <table id="table_data" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Categoria</th>
                                                        <th>Producto</th>
                                                        <th>Unidad</th>
                                                        <th>Precio Compra</th>
                                                        <th>Cantidad</th>
                                                        <th>Total</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <!-- TODO:Calculo Detalle -->
                                            <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto" style="width:250px">
                                                <tbody>
                                                    <tr>
                                                        <td>Sub Total</td>
                                                        <td class="text-end" id="txtsubtotal">0</td>
                                                    </tr>
                                                    <tr>
                                                        <td>IGV (18%)</td>
                                                        <td class="text-end" id="txtigv">0</td>
                                                    </tr>
                                                    <tr class="border-top border-top-dashed fs-15">
                                                        <th scope="row">Total</th>
                                                        <th class="text-end" id="txttotal">0</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="mt-4">
                                                <label for="compr_coment" class="form-label text-muted text-uppercase fw-semibold">Comentario</label>
                                                <textarea class="form-control alert alert-info" id="compr_coment" name="compr_coment" placeholder="Comentario" rows="4" required=""></textarea>
                                            </div>
                                            <div class="hstack gap-2 left-content-end d-print-none mt-4">
                                                <button type="button" id="btnguardar" class="btn btn-success"><i class="ri-printer-line align-bottom me-1"></i> Guardar</button>
                                                <a id="btnlimpiar" class="btn btn-warning"><i class="ri-send-plane-fill align-bottom me-1"></i> Limpiar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                    </div>

                    <?php require_once("../html/footer.php"); ?>
                </div>

            </div>



            <?php require_once("../html/js.php"); ?>
            <script type="text/javascript" src="mntcompra.js"></script>
        </body>

        </html>

<?php
    } else {
        header("Location:" . Conectar::ruta() . "view/404/");
    }
} else {
    header("Location:" . Conectar::ruta() . "view/404/");
}
?>
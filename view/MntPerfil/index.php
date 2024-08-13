<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["USU_ID"])) {
?>

    <!doctype html>
    <html lang="es" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none">

    <head>
        <title>Asoace Coca-Cola | Clientes</title>
        <?php require_once("../html/head.php"); ?>
    </head>

    <body>

        <div id="layout-wrapper">

            <?php require_once("../html/header.php"); ?>

            <?php require_once("../html/menu.php"); ?>

            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">
                        <div class="profile-foreground position-relative mx-n4 mt-n4">
                            <div class="profile-wid-bg">
                                <img src="assets/images/profile-bg.jpg" alt="" class="profile-wid-img" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
                                <div class="row g-4">
                                    <div class="col-auto">
                                        <div class="avatar-lg">
                                            <img src="../../assets/images/users/avatar-1.jpg" alt="user-img" class="img-thumbnail rounded-circle" />
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col">
                                        <div class="p-2">
                                            <h3 class="text-white mb-1"><?php  echo $_SESSION["USU_NOM"]?> <?php  echo " " . $_SESSION["USU_APE"]?></h3>
                                            <p class="text-white-75">Owner & Founder</p>
                                            <div class="hstack text-white-50 gap-1">
                                                <div class="me-2"><i class="ri-map-pin-user-line me-1 text-white-75 fs-16 align-middle"></i>California, United States</div>
                                                <div>
                                                    <i class="ri-building-line me-1 text-white-75 fs-16 align-middle"></i>Themesbrand
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-12 col-lg-auto order-last order-lg-0">
                                        <div class="row text text-white-50 text-center">
                                            <div class="col-lg-6 col-4">
                                                <div class="p-2">
                                                    <h4 class="text-white mb-1">24.3K</h4>
                                                    <p class="fs-14 mb-0">Followers</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-4">
                                                <div class="p-2">
                                                    <h4 class="text-white mb-1">1.3K</h4>
                                                    <p class="fs-14 mb-0">Following</p>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12 col-4 ">
                                        <div class="p-2">
                                            <button type="button" id="btnnuevo" class="btn btn-success"><i class="ri-edit-box-line align-bottom"></i> Restablecer Contraseña</button>
                                            <button type="button" id="btnconfigurar" style="margin-left: 20px;" class="btn btn-primary"><i class="ri-edit-box-line align-bottom"></i> Configurar Perfil</button>
                                        </div>

                                        <br>
                                        <br>
                                    </div>
                                    <br>
                                </div>
                                <!--end row-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-5">Complete Your Profile</h5>
                                        <div class="progress animated-progress custom-progress progress-label">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                                <div class="label">30%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-3">Info</h5>
                                        <div class="table-responsive">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Full Name :</th>
                                                        <td class="text-muted">Anna Adame</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Mobile :</th>
                                                        <td class="text-muted">+(1) 987 6543</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">E-mail :</th>
                                                        <td class="text-muted">daveadame@velzon.com</td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Location :</th>
                                                        <td class="text-muted">California, United States
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="ps-0" scope="row">Joining Date</th>
                                                        <td class="text-muted">24 Nov 2021</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Portfolio</h5>
                                        <div class="d-flex flex-wrap gap-2">
                                            <div>
                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-dark text-light">
                                                        <i class="ri-github-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-primary">
                                                        <i class="ri-global-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-success">
                                                        <i class="ri-dribbble-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0);" class="avatar-xs d-block">
                                                    <span class="avatar-title rounded-circle fs-16 bg-danger">
                                                        <i class="ri-pinterest-fill"></i>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title mb-4">Skills</h5>
                                        <div class="d-flex flex-wrap gap-2 fs-15">
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">Photoshop</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">illustrator</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">HTML</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">CSS</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">Javascript</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">Php</a>
                                            <a href="javascript:void(0);" class="badge badge-soft-primary">Python</a>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->

                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-3">About</h5>
                                                        <p>Hi I'm <?php  echo $_SESSION["USU_NOM"]?>, It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is European languages are members of the same family.</p>
                                                        <p>You always want to make sure that your fonts work well together and try to limit the number of fonts you use to three or less. Experiment and play around with the fonts that you already have in the software you’re working with reputable font websites. This may be the most commonly encountered tip I received from the designers I spoke with. They highly encourage that you use different fonts in one design, but do not over-exaggerate and go overboard.</p>
                                                        <div class="row">
                                                            <div class="col-6 col-md-4">
                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                            <i class="ri-user-2-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <p class="mb-1">Designation :</p>
                                                                        <h6 class="text-truncate mb-0">Lead Designer / Developer</h6>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-6 col-md-4">
                                                                <div class="d-flex mt-4">
                                                                    <div class="flex-shrink-0 avatar-xs align-self-center me-3">
                                                                        <div class="avatar-title bg-light rounded-circle fs-16 text-primary">
                                                                            <i class="ri-global-line"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-grow-1 overflow-hidden">
                                                                        <p class="mb-1">Website :</p>
                                                                        <a href="#" class="fw-semibold">www.velzon.com</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </div>
                            </div>
                        </div>
                    </div>

                    <?php require_once("../html/footer.php"); ?>
                </div>

            </div>

            <?php require_once("mantenimiento.php"); ?>

            <?php require_once("../html/js.php"); ?>
            <script type="text/javascript" src="mntperfil.js"></script>
    </body>

    </html>
<?php
} else {
    header("Location:" . Conectar::ruta() . "view/404/");
}
?>
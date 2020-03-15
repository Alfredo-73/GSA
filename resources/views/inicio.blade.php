@extends('layouts.app')

@section('content')
<div class="container my-5">

    <!--Section: Content-->
    <section class="dark-grey-text text-center">

        <!--<h6 class="font-weight-normal text-uppercase font-small grey-text mb-4">ELIJA UNA OPCION</h6>-->
        <!-- Section heading -->
        <h3 class="font-weight-bold black-text mb-4 pb-2">ELIJA UNA OPCION</h3>
        <hr class="w-header">
        <!-- Section description -->
        <p class="lead text-muted mx-auto mt-4 pt-2 mb-5">ACCIONES DISPONIBLES: FACTURACION - PARTE DIARIO DE COSECHA - SANCIONES</p>

        <!--First row-->
        <div class="row">

            <!--Grid column-->
            <div class="col-md-3 mb-4">

                <!-- Card -->
                <a href="/../control_quincenal" class="card hoverable">

                    <!-- Card content -->
                    <div class="card-body my-4">

                        <p><i class="fas fa-money-check-alt fa-2x text-info"></i></p>
                        <h6 class="black-text mb-0">FACTURACION VS. PAGO</h6>
                        <p class="font-weight-light text-muted mb-0">Detalle de facturacion quincenal.</p>
                    </div>

                </a>
                <!-- Card -->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 mb-4">

                <!-- Card -->
                <a href="/../cosecha" class="card hoverable">

                    <!-- Card content -->
                    <div class="card-body my-4">

                        <p><i class="far fa-lemon fa-2x yellow-text"></i></p>
                        <h6 class="black-text mb-0">PARTE DIARIO DE COSECHA</h6>
                        <p class="font-weight-light text-muted mb-0">Cargar informacion diaria de cosecha.</p>

                    </div>

                </a>
                <!-- Card -->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 mb-4">

                <!-- Card -->
                <a href="/../empleado" class="card hoverable">

                    <!-- Card content -->
                    <div class="card-body my-4">

                        <p><i class="fas fa-users fa-2x text-info"></i></p>
                        <h6 class="black-text mb-3" style="width:auto">EMPLEADOS</h6>
                        <p class="font-weight-light text-muted mb-0">Mantenimiento de Empleados.</p>

                    </div>

                </a>
                <!-- Card -->

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-3 mb-4">

                <!-- Card -->
                <a href="/../sancion" class="card hoverable">

                    <!-- Card content -->
                    <div class="card-body my-4">

                        <p><i class="fas fa-gavel fa-2x"></i></p>
                        <h6 class="black-text mb-3">SANCIONES</h6>
                        <p class="font-weight-light text-muted mb-0">Carga de sanciones.</p>

                    </div>

                </a>
                <!-- Card -->

            </div>
            <!--Grid column-->

        </div>
        <!--First row-->

        <!--Second row-->
        <div class="col-md-6 mb-4">

            <!-- Card -->
            <!-- Card content -->
            <div class="card-body card hoverable">
                <div class="media">
                    <span class="card-img-100 d-inline-flex justify-content-center align-items-center rounded-circle grey lighten-3 mr-4">
                        <i class="fas fa-table fa-2x purple-text"></i>
                    </span>
                    <div class="media-body">
                        <h5 class="dark-grey-text mb-2">ADMINISTRACION DE TABLAS</h5>
                        <p class="font-weight-light text-muted mb-0">Carga de nuevos clientes y capataces.</p>
                        <div class="row">
                            <a href="/../abm_cliente" class="card-link">CLIENTES</a>
                            <a href="/../abm_capataz" class="card-link">CAPATACES</a>
                            <a href="/../abm_quincena" class="card-link">QUINCENAS</a>
                            <a href="/../abm_empresa" class="card-link">EMPRESAS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


</div>
@endsection
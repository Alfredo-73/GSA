@extends('layouts.app')

@section('content')
<div class="container my-5">


    <!--Section: Content-->
    <section class="dark-grey-text">

        <!-- Section heading -->
        <h3 class="text-center font-weight-bold mb-4 pb-2">ELIJA UNA OPCION</h3>
        <hr class="w-header">
        <!-- Section description -->
        <p class="lead text-center w-responsive mx-auto text-muted mt-4 pt-2 mb-5">ACCIONES DISPONIBLES: FACTURACION - PARTE DIARIO DE COSECHA - SANSIONES</p>

        <!--First row-->
        <div class="row">

            <!--First column-->
            <div class="col-md-6 mb-4">

                <!-- Card -->
                <a href="/../control_quincenal" class="card hoverable">

                    <!-- Card content -->
                    <div class="card-body">

                        <div class="media">
                            <span class="card-img-100 d-inline-flex justify-content-center align-items-center rounded-circle grey lighten-3 mr-4">
                                <i class="fab fa-react fa-2x text-info"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="dark-grey-text mb-3">FACTURACION VS. PAGO</h5>
                                <p class="font-weight-light text-muted mb-0">Ingrese aquí para cargar datos de facturacion y pago, por quincena.</p>
                            </div>
                        </div>

                    </div>

                </a>
                <!-- Card -->

            </div>
            <!--First column-->

            <!--Second column-->
            <div class="col-md-6 mb-4">

                <!-- Card -->
                <a href="/../cosecha" class="card hoverable">

                    <!-- Card content -->
                    <div class="card-body">

                        <div class="media">
                            <span class="card-img-100 d-inline-flex justify-content-center align-items-center rounded-circle grey lighten-3 mr-4">
                                <i class="far fa-user fa-2x purple-text"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="dark-grey-text mb-3">PARTE DIARIO DE COSECHA</h5>
                                <p class="font-weight-light text-muted mb-0">Cargar informacion diaria de cosecha.</p>
                            </div>
                        </div>

                    </div>

                </a>
                <!-- Card -->
                <!-- Card -->

            </div>
            <!--Second column-->

        </div>
        <!--First row-->
        <div class="row">

            <!--First column-->
            <div class="col-md-6 mb-4">

                <!-- Card -->
                <a href="#!" class="card hoverable">

                    <!-- Card content -->
                    <div class="card-body">

                        <div class="media">
                            <span class="card-img-100 d-inline-flex justify-content-center align-items-center rounded-circle grey lighten-3 mr-4">
                                <i class="fab fa-react fa-2x text-info"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="dark-grey-text mb-3">SANSIONES DISCIPLINARIAS</h5>
                                <p class="font-weight-light text-muted mb-0">Carga de sansiones y reportes de sansiones.</p>
                            </div>
                        </div>

                    </div>

                </a>
            </div>
       

        

            <!--First column-->
            <div class="col-md-6 mb-4">

                <!-- Card -->
                <a href="/../abm" class="card hoverable">

                    <!-- Card content -->
                    <div class="card-body">

                        <div class="media">
                            <span class="card-img-100 d-inline-flex justify-content-center align-items-center rounded-circle grey lighten-3 mr-4">
                                <i class="fab fa-react fa-2x text-info"></i>
                            </span>
                            <div class="media-body">
                                <h5 class="dark-grey-text mb-3"></h5>ABM CLIENTES/CAPATACES/QUINCENAS
                                <p class="font-weight-light text-muted mb-0">Carga de nuevos clientes y capataces.</p>
                                <p>
                                <a href="/../abm_cliente" class="card-link">CLIENTES</a>
                                <a href="/../abm_capataz" class="card-link">CAPATACES</a>
                                <a href="/../abm_quincena" class="card-link">QUINCENAS</a>

                                </p>


                               
                            </div>
                        </div>

                    </div>

                </a>
            </div>
         </div>
        

    </section>


</div>
@endsection
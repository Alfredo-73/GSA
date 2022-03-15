<div class="modal fade in" id="details-modal" tabindex="-1" role="dialog" aria-labelledby="detailsModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog" style="width: 66%;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Cerrar</span></button>
                <h4 class="modal-title" id="detailsModalLabel">Editar Persona</h4>
            </div>
            <div class="details-modal-body container-fluid" style="overflow:hidden;">
                <div class="container-fluid" style="padding: 3%;">
                    <form id="staff_form">
                        <div class="row">
                            <fieldset>
                                <legend>Categoría y Empresa</legend>
                                <div class="form-group col-xs-10">
                                    <label>Empresa</label>
                                    <select class="form-control" name="empresa_id" id="companies_id" required="" disabled="disabled">
                                        <option value="">Nueva Empresa</option>
                                        <option value="6" selected="selected">AZ AGRICOLAS SRL</option>
                                        <option value="1">CITRUSVIL S.A.</option>
                                        <option value="8">J. SLEIMAN SRL</option>
                                        <option value="4">LA MARTINA SRL</option>
                                        <option value="7">PAMPLONA SRL</option>
                                        <option value="3">SAUCE HUACHO SRL</option>
                                        <option value="9">TRADING INTERNACIONAL S.A.</option>
                                        <option value="2">ZYMO SRL</option>
                                    </select>
                                </div>
                                <div class="form-group col-xs-2">
                                    <label>&nbsp;</label>
                                    <button class="btn btn-large btn-danger" id="companiesAddInline" onclick="app.companies.addinline(event)" disabled="disabled">
                                        <span id="iconCompanies" class="glyphicon glyphicon-plus"></span>
                                    </button>
                                </div>
                                <div class="col-xs-12 hidden" id="companies_add">
                                    <div class="panel panel-default">
                                        <div class="panel-body"></div>
                                    </div>
                                </div>
                                <div class="form-group col-xs-6 hidden">
                                    <label for="departments">Departamentos</label>
                                    <select data-tags="true" class="select2-hidden-accessible" id="departments" multiple="" name="departments[]" data-select2-id="departments" tabindex="-1" aria-hidden="true">
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                                                <ul class="select2-selection__rendered">
                                                    <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Seleccione Departamentos" style="width: 100px;"></li>
                                                </ul>
                                            </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                                <div class="form-group col-xs-12">
                                    <label for="jobs">Puestos</label>
                                    <select data-tags="true" class="form-control jobs select2-hidden-accessible" id="jobs" multiple="" name="jobs[]" data-select2-id="jobs" tabindex="-1" aria-hidden="true">
                                        <!--                         -->
                                        <option value="878" id="new_job_878" data-select2-id="new_job_878">AZ AGRICOLAS SA / MORAN JORGE LUIS / COSECHERO</option>
                                    </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="2" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
                                                <ul class="select2-selection__rendered">
                                                    <li class="select2-selection__choice" title="AZ AGRICOLAS SA / MORAN JORGE LUIS / COSECHERO" data-select2-id="3"><span class="select2-selection__choice__remove" role="presentation">×</span>AZ AGRICOLAS SA / MORAN JORGE LUIS / COSECHERO</li>
                                                    <li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
                                                </ul>
                                            </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                </div>
                            </fieldset>
                        </div>

                        <br class="clearfix">

                        <div class="row">
                            <fieldset>
                                <legend>Datos Personales</legend>
                                <div class="form-group col-xs-12 col-lg-6">
                                    <label for="documento">DNI</label>
                                    <input id="documento" type="text" class="form-control" name="documento" value="39730465" required="">
                                    <label for="cuit">CUIL</label>
                                    <input type="text" class="form-control" name="cuit" value="20397304656">
                                    <label for="contractor_docket">Legajo del Contratista</label>
                                    <input type="text" class="form-control" name="contractor_docket" value="19042">
                                    <div style="padding-left: 0px;padding-right: 15px;" class="col-xs-9">
                                        <label for="legajo">Legajo</label>
                                        <input id="legajo" type="text" class="form-control" name="legajo" value="75810" disabled="">
                                    </div>
                                    <div style="padding-right: 15px;padding-left: 25px;" class="col-xs-3">
                                        <label style="color: transparent;">Sugerir</label>
                                        <button class="btn btn-default" disabled="disabled" onclick="app.staff.suggestDocket(event)">Sugerir</button>
                                    </div>
                                    <label for="nombre">Apellido y Nombre</label>
                                    <input type="text" class="form-control" name="nombre" value="ABALLAY SERGIO ALEJANDRO" required="">
                                    <label class="hidden" for="pwd">Contraseña</label>
                                    <input type="password" class="form-control hidden" name="pwd" value="" placeholder="Dejar en Blanco para No Cambiar.">
                                    <input id="personal_id" class="hidden" value="16198">
                                    <label for="birthdate">Fecha de nacimiento</label>
                                    <input type="date" class="form-control" name="birthdate" value="1996-07-13">
                                    <label for="health_insurance">Obra Social</label>
                                    <input type="text" class="form-control" name="health_insurance" value="OSPRERA">
                                    <label for="started_at">Inicio de actividades</label>
                                    <input type="date" class="form-control" name="started_at" value="2018-03-01">
                                    <label for="ended_at">Fin de actividades</label>
                                    <input type="date" class="form-control" name="ended_at" value="">
                                    <br>
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="state" disabled="disabled" value="1">Habilitado</label>

                                        <label class="radio-inline">
                                            <input type="radio" name="state" value="0" checked="">
                                            Deshabilitado
                                        </label>
                                    </div>
                                    <!--                    <br/>-->
                                    <label for="blood_type">Grupo sanguíneo</label>
                                    <input type="text" class="form-control" name="blood_type" value="">

                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" value="">

                                    <label for="phones">Teléfonos</label>
                                    <input type="text" class="form-control" name="phones" value="">
                                    <br>
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" id="sex_m" value="1" title="Masculino">
                                            Masculino
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="sex" id="sex_f" value="0" title="Femenino">
                                            Femenino
                                        </label>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div id="photo_tool">
                                        <div class="container-fluid">
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-xs-10">
                                                        <div id="capture_container">
                                                            <img id="capture" src="/capture/75810.jpg">
                                                            <input type="hidden" name="foto" id="foto" value="">
                                                            <input type="hidden" name="original_name" id="original_name" value="/capture/75810.jpg" disabled="">
                                                            <input type="hidden" name="picture_owner_id" id="picture_owner_id" value="16198" disabled="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-2">
                                                        <div class="cropper-toolbar ">
                                                            <ul class="nav nav-pills nav-stacked">
                                                                <li id="cropper-crop"><span class="glyphicon glyphicon-scissors" title="Recortar"></span></li>
                                                                <li id="cropper-rotate"><span class="glyphicon glyphicon-share-alt" title="Rotar"></span></li>
                                                                <li id="cropper-reset"><span class="glyphicon glyphicon-remove-circle" title="Restaurar"></span></li>
                                                                <li id="cropper-save"><span class="glyphicon glyphicon-ok-circle" title="Guardar Cambios"></span></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row ">
                                                    <div class="col-xs-5 form-group">
                                                        <select id="pictures_reader_id" name="pictures_reader_id" class="form-control" onchange="app.pictures.showVideo(this.value, 'capture_container', event)">
                                                            <option value="0">Seleccione</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-xs-7" style="text-align: right">
                                                        <button class="btn btn-sm btn-primary" id="shutter_button" onclick="app.pictures.shutter($('#pictures_reader_id').val(), 'capture_container', event);" title="Capturar Foto" disabled="">
                                                            <span class="glyphicon glyphicon-facetime-video"></span>&nbsp;Capturar
                                                        </button>
                                                        <button class="btn btn-sm btn-danger" id="camera" ;="" "="" onclick=" app.pictures.uploadPicture(event);" title="Tomar o Subir Foto">
                                                            <span class="glyphicon glyphicon-camera"></span>&nbsp;Subir
                                                        </button>
                                                    </div>
                                                </div>
                                                <audio id="shutter_sound" src="/sound/camera-shutter.oga"></audio>
                                                <audio id="notified" src="/sound/message-new-instant.oga"></audio>
                                            </fieldset>
                                        </div>

                                        <input id="select_picture" class="hidden" type="file" accept="image/*">
                                    </div>
                                    <div class="hidden">
                                        <legend>Alta Temprana</legend>
                                        <label>Contrantista:</label><span></span><br>
                                        <label>Fecha Inicio:</label><span></span><br>
                                        <label>Archivo:</label><a href="#page=" target="_blank">Ver Alta Temprana</a>
                                        <iframe width="380" height="350" src="#page=">
                                        </iframe>
                                    </div>
                                </div>
                            </fieldset>
                            <br class="clearfix">

                            <div class="row text-right">
                                <div class="col-xs-12">
                                    <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                                    <input type="button" class="btn btn-primary" onclick="app.staff.save(event);" value="Guardar">
                                </div>
                            </div>

                            <input type="hidden" name="id" value="16198">

                        </div>
                    </form>
                    <script>
                        $(document).ready(function() {
                            $.fn.modal.Constructor.prototype.enforceFocus = function() {};

                            app.pictures.loadForm('photo_tool', $('#personal_id').val());
                            app.pictures.mode = 0;



                            //var departments = $('#departments');
                            //var jobs = $('#jobs');
                            //        var personal = $('#personal');
                            //        personal.select2({
                            //            width: '100%',
                            //            createTag: function (params) {
                            //                return undefined;
                            //            }
                            //        });
                            //        personal.on('change', function (event) {
                            //            var id = $('#personal').val();
                            //            app.association.personal.load(id);
                            //        });
                            $('#departments').select2({
                                language: 'es_AR',
                                placeholder: 'Seleccione Departamentos',
                                width: '100%',
                                ajax: {
                                    url: '/association.form/',
                                    dataType: 'json',
                                    data: function(params) {
                                        var query = {
                                            companies_id: $('#companies_id').val(),
                                            search: params.term,
                                            oper: 'departments'
                                        }
                                        return query;
                                    }
                                }
                            });

                            $('#jobs').select2({
                                language: 'es_AR',
                                placeholder: 'Seleccione Puesto',
                                width: '100%',
                                ajax: {
                                    url: '/association.form/',
                                    dataType: 'json',
                                    data: function(params) {
                                        var query = {
                                            companies_id: $('#companies_id').val(),
                                            search: params.term,
                                            oper: 'jobs'
                                        }
                                        return query;
                                    }
                                }
                            });

                            app.association.personal.load($('#personal_id').val());

                            if ($('#companies_id')[0].tagName == "SELECT") {
                                $('#companies_id').val(6);
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="modal-footer" style="display: none;">
                <button type="button" class="btn btn-default" data-dismiss="modal" tabindex="5">Cancelar</button>
                <button type="button" class="btn btn-primary" tabindex="4">Aceptar</button>
            </div>
        </div>
    </div>
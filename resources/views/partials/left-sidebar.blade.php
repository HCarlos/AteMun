<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">

    <div class="slimscroll-menu">

        <!-- LOGO -->
        <a href="/" class="logo text-left">
            <span class="logo-lg">
                <img src="{{asset('images/logo-interior.png')}}" alt="" >
            </span>
            <span class="logo-sm">
                <img src="{{asset('images/logo_sm.png')}}" >
            </span>
        </a>
    @guest()
    @else()
        <!--- Sidemenu -->
        <ul class="metismenu side-nav">
            <ul class="side-nav-second-level" aria-expanded="true">
                <li>
                    <a href="{{route('listDenuncias')}}">
                        <i class="mdi modal-dialog-popout"></i>
                        <span class="badge badge-light float-right">{{\App\Models\Denuncias\Denuncia::count()}}</span>
                        <span>Denuncias</span>
                    </a>
                </li>
            </ul>

            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="dripicons-browser"></i>
                    <span> Estructura </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('listDependencias')}}">
                            <i class="mdi mdi-account-multiple-outline"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Dependencia::count()}}</span>
                            <span>Dependencias</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('listAreas')}}">
                            <i class="mdi mdi-account-group"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Area::count()}}</span>
                            <span>Áreas</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listSubareas')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Subarea::count()}}</span>
                            <span>Subareas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('listEstatus')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Estatu::count()}}</span>
                            <span>Status</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('listMedidas')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Medida::count()}}</span>
                            <span>Medidas</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('listOrigenes')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Origen::count()}}</span>
                            <span>Origenes</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listPrioridades')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Prioridad::count()}}</span>
                            <span>Prioridades</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listServicios')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Servicio::count()}}</span>
                            <span>Servicios</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listAfiliaciones')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Afiliacion::count()}}</span>
                            <span>Afiliaciones</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listTipoasentamientos')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Domicilios\Tipoasentamiento::count()}}</span>
                            <span>Tipo Asentamientos</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listAsentamientos')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Domicilios\Asentamiento::count()}}</span>
                            <span>Asentamientos</span>
                        </a>
                    </li>


                </ul>

            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="fa fa-folder"></i>
                    <span> Domicilios </span>
                    <span class="menu-arrow"></span>
                </a>
                <ul class="side-nav-second-level" aria-expanded="false">

                    <li>
                        <a href="{{route('listCalles')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Domicilios\Calle::count()}}</span>
                            <span>Calles</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listCiudades')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Domicilios\Ciudad::count()}}</span>
                            <span>Ciudad</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listLocalidades')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Domicilios\Localidad::count()}}</span>
                            <span>Localidades</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listMunicipios')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Domicilios\Municipio::count()}}</span>
                            <span>Municipios</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listEstados')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Domicilios\Estado::count()}}</span>
                            <span>Estados</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listCodigopostales')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Domicilios\Codigopostal::count()}}</span>
                            <span>Códigos Postales</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listTipocomunidades')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Domicilios\Tipocomunidad::count()}}</span>
                            <span>Tipo Comunidades</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listComunidades')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Domicilios\Comunidad::count()}}</span>
                            <span>Comunidades</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listColonias')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Domicilios\Colonia::count()}}</span>
                            <span>Colonias</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listUbicaciones')}}">
                            <i class="fas fa-money-check-alt"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Catalogos\Domicilios\Ubicacion::count()}}</span>
                            <span>Ubicaciones</span>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="side-nav-item">
                <a href="javascript: void(0);" class="side-nav-link">
                    <i class="fas fa-cog"></i>
                    <span> Configuraciones </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="side-nav-second-level" aria-expanded="false">
                    <li>
                        <a href="{{route('listCategorias')}}">
                            <i class="fas fa-user-tag"></i>
                            <span class="badge badge-light float-right">{{\App\Models\Users\Categoria::count()}}</span>
                            <span>Categorias Usuario</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('listUsers')}}">
                            <i class="fas fa-users"></i>
                            <span class="badge badge-success float-right">{{\App\User::count()}}</span>
                            <span>Usuarios</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('asignaRole',['Id'=>0])}}">
                            <i class="fas fa-users-cog"></i>
                            <span class="badge badge-light float-right">{{\App\Role::count()}}</span>
                            <span>Roles</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('asignaPermission',['Id'=>0])}}">
                            <i class="fas fa-user-cog"></i>
                            <span class="badge badge-light float-right">{{\App\Permission::count()}}</span>
                            <span>Permisos</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route('archivosConfig')}}">
                            <i class="fas fa-file-excel"></i>
                            <span>Formatos Excel</span>
                        </a>
                    </li>

                </ul>

            </li>



        </ul>

        <div class="clearfix"></div>
    @endguest
    </div>
</div>

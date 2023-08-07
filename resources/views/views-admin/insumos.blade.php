<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Insumos</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    {{-- <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" /> --}}
    <link rel="icon" type="image/x-icon" href="{{url('img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <link href={{   URL::asset('css/demo.css')  }}  rel="stylesheet">
    <link href={{   URL::asset('vendor/css/theme-default.css')  }}  rel="stylesheet">
    <link href={{   URL::asset('vendor/css/core.css')  }}  rel="stylesheet">
    <link href={{   URL::asset('vendor/fonts/boxicons.css')  }}  rel="stylesheet">


    <link href={{   URL::asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.css')  }}  rel="stylesheet">
    <link href={{   URL::asset('vendor/libs/apex-charts/apex-charts.css')  }}  rel="stylesheet">


    <script type="text/javascript" src="{{ asset('vendor/js/helpers.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/config.js') }}"></script>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

        @include('views-admin.aside-admin')
 

     
        <div class="layout-page">

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <i class="bx bx-search fs-4 lh-0"></i>
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      {{-- <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" /> --}}
                      <img src="{{url('img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                      
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{url('img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
                        <i class="bx bx-power-off me-2"></i>
                        <span class="align-middle">Log Out</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <div class="content-wrapper">

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-10">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Gestion de Insumos</h5>
                        </div>
                      </div>
                      <div class="col-sm-2 text-center text-sm-right">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">Nuevo</button>
                            <button style="display: none" id="actualizarBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal2">Nuevo</button>
                        </div>
                      </div>
                      <!-- ====================TABLA---------------------------------- -->
                      
                      <div class="" style="padding: 10px">
                        <div class="table-responsive text-nowrap">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="text-center">Id</th>
                                <th>Nombres</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                <?php 
                                use App\Activo;
                                $articles = Activo::orderBy('id_activos')->where('estado','=',1)->get();
                                ?>
                                @foreach ($articles as $a)
                                <tr>
                                    <td class="text-center"> <strong>{{ $a->id_activos }}</strong></td>
                                    <td>{{ $a->nombres }}</td>
                                    <td>
                                        {{ $a->cantidad }}
                                    </td>
                                    <td>
                                      {{ $a->precio }}
                                  </td>
                                      <td>
                                        <span class="badge bg-label-primary me-1">Activo</span>
                                      </td>
                                    <td>
                                        <i class="bx bx-edit-alt me-2" onclick="EditarActivo({{ $a}})"></i> 
                                        <i class="bx bx-trash me-2"></i> 
                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- ====================TABLA---------------------------------- -->
                    </div>
                  </div>
                </div>
              </div>
     
            </div>
            <!--===========================================MODAL1============================================================ -->
          <!-- Modal -->
          <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="/activo" method="POST">
                   @csrf   
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Crear Insumo</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                  
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nombres" class="form-label">Nombre</label>
                      <input type="text" id="nombres" name="nombres" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="cantidad" class="form-label">Cantidad</label>
                      <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingresar Cantidad" />
                    </div>
                    <div class="col mb-0">
                      <label for="precio" class="form-label">Precio</label>
                      <input type="number" id="precio" name="precio" class="form-control" placeholder="Ingresar Precio" />
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cerrar
                  </button>
                  <input type="submit" class="btn btn-primary" value="Guardar">
                </div>
                </form>
              </div>
            </div>
          </div>
            <!--===========================================MODAL1============================================================ -->
          <!--===========================================MODAL1============================================================ -->
          <!-- Modal -->
          <div class="modal fade" id="basicModal2" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="/activo" method="POST">
                  @method('PUT')  @csrf   
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel1">Actualizar Activo</h5>
                  <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                  
                  <div class="row">
                    <div class="col mb-3">
                      <label for="nombres" class="form-label">Nombre</label>
                      <input type="hidden" id="id_activos2" name="id_activos" class="form-control" placeholder="Ingresar Nombre" />
                      <input type="text" id="nombres2" name="nombres" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row g-2">
                    <div class="col mb-0">
                      <label for="cantidad" class="form-label">Cantidad</label>
                      <input type="number" id="cantidad2" name="cantidad" class="form-control" placeholder="Ingresar Cantidad" />
                    </div>
                    <div class="col mb-0">
                      <label for="precio" class="form-label">Precio</label>
                      <input type="number" id="precio2" name="precio" class="form-control" placeholder="Ingresar Precio" />
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cerrar
                  </button>
                  <input type="submit" class="btn btn-primary" value="Editar">
                </div>
                </form>
              </div>
            </div>
          </div>
            <!--===========================================MODAL1============================================================ -->
          <script>
            function saveData(){
                          alert(1);
            }

            function EditarActivo(data){
                 document.getElementById("id_activos2").value = data.id_activos;
                 document.getElementById("nombres2").value = data.nombres;
                 document.getElementById("cantidad2").value = data.cantidad;
                 document.getElementById("precio2").value = data.precio;
                document.getElementById("actualizarBtn").click();
            }
          </script>

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  Â©
                  <script>
                    document.write(new Date().getFullYear());
                  
                  </script>
                  , made with â¤ï¸ by
                  <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                  <a
                    href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                    target="_blank"
                    class="footer-link me-4"
                    >Documentation</a
                  >

                  <a
                    href="https://github.com/themeselection/sneat-html-admin-template-free/issues"
                    target="_blank"
                    class="footer-link me-4"
                    >Support</a
                  >
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script type="text/javascript" src="{{ asset('vendor/libs/jquery/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/libs/popper/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/js/bootstrap.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/js/menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/libs/apex-charts/apexcharts.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('js/dashboards-analytics.js') }}"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

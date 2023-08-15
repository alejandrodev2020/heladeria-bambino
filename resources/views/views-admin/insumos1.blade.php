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
    <script src="sweetalert2.all.min.js"></script>
    <title>Inventario</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
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
                          <h5 class="card-title text-primary">Gestion de Insumos1</h5>
                        </div>
                      </div>
                      <div class="col-sm-2 text-center text-sm-right">
                        <div class="card-body">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">Nuevo</button>
                            <button style="display: none" id="actualizarBtn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal2">Nuevo</button>
                        </div>
                      </div>
                      <!-- ====================TABLA---------------------------------- -->
                      {{-- <div id="mytablemustcomehere"></div> --}}
                      <div class="" style="padding: 10px">
                        <div class="table-responsive text-nowrap">
                          <table class="table">
                            <thead>
                              <tr>
                                <th class="text-center">Id</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Usuario</th>
                                <th class="text-center">Tipo</th>
                                <th class="text-center">Estado</th>
                                <th class="text-center">Acciones</th>
                              </tr>
                            </thead>
                            <tbody id="mytablemustcomehere" class="table-border-bottom-0">
                          
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
                  <h5 class="modal-title" id="exampleModalLabel1">Crear Inventario</h5>
                  <button
                    type="button"
                    id="closeModalCreate"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                  
                  <div class="row">
                    <div class="col mb-3">
                      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                      <label for="fecha" class="form-label">Fecha</label>
                      <input type="date" id="fecha" name="fecha" class="form-control" placeholder="Ingresar Fecha" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="id_usuario" class="form-label">Usuario</label>
                      <select class="form-select" id="id_usuario" name="id_usuario" aria-label="Default select example">
                        <option  selected>Seleccione un Usuario</option>
                      </select>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="id_tipo_inventario" class="form-label">Tipo Inventario</label>
                      <select class="form-select" id="id_tipo_inventario" name="id_tipo_inventario" aria-label="Default select example">
                        <option selected>Seleccione un tipo</option>
                        <option value="1">Inventario de activos</option>
                        <option value="2">Inventario de insumos</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cerrar
                  </button>
                  <input type="button" class="btn btn-primary" value="Guardar" onclick="crearActivo()">
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
                  <h5 class="modal-title" id="exampleModalLabel1">Actualizar Inventario</h5>
                  <button
                    type="button"
                    id="closeModalEdit"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col mb-3">
                      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                      <input type="hidden" id="id_inventario2" name="id_inventario2" class="form-control" placeholder="Ingresar Nombre" />
                      <label for="fecha2" class="form-label">Nombre</label>
                      <input type="date" id="fecha2" name="fecha2" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="id_usuario2" class="form-label">Usuario</label>
                      <select class="form-select" id="id_usuario2" name="id_usuario2" aria-label="Default select example">
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="id_tipo_inventario2" class="form-label">Tipo Inventario</label>
                      <select class="form-select" id="id_tipo_inventario2" name="id_tipo_inventario2" aria-label="Default select example">
                        <option value="1">Inventario de activos</option>
                        <option value="2">Inventario de insumos</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Cerrar
                  </button>
                  <input type="button" class="btn btn-primary" onclick="EditarActivo2()" value="Editar">
                </div>
                </form>
              </div>
            </div>
          </div>
            <!--===========================================MODAL1============================================================ -->
          <script>
            listarActivos();
            listarUsuarios();
            var listadoActivos = [];
            var listadoUsuarios = [];
            function saveData(){
                          // alert(1);
            }
            function listarActivos(){
              $.ajax({
                      type: "GET",
                      url: '/insumo',
                      headers: {'Authorization': 'Bearer xxxxxxxxxxxxx'},
                      data: $(this).serialize(),
                      success: function(response)
                      {
                        let list = response.insumos.data;
                        listadoActivos = list;
                        let myarray2 = [];

                        for (let index = 0; index < list.length; index++) {
                          let element = list[index];
                          let tmp = '<td>'+element.id_inventario+'</td>'
                                   +'<td>'+element.fecha+'</td>'
                                   +'<td>'+element.nombre+'</td>'
                                   +'<td>'+element.tipo+'</td>'
                                   +'<td><span class="badge bg-label-primary me-1">Activo</span></td>'
                                   +'<td><i class="bx bx-edit-alt me-2" onclick="EditarActivo('+element.id_inventario+')"></i>'
                                       +'<i class="bx bx-trash me-2" onclick="EliminarActivo('+element.id_inventario+')"></i>'
                                   +'</td>';


                          myarray2.push(tmp);
                        }
                        var html = ''+
                                      '<tr class="text-center">' + 
                                        myarray2.join('</tr><tr class="text-center">') + 
                                      '</tr>'+
                                    '';
                        document.querySelector('#mytablemustcomehere').innerHTML = html;
   
                      },

                        error:function(error){
                          console.log(e.message);
                        }
                    });
            }

            function listarUsuarios(){
              $.ajax({
                      type: "GET",
                      url: '/usuario',
                      headers: {'Authorization': 'Bearer xxxxxxxxxxxxx'},
                      data: $(this).serialize(),
                      success: function(response)
                      {
                        let list = response.usuarios.data;
                        listadoUsuarios = list;
                        let myarray2 = [];

                        for (let index = 0; index < list.length; index++) {
                          let element = list[index];
                          optText = element.nombre;
                          optValue = element.id_usuario;
                          $('#id_usuario').append(`<option value="${optValue}">${optText}</option>`);
                          $('#id_usuario2').append(`<option value="${optValue}">${optText}</option>`);
                        }
             
                      },

                        error:function(error){
                          console.log(e.message);
                        }
                    });
            }
            function crearActivo(){
              $.ajax({
                      type: "POST",
                      url: '/inventario',
                      headers: {'Authorization': 'Bearer xxxxxxxxxxxxx',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                      data: {  "_token": $('#token').val(),  
                              'fecha':document.getElementById("fecha").value, 
                              'id_usuario':document.getElementById("id_usuario").value,
                              'id_tipo_inventario':document.getElementById("id_tipo_inventario").value,
                            },
                      success: function(response)
                      {  
                        document.getElementById("fecha").value = '';
                        document.getElementById("id_usuario").value = '';
                        document.getElementById("id_tipo_inventario").value = '';
                        listarActivos();
                        document.getElementById("closeModalCreate").click();
                        
                      },

                        error:function(error){
                          console.log(e.message);
                        }
                    });
            }
            function EditarActivo2(){
              $.ajax({
                      type: "PUT",
                      url: '/inventario',
                      headers: {'Authorization': 'Bearer xxxxxxxxxxxxx',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                      data: { 
                              "_token": $('#token').val(),  
                              'id_inventario':document.getElementById("id_inventario2").value, 
                              'fecha':document.getElementById("fecha2").value, 
                              'id_usuario':document.getElementById("id_usuario2").value,
                              'id_tipo_inventario':document.getElementById("id_tipo_inventario").value,
                            },
                      success: function(response)
                      {  
                        document.getElementById("id_inventario2").value = '';
                        document.getElementById("fecha2").value = '';
                        document.getElementById("id_usuario2").value = '';
                        document.getElementById("id_tipo_inventario").value = '';
                        listarActivos();
                        document.getElementById("closeModalEdit").click();
                        
                      },

                        error:function(error){
                          console.log(e.message);
                        }
                    });
            }            

            function EliminarActivo(data){
              let tm = listadoActivos;
              Swal.fire({
                  title: 'Seguro que quieres Eliminar?',
                  text: "Se dara de baja este activo",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, Eliminar!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    $.ajax({
                      type: "GET",
                      url: '/inventario-desactivar?id_inventario='+data,
                      headers: {'Authorization': 'Bearer xxxxxxxxxxxxx'},
                      data: $(this).serialize(),
                      success: function(response)
                      {
                       
                        listarActivos();
                      },

                        error:function(error){
                          console.log(e.message);
                        }
                    });
                    
                    Swal.fire(
                      'Eliminado!',
                      'Se dio de baja exitosamente.',
                      'success'
                    )
                  }
                })
            }
            function EditarActivo(id_activos){
              let tm = listadoActivos;
                 let activoActual = tm.find((ele)=>ele.id_inventario === id_activos);
                 document.getElementById("id_inventario2").value = activoActual.id_inventario;
                 document.getElementById("fecha2").value = activoActual.fecha;
                 document.getElementById("id_usuario2").value = (activoActual.id_usuario).toString();
                 document.getElementById("id_tipo_inventario").value = (activoActual.id_tipo_inventario).toString();
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="{{ asset('js/main.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('js/dashboards-analytics.js') }}"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>

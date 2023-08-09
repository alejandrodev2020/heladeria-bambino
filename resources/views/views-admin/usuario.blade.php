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
    <title>Usuarios</title>
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
                          <h5 class="card-title text-primary">Gestion de Usuarios</h5>
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
                                <th class="text-center">Nombres</th>
                                <th class="text-center">Apeliido</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Ci</th>
                                <th class="text-center">Rol</th>
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
                  <h5 class="modal-title" id="exampleModalLabel1">Crear Usuario</h5>
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
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="apellido" class="form-label">Apellido</label>
                      <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="ci" class="form-label">C.I.</label>
                      <input type="text" id="ci" name="ci" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="email" class="form-label">Email</label>
                      <input type="text" id="email" name="email" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="password" class="form-label">Contraseña</label>
                      <input type="password" id="password" name="password" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="id_rol" class="form-label">Rol</label>
                      <select class="form-select" id="id_rol" name="id_rol" aria-label="Default select example">
                        <option selected>Seleccione un Rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Secretaria</option>
                        <option value="3">Jefe de Produccion</option>
                        <option value="4">Ayudante de Produccion</option>
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
                  <h5 class="modal-title" id="exampleModalLabel1">Actualizar Activo</h5>
                  <button
                    type="button"
                    id="closeModalEdit"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                  ></button>
                </div>
                <div class="modal-body">
                  
                  {{-- <div class="row">
                    <div class="col mb-3">
                      <label for="nombres" class="form-label">Nombre</label>
                      <input type="hidden" id="id_activos2" name="id_activos2" class="form-control" placeholder="Ingresar Nombre" />
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
                  </div> --}}
                  <div class="row">
                    <div class="col mb-3">
                      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                      <input type="hidden" id="id_usuario2" name="id_usuario2" class="form-control" placeholder="Ingresar Nombre" />
                      <label for="nombre2" class="form-label">Nombre</label>
                      <input type="text" id="nombre2" name="nombre2" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="apellido2" class="form-label">Apellido</label>
                      <input type="text" id="apellido2" name="apellido2" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="ci2" class="form-label">C.I.</label>
                      <input type="text" id="ci2" name="ci2" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="email2" class="form-label">Email</label>
                      <input type="text" id="email2" name="email2" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-3">
                      <label for="password2" class="form-label">Contraseña</label>
                      <input type="password" id="password2" name="password2" class="form-control" placeholder="Ingresar Nombre" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="id_rol" class="form-label">Rol</label>
                      <select class="form-select" id="id_rol2" name="id_rol2" aria-label="Default select example">
                        <option selected>Seleccione un Rol</option>
                        <option value="1">Administrador</option>
                        <option value="2">Secretaria</option>
                        <option value="3">Jefe de Produccion</option>
                        <option value="4">Ayudante de Produccion</option>
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
            var listadoActivos = [];
            function saveData(){
                          // alert(1);
            }
            function listarActivos(){
              $.ajax({
                      type: "GET",
                      url: 'https://www.tecnoweb.org.bo/inf513/grupo07sa/heladeria-bambino/public/usuario',
                      headers: {'Authorization': 'Bearer xxxxxxxxxxxxx'},
                      data: $(this).serialize(),
                      success: function(response)
                      {
                        let list = response.usuarios.data;
                        listadoActivos = list;
                        let myarray2 = [];

                        for (let index = 0; index < list.length; index++) {
                          let element = list[index];
                          let tmp = '<td>'+element.id_usuario+'</td>'
                                   +'<td>'+element.nombre+'</td>'
                                   +'<td>'+element.apellido+'</td>'
                                   +'<td>'+element.email+'</td>'
                                   +'<td>'+element.ci+'</td>'
                                   +'<td>'+element.nombre_rol+'</td>'
                                   +'<td><span class="badge bg-label-primary me-1">Activo</span></td>'
                                   +'<td><i class="bx bx-edit-alt me-2" onclick="EditarActivo('+element.id_usuario+')"></i>'
                                       +'<i class="bx bx-trash me-2" onclick="EliminarActivo('+element.id_usuario+')"></i>'
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
            function crearActivo(){
              $.ajax({
                      type: "POST",
                      url: 'https://www.tecnoweb.org.bo/inf513/grupo07sa/heladeria-bambino/public/usuario',
                      headers: {'Authorization': 'Bearer xxxxxxxxxxxxx',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                      data: {  "_token": $('#token').val(),  
                              'nombre':document.getElementById("nombre").value, 
                              'apellido':document.getElementById("apellido").value,
                              'ci':document.getElementById("ci").value,
                              'email':document.getElementById("email").value,
                              'password':document.getElementById("password").value,
                              'id_rol':document.getElementById("id_rol").value,
                            },
                      success: function(response)
                      {  
                        document.getElementById("nombre").value = '';
                        document.getElementById("apellido").value = '';
                        document.getElementById("ci").value = '';
                        document.getElementById("email").value = '';
                        document.getElementById("password").value = '';
                        document.getElementById("id_rol").value = '';
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
                      url: 'https://www.tecnoweb.org.bo/inf513/grupo07sa/heladeria-bambino/public/usuario',
                      headers: {'Authorization': 'Bearer xxxxxxxxxxxxx',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                      data: { 
                              "_token": $('#token').val(),  
                              'id_usuario':document.getElementById("id_usuario2").value, 
                              'nombre':document.getElementById("nombre2").value, 
                              'apellido':document.getElementById("apellido2").value,
                              'ci':document.getElementById("ci2").value,
                              'email':document.getElementById("email2").value,
                              'password':document.getElementById("password2").value,
                              'id_rol':document.getElementById("id_rol2").value,
                            },
                      success: function(response)
                      {  
                        document.getElementById("id_usuario2").value = '';
                        document.getElementById("nombre2").value = '';
                        document.getElementById("apellido2").value = '';
                        document.getElementById("ci2").value = '';
                        document.getElementById("email2").value = '';
                        document.getElementById("password2").value = '';
                        document.getElementById("id_rol2").value = '';
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
                      url: 'https://www.tecnoweb.org.bo/inf513/grupo07sa/heladeria-bambino/public/usuario-desactivar?id_usuario='+data,
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
                 let activoActual = tm.find((ele)=>ele.id_usuario === id_activos);
                 document.getElementById("id_usuario2").value = activoActual.id_usuario;
                 document.getElementById("nombre2").value = activoActual.nombre;
                 document.getElementById("apellido2").value = activoActual.apellido;
                 document.getElementById("ci2").value = activoActual.ci;
                 document.getElementById("email2").value = activoActual.email;
                 document.getElementById("password2").value = activoActual.password;
                 document.getElementById("id_rol2").value = activoActual.id_rol;
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

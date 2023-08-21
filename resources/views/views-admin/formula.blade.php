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
    <title>Costos</title>
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
                          <h5 class="card-title text-primary">Gestion de Formulas</h5>
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
                                <th class="text-center">Costos Operativos</th>
                                <th class="text-center">Costos Brutos</th>
                                <th class="text-center">Fecha</th>
                                <th class="text-center">Producto</th>
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
                  <h5 class="modal-title" id="exampleModalLabel1">Crear Formula</h5>
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
                     
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col mb-0">
                      <label for="nombre" class="form-label">Nombre</label>
                      <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresar Costos Brutos" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="cantidad_produccion" class="form-label">Cantidad Producción</label>
                      <input type="number" id="cantidad_produccion" name="cantidad_produccion" class="form-control" placeholder="Ingresar Cantidad de Producción" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="descripcion" class="form-label">Descripcion</label>
                      <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Ingresar Descripcion" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="cantidad_personal" class="form-label">Cantidad Personal</label>
                      <input type="number" id="cantidad_personal" name="cantidad_personal" class="form-control" placeholder="Ingresar Cantidad de Personal" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="duracion_horas" class="form-label">Duracion Horas</label>
                      <input type="number" id="duracion_horas" name="duracion_horas" class="form-control" placeholder="Ingresar Duracion Horas" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="id_producto" class="form-label">Producto</label>
                      <select class="form-select" id="id_producto" name="id_producto" aria-label="Default select example">
                        <option  selected>Seleccione un producto</option>
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
                  
                  <div class="row">
                    <div class="col mb-3">
                      <label for="costos_operativos2" class="form-label">Costos Operativos</label>
                      <input type="hidden" id="id_costos2" name="id_costos2" class="form-control" placeholder="Ingresar Nombre" />
                      <input type="text" id="costos_operativos2" name="costos_operativos2" class="form-control" placeholder="Ingresar Costos Operativos" />
                    </div>
                  </div>
                  <div class="row ">
                    <div class="col mb-0">
                      <label for="costos_brutos2" class="form-label">Costos Brutos</label>
                      <input type="number" id="costos_brutos2" name="costos_brutos2" class="form-control" placeholder="Ingresar Costos Brutos" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="fecha2" class="form-label">Fecha</label>
                      <input type="date" id="fecha2" name="fecha2" class="form-control" placeholder="Ingresar Fecha" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="col mb-0">
                      <label for="id_producto2" class="form-label">Producto</label>
                      <select class="form-select" id="id_producto2" name="id_producto2" aria-label="Default select example">
                        <option  selected>Seleccione un producto</option>
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
            listarProductos();
            var listadoActivos = [];
            var listadoCostos = [];
            function saveData(){
                          // alert(1);
            }
            function listarActivos(){
              $.ajax({
                      type: "GET",
                      url: '/costos',
                      headers: {'Authorization': 'Bearer xxxxxxxxxxxxx'},
                      data: $(this).serialize(),
                      success: function(response)
                      {
                        let list = response.costos.data;
                        listadoActivos = list;
                        listadoCostos = list;
                        let myarray2 = [];

                        for (let index = 0; index < list.length; index++) {
                          let element = list[index];
                          let tmp = '<td>'+element.id_costos+'</td>'
                                   +'<td>'+element.costos_operativos+'</td>'
                                   +'<td>'+element.costos_brutos+'</td>'
                                   +'<td>'+element.fecha+'</td>'
                                   +'<td>'+element.nombre_producto+'</td>'
                                   +'<td><span class="badge bg-label-primary me-1">Activo</span></td>'
                                   +'<td><i class="bx bx-edit-alt me-2" onclick="EditarActivo('+element.id_costos+')"></i>'
                                       +'<i class="bx bx-trash me-2" onclick="EliminarActivo('+element.id_costos+')"></i>'
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
            function listarProductos(){
              $.ajax({
                      type: "GET",
                      url: '/productos',
                      headers: {'Authorization': 'Bearer xxxxxxxxxxxxx'},
                      data: $(this).serialize(),
                      success: function(response)
                      {
                        let list = response.productos.data;
                        listadoActivos = list;
                        let myarray2 = [];

                        for (let index = 0; index < list.length; index++) {
                          let element = list[index];
                          optText = element.nombre;
                          optValue = element.id_producto;
                          $('#id_producto').append(`<option value="${optValue}">${optText}</option>`);
                          $('#id_producto2').append(`<option value="${optValue}">${optText}</option>`);
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
                      url: '/formula',
                      headers: {'Authorization': 'Bearer xxxxxxxxxxxxx',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                      data: {  "_token": $('#token').val(),  
                              'nombre':document.getElementById("nombre").value, 
                              'cantidad_produccion':document.getElementById("cantidad_produccion").value,
                              'descripcion':document.getElementById("descripcion").value,
                              'cantidad_personal':document.getElementById("cantidad_personal").value,
                              'duracion':document.getElementById("duracion").value,
                              'id_producto':document.getElementById("id_producto").value
                            },
                      success: function(response)
                      { 
                        document.getElementById("costos_operativos").value ='';
                        document.getElementById("costos_brutos").value ='';
                        document.getElementById("fecha").value ='';
                        document.getElementById("id_producto").value ='';
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
                      url: '/costos',
                      headers: {'Authorization': 'Bearer xxxxxxxxxxxxx',
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                      data: { 
                               "_token": $('#token').val(),  
                              'id_costos':document.getElementById("id_costos2").value, 
                              'costos_operativos':document.getElementById("costos_operativos2").value, 
                              'costos_brutos':document.getElementById("costos_brutos2").value,
                              'fecha':document.getElementById("fecha2").value,
                              'id_producto':document.getElementById("id_producto2").value
                            },
                      success: function(response)
                      {  
                        document.getElementById("id_costos2").value = '';
                        document.getElementById("costos_operativos2").value = '';
                        document.getElementById("costos_brutos2").value = '';
                        document.getElementById("fecha2").value = '';
                        document.getElementById("id_producto2").value = '';
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
                      url: '/costos-desactivar?id_costos='+data,
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
              let tm = listadoCostos;
                 let activoActual = tm.find((ele)=>ele.id_costos === id_activos);
                 document.getElementById("id_costos2").value = activoActual.id_costos;
                 document.getElementById("costos_operativos2").value = activoActual.costos_operativos;
                 document.getElementById("costos_brutos2").value = activoActual.costos_brutos;
                 document.getElementById("fecha2").value = activoActual.fecha;
                 document.getElementById("id_producto").value = activoActual.id_producto;
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

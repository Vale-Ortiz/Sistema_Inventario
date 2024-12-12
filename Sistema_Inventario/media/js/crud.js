// Cargar el contenido del header y footer desde los archivos HTML
function cargarComponentes() {
  // Cargar el archivo header.html
  fetch('../componentes/header.php')
  .then(response => {
      if (!response.ok) {
          throw new Error('Error al cargar el archivo header');
      }
      return response.text();
  })
  .then(data => {
      document.getElementById('header-container').innerHTML = data;
  })
  .catch(error => console.error('Error:', error));

  // Cargar el archivo headergestor.html
  fetch('../componentes/headergestor.php')
  .then(response => {
      if (!response.ok) {
          throw new Error('Error al cargar el archivo header');
      }
      return response.text();
  })
  .then(data => {
      document.getElementById('header-container1').innerHTML = data;
  })
  .catch(error => console.error('Error:', error));

  // Cargar el archivo headeringeniero.html
  fetch('../componentes/headeringeniero.php')
  .then(response => {
      if (!response.ok) {
          throw new Error('Error al cargar el archivo header');
      }
      return response.text();
  })
  .then(data => {
      document.getElementById('header-container2').innerHTML = data;
  })
  .catch(error => console.error('Error:', error));

  // Cargar el archivo footer.html
  fetch('../componentes/footer.php')
  .then(response => {
      if (!response.ok) {
          throw new Error('Error al cargar el archivo footer');
      }
      return response.text();
  })
  .then(data => {
      document.getElementById('footer-pie').innerHTML = data;
  })
  .catch(error => console.error('Error:', error));
}

// Toggle de menú de navegación
function toggleMenu() {
  const navLinks = document.querySelector('.nav-links');
  navLinks.classList.toggle('show-menu');
}

// Cerrar el menú al seleccionar una opción
function cerrarMenu() {
  const navLinks = document.querySelectorAll('.nav-links a');
  navLinks.forEach(link => {
      link.addEventListener('click', () => {
          const navLinksContainer = document.querySelector('.nav-links');
          navLinksContainer.classList.remove('show-menu'); // Cierra el menú al hacer clic
      });
  });
}

//Modal Cargar Detalles del proyecto
$("body").on("click","#mostrardetalleproyecto",function(e){
  e.preventDefault();    
   var datos = {'proyecto_id': $(this).attr('value')};
  $("#modalProyecto").load("../../informes/detalle.php", datos).modal("show");  
 
});

// Cargar contenido dinámico al hacer clic en las opciones de menú
function cargarContenido() {
  $(document).ready(function() {

      // Cargar el contenido inicial
      $("#contenido").load("../../crub_proyecto/proyecto.php");
      $("#contenido2").load("../../crub_proyecto/ver_proyectos.php");
      

      // CRUD PROYECTOS Cargar contenido de proyectos
          $("body").on("click","#proyectos",function(e){
            e.preventDefault();
            $.ajax({
              success: function(){
                $("#contenido").load("../../crub_proyecto/proyecto.php");
              }
            });
          });

          $("body").on("click","#verproyectos",function(e){
            e.preventDefault();
            $.ajax({
              success: function(){
                $("#contenido").load("../../crub_proyecto/ver_proyectos.php");
              }
            });
          });   

          //Modal Cargar Detalles del proyecto
        
          $("body").on("click","#editarproyecto",function(e){
          e.preventDefault();
          var datos = {'r1' : $(this).attr('data-r1'),
                      'r2' : $(this).attr('data-r2'),
                      'r3' : $(this).attr('data-r3'),
                      'r4' : $(this).attr('data-r4'),
                      'r5' : $(this).attr('data-r5'),
                      'r6' : $(this).attr('data-r6'),
                    };
                    $("#contenido").load("../../crub_proyecto/actualizar.php",datos);
              });

              $("body").on("click","#actualizarproyecto",function(e){
                e.preventDefault();
                $.ajax({
                  type: "POST",
                  url: "../../crub_proyecto/guardarcambios.php",
                  data: $("#formulario").serialize(),
                  success: function(){
                    $("#contenido").load("../../crub_proyecto/proyecto.php");
                  }
                });
              });
                      
          
          $("body").on("click","#guardarproyecto",function(e){
            e.preventDefault();
            $.ajax({
              type: "POST",
              url: "../../crub_proyecto/guardar.php",
              data: $("#formulario").serialize(),
              success: function(){
                $("#contenido").load("../../crub_proyecto/proyecto.php");
              }
            });
          });

          $("body").on("click", "#eliminarproyecto", function (e) {
            e.preventDefault();
        
            // Mostrar cuadro de confirmación
            if (confirm("¿Estás seguro de eliminar el proyecto?")) {
                // Si el usuario confirma, proceder a eliminar
                var datos = { 'codigo': $(this).val() };
                
                $.ajax({
                    type: "POST",
                    url: "../../crub_proyecto/eliminar.php",
                    data: datos,
                    success: function () {
                        alert("El proyecto ha sido eliminado exitosamente.");
                        $("#contenido").load("../../crub_proyecto/proyecto.php");
                    },
                    error: function () {
                        alert("Hubo un error al intentar eliminar el proyecto.");
                    }
                });
            } else {
                // Si el usuario cancela, mostrar mensaje opcional
                alert("El proyecto no fue eliminado.");
            }
        });
        

           // CRUD USUARIOS Cargar contenido de usuarios        
          $("body").on("click","#usuarios",function(e){
            e.preventDefault();
            $.ajax({
              success: function(){
                $("#contenido").load("../../crub_usuarios/usuarios.php");
              }
            });
          });      

          $("body").on("click","#guardarusuario",function(e){
            e.preventDefault();
            $.ajax({
              type: "POST",
              url: "../../crub_usuarios/guardar.php",
              data: $("#formularios").serialize(),
              success: function(){
                $("#contenido").load("../../crub_usuarios/usuarios.php");
              }
            });
          });

          $("body").on("click", "#eliminarusuario", function (e) {
            e.preventDefault();
        
            // Mostrar cuadro de confirmación
            if (confirm("¿Estás seguro de eliminar el usuario?")) {
                // Si el usuario confirma, proceder a eliminar
                var datos = { 'codigo': $(this).attr('value') };
                
                $.ajax({
                    type: "POST",
                    url: "../../crub_usuarios/eliminar.php",
                    data: datos,
                    success: function () {
                        alert("El usuario ha sido eliminado exitosamente.");
                        $("#contenido").load("../../crub_usuarios/usuarios.php");
                    },
                    error: function () {
                        alert("Hubo un error al intentar eliminar el usuario.");
                    }
                });
            } else {
                // Si el usuario cancela, mostrar mensaje opcional
                alert("El usuario no fue eliminado.");
            }
        });

           // CRUD Proveedores Cargar contenido de proveedores        
           $("body").on("click","#proveedores",function(e){
            e.preventDefault();
            $.ajax({
              success: function(){
                $("#contenido").load("../../crud_proveedores/proveedores.php");
              }
            });
          });
      
          $("body").on("click","#guardarproveedores",function(e){
            e.preventDefault();
            $.ajax({
              type: "POST",
              url: "../../crud_proveedores/guardar.php",
              data: $("#formularios").serialize(),
              success: function(){
                $("#contenido").load("../../crud_proveedores/proveedores.php");
              }
            });
          });

          $("body").on("click","#eliminarproveedor",function(e){
            e.preventDefault();

            if (confirm("¿Estás seguro de eliminar el proveedor?")) {
              // Si el usuario confirma, proceder a eliminar
              var datos = { 'codigo': $(this).attr('value') };
              
              $.ajax({
                  type: "POST",
                  url: "../../crud_proveedores/eliminar.php",
                  data: datos,
                  success: function () {
                      alert("El proveedor ha sido eliminado exitosamente.");
                      $("#contenido").load("../../crud_proveedores/proveedores.php");
                  },
                  error: function () {
                      alert("Hubo un error al intentar eliminar el proveedor.");
                  }
              });
          } else {
              // Si el usuario cancela, mostrar mensaje opcional
              alert("El proveedor no fue eliminado.");
          }
      });
            

           // CERRAR SESSION 

           $("body").on("click","#desconectar",function(e){
            e.preventDefault();
            $.ajax({
              success: function(){
              window.location.href = '../../roles/desconectar.php';
              }
            });
          });
     });
}

            // CRUD MATERIALES Cargar contenido de Materiales         
            $("body").on("click","#materiales",function(e){
    e.preventDefault();
    $.ajax({
      success: function(){
        $("#contenido").load("../../crud_materiales/material.php");
      }
    });
          });

            $("body").on("click","#guardarmaterial",function(e){
            e.preventDefault();
            $.ajax({
            type: "POST",
            url: "../../crud_materiales/guardar.php",
            data: $("#formularios").serialize(),
            success: function(){
            $("#contenido").load("../../crud_materiales/material.php");
            }
          });
          });


          $("body").on("click","#eliminarmaterial",function(e){
            e.preventDefault();

            if (confirm("¿Estás seguro de eliminar el material?")) {
              // Si el usuario confirma, proceder a eliminar
              var datos = { 'codigo': $(this).attr('value') };
              
              $.ajax({
                  type: "POST",
                  url: "../../crud_materiales/eliminar.php",
                  data: datos,
                  success: function () {
                      alert("El material ha sido eliminado exitosamente.");
                      $("#contenido").load("../../crud_materiales/material.php");
                  },
                  error: function () {
                      alert("Hubo un error al intentar eliminar el material.");
                  }
              });
          } else {
              // Si el usuario cancela, mostrar mensaje opcional
              alert("El material no fue eliminado.");
          }
      });
  
          // CRUD OTORGAMIENTOS Cargar contenido de Materiales        
            $("body").on("click","#otorgamientos",function(e){
    e.preventDefault();
    $.ajax({
      success: function(){
        $("#contenido").load("../../otorgamientos/otorgamientos.php");
      }
    });
          });  

          // -- Boton Consultar -- //
            $("body").on("click","#btnSeleccionarproyecto",function(e){
    e.preventDefault();
    var datos = {'operacion': $(this).attr('name'),          
           'proyecto': $("#proyecto").val(),
           };
      $("#contenido").load("../../otorgamientos/otorgamientos.php", datos);
          });


          // -- Boton Agregar Mas Materiales-- //  
            $("body").on("click","#btnagregarmaterial",function(e){
    e.preventDefault();
    var datos = {'operacion': $(this).attr('name'),
           'numser_codigo': $("#numser_codigo").val(),             
           'cantidad': $("#cantidad").val(),           
          };
          $("#contenido").load("../../otorgamientos/otorgamientos.php", datos);
          });


          // ------- Boton Eliminar Cada Material Agregado ------------ //
            $("body").on("click","#eliminarDetallematerial",function(e){
    e.preventDefault();
    var datos = {'codigo': $(this).attr('detalle')};
    if (confirm('¿Esta Seguro que Desea Eliminar Este Material?')){ 
        $.ajax({
      type: "GET",
      url: "../../otorgamientos/eliminarDetalle.php",
      data: datos,
      success: function(){
        $("#contenido").load("../../otorgamientos/otorgamientos.php", datos);
      }
    });
     }
          });

          // -- Boton Otorgar -- //   
            $("body").on("click","#guardarotorgamientos",function(e){
          e.preventDefault();
          var datos = {'operacion': $(this).attr('name'),
                'documentol': $("#documentol").val(),
                'ser_documento': $("#ser_documento").val(),
                'total': $("#total").val()
                };
                $("#contenido").load("../../otorgamientos/otorgamientos.php", datos);
          }); 

          // -- Boton Otorgar  -- //   
            $("body").on("click","#btnguardarotorgar",function(e){
        e.preventDefault();
        var datos = {'operacion': $(this).attr('name'),
              'usua': $("#usua").val(),              
              };
              $("#contenido").load("../../otorgamientos/otorgamientos.php", datos);
          });

          // --- Boton Cancelar Sessiones 
            $("body").on("click","#btncancelar1",function(e){
          e.preventDefault();
          var datos = {'operacion': $(this).attr('name')};
          $("#contenido").load("../../otorgamientos/otorgamientos.php", datos);
          });

          // INFORMES Cargar contenido
            $("body").on("click","#informes",function(e){
    e.preventDefault();
    $.ajax({
      success: function(){
        $("#contenido").load("../../crub_proyecto/ver_proyectos.php");
      }
    });
          });  

          //  SOLICITUDES INGENIEROS
            $("body").on("click","#solicitudes-materiales",function(e){
    e.preventDefault();
    $.ajax({
      success: function(){
        $("#contenido").load("../../crud_solicitudes/versolicitudes.php");
      }
    });
          });  

            $("body").on("click","#Solicitudes",function(e){
    e.preventDefault();
    $.ajax({
      success: function(){
        $("#contenido2").load("../../crud_solicitudes/solicitud.php");
      }
    });
          });  


            $("body").on("click","#verproyectos",function(e){
    e.preventDefault();
    $.ajax({
      success: function(){
        $("#contenido2").load("../../crub_proyecto/ver_proyectos.php");
      }
    });
          });  

            $("body").on("click","#guardarsolisitud",function(e){
            e.preventDefault();
            $.ajax({
            type: "POST",
            url: "../../crud_solicitudes/guardar.php",
            data: $("#formularios").serialize(),
            success: function(){
            $("#contenido2").load("../../crud_solicitudes/solicitud.php");
            }
              });
          });


            $("body").on("click","#eliminarsolicitudes",function(e){
            e.preventDefault();

            if (confirm("¿Estás seguro de eliminar la solicitud?")) {
              // Si el usuario confirma, proceder a eliminar
              var datos = { 'codigo': $(this).attr('value') };
              
              $.ajax({
                  type: "POST",
                  url: "../../crud_solicitudes/eliminar.php",
                  data: datos,
                  success: function () {
                      alert("La solicitud ha sido eliminado exitosamente.");
                      $("#contenido2").load("../../crud_solicitudes/solicitud.php");
                  },
                  error: function () {
                      alert("Hubo un error al intentar eliminar la solicitud.");
                  }
                });
              } else {
                // Si el usuario cancela, mostrar mensaje opcional
                  alert("La solicitud no fue eliminada.");
                }
            });

            // Ejecutar todas las funciones al cargar el documento
            document.addEventListener('DOMContentLoaded', function() {
                cargarComponentes(); // Cargar el header y footer
                cerrarMenu(); // Configurar el cierre del menú al hacer clic
                cargarContenido(); // Configurar la carga de contenido dinámico
              });




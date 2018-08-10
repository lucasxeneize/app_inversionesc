<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administradoras
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administradoras Agentes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarAdministradora">
          
          Agregar administradora

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Rut</th>
           <th>Administradora</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $administradoras = ControladorAdministradoras::ctrMostrarAdministradoras($item, $valor);


          foreach ($administradoras as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["rut"].'</td>

                    <td class="text-uppercase">'.$value["razon_social"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarAdministradora" idAdministradora="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarAdministradora"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarAdministradora" idAdministradora="'.$value["id"].'"><i class="fa fa-times"></i></button>

                      </div>  

                    </td>

                  </tr>';
          }

        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR ADMINISTRADORA
======================================-->

<div id="modalAgregarAdministradora" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar administradora</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA RUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoRut" placeholder="Ingresar rut" required>

              </div>

            </div>
  
          <!-- ENTRADA PARA RAZON SOCIAL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaRazonSocial" placeholder="Ingresar razón social" required>

              </div>

            </div>


          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar administradora</button>

        </div>

        <?php

          $crearAdministradora = new ControladorAdministradoras();
          $crearAdministradora -> ctrCrearAdministradora();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR ADMINISTRADORA
======================================-->

<div id="modalEditarAdministradora" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar administradora</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

          <!-- ENTRADA PARA RUT -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarRut" id="editarRut" required>

                 <input type="hidden"  name="idAdministradora" id="idAdministradora" required>

              </div>

            </div>

            <!-- ENTRADA PARA RAZON SOCIAL -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarRazonSocial" id="editarRazonSocial" required>

                 <input type="hidden"  name="idAdministradora" id="idAdministradora" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

          $editarAdministradora = new ControladorAdministradoras();
          $editarAdministradora -> ctrEditarAdministradora();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarAdministradora = new ControladorAdministradoras();
  $borrarAdministradora -> ctrBorrarAdministradora();

?>



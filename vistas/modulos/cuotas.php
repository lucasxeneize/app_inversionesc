<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar cuotas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar cuotas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCuota">
          
          Agregar cuotas

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Instrumento</th>
           <th>Valor cuota $</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
        <?php

          $item = null;
          $valor = null;
          $item2 = null;
          $valor2 = null;

          $movimientos = ControladorCuotas::ctrMostrarCuotas($item, $item2, $valor, $valor2);

          foreach ($movimientos as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["fecha"].'</td>';

                    $item = "id";
                    $valor = $value["id_instrumento"];
                    $instrumento = ControladorInstrumentos::ctrMostrarInstrumentos($item, $valor);

                    echo '
                    <td class="text-uppercase">'.$instrumento["nombre"].'</td>
                    <td class="text-uppercase">'.$value["valor"].'</td>
                    
                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCuota" fecha="'.$value["fecha"].'" idInstrumento="'.$value["id_instrumento"].'" data-toggle="modal" data-target="#modalEditarCuota" fecha="'.$value["fecha"].'" idInstrumento="'.$value["id_instrumento"].'"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarCuota" fecha="'.$value["fecha"].'" idInstrumento="'.$value["id_instrumento"].'">
                          <i class="fa fa-times"></i>
                        </button>

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
MODAL AGREGAR CUOTA
======================================-->

<div id="modalAgregarCuota" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar cuota</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA FECHA -->
            <div class="form-group">
              <label for="nFecha">Fecha</label>
              <input type="date" class="form-control" name="nFecha" id="nFecha" placeholder="Ingrese fecha">
            </div>

            <!-- ENTRADA PARA SELECCIONAR INSTRUMENTO -->
            <div class="form-group">
            
              <label>Instrumento</label>
            
              <select class="form-control" name="nInstrumento">
              <option value="">Seleccione una opción</option>
              <?php
                $item = null;
                $valor = null;

                $instrumentos = ControladorInstrumentos::ctrMostrarInstrumentos($item, $valor);

                  foreach ($instrumentos as $key => $value) {

                    $item = "id";
                    $valor = $value["id_administradora"];
                    $administradora = ControladorAdministradoras::ctrMostrarAdministradoras($item, $valor);


                    echo '<option value="'.$value["id"].'">'.$administradora['nombre_fantasia'].'-'.$value["nombre"].'-'.$value["serie"].'-'.$value["cuenta"].'</option>"';
                }

              ?>
              </select>

              <p class="help-block">Administradora-Instrumento-Serie-Cuenta</p>
            
            </div>
         
            <div class="form-group">

              <label for="nMonto">Monto</label>

              <input type="text" class="form-control" name="nMonto" id="nMonto" placeholder="Ingrese monto">

            </div>

          </div>

        </div>

       <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cuota</button>

        </div>

        <?php

          $crearCuota = new ControladorCuotas();
          $crearCuota -> ctrCrearCuota();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CUOTA
======================================-->

<div id="modalEditarCuota" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar cuota</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA FECHA -->
            <div class="form-group">
              <label for="eFecha">Fecha</label>
              <input type="date" class="form-control" name="eFecha" id="eFecha">

              <input type="hidden" class="form-control" name="fecha" id="fecha">
              <input type="hidden" class="form-control" name="idInstrumento" id="idInstrumento">

            </div>

            <!-- ENTRADA PARA SELECCIONAR INSTRUMENTO -->
            <div class="form-group">
            
            <label>Instrumento</label>
          
            <select class="form-control" name="eInstrumento" id="eInstrumento">
            <option value="">Seleccione una opción</option>
            <?php
              $item = null;
              $valor = null;

              $instrumentos = ControladorInstrumentos::ctrMostrarInstrumentos($item, $valor);

              foreach ($instrumentos as $key => $value) {

                $item = "id";
                $valor = $value["id_administradora"];
                $administradora = ControladorAdministradoras::ctrMostrarAdministradoras($item, $valor);


                echo '<option value="'.$value["id"].'">'.$administradora['nombre_fantasia'].'-'.$value["nombre"].'-'.$value["serie"].'-'.$value["cuenta"].'</option>"';
              }

              ?>
              </select>

              <p class="help-block">Administradora-Instrumento-Serie-Cuenta</p>
            
            </div>

            <!-- ENTRADA PARA EDITAR MONTO -->
            <div class="form-group">

              <label for="nMonto">Monto</label>

              <input type="text" class="form-control" name="eMonto" id="eMonto">

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

          $editarCuota = new ControladorCuotas();
          $editarCuota -> ctrEditarCuota();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCuota = new ControladorCuotas();
  $borrarCuota -> ctrBorrarCuota();

?>

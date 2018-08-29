<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar movimientos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar movimientos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarMovimiento">
          
          Agregar movimiento

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Fecha</th>
           <th>Administradora</th>
           <th>Instrumento</th>
           <th>Serie</th>
           <th>Operación</th>
           <th>Monto en $</th>
           <th>Valor cuota $</th>
           <th>Cuotas</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
        <?php

          $item = null;
          $valor = null;

          $movimientos = ControladorMovimientos::ctrMostrarMovimientos($item, $valor);

          foreach ($movimientos as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["fecha"].'</td>';

                    $item = "id";
                    $valor = $value["id_instrumento"];
                    $instrumento = ControladorInstrumentos::ctrMostrarInstrumentos($item, $valor);

                    $item = "id";
                    $valor = $instrumento["id_administradora"];
                    $administradora = ControladorAdministradoras::ctrMostrarAdministradoras($item, $valor);

                    echo '<td class="text-uppercase">'.$administradora["nombre_fantasia"].'</td>
                    <td class="text-uppercase">'.$instrumento["nombre"].'</td>
                    <td class="text-uppercase">'.$instrumento["serie"].'</td>
                    <td class="text-uppercase">'.$value["operacion"].'</td>
                    <td class="text-uppercase">'.$value["monto"].'</td>
                    <td class="text-uppercase">'.$value["valor_cuota"].'</td>
                    <td class="text-uppercase">'.$value["cuotas"].'</td>
                   

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarMovimiento" idMovimiento="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarMovimiento"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarMovimiento" idMovimiento="'.$value["id"].'">
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
MODAL AGREGAR MOVIMIENTO
======================================-->

<div id="modalAgregarMovimiento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar movimiento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA FECHA -->
            <div class="form-group">
              <label for="nFechaMaterializacion">Fecha</label>
              <input type="date" class="form-control" name="nFechaMaterializacion" id="nFechaMaterializacion" placeholder="Ingrese fecha materialización">
            </div>

            <div class="form-group">
              
             <!-- ENTRADA PARA SELECCIONAR OPERACIÓN -->
              <label>Operación</label>
              
              <select class="form-control" name="nOperacion">
                <option vlaue="">Seleccione una opción</option>
                <option>Inversión</option>
                <option>Comisión</option>
                <option>Rescate</option>
              </select>
            
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
                <!--option>Scotia - Prioridad - Serie C</option>
                <option>Scotia - Acc. Nacionales - Serie A</option>
                <option>Cuprum - Cuenta 2 - Fondo A</option>
                <option>Santander - Santander - A</option>
                <option>Santander - Mid Cap - Serie A</option>
                <option>BanChile - Mid Cap - Serie A - Cuenta 00</option>
                <option>BanChile - Mid Cap - Serie A - Cuenta 01</option-->
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

          <button type="submit" class="btn btn-primary">Guardar movimiento</button>

        </div>

        <?php

          $crearMovimiento = new ControladorMovimientos();
          $crearMovimiento -> ctrCrearMovimiento();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR MOVIMIENTO
======================================-->

<div id="modalEditarMovimiento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar movimiento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA FECHA -->
            <div class="form-group">
              <label for="nFechaMaterializacion">Fecha</label>
              <input type="date" class="form-control" name="eFechaMaterializacion" id="eFechaMaterializacion">

              <input type="hidden" class="form-control" name="idMovimiento" id="idMovimiento">

            </div>

            <div class="form-group">
              
             <!-- ENTRADA PARA SELECCIONAR OPERACIÓN -->
              <label>Operación</label>
              
              <select class="form-control" name="eOperacion">
                <option vlaue="">Seleccione una opción</option>
                <option>Inversión</option>
                <option>Comisión</option>
                <option>Rescate</option>
              </select>
            
            </div>

            <!-- ENTRADA PARA SELECCIONAR INSTRUMENTO -->
            <div class="form-group">
            
              <label>Instrumento</label>
            
              <select class="form-control" name="eInstrumento">
                <option vlaue="">Seleccione una opción</option>
                <option>Scotia - Prioridad - Serie C</option>
                <option>Scotia - Acc. Nacionales - Serie A</option>
                <option>Cuprum - Cuenta 2 - Fondo A</option>
                <option>Santander - Santander - A</option>
                <option>Santander - Mid Cap - Serie A</option>
                <option>BanChile - Mid Cap - Serie A - Cuenta 00</option>
                <option>BanChile - Mid Cap - Serie A - Cuenta 01</option>
              </select>

              <p class="help-block">Administradora-Instrumento-Serie-Cuenta</p>
            
            </div>
         
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

          $editarMovimiento = new ControladorMovimientos();
          $editarMovimiento -> ctrEditarMovimiento();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarMovimiento = new ControladorMovimientos();
  $borrarMovimiento -> ctrBorrarMovimiento();

?>



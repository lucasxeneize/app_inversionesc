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
           <th>Instrumento</th>
           <th>Operación</th>
           <th>Monto en $</th>
           <th>Valor cuota $</th>
           <th>Cuotas</th>
           <th>Saldo en Cuotas</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>
          
          <tr>
            <td>1</td>
            <td>05/01/2017</td>
            <td>Prioridad Serie C</td>
            <td>Inversión</td>
            <td>$ 25.000</td>
            <td>$ 755,8844</td>
            <td>15,2245</td>
            <td>15,2245</td>
            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>

          <tr>
            <td>2</td>
            <td>05/02/2017</td>
            <td>Prioridad Serie C</td>
            <td>Inversión</td>
            <td>$ 25.000</td>
            <td>$ 765,8844</td>
            <td>15,6245</td>
            <td>30,8745</td>
            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>

          <tr>
            <td>3</td>
            <td>12/10/2017</td>
            <td>Acc. Nacionales Serie A</td>
            <td>Inversión</td>
            <td>$ 200.000</td>
            <td>$ 1.228,9630</td>
            <td>162,7388</td>
            <td>162,7388</td>
            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>

         

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

                $administradoras = ControladorAdministradoras::ctrMostrarAdministradoras($item, $valor);

                  foreach ($administradoras as $key => $value) {
                    echo '<option value="'.$value["id"].'">'.$value["nombre_fantasia"].'</option>"';
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

          $crearAdministradora = new ControladorAdministradoras();
          $crearAdministradora -> ctrCrearAdministradora();

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



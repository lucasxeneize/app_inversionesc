
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invertir
        <!--small>Preview</small-->
      </h1>
        <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Invertir</li>
    
    </ol>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
           <div class="box box-info">
            <form class="form-horizontal" name="frmInvertir">
              <div class="box-body">

               <!-- SELECT ADMINISTRADORAS -->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Administradora</label>
                  <div class="col-sm-10">
                    <select id="slAdministradora" class="form-control" onchange="mostrarAdministradora()">
                    <option value=0>Seleccione Administradora</option>
                    <?php
                      $item = null;
                      $valor = null;

                      $obj = ControladorAdministradoras::ctrMostrarAdministradoras($item, $valor);

                      foreach ($obj as $key => $value) {
                        echo ' <option value='.$value["id"].'>'.$value["nombre_fantasia"].'</option>';
                      }
                    ?>
                  </select>
                  </div>
                </div>

                <!-- SELECT INSTRUMENTO -->
                <div class="form-group">
                
                  <label for="inputEmail3" class="col-sm-2 control-label">Instrumento</label>
                
                  <div class="col-sm-10">

                    <select id="slInstrumentos" class="form-control" onchange="">
                    
                    <option value=0>Seleccione Instrumento</option>

                    <?php
                    
                      $item = null;
                    
                      $valor = null;

                      $obj = ControladorInstrumentos::ctrMostrarInstrumentos($item, $valor);

                      foreach ($obj as $key => $value) {

                        echo ' <option value='.$value["id"].'>'.$value["nombre"].'-'.$value["id_serie"].'</option>';
                      
                      }
                    
                    ?>

                  </select>
                
                  </div>
                
                </div>


                 <!-- INPUT FECHA -->
                <div class="form-group">

                  <label for="inputFecha" class="col-sm-2 control-label">Fecha</label>

                  <div class="col-sm-4">

                    <input type="date" class="form-control" id="inputFecha" placeholder="Fecha" onchange="BuscarValorCuota()">

                  </div>

                  <!-- INPUT VALOR CUOTA -->
                  <label for="inputValor" class="col-sm-2 control-label">Valor cuota</label>

                  <div class="col-sm-4">

                    <input type="text" class="form-control" id="inputValor" placeholder="$ 26.768,90" disabled="true">

                  </div>                  

                </div>

                <div class="form-group">

                <label for="inputMonto" class="col-sm-2 control-label">Monto</label>
                  <!-- INPUT VALOR MONTO -->
                  <div class="col-sm-4">

                    <input type="text" class="form-control" id="inputMonto" placeholder="Monto">

                  </div>

                  <!-- INPUT CUOTA -->
                  <label for="inputCuotas" class="col-sm-2 control-label">Cuota</label>

                  <div class="col-sm-4">
                  
                    <input type="text" class="form-control" id="inputCuotas" placeholder="413.9501" disabled>
                  
                  </div>
                
                </div>

                <!--div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                  <div class="checkbox">
                  <label>
                  <input type="checkbox"> Remember me
                  </label>
                  </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Guardar</button>
                  </div>
                </div>
            </div-->

            <div class="modal-footer">

              <button type="submit" class="btn btn-primary">Guardar cambios</button>

            </div>

            </form>

          </div>

        </div>

      </div>
      <!-- fin row  -->

    </section>
    <!-- /.content -->
  </div>
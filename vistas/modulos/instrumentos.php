<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar instrumentos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar instrumentos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarInstrumento">
          
          Agregar instrumento

        </button>

      </div>

      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Instrumento</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $instrumentos = ControladorInstrumentos::ctrMostrarInstrumentos($item, $valor);

          //print_r($instrumentos);

          foreach ($instrumentos as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["nombre"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarInstrumento" idInstrumento="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarInstrumento"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarInstrumento" idInstrumento="'.$value["id"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR
======================================-->

<div id="modalAgregarInstrumento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar instrumento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nNombre" placeholder="Ingresar nombre instrumento" required>
              

              </div>

            </div>

            <!-- ENTRADA ADMINISTRADORA -->
            <!--div class="form-group">
              
              <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span><input type="text" class="form-control input-lg" name="nAdministradora" placeholder="Ingresar id administradora" required>
              
                </div>
              
              </div-->
              
          
            <!-- ENTRADA PARA SELECCIONAR ADMINISTRADORA -->
            <div class="form-group">
            
            <div class="input-group">
            
              <span class="input-group-addon"><i class="fa fa-users"></i></span> 

              <select class="form-control input-lg" name="nAdministradora">
                  
                  <option value="">Selecionar administradora</option>

                 <?php

                  $item = null;
                  $valor = null;

                  $administradoras = ControladorAdministradoras::ctrMostrarAdministradoras($item, $valor);


                  foreach ($administradoras as $key => $value) {
                   
                    echo '<option value="'.$value["id"].'">'.$value["razon_social"].'</option>';

                  }

                ?>

                  <!--option value="Administrador">CUPRUM</option>

                  <option value="Especial">SCOTIA</option>

                  <option value="Vendedor">BANCHILE</option-->

                </select>

              </div>

            </div>



              <!-- ENTRADA SERIE -->
            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span> <input type="text" class="form-control input-lg" name="nSerie" placeholder="Ingresar serie instrumento" required>
              
              </div>

            </div>



  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar instrumento</button>

        </div>

        <?php

          $crearInstrumento = new ControladorInstrumentos();
          $crearInstrumento -> ctrCrearInstrumento();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR
======================================-->

<div id="modalEditarInstrumento" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar instrumento</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="eNombre" id="eNombre" required>

                 <input type="hidden"  name="idInstrumento" id="idInstrumento" required>

              </div>

            </div>

            <!-- ENTRADA ADMINISTRADORA -->
            <!--div class="form-group">
              
              <div class="input-group">
              
                  <span class="input-group-addon"><i class="fa fa-th"></i></span>

                  <input type="text" class="form-control input-lg" name="eAdministradora" id="eAdministradora" required>
              
                </div>
              
              </div-->
              
             <!-- ENTRADA PARA SELECCIONAR ADMINISTRADORA -->
            <div class="form-group">
            
            <div class="input-group">
            
              <span class="input-group-addon"><i class="fa fa-users"></i></span> 

              <select class="form-control input-lg" name="nAdministradora">
                  
                  <option value="">Selecionar administradora</option>

                 <?php

                  $item = null;
                  $valor = null;

                  $administradoras = ControladorAdministradoras::ctrMostrarAdministradoras($item, $valor);


                  foreach ($administradoras as $key => $value) {
                    echo '<option value="'.$value["id"].'">'.$value["razon_social"].'</option>';
                  }

                ?>

                  <!--option value="Administrador">CUPRUM</option>

                  <option value="Especial">SCOTIA</option>

                  <option value="Vendedor">BANCHILE</option-->

                </select>

              </div>

            </div>


              <!-- ENTRADA SERIE -->
            <div class="form-group">
              
              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="eSerie" id="eSerie" required>
              
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

          $editarCategoria = new ControladorInstrumentos();
          $editarCategoria -> ctrEditarInstrumento();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCategoria = new ControladorInstrumentos();
  $borrarCategoria -> ctrBorrarInstrumento();

?>


@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
        <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
            <h3>Resumen de ingresos en el mes </h3>
<!-- /.info-box-content 
<?php  $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>

<div  class="row" >
<div class="col-md-6">
                  <label>Año</label>
                  <select class="form-control" id="anio_sel"  onchange="cambiar_fecha_grafica();">

                  <?php  echo '<option value="'.$anioA.'" >'.$anioA.'</option>';   ?>
                    <option value="2018" >2018</option>
                    <option value="2019" >2019</option>
                    <option value="2020" >2020</option>
                    <option value="2021">2021</option>
                    <option value="2022" >2022</option>
                  </select>

</div>


<div class="col-md-6">
                  <label>Mes</label>
                  <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();" >
                  <?php  echo '<option value="'.$mesA.'" >'.$nombremes[intval($mesA)].'</option>';   ?>
                    <option value="1">ENERO</option>
                    <option value="2">FEBRERO</option>
                    <option value="3">MARZO</option>
                    <option value="4">ABRIL</option>
                    <option value="5">MAYO</option>
                    <option value="6">JUNIO</option>
                    <option value="7">JULIO</option>
                    <option value="8">AGOSTO</option>
                    <option value="9">SEPTIEMBRE</option>
                    <option value="10">OCTUBRE</option>
                    <option value="11">NOVIEMBRE</option>
                    <option value="12">DICIEMBRE</option>
                  
                  </select>

</div>
</div>
-->
<div  class="row col-lg-12 col-md-8"  >
<br/>
    <div class="box box-primary">
        <div class="box-header">
        </div>

        <div class="box-body">
             <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-11">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-get-pocket"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Mes actual</span>
                    <span class="info-box-number"><big>$ <?php echo $ingreso; ?></big></span>
                    </div>  
               </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-list-alt"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Consulta General</span>
                    <span class="info-box-number"><big>$<?php echo $CGeneral; ?></big></span>
                    </div>
            <!-- /.info-box-content -->
                </div>
          <!-- /.info-box -->
            </div>

            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-child"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Control de niños</span>
                    <span class="info-box-number"><big>$<?php echo $CNiños; ?></big></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-check"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Control de embarazo</span>
                    <span class="info-box-number"><big>$<?php echo $CEmb; ?></big></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                
                
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-purple"><i class="fa fa-hand-paper-o"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Dermatologia</span>
                    <span class="info-box-number"><big>$<?php echo $CDer; ?></big></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-teal"><i class="fa fa-eye"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Oftalmologia</span>
                    <span class="info-box-number"><big>$<?php echo $COft; ?></big></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
        </div>
        </div>

        <div class="box-footer">
        </div>
    </div>

    <div class="box box-primary">
        <div class="box-header">
        </div>

        <div class="box-body" id="piechart" style="width: 900px; height: 500px;">
        </div>

        <div class="box-footer">
        </div>
    </div>


<script type="text/javascript" src="{{ asset('js/loader.js') }}"></script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
         var data = google.visualization.arrayToDataTable([
          ['tipo consulta', 'cantidad'],
            @foreach ($pastel as $pastels)
              ['{{ $pastels->tCons}}', {{ $pastels->cant}}],
            @endforeach
        ]);

        var options = {
          title: 'Representación grafica de total consulta por tipo de consulta',
          colors: ['#d33724', '#008d4c', '#f39c12', '#605ca8', '#39cccc']
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        chart.draw(data, options);
      }
    </script>

@endsection
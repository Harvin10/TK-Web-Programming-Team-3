@include('../template/header');
@include('../template/sidebar');


<?php
  function nilai($nilai){
    if($nilai<=65){
      return "D";
    }
    else if($nilai<=75){
      return "C";
    }
    else if($nilai<=85){
      return "B";
    }
    else if($nilai<=100){
      return "A";
    }
    
    
  }
?>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$title?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$title}}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
      
      
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                  Grade A
              </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
<script type="text/javascript">
window.onload = function() {

var options = {
	title: {
		text: "Grade A"
	},
	data: [{
			type: "pie",
			startAngle: 45,
			showInLegend: "true",
			legendText: "{label}",
			indexLabel: "{label} ({y})",
			yValueFormatString:"#,##0.#"%"",
			dataPoints: [
				{ label: "Quiz", y: {{$a[0]->quiz}} },
				{ label: "Tugas", y: {{$a[0]->tugas}} },
				{ label: "Praktek", y: {{$a[0]->praktek}} },
				{ label: "Absensi", y: {{$a[0]->absensi}} },
				{ label: "Uas", y: {{$a[0]->uas}} }
			]
	}]
};
$("#chartContainer").CanvasJSChart(options);


var options = {
	title: {
		text: "Grade D"
	},
	data: [{
			type: "pie",
			startAngle: 45,
			showInLegend: "true",
			legendText: "{label}",
			indexLabel: "{label} ({y})",
			yValueFormatString:"#,##0.#"%"",
			dataPoints: [
				{ label: "Quiz", y: {{$d[0]->quiz}} },
				{ label: "Tugas", y: {{$d[0]->tugas}} },
				{ label: "Praktek", y: {{$d[0]->praktek}} },
				{ label: "Absensi", y: {{$d[0]->absensi}} },
				{ label: "Uas", y: {{$d[0]->uas}} }
			]
	}]
};
$("#chartContainerd").CanvasJSChart(options);


var options = {
	title: {
		text: "Grade C"
	},
	data: [{
			type: "pie",
			startAngle: 45,
			showInLegend: "true",
			legendText: "{label}",
			indexLabel: "{label} ({y})",
			yValueFormatString:"#,##0.#"%"",
			dataPoints: [
				{ label: "Quiz", y: {{$c[0]->quiz}} },
				{ label: "Tugas", y: {{$c[0]->tugas}} },
				{ label: "Praktek", y: {{$c[0]->praktek}} },
				{ label: "Absensi", y: {{$c[0]->absensi}} },
				{ label: "Uas", y: {{$c[0]->uas}} }
			]
	}]
};
$("#chartContainerc").CanvasJSChart(options);


var options = {
	title: {
		text: "Grade B"
	},
	data: [{
			type: "pie",
			startAngle: 45,
			showInLegend: "true",
			legendText: "{label}",
			indexLabel: "{label} ({y})",
			yValueFormatString:"#,##0.#"%"",
			dataPoints: [
				{ label: "Quiz", y: {{$b[0]->quiz}} },
				{ label: "Tugas", y: {{$b[0]->tugas}} },
				{ label: "Praktek", y: {{$b[0]->praktek}} },
				{ label: "Absensi", y: {{$b[0]->absensi}} },
				{ label: "Uas", y: {{$b[0]->uas}} }
			]
	}]
};
$("#chartContainerb").CanvasJSChart(options);


}
</script>
            <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
          </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
      
      
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                  Grade B
              </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            ]
            <div id="chartContainerb" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
          </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
      
      
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                  Grade C
              </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
            <div id="chartContainerc" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
          </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
      
      
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                  Grade D
              </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            
            <div id="chartContainerd" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
          </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@include('../template/footer');

<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
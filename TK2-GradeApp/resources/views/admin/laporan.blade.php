@include('../template/header');
@include('../template/sidebar');
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
                <i class="fas fa-users mr-1"></i>
                  Laporan
              </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
            <script>
            window.onload = function () {

            //Better to construct options first and then pass it as a parameter
            var options = {
              title: {
                text: "Jumlah Tentara Per Jabatan"              
              },
              data: [              
              {
                // Change type to "doughnut", "line", "splineArea", etc.
                type: "column",
                dataPoints: [
                <?php foreach($data as $d => $item){?>
                  { label: "{{$d}}",  y: {{$item}}  },
                <?php }?>
                ]
              }
              ]
            };

            $("#chartContainer").CanvasJSChart(options);
            }
            </script>
          </div>
              <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@include('../template/footer');

<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.min.js"></script>
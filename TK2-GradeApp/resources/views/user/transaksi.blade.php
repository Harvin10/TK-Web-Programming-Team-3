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
                  BELANJA
              </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <ul class="list-group">
                @foreach ($data_user as $d)
              <li class="list-group-item">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-sm-3">
                      <img src="{{ asset('uploads/'.$d->gambar) }}" width=100%>
                    </div>
                    <div class="col-sm-4" style="padding-left:80px;padding-top:40px;">
                      <h4>Nama Produk : {{$d->nama_produk}}</h4>
                      <h4>Jenis Produk : {{$d->nama_jenis}}</h4>
                      <h4>Harga Produk : {{$d->harga}}</h4>
                    </div>
                    <div class="col-sm-4" style="padding-left:10px;padding-top:40px;">  
                          <form method="post" action="{{ route('add_transaksi') }}">
                          @csrf
                            <input type="number" name="banyak" class="form-control"  placeholder="Masukan Jumlah Barang Yang akan Dibeli" required>
                            <input type="number" value="{{ $d->harga }}" name="harga"style="display:none"><input type="text" value="{{ $d->id }}" name="del"style="display:none">
                            <br><input  type="submit" class="btn btn-primary" value="BELI BARANG">
                          </form>
                    </div>
                  </div>
                </div>
              </li>
                  @endforeach
            </ul>
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
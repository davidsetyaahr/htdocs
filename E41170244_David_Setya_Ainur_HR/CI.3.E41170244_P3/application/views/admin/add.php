        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="<?php echo base_url() ?>index.php/admin" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Lihat Data</a>
          </div>


          <!-- Content Row -->
          <form action="insert" method="post">
          <div class="row">
              <div class="col-md-6">
                  <label>Kode Barang</label>
                  <input type="text" class="form-control" name="kodeBarang">
              </div>
              <div class="col-md-6">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="namaBarang">
              </div>
              <div class="col-md-6">
                <br>
                  <label>Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi">
              </div>
              <div class="col-md-6">
                <br>
                  <label>Stok</label>
                  <input type="number" class="form-control" name="stok">
              </div>
              <div class="col-md-6">
                <br>
                  <label>Harga</label>
                  <input type="number" class="form-control" name="harga">
              </div>
              <div class="col-md-6">
                <br>
                <br>
                <button class="btn btn-primary">Submit</button>
              </div>
          </div>
          </form>
        </div>
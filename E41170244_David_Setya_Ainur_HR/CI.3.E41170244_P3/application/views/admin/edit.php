        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="index.php/admin/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Input Data</a>
          </div>


          <!-- Content Row -->
          <form action="<?php echo base_url()."index.php/admin/update" ?>" method="post">
          <div class="row">
              <div class="col-md-6">
                  <label>Kode Barang</label>
                  <input type="text" class="form-control" name="kodeBarang" readonly value="<?php echo $barang[0]['kodeBarang'] ?>">
              </div>
              <div class="col-md-6">
                  <label>Nama Barang</label>
                  <input type="text" class="form-control" name="namaBarang" value="<?php echo $barang[0]['namaBarang'] ?>">
              </div>
              <div class="col-md-6">
                <br>
                  <label>Deskripsi</label>
                  <input type="text" class="form-control" name="deskripsi" value="<?php echo $barang[0]['deskripsi'] ?>">
              </div>
              <div class="col-md-6">
                <br>
                  <label>Stok</label>
                  <input type="number" class="form-control" name="stok" value="<?php echo $barang[0]['stok'] ?>">
              </div>
              <div class="col-md-6">
                <br>
                  <label>Harga</label>
                  <input type="number" class="form-control" name="harga" value="<?php echo $barang[0]['harga'] ?>">
              </div>
              <div class="col-md-6">
                <br>
                <br>
                <button class="btn btn-primary">Submit</button>
              </div>
          </div>
          </form>
        </div>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <a href="<?php echo base_url() ?>index.php/admin/add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Input Data</a>
          </div>


          <!-- Content Row -->
          <div class="row">
              <div class="col-md-12">
                <div class="table-responsive">
                  <table class="table table-hover table-striped table-borderd">
                  <thead>
                    <tr>
                      <td>#</td>
                      <td>Nama Barang</td>
                      <td>Desc</td>
                      <td>Stok</td>
                      <td>Harga</td>
                      <td>Opsi</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      foreach ($barang as $data) {
                      ?>
                      <tr>
                        <td>
                          <?php echo $data['kodeBarang'] ?>
                        </td>
                        <td>
                          <?php echo $data['deskripsi'] ?>
                        </td>
                        <td>
                          <?php echo $data['namaBarang'] ?>
                        </td>
                        <td>
                          <?php echo $data['stok'] ?>
                        </td>
                        <td>
                          <?php echo "Rp. ".number_format($data['harga'],0,',','.') ?>
                        </td>
                        <td>
                          <a href="admin/edit/<?php echo $data['kodeBarang'] ?>">Edit</a> | 
                          <a href="admin/delete/<?php echo $data['kodeBarang'] ?>">Delete</a>
                        </td>
                      </tr>
                      <?php
                      }
                    ?>
                  </tbody>
                  </table>
                </div>
              </div>
          </div>

        </div>
        <!-- /.container-fluid -->


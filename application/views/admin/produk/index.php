<?php $this->load->view("admin/_partials/header.php") ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard-admin')?>">Home</a></li>
              <li class="breadcrumb-item">Produk</li>
              <li class="breadcrumb-item">Daftar Produk</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="content">
                <div class="card">
                    <div class="card-body" style="color:black">
                        <?php if (!empty($this->session->flashdata('message'))) :?>
                            <?php if ($this->session->flashdata('message')['type'] == 'error') :?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <?php echo $this->session->flashdata('message')['message']; ?>
                                <button type="button" class="close close-flash-message" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php else :?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <?php echo $this->session->flashdata('message')['message']; ?>
                                <button type="button" class="close close-flash-message" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <a href="<?php echo base_url('/dashboard-admin/produk/tambah')?>" class="btn btn-primary" style="float:right;margin-bottom:10px;">Tambah Produk</a>
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Produk</th>
                                <th>Deskripsi</th>
                                <th>Harga</th>
                                <th>Kategori</th>
                                <th>Gambar</th>
                                <th style="width: 15%;">Action</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($produk as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['nama_produk'] ?></td>
                                    <td><?= $row['deskripsi'] ?></td>
                                    <td><?= $row['harga'] ?></td>
                                    <td><?= $row['kategori'] ?></td>
                                    <td><img style="width: 100%; height: auto;" src="<?=base_url('assets');?>/images/<?= $row['gambar'] ?>" alt=""></td>
                                    <td>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editmodal-<?= $row['id'] ?>">Edit</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="editmodal-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Data Produk</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="<?= base_url('dashboard-admin/produk/update') ?>" method="POST" class="form-edit">
                                                            <input hidden id="product_id" name="product_id" value="<?= $row['id'] ?>"">
                                                            <div class="form-group">
                                                                <label for="nama">Nama Produk</label>
                                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $row['nama_produk'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="deskripsi">Deskripsi</label>
                                                                <textarea class="form-control" id="deskripsi" name="deskripsi"> <?= $row['deskripsi'] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="harga">Harga</label>
                                                                <input type="text" class="form-control" id="harga" name="harga" value="<?= $row['harga'] ?>" />
                                                            </div>

                                                            <div style="text-align: center; margin-top: 40px; float: right">
                                                                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary update-submit" id="submit-edit-<?= $row['id'] ?>">Simpan</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal-<?= $row['id'] ?>">Hapus</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="deletemodal-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data Mahasiswa</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="text-align: center; font-weight: bold; font-size: 17px">Apakah anda yakin menghapus data mahasiswa ini?</p>
                                                        <form action="<?= base_url('dashboard-admin/produk/delete') ?>" method="POST" class="form-delete">
                                                            <input hidden id="product_id" name="product_id" value="<?= $row['id'] ?>"">
                                                            <div style="text-align: center; margin-top: 40px; float: right">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
                                                                <button type="submit" class="btn btn-success delete-submit" id="submit-delete-<?= $row['id'] ?>">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
          <!-- ./col -->
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $this->load->view("admin/_partials/footer.php") ?>
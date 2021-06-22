<?php $this->load->view("admin/_partials/header.php") ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Tambah Produk</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard-admin')?>">Home</a></li>
              <li class="breadcrumb-item">Produk</li>
              <li class="breadcrumb-item">Tambah Produk</li>
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
            <div class="content" style="width: 100%;">
                <div class="card">
                    <div class="card-body" style="color:black">
                        <?php if (!empty($this->session->flashdata('message'))) :?>
                            <?php if ($this->session->flashdata('message')['type'] == 'error') :?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <?php echo $this->session->flashdata('message')['message']; ?>
                                <button type="button" class="close close-flash-message" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php unset($_SESSION['message']); ?>

                            </div>
                            <?php else :?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <?php echo $this->session->flashdata('message')['message']; ?>
                                <button type="button" class="close close-flash-message" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <?php unset($_SESSION['message']); ?>
                            </div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <div>
                            <form enctype='multipart/form-data' action="<?= base_url('dashboard-admin/produk/tambah') ?>" method="POST" class="form-edit">
                                <div class="form-group">
                                    <label for="nama">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="text" class="form-control" id="harga" name="harga"/>
                                </div>
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <select class="custom-select" id="inputGroupSelect01" name="kategori">
                                        <option value="">Pilih Kategori</option>
                                    <?php  foreach ($kategori as $kat){?>
                                        <option value="<?= $kat['id'] ?>"><?= $kat['nama_kategori']?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Gambar Produk</label>
                                    <div class="custom-file">
                                        <input type="file" id="gambar" name="gambar" class="custom-file-input" id="validatedCustomFile" required>
                                        <label class="custom-file-label" id="idgambar" for="validatedCustomFile">Choose file...</label>
                                    </div>
                                </div>
                                <div style="margin-top: 20px;">
                                    <button type="submit" class="btn btn-primary update-submit">Tambahkan Produk</button>
                                </div>
                            </form>
                        </div>
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
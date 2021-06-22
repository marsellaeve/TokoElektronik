<?php $this->load->view("admin/_partials/header.php") ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Invoice</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard-admin')?>">Home</a></li>
              <li class="breadcrumb-item">Invoice</li>
              <li class="breadcrumb-item">Daftar Invoice</li>
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
                        <table class="table table-bordered" style="width: 100%;">
                            <tr>
                                <th>Invoice</th>
                                <th>Nama User</th>
                                <th>Telepon User</th>
                                <th>Tujuan Pengiriman</th>
                                <th>Daftar Beli</th>
                                <th>Total Harga</th>
                                <!-- <th>Status</th> -->
                                <!-- <th style="width: 15%;">Action</th> -->
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($order as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->full_name ?></td>
                                    <td><?= $row->phone ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailmodal-<?= $row->id ?>">Detail</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="detailmodal-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Tujuan Pengiriman</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <tr>
                                                                <td>Nama Tujuan</td>
                                                                <td><?= $row->nama_tujuan ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alamat Tujuan</td>
                                                                <td><?= $row->alamat_tujuan ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Telepon Tujuan</td>
                                                                <td><?= $row->telepon_tujuan ?></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Button trigger modal -->
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#detailordermodal-<?= $row->id ?>">Detail</button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="detailordermodal-<?= $row->id ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Tujuan Pengiriman</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>Nama Produk</td>
                                                                <td>Harga Satuan</td>
                                                                <td>Jumlah Beli</td>
                                                                <td>Total Harga</td>
                                                            </tr>
                                                            <?php
                                                                foreach($detail_order as $o){
                                                                    if($o->order_id === $row->id){
                                                            ?>
                                                                <tr>
                                                                    <td><?= $o->nama_produk ?></td>
                                                                    <td><?= $o->harga ?></td>
                                                                    <td><?= $o->qty ?></td>
                                                                    <td><?= intval($o->harga) * intval($o->qty) ?></td>
                                                                </tr>
                                                            <?php
                                                                    }
                                                                }
                                                            ?>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <!-- Button trigger modal -->
                                    </td>
                                    <td><?= $row->total ?></td>
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
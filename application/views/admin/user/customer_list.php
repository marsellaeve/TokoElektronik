<?php $this->load->view("admin/_partials/header.php") ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Daftar Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('/dashboard-admin')?>">Home</a></li>
              <li class="breadcrumb-item">User</li>
              <li class="breadcrumb-item">Daftar Customer</li>
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
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Telepon</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($user as $row) {
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row['full_name'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td><?= $row['email'] ?></td>
                                    <td><?= $row['phone'] ?></td>
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
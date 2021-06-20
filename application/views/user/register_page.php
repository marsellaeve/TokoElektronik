<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center mt-5 mx-auto p-4">
                <h1 class="h2">Register</h1>
                <p class="lead">Silahkan mendaftarkan akun terlebih dahulu</p>
            </div>
        </div>
        <div class="row">
            <?php if (!empty($this->session->flashdata('message'))) :?>
                <?php if ($this->session->flashdata('message')['type'] == 'error') :?>
                <div class="alert alert-danger alert-dismissible" role="alert">
					<?php echo $this->session->flashdata('message')['message']; ?>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				</div>
				<?php else :?>
                <div class="alert alert-success alert-dismissible" role="alert">
					<?php echo $this->session->flashdata('message')['message']; ?>
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				</div>
                <?php endif; ?>
			<?php endif; ?>
            <div class="col-12 col-md-5 mx-auto mt-5">
                <form action="<?= base_url('/register') ?>" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Masukkan username" required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Masukkan password" required />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Masukkan email" required />
                    </div>
                    <div class="form-group">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" name="fullname" placeholder="Masukkan fullname" required />
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Masukkan nomor telepon" required />
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <a href="<?= site_url('login') ?>">Login</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success w-100" value="Register" />
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
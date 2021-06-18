<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 text-center mt-5 mx-auto p-4">
                <h1 class="h2">Login</h1>
                <p class="lead">Silahkan masuk terlebih dahulu</p>
            </div>
        </div>
        <div class="row">
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
            <div class="col-12 col-md-5 mx-auto mt-5">
                <form action="<?= base_url('/login') ?>" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Pakai username juga bisa.." required />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password.." required />
                    </div>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <a href="<?= site_url('admin/register') ?>">Register</a>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success w-100" value="Login" />
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>
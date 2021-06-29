<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background:linear-gradient(45deg,#00dbde,#fc00ff) no-repeat;
		font-family:'Poppins', sans-serif;
	}

	a {
		color: #003399;	background-color: transparent; font-weight: normal;
	}

	h1 {
		font-size: 39px;color: #333;line-height: 1.2;
		background-color: transparent;font-weight: bold;text-align:center;
	}

	#container {
		min-height: 90vh;
		margin: 5% auto 5% auto;
		padding:5%;
		border-radius:30px;
		background-color:white;
		width:50%;
	}
	</style>
</head>
<body>

<div id="container">
	<h1 class="pt-3" style="text-align:center;">Selamat Datang di Toko Elektronik IqbaalEveAmel</h1><br><br>
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
            <div class="col-12 col-md-8 mx-auto">
                <form action="<?= base_url('/login') ?>" method="POST">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Pakai username juga bisa.." required />
                    </div><br>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password.." required />
                    </div><br>
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                            <a href="<?= site_url('admin/register') ?>">Register Admin</a> &ensp; &ensp;
                            <a href="<?= site_url('register') ?>">Register Customer</a>
                        </div>
                    </div><br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success w-100" value="Login" />
                    </div>

                </form>
            </div>
        </div>
</div>
</body>
</html>

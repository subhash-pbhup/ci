<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?= base_url('css/boot.css'); ?>" rel="stylesheet">
  <script src="<?= base_url('js/jquery.js'); ?>"></script>
  <script src=" <?= base_url('js/boot.js'); ?>"></script>
</head>

<body>

  <div class="row container-fluid" style="margin-top: 15px;">

    <div class="col-12">

      <div class="card" style="margin: 0 auto;width: 30%;">
        <!-- Display Session Messages -->

        <?php if (session()->getFlashdata('error')): ?>
          <div class="card-header">
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
          </div>
        <?php endif; ?>

        <div class="card-header">
          Login Form
        </div>
        <div class="card-body">
          <form method="post" action="<?= base_url('user') ?>">

            <div class="form-group">
              <label>Email Id</label>
              <input type="email" required class="form-control" name="email" placeholder=" Enter email">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" required class="form-control" name="password" placeholder="Enter Password">
            </div>

            <div class="form-group">
              <button name="login" class="btn btn-primary" style="margin-top: 15px;">Login</button>
              <p><a href="<?= base_url('/') ?>" style="float: right;text-decoration: none;">Sign In</a></p>
            </div>

          </form>
        </div>
      </div>
    </div>


  </div>

</body>
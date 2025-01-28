<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>User Registration Form</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="/favicon.ico">
  <link href="<?= base_url('css/boot.css'); ?>" rel="stylesheet">
  <script src="<?= base_url('js/jquery.js'); ?>"></script>
  <script src=" <?= base_url('js/boot.js'); ?>"></script>
</head>

<body>
  <div class="row container-fluid" style="margin-top: 15px;">
    <div class="col-12">

      <div class="card" style="margin: 0 auto;width: 30%;">

        <?php if (session()->getFlashdata('message')): ?>
          <div class="alert alert-<?= session()->getFlashdata('message_type') ?>">
            <?= session()->getFlashdata('message') ?>
          </div>
        <?php endif; ?>
        <div class="card-header">
          User Registration Form
        </div>

        <!-- Display Flash Message -->

        <div class="card-body">
          <form method="post" enctype="multipart/form-data" action="<?= base_url('add-user') ?>">

            <div class="form-group">
              <label>Name</label>
              <input type="text" required class="form-control" name="name" placeholder=" Enter name">
            </div>

            <div class="form-group">
              <label>Email Id</label>
              <input type="email" required class="form-control" name="email" placeholder=" Enter email">
            </div>

            <div class="form-group">
              <label>Password</label>
              <input type="password" required class="form-control" name="password" placeholder="Enter Password">
            </div>

            <div class="form-group">
              <label>Image</label>
              <input type="file" required class="form-control" name="image">
            </div>

            <div class="form-group">
              <button name="save" class="btn btn-primary" id="save" style="margin-top: 15px;">Save</button>
              <p><a href="<?= base_url('/login') ?>" style="float: right;text-decoration: none;">Login</a></p>

            </div>
          </form>
        </div>
      </div>
    </div>


  </div>

</body>
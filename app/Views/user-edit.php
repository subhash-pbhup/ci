<div class="card mb-3 mt-5" style="max-width:50%;margin-left: 23%;">

  <?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-<?= session()->getFlashdata('message_type') ?>">
      <?= session()->getFlashdata('message') ?>
    </div>
  <?php endif; ?>

  <div class="row g-0">
    <div class="col-md-4">
      <img style="width: 100px;" src="<?php echo base_url('images/' . $res['image']); ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Name: <?php echo $res['name']; ?></h5>
        <h5 class="card-title">Email : <?php echo $res['email']; ?></h5>
      </div>
    </div>
  </div>

  <div class="card">

    <div class="card-body">

      <form method="post" action="<?php echo base_url('update-user/' . $res['id']); ?>" enctype="multipart/form-data">
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name" value="<?php echo $res['name']; ?>" placeholder="Enter Name">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email" value="<?php echo $res['email']; ?>" placeholder="Enter email">
        </div>

        <div class="form-group">
          <label>Password</label>
          <input type="password" class="form-control" name="password" value="<?php echo $res['password']; ?>" placeholder="Enter password">
          <input type="hidden" name="old_pass" value="<?php echo $res['password']; ?>">
        </div>

        <div class="form-group">
          <label for="exampleInputPassword1">Image</label>
          <input type="file" accept="image/gif, image/jpeg, image/png" class="form-control" name="image" />
          <input type="hidden" class="form-control" id="old_img" value="<?php echo $res['image'] ?>" name="old_img" />
        </div>

        <div class="form-group">
          <input type="submit" class="btn btn-primary" style="margin-top: 15px;" value="Submit" />
        </div>

      </form>
    </div>
  </div>

</div>

<?php

 $this->load->view('header');
 ?>
</br>
<div class="card mb-3" style="max-width:50%;margin-left: 23%;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?php echo base_url();?>images/<?php echo $admin[0]->img;?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">Name: <?php echo $admin[0]->name;?></h5>
        <h5 class="card-title">Email : <?php echo $admin[0]->email_id;?></h5>
        <h5 class="card-title">Mobile : <?php echo $admin[0]->mobile;?></h5>
      </div>
    </div>
  </div>

  <div class="card">
 
  <div class="card-body">

  <form method="post" action="<?php echo base_url('admin/update');?>" enctype="multipart/form-data">
  <div class="form-group">
    <label>Student Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $admin[0]->name;?>"  placeholder="Enter Student Name">
  </div>
  <div class="form-group">
    <label>Student Email</label>
    <input type="email" readonly class="form-control" name="email" value="<?php echo $admin[0]->email_id;?>" placeholder="Student Enter email">
  </div>
  <div class="form-group">
    <label>Mobile Number</label>
    <input type="text" class="form-control" name="mobile" value="<?php echo $admin[0]->mobile;?>"  placeholder="Enter Mobile Number">
  </div>

  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" name="pwd" value="<?php echo $admin[0]->pwd;?>"  placeholder="Enter Mobile password">
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" accept="image/gif, image/jpeg, image/png" class="form-control" name="img"/>
    <input type="hidden" class="form-control" id="old_img" value="<?php echo $admin[0]->img;?>" name="old_img"/>


  </div>

  <div class="form-group">
  <input type="submit" class="btn btn-primary" style="margin-top: 15px;" value="Submit"/>
  </div>

</form>
  </div>
</div>

</div>
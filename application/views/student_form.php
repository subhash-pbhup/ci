<?php $this->load->view('header'); ?>


<div class="row container-fluid" style="margin-top: 15px;">
<div class="col-4">

<div class="card">
  <div class="card-header">
    Student Registration Form
  </div>
  <div class="card-body">

  <form method="post" action="<?php echo base_url('home/insert');?>" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Student Name</label>
    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter Student Name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Student Email</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Student Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile Number</label>
    <input type="text" class="form-control" name="mobile" id="mobile" aria-describedby="emailHelp" placeholder="Enter Mobile Number">
  </div>
 
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" required accept="image/gif, image/jpeg, image/png" class="form-control" name="img"/>

  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>

    <textarea class="form-control" name="address"></textarea>

  </div>

  <div class="form-group">
  <input type="submit" class="btn btn-primary" style="margin-top: 15px;" value="Submit"/>
  </div>

</form>
  </div>
</div>
</div>

<div class="col-8">

<div class="card">
  <div class="card-header">
    Student Data
  </div>
  <div class="card-body">
  <table id="example" style="width:100%" class="table table-striped">
  <thead>
    <tr>
      <th>S.no</th>
      <th>Name</th>
      <th>Email</th>
      <th>Mobile</th>
      <th>Image</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

<?php $i=1; foreach($stu_data as $res){?>
    <tr>
      <th scope="row"><?php echo $i++;?></th>
      <td><?php echo $res->name?></td>
      <td><?php echo $res->email_id?></td>
      <td><?php echo $res->mobile?></td>
      <td><img style="width: 50px;" src="<?php echo base_url()."images/".$res->img?>"></td>
      <td><a href="#" class="btn btn-info getedit" 
      data-id="<?php echo $res->id?>"
      data-name="<?php echo $res->name?>"
      data-email_id="<?php echo $res->email_id?>"
      data-mobile="<?php echo $res->mobile?>"
      data-img="<?php echo $res->img?>"
      data-address="<?php echo $res->address?>"
       data-bs-toggle="modal" data-bs-target="#myModal">Edit</a> <a href="#"  onclick="del('<?php echo $res->id?>')" class="btn btn-danger">Delete</a></td>
    </tr>
   <?php } ?>
  </tbody>

</table>
  </div>
</div>


</div>
</div>



<!-- Update form -->


<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Student Details</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="card">
  <div class="card-header">
    Student Edit Form
  </div>
  <div class="card-body">
<form method="post" action="<?php echo base_url('home/edit');?>" enctype="multipart/form-data">
  <div class="form-group">
    <label for="exampleInputEmail1">Student Name</label>
    <input type="text" class="form-control" name="edit_name" id="edit_name" aria-describedby="emailHelp" placeholder="Enter Student Name">
    <input type="hidden" id="edit_id" name="edit_id">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Student Email</label>
    <input type="text" class="form-control" name="edit_email" id="edit_email" aria-describedby="emailHelp" placeholder="Student Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile Number</label>
    <input type="text" class="form-control" name="edit_mobile" id="edit_mobile" aria-describedby="emailHelp" placeholder="Enter Mobile Number">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Image</label>
    <input type="file" class="form-control" name="edit_img"/>
    <input type="hidden" class="form-control" id="old_img" name="old_img"/>
</br>
    <img style="width: 70px;" id="view_img">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <textarea class="form-control" id="edit_add" name="edit_address"></textarea>
  </div>

  <div class="form-group">

  <input type="submit" class="btn btn-primary" style="margin-top: 15px;" value="Submit"/>

  </div>

</form>
  </div>
</div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger close_modal" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!---dsafdfds-->

<script>




function del (id){
  $.ajax({
          type:"POST",
          url: "<?php echo base_url() ?>/home/delete",
          data: "id=" + id,
          success:function(res){
            if(res==1){
              $("#example").load(location.href + " #example");

            //  alert("Record delete successfully");
            }
          }
    });
}

$(".getedit").click(function(){
  

    $("#edit_id").val($(this).data("id"));
    $("#edit_name").val($(this).data("name"));
    $("#edit_email").val($(this).data("email_id"));
    $("#edit_mobile").val($(this).data("mobile"));
    $("#edit_add").val($(this).data("address"));
    $("#old_img").val($(this).data("img"));
    $("#view_img").attr("src","<?php echo base_url('images/') ?>"+$(this).data("img"));



});

</script>

<?php //$this->load->view('footer'); ?>
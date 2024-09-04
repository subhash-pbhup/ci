<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="<?php base_url()?>vendor/boot.css" rel="stylesheet">
  <script src="<?php base_url()?>vendor/boot.js"></script>
  <script src="<?php base_url()?>vendor/jquery.js"></script>


</head>

<body>

<div class="row container-fluid" style="margin-top: 15px;">
<div class="col-12">

<div class="card" style="
    margin-left: auto;
    margin-right: auto;
    width: 30%;
">
  <div class="card-header">
    Admin Login Form
  </div>
  <div class="card-body">
  <form>

  <div class="form-group">
    <label>Enter Email Id</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder=" Enter email">
  </div>
 
  <div class="form-group">
    <label>Enter Password</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter Password">
  </div>

  <div class="form-group">
  <a href="#" class="btn btn-primary" id="login" style="margin-top: 15px;">Login</a>
  </div>

</form>
  </div>
</div>
</div>


</div>

</body>

<script>



$(document).ready(function(){

  $("#msg").hide();

  $("#login").click(function(e){

    let email= $("#email").val();
    let pwd= document.getElementById("pwd").value;

    if(email==""){
      document.getElementById("email").style.borderColor="red";
      return 
    }else {
      document.getElementById("email").style.borderColor="";

    }
    
    if(pwd==""){
      document.getElementById("pwd").style.borderColor="red";
      return
    }else {
      document.getElementById("pwd").style.borderColor="";

    }

    $.ajax({
          type:"POST",
          url: "<?php echo base_url() ?>login/login",
          data: "email=" + email +"&pwd=" + pwd,
          success:function(res){
            if(res==1){
              window.location.href="./home";
            }else{
              alert("Please check your login details");
            }
          }
    });

  })

})


</script>


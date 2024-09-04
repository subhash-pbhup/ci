<?php $this->load->view('header'); ?>



<div class="container-fluid">
    <br>
<div class="card">
<form class="d-flex  p-3" style="width:50%; margin-left: 22%;">
        <input class="form-control me-2" type="search" id="search_data" placeholder="Search" aria-label="Search">
        <select style="width: 86px;" class="form-control" id="data_type">
            <option value="">Image</option>
            <option value="videos">Video</option>
        </select>
        &nbsp
        <a class="btn btn-outline-success" id="fetch_data" href="#">Submit</a>
      </form>
      <br>
  <h5 class="card-header" style="text-align:center">Fetch data</h5>
  <div class="card-body">
    <span id="users"></span>
  </div>
</div>
</div>




<script>

    $(document).ready(function() {  

        $("#fetch_data").click(function(){

             q=$("#search_data").val();
             data_type=$("#data_type").val();

             if(q==""){
                    alert("Please enter your search value");
                    return;
             }
          
        fetch("https://pixabay.com/api/"+data_type+"?key=45076340-0dbf655cf5663999da44a9549&q="+q+"&image_type=all&pretty=true&video_type=all")
  .then((response) => response.json())
  .then((json) => {
    // console.log(json.hits);
    let li = `<div class="row row-cols-1 row-cols-md-4 g-2">`;
    json.hits.forEach((hits) => {

        if(data_type=="videos"){
            
            li += `<div class="col">
  <a target="_blank" href="${hits.videos.small.url}"><div class="card">

  <video poster="${hits.videos.large.thumbnail}" controls="controls" preload="metadata">
      <source src="${hits.videos.small.url}">

</video>

  </div></a></div>`;        
        }else{

            li += `<div class="col">
  <a target="_blank" href="${hits.largeImageURL}"><div class="card">
  <img src='${hits.largeImageURL}'>
  </div></a></div>`;

        }

     
    });
    document.getElementById("users").innerHTML = li;
  });

        })

    })
            
     

         
  
    </script>

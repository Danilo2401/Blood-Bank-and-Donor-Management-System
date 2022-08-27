<?php

session_start();

if(!isset($_SESSION["name_admin"]) || !isset($_SESSION["password_admin"])){
    header("Location:admin.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood+</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="style-admin.css">
</head>
<body>

<style>
  .container.table-container {
    margin: 50px auto;
}

</style>
  

<nav class="navbar-admin">

    <div class="container">

        <div class="heading">
            <h2>Hello <?php echo $_SESSION["name_admin"]; ?></h2>
        </div>

        <div class="logout-admin">
            <a href="logout.php">Logout</a>
        </div>

    </div>

</nav>

<div class="container mt-4">
  <nav class="navbar bg-dark">
    <div class="container">
      <a class="navbar-brand">Donor</a>
      <form class="d-flex" role="search">
        <input class="form-control p-2" type="search" id="search-donor" placeholder="Filter donor" aria-label="Search">
      </form>
    </div>
  </nav>
</div>

<div class="donor-table container table-container">

<table class="table table-dark table-hover">
<thead>
      <tr>
        <th>First name</th>
        <th>Last name</th>
        <th>Blood group</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Delete</th>
        <th>Update</th>
      </tr>
    </thead>
    <tbody>

    </tbody>
</table>

</div>


<div class="modal" id="modalDelete" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete donor</h5>
        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure that you want to delete donor?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="close btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="save-delete btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modalUpdate" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update donor</h5>
        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row justify-content-center text-left">
            <div class="col-sm-6">
                <form method="post" action="#">
                    <div class="mb-3">
                        <label for="name_donor_update" data-bs-toggle="popover" data-bs-placement="top"  title="Name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name_donor_update" name="name_donor_update" aria-describedby="name_donor_update">
                    </div>
                    <div class="mb-3">
                        <label for="surname_donor_update" data-bs-toggle="popover" data-bs-placement="top"  title="Surname" class="form-label">Surname</label>
                        <input type="text" class="form-control" id="surname_donor_update" name="surname_donor_update" aria-describedby="surname_donor_update">
                    </div>
                    <div class="mb-3">             
                        <label for="blood_group_update">Choose a blood group:</label>

                        <select name="blood_group_update" id="blood_group_update">
                            <option value="A+">A+</option>
                            <option value="B+">B+</option>
                            <option value="A1+">A1B+</option>
                            <option value="A2B+">A2B+</option>
                            <option value="A1+">A-</option>
                            <option value="B-">B-</option>
                        </select>
                    </div>
                    <div class="mb-3">
                      <label for="email_donor_update" data-bs-toggle="popover" data-bs-placement="top"  title="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email_donor_update" aria-describedby="email_donor_update">
                          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                      </div>
                    <div class="mb-3">
                        <label for="phone_donor_update" data-bs-toggle="popover" data-bs-placement="top"  title="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone_donor_update" aria-describedby="phone_donor_update">
                            <div id="phoneHelp" class="form-text">We'll never share your phone number with anyone else.</div>
                        </div>
                </form>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="close btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="save-update btn btn-success">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modalDeletePatient" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Delete donor</h5>
        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Are you sure that you want to delete patient?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="close btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="button" class="save-delete-patient btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<h3 class="text-center display-3 mb-5">Search for blood group</h3>

<div class="container text-center">
      <form role="search" method="POST">
        <div class="d-flex justify-content-center">
          <div class="col-sm-4 d-flex">
            <input class="form-control rounded-0 p-2" type="search" id="search-patient" placeholder="Search for blood group..." aria-label="Search">
            <button type="button" class="btn btn-secondary rounded-0 disabled p-2">Search</button>
          </div>
        </div>
      </form>
      <p class="response mt-5 fs-4"></p>
      <div class="patient-data"></div>
</div>


<script>
$(document).ready(function(){

    var DonorID = 0;
    var PatientID = 0;

    $("#search-donor").on("keyup",function(){

        var value = $(this).val().toLowerCase();

    $(".donor-table .table tbody tr").filter(function(){

        var searchTable = $(this).text().toLowerCase().indexOf(value);
        $(this).toggle(searchTable > -1);

    });

  });  
  

  Read();

  function Read(){

    $(".donor-table .table tbody").empty();

    $.ajax({
      url:"read_donor.php",
      type:"POST",
      dataType:"JSON",
      success:function(data){

        for (var i = 0; i < data.length; i++) {

          let id_donor = data[i].id_donor;
          let name_donor = data[i].name_donor;
          let surname_donor = data[i].surname_donor;
          let blood_group = data[i].blood_group;
          let email_donor = data[i].email_donor;
          let phone_donor = data[i].phone_donor;

          $(".donor-table .table tbody").append("<tr><td>"+name_donor+"</td><td>"+surname_donor+"</td><td>"+blood_group+"</td><td>"+email_donor+"</td><td>"+phone_donor+"</td><td><button type='button' id="+id_donor+" class='delete btn btn-danger'>Delete</button></td><td><button type='button' id="+id_donor+" class='update btn btn-success'>Update</button></td></tr>");

          $(".delete").click(function(){

            DonorID = $(this).attr("id");

            console.log(DonorID);

            $("#modalDelete").show();

          });

          $(".update").click(function(){

            DonorID = $(this).attr("id");
            console.log(DonorID);

            $("#modalUpdate").show();

          });   

        }

      },
      error:function(){
        alert("Error!");
      }
    });

  }

  $(".save-delete").click(function(){
    
    $.ajax({
        url:"delete_donor.php",
        type:"POST",
        data:{
          id_donor:DonorID
        },
        dataType:"JSON",
        success:function(res){
          
          for (let i = 0; i < res.length; i++) {
            
            alert(res[i].message);
            Read();
            $("#modalDelete").hide();
            
          }
       
        },
        error:function(){
          alert("Error!");
        }
    });

  });

  $(".save-update").click(function(){

      let name_donor_update = $('#name_donor_update').val();
      let surname_donor_update = $('#surname_donor_update').val();
      let blood_group_update = $('#blood_group_update').val();
      let email_donor_update = $('#email_donor_update').val();
      let phone_donor_update = $('#phone_donor_update').val();

      console.log(name_donor_update + " " + surname_donor_update + " " + blood_group_update + " " + email_donor_update + " " + phone_donor_update);

      $.ajax({
        url:"update_donor.php",
        type:"POST",
        data:{
          id_donor:DonorID,
          name_donor_update:name_donor_update,
          surname_donor_update:surname_donor_update,
          blood_group_update:blood_group_update,
          email_donor_update:email_donor_update,
          phone_donor_update:phone_donor_update
        },
        dataType:"JSON",
        success:function(data){
          
          for (let i = 0; i < data.length; i++) {
              if (data[i].message == "Something is wrong with your inputs!") {
                  alert(data[i].message);
              }else{
                alert(data[i].message);
                Read();
                $('#name_donor_update').val("");
                $('#surname_donor_update').val("");
                $('#email_donor_update').val("");
                $('#phone_donor_update').val("");
                $("#modalUpdate").hide();
              }
          }

        },
        error:function(){
          alert("Error!");
        }
      });

  });

  $(".close").click(function(){
      $("#modalDelete").hide();
      $("#modalUpdate").hide();
      $("#modalDeletePatient").hide();
  });

  $(".save-delete-patient").click(function(){
      
    $.ajax({
        url:"delete_patient.php",
        type:"POST",
        data:{
          id_patient:PatientID
        },
        dataType:"JSON",
        success:function(res){
          
          for (let i = 0; i < res.length; i++) {
            
            $("#modalDeletePatient").hide();
            $("#search-patient").val("");
            $(".patient-data").html("");
            
          }
       
        },
        error:function(){
          alert("Error!");
        }
    });

  });


  $("#search-patient").keyup(function(){

    let value = $("#search-patient").val();
    
    if (value != "") {
      $.ajax({
        url:"search_patient.php",
        type:"POST",
        data:{
          value:value
        },
        dataType:"JSON",
        success:function(data){
          
          for (let i = 0; i < data.length; i++) {
              if (data[i].message == "No found!") {
                  $(".response").html("");
                  $(".patient-data").html("");
              }else{

                let id_patient = data[i].id_patient;
                let name_patient = data[i].name_patient;
                let surname_patient = data[i].surname_patient;
                let gender = data[i].gender;
                let blood_group = data[i].blood_group;
                let body_weight = data[i].body_weight;
                let email_patient = data[i].email_patient;
                let phone_patient = data[i].phone_patient;

                $(".patient-data").append('<div class="container"><table class="table table-dark "><thead><tr><th>First name</th><th>Last name</th><th>Gender</th><th>Blood group</th><th>Body weight</th><th>Email</th><th>Phone</th><th>Delete</th></tr></thead><tbody><tr><td>'+name_patient+'</td><td>'+surname_patient+'</td><td>'+gender+'</td><td>'+blood_group+'</td><td>'+body_weight+'</td><td>'+email_patient+'</td><td>'+phone_patient+'</td><td><button type="button" id='+id_patient+' class="delete-patient btn btn-danger">Delete</button></td></tr></tbody></table></div>');

                $(".delete-patient").click(function(){

                  PatientID = $(this).attr("id");
                  console.log(PatientID);
                  $("#modalDeletePatient").show();

                });
              
              }
          }

        },
        error:function(){
          alert("Error!");
        }
    });

    }else if(value == ""){
        $(".patient-data").html("");
        $(".response").html("");
    }


  });


});
</script>
    
</body>
</html>
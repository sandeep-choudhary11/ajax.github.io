
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">

	<h1 class="text-center text-success">Crudoperation By Ajax</h1>

	<div class="d-flex justify-content-end">
		<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
  Open modal
</button>
	</div>


	<div>
		
	<h2 class="text-primary">All record</h2>

	<div id="records_contant">
		
	</div>
	</div>


	<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ajax Crud Opertion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
    <label>Firstname:</label>
    <input type="text" name=""id="firstname"class="form-control">        	
        </div>


        <div class="form-group">
    <label>Lastname:</label>
    <input type="text" name=""id="lastname"class="form-control">        	
        </div>


        <div class="form-group">
    <label>Email:</label>
    <input type="text" name=""id="email"class="form-control">        	
        </div>


        <div class="form-group">
    <label>Mobile:</label>
    <input type="text" name=""id="mobile"class="form-control">        	
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="button" class="btn btn-success" data-dismiss="modal"onclick="addRecord()">Save</button>
      
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>


<!--//update//-->
<!-- The Modal -->
<div class="modal" id="update_user_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ajax Crud Opertion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="form-group">
    <label>Firstname:</label>
    <input type="text" name=""id="update_firastname"class="form-control">        	
        </div>


        <div class="form-group">
    <label>Lastname:</label>
    <input type="text" name=""id="update_lastname"class="form-control">        	
        </div>


        <div class="form-group">
    <label>Email:</label>
    <input type="text" name=""id="update_email"class="form-control">        	
        </div>


        <div class="form-group">
    <label>Mobile:</label>
    <input type="text" name=""id="update_mobile"class="form-control">        	
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      	<button type="button" class="btn btn-success" data-dismiss="modal"onclick="updateuserdetail()">Save</button>
      
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="hidden" name=""id="hidden_user_id">
      </div>

    </div>
  </div>
</div>


	
</div>

<script type="text/javascript">
//display data
	$(document).ready(function(){
readRecords();
	});
	
	function readRecords(){
		var readrecord="readrecord";
		$.ajax({
			url:"backend1.php",
			type:"post",
			data:{readrecord:readrecord},
			success:function(data,status){
				$('#records_contant').html(data);
			}

		});
	}
//insert data

	function addRecord(){

		var firstname=$('#firstname').val();

		var lastname=$('#lastname').val();

		var email=$('#email').val(); 

		var mobile=$('#mobile').val();

		$.ajax({

 		url:"backend1.php",
 		type:'post',
 		data:{
           firstname :firstname, lastname :lastname, email :email,mobile :mobile,
 		},


 		success:function(data,status){

 			readRecords();
 			
 		}

		});
	}
	//delete record

	function Deleteuser(deleteid){
		var conf= confirm("Are you sure");
		if(conf==true){

			$.ajax({
				url:"backend1.php",
				type:"post",
				data:{deleteid:deleteid},
				success:function(data,status){
					readRecords();
				}
			});

		}
	}

	/*// update

	function getuserdetails(id){
		$('#hidden_user_id').val(id);

		$.post("backend1.php",{
			id:id
		},function(data,status){
			var user=JSON.parse(data);
			$('#update_firastname').val(user.firstname);
			$('#update_lastname').val(user.lastname);
			$('#update_email').val(user.email);
			$('#update_mobile').val(user.mobile);
			

		}


	);
		$('#update_user_modal').modal("show");


	}
	function updateuserdetail(){

		var firstname=$('#update_firastname').val();
		var lastname=$('#update_lastname').val();
		var email=$('#update_email').val();
		var mobile=$('#update_mobile').val();

		var hidden_user_id=$('#hidden_user_id').val();

		$.post("backend1.php",{
			hidden_user_id:hidden_user_id,
			firastname:firastname,
			lastname:lastname,
			email:email,
			mobile:mobile,

		};
		function(data,status){
			$('#update_user_modal').model("hide");
			readRecords();
		}

	}
	*/
</script>


</body>
</html>
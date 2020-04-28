<?php

include'connection.php';

extract($_POST);

if(isset($_POST['readrecord'])){

	$data='<table class="table table-striped table-bordered">
			
			<tr>

			<th>id</th>
			<th>firstname</th>
			<th>lastname</th>
			<th>email</th>
			<th>mobile</th>
			<th>Edit</th>
			<th>Delete</th>

	</tr>';

	$displayquery="select * from crudtable";

	$query=mysqli_query($conn,$displayquery);

	if(mysqli_num_rows($query)>0){
		$number=1;
		while($row=mysqli_fetch_array($query)){

			$data.='<tr>

              <td>'.$number.'</td>
              <td>'.$row['firastname'].'</td>
              <td>'.$row['lastname'].'</td>
              <td>'.$row['email'].'</td>
              <td>'.$row['mobile'].'</td>

              <td>
				<button onclick="getuserdetails('.$row['id'].')" class="btn btn-primary">Modify</button>
              </td>


              <td>
				<button onclick="Deleteuser('.$row['id'].')" class="btn btn-danger">Delete</button>
              </td>

			</tr>';
			$number++;
		}
	}
	$data.='</table>';
	echo $data;
}




if(isset($_POST['firstname']) && isset($_POST['lastname'])&& isset($_POST['email']) && isset($_POST['mobile']))
{

$insert="insert into crudtable(firastname,lastname,email,mobile)values('$firstname','$lastname','$email','$mobile')";

$query=mysqli_query($conn,$insert);

}

//delete record

if(isset($_POST['deleteid'])){

	$userid=$_POST['deleteid'];
	$deletequery="delete from crudtable where id='$userid'";
	$query=mysqli_query($conn,$deletequery);

}

//get user data update
if(isset($_POST['id']) && isset($_POST['id'])!=""){

	$user_id=$_POST['id'];
	$query="select * from crudtable where id='$user_id'";
	if(!$result=mysqli_query($conn,$query)){
		exit(mysqli_error());
	}
	$response=array();

	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			$response=$row;
		}
	
}else{

	$response['status']=200;
	$respone['message']="data not found";
}

//php built function
echo json_encode($response);
}

else{

	$response['status']=200;
	$response['message']="invalid request";
}

//update table

if(isset($_POST['hidden_user_id'])){
	$hidden_user_id=$_POST['hidden_user_id'];
	$firastname=$_POST['firastname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];


}

?>
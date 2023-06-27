<?php 
include('../condb.php');



if (isset($_POST['room']) && $_POST['room']=="add") {
    // echo "add";
    // echo "<pre>";
    // print_r($_POST);
    // print_r($_FILES);
    // echo "</pre>";

    // exit();
	$room_no = mysqli_real_escape_string($condb,$_POST["room_no"]);
	$room_price = mysqli_real_escape_string($condb,$_POST["room_price"]);
	$room_status = mysqli_real_escape_string($condb,$_POST["room_status"]);
	$room_size = mysqli_real_escape_string($condb,$_POST["room_size"]);
	$room_detail = mysqli_real_escape_string($condb,$_POST["room_detail"]);
	
	
	// $date1 = date("Ymd_His");
	// $numrand = (mt_rand());
	// $p_img = (isset($_POST['p_img']) ? $_POST['p_img'] : '');
	// $upload=$_FILES['p_img']['name'];
	// if($upload !='') { 

	// 	$path="../p_img/";
	// 	$type = strrchr($_FILES['p_img']['name'],".");
	// 	$newname =$numrand.$date1.$type;
	// 	$path_copy=$path.$newname;
	// 	// $path_link="../p_img/".$newname;
	// 	move_uploaded_file($_FILES['p_img']['tmroom_No'],$path_copy);  
	// }else{
	// 	$newname='';
	// }

	//เช็คข้อมูลซ้ำ
    $check = "
    SELECT room_no 
    FROM tbl_room 
    WHERE room_no = '$room_no'
    ";

    $result1 = mysqli_query($condb, $check) or die(mysqli_error());
    $num = mysqli_num_rows($result1);
    //$num = 0 แสดงว่าไม่พบข้อมูลซ้ำ
    if($num > 0)
      {
        echo "<script>";
        echo "window.location = 'room.php?room_error=room_error'; ";
        echo "</script>";
      }else{
      
	$sql = "INSERT INTO tbl_room
	(
	 room_no, room_size, room_price,room_status,room_detail
	)
	VALUES
	(
	'$room_no',
    '$room_size',
    '$room_price',
    '$room_status',
    '$room_detail'
	
	)";

	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");

	}
	//exit();
	//mysqli_close($condb);

	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'room.php?room_add=room_add'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'room.php?room_add_error=room_add_error'; ";
	echo "</script>";
	}



} elseif (isset($_POST['room']) && $_POST['room']=="edit") {
	//ประกาศตัวแปร
	$room_id = mysqli_real_escape_string($condb,$_POST["room_id"]);
	$room_no = mysqli_real_escape_string($condb,$_POST["room_no"]);
	$room_price = mysqli_real_escape_string($condb,$_POST["room_price"]);
	$room_status = mysqli_real_escape_string($condb,$_POST["room_status"]);
	$room_size = mysqli_real_escape_string($condb,$_POST["room_size"]);
	$room_detail = mysqli_real_escape_string($condb,$_POST["room_detail"]);
	
	
	
	// 	$path="../room_img/";
	// 	$type = strrchr($_FILES['room_img']['name'],".");
	// 	$newname =$numrand.$date1.$type;
	// 	$path_copy=$path.$newname;
	// 	// $path_link="room_img/".$newname;
	// 	move_uploaded_file($_FILES['room_img']['tmp_name'],$path_copy);  
	// }else{
	// 	$newname=$room_img2;
	// }

// 	แก้ไข
	$sql = "UPDATE tbl_room 
	SET 
		room_no = '$room_no',
		room_size = '$room_size',
		room_price = '$room_price',
		room_status = '$room_status',
		room_detail = '$room_detail'
		
	WHERE room_id = '$room_id'";
	
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	mysqli_close($condb);
	
	if($result){
	echo "<script type='text/javascript'>";
	//echo "alert('แก้ไขข้อมูลเรียบร้อย');";
	echo "window.location = 'room.php?room_id=$room_id&&room_edit=room_edit'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'room_edit.php?room_id=$room_id&&room_edit_error=room_edit_error'; ";
	echo "</script>";
	}

}elseif (isset($_GET['room']) && $_GET['room']=="del"){ 
	$room_id  = mysqli_real_escape_string($condb,$_GET["room_id"]);
	$sql = "DELETE FROM tbl_room WHERE room_id=$room_id";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error());	
	//mysqli_close($condb);
  echo "<script type='text/javascript'>";
  echo "window.location = 'room.php?room_del=room_del';";
  echo "</script>";

}else{
  echo "<script type='text/javascript'>";
  echo "window.location = 'room.php?room_no=room_no';";
  echo "</script>";

}



?>
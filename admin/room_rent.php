<?php 
$menu = "room"
?>
<?php include("header.php"); ?>

<?php 

$room_id = $_GET['room_id'];

$query_room = "
SELECT p.*,s.status_name
FROM tbl_room_status as s
INNER JOIN tbl_room as p ON p.room_status = s.status_id
WHERE p.room_id = $room_id
"  
or die("Error : ".mysqlierror($query_room));
$rs_room = mysqli_query($condb, $query_room);
$row = mysqli_fetch_array($rs_room);

// $query_room = "SELECT * FROM tbl_room WHERE room_id = $room_id"  
// or die("Error : ".mysqlierror($query_room));
// $rs_room = mysqli_query($condb, $query_room);
// $row=mysqli_fetch_array($rs_room);


// $query_status = "
// SELECT * FROM tbl_room_status as s
// " or die
// ("Error : ".mysqlierror($query_status));
// $rs_status = mysqli_query($condb, $query_status);
// echo ($query_status);


//$row2 = mysqli_fetch_array($rs_status);
//echo $row['room_no'];
//echo ($query_room);//test query

//แสดงข้อมูลที่จะแก้ไข
echo $room_id;
echo "<pre>";
print_r($row);
echo "</pre>";

?>
<script src="http://code.jquery.com/jquery-latest.js"></script>
      <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<head>
  <style>
    .card-header {
      background-color: #FFD95A;
    }
    
    
  </style>
</head>
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <h1 >รายละเอียดคนพัก <?php echo $row['room_no'];?></h1>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

    <div class="card ">
            <div class="card-header ">
              <h3 class="card-title">เพิ่มข้อมูล</h3>
              
            </div>
            <br>
            <div class="card-body">

              <div class="row">
                 
              <div class="col-md-8">
                   <form action="room_db.php" method="POST"  >
                     <!-- enctype ต้องมีเมื่อต้องอัปโหลดไฟล์ -->
                     <input type="hidden" name="room" value="edit">
                    <input type="hidden" name="room_id" value="<?php echo $row['room_id'];?>">
                <div class="form-group row">
                    
                    <label for="" class="col-sm-2 col-form-label">ชื่อ-สกุล</label>
                    <div class="col-sm-10">
                    <input  name="room_owner" type="text" class="form-control" id="room_owner" placeholder="" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">เบอร์ติดต่อ</label>
                    <div class="col-sm-10">
                    <input  name="phone" type="text"  class="form-control" id="phone" placeholder=""  >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">วันเข้าพัก</label>
                    <div class="col-sm-10">
                    <input type="date" name="date">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">วันหมดสัญญา</label>
                    <div class="col-sm-10">
                    <input type="date" name="date">
                    </div>
                </div>
                

                  
                  <button type="submit" class="btn btn-danger btn-block">Add</button>
                  </form> 
            </div>        
              </div>
            </div>
            <div class="card-footer">  
            </div>
    </div>

    </section>
    <!-- /.content -->

    <?php include('footer.php'); ?>

<script>
  $(function () {
    $(".datatable").DataTable();
    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // http://fordev22.com/
    // });
  });
</script>
  
</body>
</html>

<!-- http://fordev22.com/ -->
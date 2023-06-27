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
        <h1 >ห้อง <?php echo $row['room_no'];?></h1>
      </div><!-- /.container-fluid -->
    </section>



    <!-- Main content -->
    <section class="content">

    <div class="card ">
            <div class="card-header ">
              <h3 class="card-title">แก้ไขข้อมูล</h3>
              
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
                    
                    <label for="" class="col-sm-2 col-form-label">ห้อง</label>
                    <div class="col-sm-10">
                    <input  name="room_no" type="text" class="form-control" id="room_no" placeholder="หมายเลขห้อง"  value="<?php echo $row['room_no'];?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ขนาด</label>
                    <div class="col-sm-10">
                    <input  name="room_size" type="text"  class="form-control" id="room_size" placeholder=""  value="<?php echo $row['room_size'];?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">ราคา</label>
                    <div class="col-sm-10">
                    <input  name="room_price" type="text"  class="form-control" id="room_price" placeholder=""  value="<?php echo $row['room_price'];?>">
                    </div>
                </div>

                    
                
           

            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">สถานะ </label>
              <div class="col-sm-10">
                <select class="form-control select2" name="room_status" id="room_status" >
                <option value="<?php echo $row['room_status'];?>"> 
                <?php if ($row['room_status']==1) {
                            echo "ว่าง";
                          }elseif($row['room_status']==2){
                            echo "มีคนเช่า";
                          }elseif($row['room_status']==3){
                            echo "มีคนจอง";
                          } 
                          else echo "error";
                  ?> 
                   </option>
                  <option >-- สถานะ --</option>
                  <option value="1">ว่าง</option>
                  <option value="2">มีคนเช่า</option>
                  <option value="3">มีคนจอง</option>
                </select>
                
              </div>
              </div>
            
            
                    
                  

                <div class="form-group row">
                    <label for="" class="col-sm-2 col-form-label">รายละเอียด</label>
                    <div class="col-sm-10">
                    <textarea name="room_detail" rows="3"  class="form-control"><?php echo $row['room_detail'];?></textarea>
                    </div>
                </div>

                  
                  <button type="submit" class="btn btn-danger btn-block">Update</button>
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
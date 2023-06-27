<?php
$menu = "room"
?>
<?php include("header.php"); ?>
<?php
$query_room = "
SELECT p.*,s.status_name
FROM tbl_room_status as s
INNER JOIN tbl_room as p ON p.room_status = s.status_id
ORDER BY p.room_no ASC

" 
or die
("Error : ".mysqlierror($query_room));
$rs_room = mysqli_query($condb, $query_room);
//echo $query_room;

$query_status = "
SELECT * FROM tbl_room_status as s
" or die
("Error : ".mysqlierror($query_status));
$rs_status = mysqli_query($condb, $query_status);


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
    .card-header{
      background-color: #FFD95A;
    }
    input[type=number] {
  -moz-appearance: textfield;
}
    
  </style>
</head>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>ห้องพัก</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card">
      <div class="card-header ">
        <!-- <h3 class="card-title">รายการสินค้า</h3> -->
        <div align="right">
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มห้อง</button>
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <table id="example1" class="table table-bordered  table-hover">
              <thead>
                <tr class="danger">
                  <th width="5%"  ><center>ห้อง</center></th>
                  <!-- <th width="10%">Img</th> -->
                  <th width="10%"><center>ขนาด</center></th>
                  <th width="10%"><center>ราคา</center></th>
                  <th width="15%"><center>สถานะ</center></th>
                  <th width="20%">รายละเอียด</th>
                  <th width="20%">คนพักปัจจุบัน</th>
                  <th width="5%"><center>edit</center></th>
                  <th width="5%"><center>del</center></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($rs_room as $row_room) { ?>
                <tr>
                  
                 <!-- <td><td><img src="../p_img/
                 <?php echo $row_room['p_img']; ?>" width="100%"></td></td> -->

                  <td align="center"><?php echo $row_room['room_no']; ?></td>
                  <td align="center"><?php echo $row_room['room_size'].' ตร.ม.'; ?></td>
                  <td align="center"><?php echo $row_room['room_price']; ?></td>
                  <td align="center"> 
                  <?php
                    if($row_room['room_status'] == 1){
                      echo '<div class="btn btn-success" style="margin: 5px;">';
                      echo '<a href="room_rent.php?id='. $row_room['room_id'] . '" style="color:white">' . $row_room['status_name'] . '</a>';
                  }
                  elseif($row_room['room_status'] == 2){
                    echo '<div class="btn btn-secondary" style="margin: 2px;">';
                    echo $row_room['status_name'];
                  }
                  elseif($row_room['room_status'] == 3){
                    echo '<div class="btn btn-warning" style="margin: 5px;">';
                    echo $row_room['status_name'];
                  }
                  ?> 
                 </td>
                  <td><?php echo $row_room['room_detail']; ?></td>
                  <td align="center"><?php echo $row_room['room_owner']; ?></td>


                  
                  
                  <td>
                    <p style="margin-bottom: 10px;">
                      <a href="room_edit.php?room_id=<?php echo $row_room['room_id']; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i> edit</a>
                    </p>
                    
         
                  </td>
                  <td><a href="room_db.php?room_id=<?php echo $row_room['room_id']; ?>&&room=del" class="del-btn btn btn-danger"><i class="fas fas fa-trash"></i> del</a></td>
                  
                </tr>
                <?php
                // @$total+=$row_room['p_qty'];
                }
                
                //echo $total;
                ?>
              </tbody>
            </table>
            <?php if(isset($_GET['room_del'])){ ?>
            <div class="flash-data" data-flashdata="<?php echo $_GET['room_del'];?>"></div>
            <?php } ?>
            <script>
            $('.del-btn').on('click',function(e){
            e.preventDefault();
            const href = $(this).attr('href')
            Swal.fire({
            imageUrl: '../logo_fordev22_2.png',
            imageWidth: 250,
            //imageHeight: 100,
            title: 'Are you sure to delete?',
            text: "You won't be able to revert this!",
            // icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
            document.location.href = href;
            
            }
            })
            })
            const flashdata = $('.flash-data').data('flashdata')
            if(flashdata){
            swal.fire({
            type : 'success',
            title : 'Record Deleted',
            text : 'Record has been deleted',
            icon: 'success'
            })
            }
            </script>
            
            
            
          </div>
          
        </div>
      </div>
      <div class="card-footer"></div>
      
    </div>
    
    
    
    
  </section>
  <!-- /.content -->
  
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="room_db.php" method="POST" >
        
        <input type="hidden" name="room" value="add">
        <div class="modal-content">
          <div class="modal-header bg-dark">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มห้อง</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ห้อง</label>
              <div class="col-sm-10">
                <input  name="room_no" type="number" required class="form-control"  placeholder="หมายเลขห้อง"  />
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ขนาด</label>
              <div class="col-sm-10">
                <input  name="room_size" type="number" required class="form-control"  placeholder=""  />
              </div>
            </div>
             
            <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">ราคา </label>
            <div class="col-sm-10">
              <input  name="room_price" type="number" min="0" required class="form-control"  placeholder="Price" />
            </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">สถานะ </label>
              <div class="col-sm-10">
                <select class="form-control select2" name="room_status" id="room_status" required>
                  <option value="">-- สถานะ --</option>
                  <?php foreach($rs_status as $row){?>
                  <!-- <option value="1">ว่าง</option>
                  <option value="2">มีผู้เช่า</option>
                  <option value="3">มีคนจอง</option> -->
                  <option value="<?php echo $row['status_id'];?>">
                  <?php echo $row['status_name']; ?>
                  </option>
                  
                  <?php } ?>
                </select>
                
              </div>
              </div>

          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">รายละเอียด</label>
            <div class="col-sm-10">
              <textarea name="room_detail" rows="3" class="form-control"></textarea>
            </div>
          </div>
          <!-- <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">ขนาด</label>
            <div class="col-sm-10">
              <textarea name="room_detail" rows="3" class="form-control"></textarea>
            </div>
          </div> -->
          
          <!-- <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Qty </label>
            <div class="col-sm-10">
              <input  name="p_qty" type="number" min="0" required class="form-control"  placeholder="Qty"  minlength="3"/>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">img</label>
            <div class="col-sm-10">
               -->
              
              
              
              <!-- เลือกไฟล์ใหม่<br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="p_img" name="p_img" onchange="readURL(this);" >
                <label class="custom-file-label" for="file">Choose file</label>
              </div>
              <br><br>
              <img id="blah" src="#" alt="your image" width="300" />
            </div>
          </div> -->
          
          
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
          <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> ยืนยัน</button>
        </div>
      </div>
    </form>
  </div>
</div>

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
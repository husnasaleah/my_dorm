<?php
$menu = "member"
?>
<?php include("header.php"); ?>
<?php
$query_member = "SELECT * 
FROM tbl_member 
ORDER BY mem_id asc" 
or die
("Error : ".mysqlierror($query_member));
$rs_member = mysqli_query($condb, $query_member);
//echo ($query_level);//test query
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
    
    
  </style>
</head>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <h1>Member</h1>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="card card">
      <div class="card-header">
        <h3 class="card-title">รายชื่อเจ้าหน้าที่</h3>
        <div align="right">
          <button type="button" class="btn btn-light" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> เพิ่มข้อมูล สมาชิก</button>
        </div>
      </div>
      <br>
      <div class="card-body">
        <div class="row">
          <div class="col-md-6">
            <table id="example1" class="table table-bordered  table-hover ">
              <thead>
                <tr class="danger">
                  <th width="5%" >No.</th>
                  <th width="10%">Img</th>
                  <th width="35%">Name</th>
                  <th width="20%">edit</th>
                  <th width="20%">del</th>
                  
                </tr>
              </thead>
              
              <tbody>
                <?php foreach ($rs_member as $row_member) { ?>
                <tr>
                  <td align="center"><?php echo @$l+=1; ?></td>
                  <td align="center"><img src="../mem_img/<?php echo $row_member['mem_img']; ?>" width="100%"></td>
                  <td><?php echo $row_member['mem_name']; ?></td>
                  <td>
                    <p style="margin-bottom: 10px;">
                      <a href="mem_edit.php?mem_id=<?php echo $row_member['mem_id']; ?> " class="btn btn-warning"><i class="fas fa-pencil-alt"></i> edit</a>
                    </p>
                    <!-- <a href="level.php?ace=edit&l_id=<?php echo $row_level['l_id'];?>" class="btn btn-warning btn-xs"> edit</a> -->
                  </td>
                  <td><a href="member_db.php?mem_id=<?php echo $row_member['mem_id']; ?>&&member=del" class="del-btn btn btn-danger" onclick="return confirm('ยืนยันการลบ')" ><i class="fas fas fa-trash"></i> del</a></td>
                  
                </tr>
                <?php }?>
              </tbody>
            </table>
            <?php if(isset($_GET['mem_del'])){ ?>
            <div class="flash-data" data-flashdata="<?php echo $_GET['mem_del'];?>"></div>
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
      <div class="card-footer">
        
      </div>
      
    </div>
    
    
    
    
  </section>
  <!-- /.content -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <form action="member_db.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="member" value="add">
        <div class="modal-content">
          <div class="modal-header bg-yellow">
            <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูล สมาชิก</h5>
            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ระดับการใช้งาน </label>
              <div class="col-sm-10">
                <select class="form-control select2" name="ref_l_id" id="ref_l_id" required>
                  <option value="">-- เลือกประเภท --</option>
                  <option value="1">เจ้าของหอพัก</option>
                  <option value="2">ผู้ดูแลหอ</option>
                </select>
              </div>
            </div>
            
            <div class="form-group row">
              <label for="" class="col-sm-2 col-form-label">ชื่อ</label>
              <div class="col-sm-10">
                <input type="text" name="mem_name" class="form-control" id="mem_name" placeholder="" value="" required>
              </div>
            </div>
            
          </span>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Username </label>
            <div class="col-sm-10">
              <input type="text" name="mem_username" class="form-control" id="mem_username" placeholder="" value="" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">Password </label>
            <div class="col-sm-10">
              <input type="text" name="mem_password" class="form-control" id="mem_password" placeholder="ใส่รหัสผ่านก่อนกดบันทึก" value="" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-2 col-form-label">img</label>
            <div class="col-sm-10">
              เลือกไฟล์ใหม่<br>
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="mem_img" name="mem_img" onchange="readURL(this);" >
                <label class="custom-file-label" for="file">Choose file</label>
              </div>
              <br><br>
              <img id="blah" src="#" alt="your image" width="300" />
            </div>
          </div>
          
          
          
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

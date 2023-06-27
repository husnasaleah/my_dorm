<!-- Main Sidebar Container -->
<!-- http://fordev22.com/ -->
<head>
  <style>
    .brand-link{
      background-color: #ffc107;
    }
    .sidebar{
      background-color: #fff;
    }
    
  </style>
</head>
<aside class="main-sidebar sidebar-dark-yellow elevation-4">
    <!-- Brand Logo -->
    <!-- <a href="" class="brand-link bg-gray">
      <img src="../assets/img/FD22.png"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">FD22 | POS System</span>
    </a> -->


    <a href="list_product.php"  class="brand-link">
      <img src="../logo.png" 
           alt="AdminLTE Logo"
           class="brand-image"
          >
      <span class="brand-text font-weight-light">Hornice</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../mem_img/<?php echo $_SESSION['mem_img'];?>" class="img-circle elevation-2" alt="User Image">
          <!-- <img src="../assets/img/FD22.png" class="img-circle elevation-2" alt="User Image"> -->
        </div>
        <div class="info">
          <a href="edit_profile.php" target="" class="d-block text-dark"> <?php echo $_SESSION['mem_name'];?>| Edit Profile</a>
        </div>
      </div>



        <!-- Sidebar Menu -->
      <nav class="mt-2">
        <!-- nav-compact -->
        <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!-- <li class="nav-header text-dark">เมนูสำหรับการขาย</li> -->

          <li class="nav-item">
            <a href="list_product.php" class="nav-link text-dark <?php if($menu=="product"){echo "active";} ?> ">
              <i class=" nav-icon fas solid fa-clipboard"></i>

              <p>สินค้า </p>
            </a>

            <a href="room.php" class="nav-link text-dark <?php if($menu=="room"){echo "active";} ?> ">
              <i class=" nav-icon fas solid fa-clipboard"></i>
              <p>ห้อง </p>
            </a>

            <a href="test.php" class="nav-link text-dark <?php if($menu=="test"){echo "active";} ?> ">
              <i class=" nav-icon fas solid fa-clipboard"></i>
              <p>test </p>
            </a>

            <a href="index2.php" class="nav-link text-dark <?php if($menu=="index2"){echo "active";} ?> ">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>แจ้งซ่อม </p>
            </a>
            <a href="index3.php" class="nav-link text-dark <?php if($menu=="index3"){echo "active";} ?> ">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>จดมิเตอร์ </p>
            </a>
            <a href="index4.php" class="nav-link text-dark <?php if($menu=="index4"){echo "active";} ?> ">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>ออกบิล </p>
            </a>
          </li>
          <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header text-dark">ตั้งค่าข้อมูลระบบ</li>
          
          <li class="nav-item">
            <a href="list_mem.php" class="nav-link text-dark <?php if($menu=="member"){echo "active";} ?> ">
              <i class="nav-icon fa fa-users"></i>
              <p>เจ้าหน้าที่ </p>
            </a>
          </li>


         

          




        </ul>
        <hr>


<ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <hr>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link text-danger">
              <i class="nav-icon fas fa-power-off"></i>
              <!-- <i class="fa-regular fa-right-from-bracket"></i> -->
              <p>ออกจากระบบ</p>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
      <!-- http://fordev22.com/ -->
    </div>
    <!-- /.sidebar -->
  </aside>
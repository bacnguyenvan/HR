<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="css/hr.min.css">
    <link rel="stylesheet" href="css/quanly.css">
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-interaction/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="plugins/fullcalendar-bootstrap/main.min.css">
    <style type="text/css">
        .column_user:hover{
            background: white;
            
        }
        .user_info{
            cursor: pointer;
        }
        .info_employee {
            position: absolute;
            left: 15%;
            
        }

        .info_employee ul li a {
            color: white;
            text-decoration: none;
        }

        .info_employee li {
            padding-left: 24px;
           
        }
        .header_info{
            font-size: 40px;
            color: #084189;
            display: inline-block;
        }
        .profile_employee {
            position: absolute;
            top: 0;
           
            z-index: 9999;
            background: white;
            height: 100%;
            display: none;
            
            transition: 2s;
           width: 43%;

        }

        .hide_record{
            position: absolute;
            top: 4px;
            right: 12px;
            color: red;
            
            z-index: 999999;
            font-size: 23px;
            cursor: pointer;
        }

    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed" style="position: relative;">
    
    <!-- code PHP -->
    <?php 
        require("connect.php");
         session_start();
         //session_destroy();
         //var_dump($_SESSION['User']);
         //session_destroy();
         if(isset($_SESSION['User']) && $_SESSION['Quyen'] == 'admin')
         {


    ?>
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block" style="width:130px;">
                    <a href="login.php" class="nav-link">Đăng Nhập</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block" style="width:130px;">
                    <a href="register.php" class="nav-link">Đăng Kí</a>
                </li>
                <?php
                    if(isset($_SESSION['User']))
                    {
                ?>
                    <li class="nav-item d-none d-sm-inline-block" style="width:130px;">
                         <a href="logout.php" class="nav-link">Đăng xuất</a>
                    </li>
                <?php    
                    }

                ?>
                
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <div class="sidebar">                
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php
                                if(isset($_SESSION['User']))
                                {
                                    $user = $_SESSION['User'];
                                     $sql = "select nhanvien.HinhAnh from nhanvien
                                                    join quantri on nhanvien.Id = quantri.Id
                                                    where quantri.UserName = '$user'";
                                        
                                      $result = mysqli_query($conn,$sql) or die('could not seclect');
                                      if(mysqli_num_rows($result)==0)
                                        echo "Chua co hinh anh nhan vien";
                                      else
                                      {
                                        while ($row = mysqli_fetch_array($result))
                                        {
                                          $hinhanh = $row['HinhAnh'];
                                        }
                                      }
                            ?>
                                <img src="img/<?php echo $hinhanh;?>" class="img-circle elevation-2" alt="User Image">
                            <?php          

                                }
                            ?>
                        
                    </div>
                    <div class="info">
                        <a href="index.php" class="d-block"><?php if(isset($_SESSION['User'])) echo $_SESSION['User']; ?></a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">      
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Lịch Công Tác
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="create_lct.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tạo Đơn</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="xemdoncongtac.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Xem Đơn Công Tác</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Xóa Đơn</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon far fa-address-card"></i>  
                                <p>
                                    Nghỉ Phép
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="create_np.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Tạo Đơn</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="xemdonnghiphep.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Xem Đơn Nghỉ Phép</p>
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Xóa Đơn</p>
                                    </a>
                                </li> -->
                            </ul>
                        </li>
                        <?php 
                                if(isset($_SESSION['User']) && $_SESSION['Quyen'] == "admin")
                                {


                        ?>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Quản Lý
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="quanly.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thông tin </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="lichnghinhanvien.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lịch nghỉ nhân viên  </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="lichcongtacnhanvien.php" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lịch công tác nhân viên </p>
                                    </a>
                                </li>
                            </ul>
                        </li>     
                        <?php 
                                }
                        ?>

                    </ul>
                </nav>
            </div>
        </aside>
        <aside class="control-sidebar control-sidebar-dark">

        </aside>
        <div class="content-wrapper">          
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-12">
                    <h1 class="m-0 text-dark" style="color:red !important;">Hồ Sơ Nhân Viên</h1>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <br>

            <section class="content">
                <div class="container-fluid">
                    <form action="hosonhanvien.php" method="GET">
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <input type="text" name="search" placeholder="Tìm kiếm..." style="height: 40px;width: 85%;box-shadow: 1px 0px 6px 1px #bbb;border: none;padding:5px" >
                                <button style="height: 40px" type="submit"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="row">
                            
                                <?php 
                                if(isset($_GET['search']))
                                {
                                    $tennhanvien = $_GET['search'];
                                    //var_dump($tennhanvien);
                                    $sqli = "SELECT MaNV,HoTen,TenBP,HinhAnh FROM nhanvien
                                        JOIN bophan ON nhanvien.MaBP = bophan.MaBP
                                        WHERE HoTen LIKE '%".$tennhanvien."%'";

                                }
                                else
                                {
                                    $sqli = "SELECT MaNV,HoTen,TenBP,HinhAnh FROM nhanvien
                                        JOIN bophan ON nhanvien.MaBP = bophan.MaBP";
                                    
                                }
                                
                                 $result = mysqli_query($conn,$sqli) or die('could not seclect');
                                  if(mysqli_num_rows($result)==0)
                                    echo "chưa có nhân viên";
                                  else
                                  {
                                    echo "<table class='table'>";
                                    echo "<thead>
                                            <tr style='color:blue;'>
                                                <td>Mã nhân viên</td>
                                                <td>Họ tên nhân viên</td>
                                                <td>Bộ phận</td>
                                            </tr>
                                          </thead>
                                          <tbody>"
                                          ;
                                    while ($row = mysqli_fetch_array($result))
                                    {   ?>
                                            <tr class='column_user'>
                                                <td><?php echo $row['MaNV'] ?></td>
                                                <td class='user_info' ma_nv="<?php echo $row['MaNV'] ?>">
                                                    <a href="employ_info.php?Manv=<?php echo $row['MaNV'] ?>">
                                                        <img src="img/<?php echo $row['HinhAnh'] ?>" style="width: 80px;height: 80px; border-radius: 50%" > &nbsp;
                                                        <span style='color: #084189'><?php echo $row['HoTen'] ?></span>
                                                    </a>
                                                </td>
                                                <td><?php echo $row['TenBP'] ?></td>
                                            </tr>
                                    <?php } 
                                    echo "</tbody></table>";

                                }    
                                  
                                
                            ?>
                               
                            
                        </div>
                    </form>
                </div>
            </section>

        </div>


    </div>
    <?php 
        }
        else
        {
            header('Location:404.php');
        }
    ?>
    
    
    




    

      <div class="profile_employee">
        <div>
            <i class="fa fa-times hide_record"></i>
        </div>
        <div style="background-image: radial-gradient(circle at 0 0, #08b3a6, #08b3a6 21%, #0856c9 60%, #084189); padding: 25px;position: relative;">
            <div class="row">
                <img src="img/Ngoc.jpg" style="width: 130px;height: 130px;border-radius: 50%">
                <span style="color: white;font-size:60px;margin-left: 40px">Công chánh trần</span>
            
            </div>
           
        </div>
        <div class="wrapper_a" style="padding: 50px;">
            
            <div class="row header_info">
                <i class="fa fa-user"></i>
                <span>Basic Information</span>
            </div>
            <div class="row">
              <p>FIRST NAME <span style="color: red">*</span></p>
              <p></p>
            </div>
            <div class="row">
              <p>LAST NAME <span style="color: red">*</span></p>
              <p></p>
            </div>
            <div class="row header_info">
                <i class="fa fa-briefcase"></i>
                <span>Contact</span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>WORK PHONE</p>
                    <p></p>
                </div>
                <div class="col-md-6">
                    <p>WORK EMAIL</p>
                    <p></p>
                </div>
            </div>
               
               
            <div class="row header_info">
                <i class="fa fa-archive"></i>
                <span>Bộ Phận</span>
                <p></p>
            </div>
            
        </div>
    </div>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="plugins/chart.js/Chart.min.js"></script>
    <script src="plugins/sparklines/sparkline.js"></script>
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="dist/js/adminlte.js"></script>
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="dist/js/demo.js"></script>
    <script type="text/javascript">
        
        $(document).ready(function(){
            $('.user_info').click(function(e){

                e.preventDefault();
                
                $('.profile_employee').css({'display':'block','right':'0'})
                var manv = $(this).attr('ma_nv');

                $.ajax({
                    type:'get',
                    url:'ajax_info.php?ma_nv='+manv,

                }).done(function(data){
                    $('.profile_employee').html(data);
                })

            });



        })

    </script>
</body>
</html>

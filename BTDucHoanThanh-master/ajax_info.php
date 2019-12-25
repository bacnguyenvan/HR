<?php 
	require("connect.php");
	if(isset($_GET['ma_nv'])){ 
		$mavn = $_GET['ma_nv']; 


        $sqli = "SELECT *,TenBP FROM nhanvien JOIN bophan ON nhanvien.MaBP = bophan.MaBP AND MaNV='".$mavn."' ";
        
        $result = mysqli_query($conn,$sqli) or die('could not seclect');
	      if(mysqli_num_rows($result)==0){
	      	echo "chưa có nhân viên";
	    	die();
	      }
	       
	      else
	      {
	      	$row_employee = mysqli_fetch_assoc($result);

	       }
	       // echo '<pre>';
	       // echo print_r($row_employee);
	       // echo '</pre>';

	?>
		<!-- <div class="profile_employee"> -->
    	<div>
    		<i class="fa fa-times hide_record"></i>
    	</div>
    	<?php echo "<script>
				$('.hide_record').click(function(){
                    
                    $('.profile_employee').css('display','none');
                })
    	</script>" ?>
        <div style="background-image: radial-gradient(circle at 0 0, #08b3a6, #08b3a6 21%, #0856c9 60%, #084189); padding: 25px;position: relative;">
            <div class="row">
                <img src="img/<?php echo $row_employee['HinhAnh'] ?>" style="width: 130px;height: 130px;border-radius: 50%">
                <span style="color: white;font-size:60px;margin-left: 40px"><?php echo $row_employee['HoTen'] ?></span>
            
            </div>
           
        </div>
        <div class="wrapper_a" style="padding: 50px;">
            
            <div class="row header_info">
                <i class="fa fa-user"></i>
                <span>Basic Information</span>
            </div>
            <div class="">
              <p>FIRST NAME <span style="color: red">*</span></p>
              <p><?php echo explode(' ', $row_employee['HoTen'])[0]?></p>
              
            </div>
            <div class="">
              <p>LAST NAME <span style="color: red">*</span></p>
              <p><?php $first_name = explode(' ', $row_employee['HoTen']); echo end($first_name) ?></p>
            </div>
            <div class="row header_info">
                <i class="fa fa-briefcase"></i>
                <span>Contact</span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p>WORK PHONE</p>
                    <p><?php echo $row_employee['Sdt'] ?></p>
                </div>
                <div class="col-md-6">
                    <p>WORK EMAIL</p>
                    <p><?php echo $row_employee['email'] ?></p>
                </div>
            </div>
               
               
            <div class="row header_info">
                <i class="fa fa-archive"></i>
                <span>Bộ Phận</span>
                
            </div>
            <p><?php echo $row_employee['TenBP'] ?></p>
        </div>
    <!-- </div> -->
	}


<?php } ?>
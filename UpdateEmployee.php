<?php
include("Config.php");

$myID = $_GET['del'];
echo "<script type='text/javascript'>console.log($myID)</script>";

  if(isset($_GET['del']))
    {
      $sql="SELECT * FROM employee WHERE EmpID=".$_GET['del'];
      $result = $conn-> query($sql);

          if($result-> num_rows > 0)
            {
                while($row = $result-> fetch_assoc())
                 {
                    $FN = $row ['Firstname'];
                    $LN = $row ['Lastname'];
                    $Age = $row ['Age'];
                  }  
            }
          else
          {echo "0 result";}
    }

  if(isset($_POST['btn_Update']))
  {
      $FN=$_POST['inputFirstname'];
      $LN=$_POST['inputLastname'];
      $AGE=$_POST['inputAge'];

      $sql = "UPDATE Employee set Firstname='$FN', Lastname = '$LN', Age = '$AGE' where EmpID = '$myID'";

      if($rs=$conn->query($sql))
      {
       header("location:Employee.php");
      }
      else{echo "<script type='text/javascript'>alert('Error')</script>";}
}


?>



<!DOCTYPE html>
<html lang="en">

<head>


  <title>HRIS - Employees Records</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

 <link href="css/myStyle.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">HRIS<sup>V 1.0</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
          <a class="nav-link" href="Home.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Employees</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="Employee.php">Employee Records</a>
            <a class="collapse-item" href="AddEmployee.php">Add New Employee</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Payroll</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="utilities-color.html">Time Keeping</a>
            <a class="collapse-item" href="utilities-border.html">KPI</a>
            <a class="collapse-item" href="utilities-animation.html">Salary Rate</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
          </div>
        </div>
      </li>

    

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

        

         
        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Employees Details</h1>
          
          </div>
             
              <a href="Employee.php" class="btn btn-secondary"><i class="fas fa-user-edit"></i></a>
          	<div>

               <form name = "frmEmployee" id="frmEmployee" method="post">
                <fieldset>
                <legend>Update Employee's Details</legend>
                <div class="form-group">
                  <label for="inputFirstname" class="col-lg-2 control-label">Firstname</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control txtSize" id="inputFirstname" name="inputFirstname" value="<?php echo $FN;?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputLastname" class="col-lg-2 control-label">Lastname</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control txtSize" id="inputLastname" name="inputLastname" value="<?php echo $LN;?>">
                  </div>
                </div>
               <div class="form-group">
                    <label for="inputAge" class="col-lg-2 control-label">Age</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control txtSize" id="inputAge" name="inputAge" value="<?php echo $Age;?>">
                    </div>
                  </div>
                <div class="form-group">
                  <div class="col-lg-10 col-lg-offset-2">
                    <button type="submit" id="btn_Update"  name="btn_Update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </fieldset>
            </form>

          	</div>

          <!-- Content Row -->
          <div class="row">


     
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

 
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>




  <!-- Bootstrap core JavaScript-->
  <script src="js/jquery-3.0.0.min.js"></script>
 


  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>


</body>

</html>

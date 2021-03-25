<?php



include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<?
if(isset($_POST['updatebtn']))
{
    $fixed = $_POST['fixed'];
    
    $connection=mysqli_connect("localhost","root","","project");
    $query = "UPDATE issues SET fixed='$fixed' WHERE fixed='$fixed' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Your Data is Updated";
        $_SESSION['status_code'] = "success";
        header('Location: eugene.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
        $_SESSION['status_code'] = "error";
        header('Location: eugene.php'); 
    }
}

?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admins</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">


               <?php
                
                $connection=mysqli_connect("localhost","root","","adminpanel");
                $query = "SELECT id FROM register ORDER BY id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> Total Admin: '.$row.'</h4>';
            ?>



              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Problems Reported</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                
              <?php
                
                $connection=mysqli_connect("localhost","root","","project");
                $query = "SELECT issue_id FROM issues ORDER BY issue_id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> Problem Reported: '.$row.'</h4>';
            ?>
              
              
              </div>
            </div>

               

            
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Suggestions</div>
              <div class="row no-gutters align-items-center">
                <div class="col-auto">
                  



                  <?php
                
                $connection=mysqli_connect("localhost","root","","project");
                $query = "SELECT id FROM engagement ORDER BY id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h4> Suggestions '.$row.'</h4>';
            ?>
              

                </div>
                <div class="col">
                  <div class="progress progress-sm mr-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50"
                      aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->



  <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <form action="" method="POST">

        <div class="modal-body">

            
            
            <div class="form-group">
                <label>Fixed</label>
                <input type="text" name="fixed" id="fixed" class="form-control" placeholder="Enter whether its fixed">
            </div>


            
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4>REPORTED PROBLEMS</h4>
  </div>

  <div class="card-body">
  <div class="table-responsive">
            <?php
            $connection=mysqli_connect("localhost","root","","project");
                $query = "SELECT * FROM issues";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th> Issueid </th>
                            <th> title </th>
                            <th>problemdetail </th>
                            <th>choosefile</th>
                            <th>Location</th>
                            <th>Fixed</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(mysqli_num_rows($query_run) > 0)        
                        {
                            while($row = mysqli_fetch_assoc($query_run))
                            {
                        ?>
                            <tr>
                            <td><?php  echo $row['issueid']; ?></td>
                                <td><?php  echo $row['title']; ?></td>
                                <td><?php  echo $row['Problemdetail'];?></td>
                                
                                <td><img src="./.<?php echo(json_decode($row['choosefile']))[0]?>" width="200px" height="200px" alt=""></td>
                                <td><?php  echo $row['location']; ?></td>

                                <td><?php  echo $row['fixed'];?></td>
                                <td>

                                    <form action="caro.php" method="post">

                                        <input type="text" name="edit_id" value="<?php echo $row['fixed']; ?>">
                                        <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="caro.php" method="post">
                                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                        <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            } 
                        }
                        else {
                            echo "No Record Found";
                        }
                        ?>
                    </tbody>




                </table>

            </div>
        </div>
    </div>



<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
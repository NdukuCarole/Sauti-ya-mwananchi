<?php


include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="card-body">
  <div class="table-responsive">
            <?php
            $connection=mysqli_connect("localhost","root","","project");
                $query = "SELECT * FROM engagement";
                $query_run = mysqli_query($connection, $query);
            ?>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>id </th>
                            <th>problemdetail </th>
                            
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
                            <td><?php  echo $row['id'];?></td>
                                <td><?php  echo $row['Problemdetail'];?></td>
                                
                                
                               
                                
                                <td>





                                </td>
                                <td>
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






<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
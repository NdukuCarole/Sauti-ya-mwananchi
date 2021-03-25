<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin Profile </h6>
        </div>
        <div class="card-body">
        <?php

            if(isset($_POST['edit_btn']))
            {
                $fixed = $_POST['edit_id'];
                $connection=mysqli_connect("localhost","root","","project");
                
                $query = "SELECT * FROM issues WHERE fixed='$fixed' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

                        <form action="eugene.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                            
                            <div class="form-group">
                                <label>Fixed/not fixed/pending</label>
                                <input type="text" name="fixed" value="<?php echo $row['fixed'] ?>" class="form-control"
                                    placeholder="">
                            </div>
                            
                            <a href="eugene.php" class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

                        </form>
                        <?php
                }
            }
        ?>
        </div>
    </div>
</div>

</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
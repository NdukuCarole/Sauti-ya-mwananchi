<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>



    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> EDIT Admin </h6>
        </div>
        <div class="card-body">

        <div class="card-body">
        <?php

            if(isset($_POST['edit_btn']))
            {
                $id = $_POST['edit_id'];
                $connection=mysqli_connect("localhost","root","","project");
                
                $query = "SELECT * FROM display WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>


             <?php
                }
            }
            ?>
        

                        <form action="code2.php" method="POST">

                            <input type="hidden" name="edit_id" value="<?php echo $row['id'] ?>">

                            <div class="form-group">
                                <label> title </label>
                                <input type="text" name="edit_title" value="<?php echo $row['title']?>" class="form-control" placeholder="Enter the title">
                            </div>


                            <div class="form-group">
                                <label>Subtitle</label>
                                <input type="text" name="edit_subtitle" value="<?php echo $row['subtitle'] ?>" class="form-control"placeholder="Enter subtitle">
                            </div>



                            
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" name="edit_description" value="<?php echo $row['description'] ?>" class="form-control"
                                    placeholder="Enter description"></textarea>
                            </div>

                            <div class="form-group">
                                <label>Links</label>
                                <input type="text" name="edit_links" value="<?php echo $row['links'] ?>"
                                    class="form-control" placeholder="Enter link">
                            </div>

                            <a href="updateshow.php " class="btn btn-danger"> CANCEL </a>
                            <button type="submit" name="updatebtn" class="btn btn-primary"> Update </button>

                        </form>
                        
        </div>
    </div>
</div>

</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
<!doctype html>

<?php
   session_start();


   require '../../entity/Events.php';
 

   $event = new Events;

   
 
 
$eventID =$_GET['ID'] ;
 $row=$event->getElementById($eventID );
 
 $event->closeConnection();
 
 
 
   ?>
<html lang="en">

<?php include('../../includes/admin_includes/head.php') ?>
<body>

    <div class="wrapper d-flex align-items-stretch">
        <!-- sidebar  -->
        <?php include('../../includes/admin_includes/sidebar.php') ?>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">




 
                <form action='../../entity/editEvent.php?ID=<?php echo $_GET['ID'];  ?>' method="POST" class="form ml-4" id="editEvent">
                    <div class="row">
                        <div class="form-group">
                            <input type="text" name="title" id="title" required placeholder="title" class="form-control" value="<?php echo $row[0]['title'] ?>" >
                        </div>

                    </div>
                    <p>
                        <a class=" " data-toggle="collapse" href="#summary"   role="button" aria-expanded="false" aria-controls="summary" maxlength="80" >
                            summary
                        </a>
                    <div class="collapse" id="summary">
                        <input type="text" name="summary" id="summary" placeholder="summary" name="summary" class="form-control" value="<?php echo $row[0]['summary'] ?>">
                    </div>


                    </p>
                    <div class="row my-4">
                        <textarea rows="4" cols="50" name="body" required  >
                        <?php echo $row[0]['body'] ?>
                      </textarea>
                    </div>
                    <div class="form-group">
 						<input type="date" name="date" id="date" required placeholder="date" class="form-control" value="<?php echo $row[0]['date'] ?>">
 					</div>
 					<div class="row d-flex form-group">
 						<input type="time" name="start_time" id="start_time" required placeholder="start time" class=" form-control  " value="<?php echo $row[0]['start_time'] ?>">
 						<input type="time" name="end_time" id="end_time" required placeholder="end time" class="form-control" value="<?php echo $row[0]['end_time'] ?>">
 					</div>

                   <div class="form-group">
                   <input type="text" name="location" id="location" required placeholder="location" class="form-control" value="<?php echo $row[0]['location'] ?>" > 
                   </div>
                    
                    <select name="status" required class="form-control" value="<?php echo $row[0]['status'] ?>">
                        <option value="published">published</option>
                        <option value="unpublished">unpublished</option>

                    </select>

                    <button type="submit"  value="submit" name="submit" class="  btn btn-success">submit</button>
                </form>

 

            


        </div>

    </div>

    <?php include('../../includes/admin_includes/scripts.php') ?>
    <script>
        new FroalaEditor('textarea');
    </script>
</body>

</html>
<?php  include("db.php"); ?>
<?php include("includes/header.php"); ?>

    
    <h1>Hola Mundo</h1>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
            <!– Aqui estamos verificando si existe la varible seccion y si tiene un valor de message –>
                <?php if(isset($_SESSION['message'])){ ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                     <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <!– Aqui estamos borrando todos los datos que se guardaron en  la seccion –>
                <?php session_unset(); }?>
                <div class="card card-body">
                    <form action="save-task.php" method="POST">
                        <div class="form-group">
                            <input  type= "text" name= "title" class="form-control" placeholder="Task Title" autofocus>
                        </div>
                        <div class="form-group">
                            <textarea  type= "text" name= "description" class="form-control" rows="2" placeholder="Task Description" autofocus></textarea>
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="save-task" value="save task">
                    </form>
                </div>
            </div>
            <div class="col-md-8">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Title </th>
                                <th>Description </th>
                                <th>Created At </th>
                                <th>Actons</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query= "SELECT  * FROM task";
                                 $result= mysqli_query($conn , $query);
                                 while( $row = mysqli_fetch_array($result)) { ?>
                                    <tr>
                                        <td><?php echo $row ['title']?></td>
                                        <td><?php echo $row ['description']?></td>
                                        <td><?php echo $row ['create_ad']?></td>
                                        <td>
                                           <a href="edit-task.php?id=<?php echo $row['id']?>"
                                           class="btn btn-secondary"
                                           > 
                                            <i class=" fas fa-marker"></i>
                                        </a>
                                        </td>
                                        <td>
                                           <a href="delete-task.php?id=<?php echo $row['id']?>"
                                           class="btn btn-danger"> 
                                           <i class=" far  fa-trash-alt"></i>
                                        </a>
                                        </td>
                                    </tr>
                               <?php  } ?>
                                    
                                 
                            ?>
                        </tbody>
                    </table>
            </div>
        </div>    
    </div>

 <?php  include("includes/footer.php");?>
<?php require_once 'netting/connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap.min -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <div class="container mt-5">
        <div class="row">

            <!-- Nav -->

            <div class="col-md-12 navbars">
                <img src="icon/checklist.png" width="30">
                <h4>Todo List</h4>
            </div>

            <!-- Nav END -->

            <!-- Body -->

            <div class="col-md-12 content">
                <?php
                $pullDuty = $db->prepare("SELECT * FROM list");

                $pullDuty->execute();

                $count = $pullDuty->rowCount();

                if (empty($count)) { ?>

                    <div class="empty">
                        <h4>Task Empty</h4>
                    </div>

                    <?php }


                while ($pull = $pullDuty->fetch(PDO::FETCH_ASSOC)) {

                    if (!empty($count)) {  ?>
                        <ul>





                            <form action="netting/process.php" method="post">

                                <li>
                                    <input type="checkbox" name="allDelete[]" value="<?php echo $pull['list_id'] ?>">
                                    <p><?php echo $pull['list_contents'] ?></p>

                                    <div>
                                        <small><a type="button" href="update.php?update=<?php echo $pull['list_id'] ?>"><img width="30" src="icon/update.png"></a></small>

                                        <small><a type="button" href="netting/process.php?delete=<?php echo $pull['list_id'] ?>"><img width="30" src="icon/delete.png"></a></small>
                                    </div>
                                </li>

                                <hr style="margin-right: 40px;">

                            <?php  } ?>







                        </ul>
                    <?php  } ?>





            </div>

            <!-- Body END -->

            <!-- Footer -->

            <div class="col-md-12 footers">
                <div class="footer-button">
                    <button type="submit" name="allDeleteBtn" class="cancel-btn">Delete</button>

                    <button type="button" data-bs-toggle="modal" data-bs-target="#addModal" class="add-btn">Add Task</button>
                </div>
            </div>
            </form>

            <!-- Footer END -->

        </div>
    </div>

    <!-- Create Modal -->

    <div class="modal fade" id="addModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Task Add</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="netting/process.php" method="post">
                    <div class="modal-body">

                        <div class="mb-3">
                            <textarea id="" name="contents" cols="55" rows="4" maxlength="30"></textarea>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="hidden">
                        <button type="submit" name="insert" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Create Modal END -->

</body>

<!-- App -->
<script src="js/app.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.js"></script>
<!-- Bootstrap.min -->
<script src="js/bootstrap.min.js"></script>

</html>
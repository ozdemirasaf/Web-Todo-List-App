<?php require_once 'netting/connect.php' ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodoList Update</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <!-- Bootstrap.min -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container update-content mt-5">
        <div class="row">

            <!-- Nav -->

            <div class="col-md-12 updateNav">
                <div class="update-title">
                    <img src="icon/edit.png" width="30">
                    <h4>Update Task</h4>
                </div>
            </div>

            <!-- Nav END -->

            <!-- Body -->

            <form action="netting/process.php" method="post">
                <div class="col-md-12 update-body">
                    <div class="row">
                        <?php

                        $id = $_GET['update'];

                        $pullDuty = $db->prepare("SELECT * FROM list WHERE list_id=:id");

                        $pullDuty->execute(array(
                            'id' => $id
                        ));

                        $pull = $pullDuty->fetch(PDO::FETCH_ASSOC) ?>

                        <div class="col-md-12 contents">
                            <textarea name="userContents" maxlength="30" cols="50" rows="5"><?php echo $pull['list_contents'] ?></textarea>
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                        </div>
                    </div>
                </div>

                <!-- Body END -->

                <!-- Footer -->

                <div class="col-md-12 update-footer">
                    <div class="update-button">
                        <a href="index.php"><button type="button" class="update-cancel">Cancel</button></a>

                        <button type="submit" name="update" class="update-btn">Update</button>
                    </div>
                </div>
            </form>

            <!-- Footer END -->

        </div>
    </div>
</body>

</html>
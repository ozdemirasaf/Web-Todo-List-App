<?php
require_once 'connect.php';

// Insert

if (isset($_POST['insert'])) {

    $createTask = $db->prepare("INSERT INTO list SET
             list_contents=:contents
                 ");

    $insert = $createTask->execute(array(
        'contents' => $_POST['contents']
    ));

    if ($insert) {
        header("location:../index.php");
        exit;
    }
}

// Insert END

// Delete

if (isset($_GET['delete'])) {

    $deleteTast = $db->prepare("DELETE FROM list WHERE list_id=:id");

    $delete = $deleteTast->execute(array(
        'id' => $_GET['delete']
    ));

    if ($delete) {
        header("location:../index.php");
        exit;
    }
}

// Delete END

// Update

if (isset($_POST['update'])) {

    $id = $_POST["id"];

    $updateTask = $db->prepare('UPDATE list SET
    list_contents=:contents
    WHERE list_id=:id');

    $update = $updateTask->execute(array(
        'id' => $id,
        'contents' => $_POST['userContents']
    ));


    if ($update) {
        header("location:../index.php");
        exit;
    } else {
        echo 'hata';
    }
}

// Update

// AllDelete

if (isset($_POST['allDeleteBtn'])) {

    $allDelete = $_POST['allDelete'];

    if ($allDelete == "") {
        header("location:../index.php");
        exit;
    }

    $deleteList = implode(',', $allDelete);

    $deleteThem = $db->prepare("DELETE FROM list WHERE list_id IN ($deleteList)");

    $delete = $deleteThem->execute();

    if ($delete) {
        header("location:../index.php");
        exit;
    } else {
        echo "Hata";
        exit;
    }
}

// AllDelete END
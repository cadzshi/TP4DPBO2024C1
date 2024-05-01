<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Job.controller.php");

$job = new JobController();

if (isset($_POST['add'])) {
    //memanggil add
    $job->add($_POST);
}
//mengecek apakah ada id_hapus, jika ada maka memanggil fungsi delete
else if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $job->delete($id);
}else if (!empty($_GET['editForm'])) {
    $job->editFormJob($_GET['editForm']);
}else if (isset($_POST['edit'])) {
    $job->edit($_POST);
}
else{
    $job->index();
}
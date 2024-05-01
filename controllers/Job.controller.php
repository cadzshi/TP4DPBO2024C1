<?php
include_once("connection.php");
include_once("models/Job.class.php");
include_once("views/Job.view.php");

class JobController {
  private $job;

  function __construct(){
    $this->job = new Job(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
  }

  public function index() {
    $this->job->open();
    $this->job->getJob();
    $data = array();
    while($row = $this->job->getResult()){
      array_push($data, $row);
    }

    $this->job->close();

    $view = new JobView();
    $view->render($data);
  }

  function add($data){
    $this->job->open();
    $this->job->add($data);
    $this->job->close();
    
    header("location:job.php");
  }

  function edit($id){
    $this->job->open();
    $this->job->edit($id);
    $this->job->close();
    
    header("location:job.php");
  }

  function delete($id){
    $this->job->open();
    $this->job->delete($id);
    $this->job->close();
    
    header("location:job.php");
  }

  public function editFormJob($id) {
    $this->job->open();
    $this->job->getJob();
    $datajob = array();
    while($row = $this->job->getResult()){
      array_push($datajob, $row);
    }


    $this->job->close();

    $view = new JobView();
    $view->editJob($id, $datajob);
  }

}
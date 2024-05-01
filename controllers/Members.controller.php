<?php
include_once("connection.php");
include_once("models/Members.class.php");
include_once("models/Job.class.php");
include_once("views/Members.view.php");

class MembersController {
  private $members;
  private $job;

  function __construct(){
    $this->members = new Members(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
    $this->job = new Job(Connection::$db_host, Connection::$db_user, Connection::$db_pass, Connection::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->job->open();
    $this->members->getMembers();
    $this->job->getJob();
    
    $data = array();
    while($row = $this->members->getResult()){
      array_push($data, $row);
    }
    
    $dataJob = array();
    while($row = $this->job->getResult()){
      array_push($dataJob, $row);
    }

    $this->members->close();
    $this->job->close();

    $view = new MembersView();
    $view->render($data,$dataJob);
  }

  
  public function addForm()
  {
    $this->job->open();
    $this->job->getJob();

    $datajob = array();
    while($row = $this->job->getResult()){
      array_push($datajob, $row);
    }

    $this->job->close();

    $view = new MembersView();
    $view->listjob($datajob);
  }

  public function editForm($id) {
    $this->members->open();
    $this->job->open();
    $this->members->getMembers();
    $this->job->getJob();
    $data = array();
    while($row = $this->members->getResult()){
      array_push($data, $row);
    }

    $datajob = array();
    while($row = $this->job->getResult()){
      array_push($datajob, $row);
    }

    $this->members->close();
    $this->job->close();

    $view = new MembersView();
    $view->editMember($id, $data, $datajob);
  }

  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function edit($id){
    $this->members->open();
    $this->members->edit($id);
    $this->members->close();
    
    header("location:index.php");
  }

  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();
    
    header("location:index.php");
  }


}
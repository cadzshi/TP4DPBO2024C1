<?php
  class MembersView{
    public function render($data,$dataJob){
      $no = 1;
      $dataMembers = null;
      foreach($data as $val){
        list($id, $name, $email, $phone, $id_job) = $val;
        $nama_job='';
        foreach($dataJob as $job){
            list($idr, $nameJob) = $job;
            if ($idr == $id_job) {
                $nama_job = $nameJob;
                break;
            }
        }
        $dataMembers .= "<tr>
        <td>" . $no++ . "</td>
        <td>" . $name . "</td>
        <td>" . $email . "</td>
        <td>" . $phone . "</td>
        <td>" . $nama_job . "</td>
        <td>
        <a href='index.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
        <a href='index.php?editForm=" . $id ."' class='btn btn-success''>Edit</a>
        </td>
        </tr>";
      }

      $tpl = new Template("templates/index.html");
      $tpl->replace("DATA_TABEL", $dataMembers);
      $tpl->write();
    }

    public function listJob($dataJob)
    {
        $listJob = null;
        foreach ($dataJob as $val) {
            list($id, $nama) = $val;
            $listJob .= "<option value='" . $id . "'>" . $nama . "</option>";
        }

        $tpl = new Template("templates/create.html");
        $tpl->replace("OPTION", $listJob);
        $tpl->write();
    }

    public function editMember($idMember, $data, $dataClub)
    {
        $dataMember = null;
        $jobMember = 0;
        foreach($data as $val)
        {
            list($id, $name, $email, $phone, $id_job) = $val;
            if($idMember == $id)
            {
                $dataMember .= 
                "<input type='hidden' name='id_edit' value='$id' class='form-control'> <br>

                <label> NAME: </label>
                <input type='text' name='tname' value='$name' class='form-control'> <br>
                <label> EMAIL: </label>
                <input type='text' name='temail' value='$email' class='form-control'> <br>
                <label> PHONE: </label>
                <input type='text' name='tphone' value='$phone' class='form-control'> <br>
            ";
            $jobMember = $id_job;
            break;
            }
        }
        
        $listJob = null;
        foreach ($dataClub as $val) {
            list($id, $nama) = $val;
            if($id == $jobMember)
            {
                $listJob .= "<option selected value='" . $id . "'>" . $nama . "</option>";
            }
            else
            {
                $listJob .= "<option value='" . $id . "'>" . $nama . "</option>";
            }
        }

        $tpl = new Template("templates/edit.html");  
        $tpl->replace("FORM_MEMBER", $dataMember);
        $tpl->replace("OPTION_JOB", $listJob);
        $tpl->write();
    }


  }
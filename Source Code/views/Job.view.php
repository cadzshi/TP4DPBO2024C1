<?php
class JobView{
    public function render($data){
    $no = 1;
    $dataJob = null;
    foreach($data as $val){
        list($id, $nama) = $val;
        $dataJob .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $nama . "</td>

                <td>
                <a href='job.php?id_hapus=" . $id . "' class='btn btn-danger''>Hapus</a>
                <a href='job.php?editForm=" . $id ."' class='btn btn-success''>Edit</a>
                </td>
                </tr>";
        }
        $tpl = new Template("templates/job.html");
        $tpl->replace("DATA_TABEL", $dataJob);
        $tpl->write();
    }

    public function editJob($idJob, $data)
    {
        $dataJob= null;
        foreach($data as $val)
        {
            list($id, $name) = $val;
            if($idJob == $id)
            {
                $dataJob.= 
                "<input type='hidden' name='id_edit' value='$id' class='form-control'> <br>

                <label> NAME: </label>
                <input type='text' name='tname' value='$name' class='form-control'> <br>
            ";
            break;
            }
        }
        

        $tpl = new Template("templates/editJob.html");  
        $tpl->replace("FORM_MEMBER", $dataJob);
        $tpl->write();
    }
}
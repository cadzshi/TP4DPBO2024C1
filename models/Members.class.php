<?php

class Members extends DB
{
    function getMembers()
    {
        $query = "SELECT * FROM members";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['tname'];
        $email = $data['temail'];
        $phone = $data['tphone'];
        $id_job = $data['tid_job'];

        $query = "insert into members values ('', '$name', '$email', '$phone', '$id_job')";

        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM members WHERE id = '$id'";

        return $this->execute($query);
    }

    function edit($data)
    {

        $name = $data["tname"];
        $email = $data["temail"];
        $phone = $data["tphone"];
        $id_job = $data['tid_job'];
        $id = $data["id_edit"];
        
        $query = "update members set name='$name', email='$email', phone='$phone', id_job='$id_job' where id='$id'";

        return $this->execute($query);
    }
}
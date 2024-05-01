<?php

class Job extends DB
{
    function getJob()
    {
        $query = "SELECT * FROM job";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['tname'];

        $query = "insert into job values ('', '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "delete FROM job WHERE id = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($data)
    {

        $name = $data["tname"];
        $id = $data["id_edit"];
        
        $query = "update job set nama='$name' where id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
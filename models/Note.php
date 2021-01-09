<?php
require_once '../db/Database.php';
class Note
{
    public $db;
    function __construct()
    {
        $this->db = Database::connection();
    }
    function __destruct()
    {
        $this->db->close();
    }


    function insertNote($title, $description, $id)
    {
        $query = "INSERT INTO note(title,date,active,description,member_id)
        VALUES('$title',CURDATE(),1,'$description','$id')";
        $result = $this->db->query($query);
        return $result;
        $this->__destruct();
    }


    function updateNote($title, $description, $id, $oldTitle, $oldDescription, $oldDate)
    {
        $query = "UPDATE note SET note.title='$title', note.description='$description',note.member_id='$id' WHERE (note.title= '$oldTitle'
         AND note.description='$oldDescription') OR (note.title= '$oldTitle' AND note.date='$oldDate') ";
        $result = $this->db->query($query);
        return $result;
        $this->__destruct();
    }
    function selectActiveNotes()
    {
        $active = 1;
        $query = "SELECT note.title,note.date,note.description FROM note WHERE note.active= '$active'";
        $result = $this->db->query($query);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_array(MYSQLI_NUM)) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }

        $this->__destruct();
    }

    function selectNoteByTitleAndDate($title, $description, $date)
    {
        $query = "SELECT note.title,note.date,note.description FROM note WHERE (note.title= '$title' AND note.description='$description') OR (note.title= '$title' AND note.date='$date')";
        $result = $this->db->query($query);
        return $result->fetch_array(MYSQLI_NUM);
    }

    function updateAccountMoney($id, $amount)
    {
        $query = "UPDATE accountbolivares SET accountbolivares.money='$amount' WHERE accountbolivares.id='$id'";
        $result = $this->db->query($query);
        return $result;
        $this->__destruct();
    }

    function updateActiveNote($title, $date, $desc)
    {
        $inactive = 0;
        $query = "UPDATE note SET note.active=0  WHERE note.title='$title' AND note.date='$date'";
        $result = $this->db->query($query);
        return $result;
    }
}

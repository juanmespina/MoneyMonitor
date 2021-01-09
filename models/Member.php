<?php
require_once '../db/Database.php';
class Member
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

    function selectUser($user)
    {
        $query = "SELECT member.id,member.name, member.password, member.memberLevel_id FROM member WHERE member.name='$user'";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
        $this->__destruct();
    }
}

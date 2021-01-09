<?php
require_once '../db/Database.php';
class Expense
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

    function selectExchangePrice()
    {
        $query = "SELECT exchangerate.rate, exchangerate.date FROM exchangerate ORDER BY exchangerate.id DESC LIMIT 1";
        $result = $this->db->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            return $row;
        } else {
            return false;
        }
        $this->__destruct();
    }
    function insertExpense($amount, $dollars, $paymentMethod, $category, $description, $userId, $level)
    {
        $query = "INSERT INTO expense(amount,dollars,member_id,member_memberLevel_id,paymentMethod_id,description,category_id,date)
        VALUES('$amount','$dollars','$userId','$level','$paymentMethod','$description','$category',CURDATE())";
        $result = $this->db->query($query);
        return $result;
        $this->__destruct();
    }
    function selectLastExpenses()
    {
        $query = "SELECT member.name,category.category,expense.amount,expense.dollars,expense.date,expense.description FROM expense 
        INNER JOIN member ON expense.member_id= member.id INNER JOIN category ON expense.category_id= category.id ORDER BY 
        expense.id DESC limit 15";
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
    function selectAccountBolivares()
    {

        $query = "SELECT * FROM accountbolivares WHERE accountbolivares.active=1 ORDER BY  accountbolivares.id DESC limit 1";
        $result = $this->db->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_array(MYSQLI_ASSOC);
            return $row;
        } else {
            return false;
        }
    }
    function updateAccountMoney($id, $amount)
    {
        $query = "UPDATE accountbolivares SET accountbolivares.money='$amount' WHERE accountbolivares.id='$id'";
        $result = $this->db->query($query);
        return $result;
    }
}

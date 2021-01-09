<?php
require_once '../models/Expense.php';
class ExpenseController
{
    function __construct()
    {
        session_start();
    }

    function insertExpense()
    {
        if (isset($_POST['dollars']) && isset($_POST['paymentMethod']) && isset($_POST['category']) && isset($_POST['description'])) {
            if (filter_var($_POST['dollars'], FILTER_VALIDATE_FLOAT)) {
                $amount = $_POST['amount'];
                $dollars = $_POST['dollars'];
                $paymentMethod = $_POST['paymentMethod'];
                $category = $_POST['category'];
                $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
                $userId = $_SESSION['id'];
                $level = $_SESSION['level'];
                $model = new Expense();
                $success = $model->insertExpense($amount, $dollars, $paymentMethod, $category, $description, $userId, $level);

                if ($success) {
                    echo "Datos guardados";
                } else {
                    echo "Error al guardar los datos";
                }
            } else {
                echo "Parametros incorrectos, por favor introduzca los datos con los formatos correctos";
            }
        } else {

            echo "Error al enviar parametros";
        }
    }

    function  getExchangePrice()
    {
        $model = new Expense();
        $row = $model->selectExchangePrice();
        if ($row==false) {
            echo $row;
        } else {
            $_SESSION['rate'] = $row['rate'];
            echo json_encode($row);
        }
    }

    function calculateExchange()
    {

        if (!isset($_SESSION['rate']) || !isset($_POST['bolivares'])) {
            echo "Error en la consulta de la tasa";
        } else {

            $priceResult =  ($_POST['bolivares']) / ($_SESSION['rate']);
            echo  $priceResult;
        }
    }

    function getLastExpenses()
    {
        $model = new Expense();
        $row = $model->selectLastExpenses();
        if ($row==false) {
            echo $row;
        } else {
            echo json_encode($row);
        }
    }

    function updateAccMoney()
    {

        if (isset($_POST['amount'])) {
            $model = new Expense();
            $row = $model->selectAccountBolivares();
            $amount = $row['money'] - $_POST['amount'];
            $success = $model->updateAccountMoney($row['id'], $amount);
            if ($success) {
                echo "Datos guardados para la cuenta";
            } else {
                echo "Error al guardar los datos para la cuenta";
            }
        } else {
            echo "Error al enviar parametros";
        }
    }

    function getLastAccount()
    {
        $model = new Expense();
        $row = $model->selectAccountBolivares();
        if ($row==false) {
            echo $row;
        } else {
            echo json_encode($row);
        }
    }
}

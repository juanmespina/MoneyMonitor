<?php
require_once '../models/Member.php';
class MemberController
{ function __construct()
{
    session_start();
}

    function checkCredentials()
    {
        if (isset($_POST['user']) && isset($_POST['password'])) {
            $user = $_POST['user'];
            $password = $_POST['password'];
            $model = new Member();
            $row = $model->selectUser($user);

            if (empty($row['name'])) {
                echo "No existe usuario";
            } else {
                if ($row['password'] == $password) {
                    $_SESSION['user'] = $user;
                    $_SESSION['level'] = $row['memberLevel_id'];    
                    $_SESSION['id']=$row['id'];               
                    echo "Bienvenido";
                } else {
                    echo "Clave errada";
                }
            }
        }
        else{
            echo 'Error al enviar parametros ';

        }
    }
}

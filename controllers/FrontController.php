<?php
require_once 'autoload.php';
if (isset($_POST['controller']) && isset($_POST['action'])) {
        $controller = $_POST['controller']."Controller";
        $object = new $controller();
        $action = $_POST['action'];
        $object->$action();}
else {
        echo "No se encontro controlador";
}

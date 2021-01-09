<?php
require_once '../models/Note.php';
class NoteController
{
    function __construct()
    {
        session_start();
    }

    function insertNote()
    {
        if (isset($_POST['title']) && isset($_POST['description']) && isset($_SESSION['id'])) {


            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $date = date("y-m-d");
            $model = new Note();

            if (strlen($title) > 1 && strlen($title) < 20 && strlen($description) > 1) {
                $array = $model->selectNoteByTitleAndDate($title, $description, $date);

                if (count($array) == 0) {
                    $success = $model->insertNote($title, $description, $_SESSION['id']);

                    if ($success) {
                        echo "Datos guardados";
                    } else {
                        echo "Error al guardar los datos";
                    }
                } else {
                    echo "No se puede ingresar una nota con el mismo nombre que otra registrada en la misma fecha. Por favor, cambia el titulo.";
                }
            } else {
                echo "Titulo debe tener entre 1 y 20 caracteres, descripcion debe tener mas de un caracter";
            }
        } else {

            echo "Error al enviar parametros";
        }
    }

    function updateNote()
    {
        if (isset($_POST['title']) && isset($_POST['description']) && isset($_SESSION['id'])) {


            $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
            $date = date("y-m-d");
            $model = new Note();
            $array = $model->selectNoteByTitleAndDate($_SESSION['oldTitle'], $_SESSION['oldDescription'],  $_SESSION['oldDate']);
            if (count($array) >= 1) {

                $success = $model->updateNote($title, $description, $_SESSION['id'], $_SESSION['oldTitle'], $_SESSION['oldDescription'],  $_SESSION['oldDate']);

                if ($success) {
                    echo "Datos actualizados";
                } else {
                    echo "Error al guardar los datos";
                }
            } else {
                echo "No se puede ingresar una nota con el mismo nombre que otra registrada en la misma fecha. Por favor, cambia el titulo. ";
            }
        } else {

            echo "Error al enviar parametros";
        }
    }

    function editNote()
    {
        if (isset($_POST["tRow"])) {

            $tRow = $_POST["tRow"];

            $title = filter_var($tRow["title"], FILTER_SANITIZE_STRING);
            $description = filter_var($tRow["desc"], FILTER_SANITIZE_STRING);
            $date = $tRow["date"];

            $model = new Note();
            $row = $model->selectNoteByTitleAndDate($title, $description, $date);
            if (empty($row)) {
                echo "Error en la consulta";
            } else {
                $_SESSION['oldTitle'] = $title;
                $_SESSION['oldDescription'] = $description;
                $_SESSION['oldDate'] = $date;
                echo json_encode($row);
            }
        } else {

            echo "Error al enviar parametros";
        }
    }

    function getActiveNotes()
    {
        $model = new Note();
        $row = $model->selectActiveNotes();
        if ($row == false) {
            echo $row;
        } else {
            echo json_encode($row);
        }
    }

    function deactivateNote()
    {
        if (isset($_POST["tRow"])) {
            $nosuccess = true;
            $tRow = $_POST["tRow"];
            $model = new Note();
            for ($i = 0; $i < count($tRow); $i++) {
                $success = $model->updateActiveNote($tRow[$i]["title"], $tRow[$i]["date"], $tRow[$i]["desc"]);
                if (!$success) {
                    $nosuccess = false;
                }
            }
            if ($nosuccess = false) {
                echo "No se pudieron desactivar una o varias notas";
                die();
            } else {
                echo "Desactivacion exitosa";
            }
        }
    }
}

<?php
header("Content-Type: application/json");
include_once ('../class/classUser.php');
switch($_SERVER['REQUEST_METHOD']){
    case "POST":
        $_POST= json_decode(file_get_contents('php://input'),true);
        $user = new User($_POST);
        $user->createUser();
        $resultado["mensaje"]="Guardar el usuario. Informacion:".json_encode($_POST);
    break;
    case "GET":
        if(isset($_GET['id']))
            User::readUser($_GET['id']);
        else
            User::readUsers();
    break;
    case "PUT":
        $_PUT= json_decode(file_get_contents('php://input'),true);
        $user = new User($_PUT);
        $user->updateUser($_GET['id']);
        $resultado["mensaje"]="Actualizar el usuario de id= ".$_GET['id'].". Informacion:".json_encode($_PUT);
    break;
    case "DELETE":
        User::deleteUser($_GET['id']);
        $resultado["mensaje"]="Se elimino el usuario de id= ".$_GET['id'];
    break;
}
if(isset($resultado))
    echo json_encode($resultado);
?>
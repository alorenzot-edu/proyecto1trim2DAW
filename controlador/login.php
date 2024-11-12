<?php
if (isset($_POST['enviar'])) {
    //Opciones de usuario con sesion
    echo $_POST['email'];
    echo $_POST['pwd'];
} else {
    //Opciones de usuario sin sesion
    include '../vista/inicio.html';
    //Sustituir esto por una vista    
    require '../vista/login.html';
}

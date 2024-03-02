<?php 
     function estaAutenticado() : bool {
        session_start();
        if(!$_SESSION['login']) {
            header('Location: /');
        } 
        return true;
    }

    function dividirHora($hora) {
        $dividido = explode(" ", $hora);
        return $dividido;
    }

 ?>
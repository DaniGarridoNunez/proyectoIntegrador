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

    function truncarTexto($texto, $max = 50, $fin = '...') {
        if (strlen($texto) <= $max) return $texto;
        $subtexto = substr($texto, 0, $max - strlen($fin));
        return $subtexto . $fin;
    }

 ?>
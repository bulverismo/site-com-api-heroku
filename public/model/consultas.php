<?php

/* 
 * @author adaltoss
 * 18/01/2020
 */

    // Linha adicionada a pedido do José Américo
    header("Access-Control-Allow-Origin: *");
    

    date_default_timezone_set('America/Sao_Paulo');
    
    header('Content-type: application/json');
    
    include_once './db.class.php';


    if( isset( $_POST['senha'] )){
      echo 'tem senha '.$_POST['senha'];
    }else{
      echo 'nao tem senha';
    }

    if( isset( $_POST['listar']) ){

        $sql =    " SELECT * "
                . " FROM duvidas "
                . " WHERE duvidas.usuario_que_perguntou = joao_machado";
        
        $result = db::consultar($sql);
       
            $linhas = array();
            
            while($r = mysqli_fetch_assoc($result))
            {
                $linhas[] = $r;
            }
            
            echo json_encode($linhas);
            
    }

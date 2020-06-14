<?php

class db
{
    private $host = 'localhost';
    
    /*--- Dados Servidor Recoacomp ---*/
    private $usuario = 'root';
    private $senha = 'curicalinda';
    private $database = 'hellcode';

     
    public function conecta_mysql()
    {
        //criar a conexao
        $con = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

        //ajustar o charset de comunicação entre a aplicação e o banco de dados
        mysqli_set_charset($con, 'utf8');

        //verficar se houve erro de conexão
        if (mysqli_connect_errno()) {
                echo 'Erro ao tentar se conectar com o BD MySQL: ' . mysqli_connect_error();
        }

        return $con;
    }
    
    
    
    // --- Parte nova ----//
    
    private static function abrir(){
       
        $usuario = 'root';
        $senha = 'curicalinda';
        $database = 'hellcode';
        
        $conn = mysqli_connect("localhost", $usuario, $senha, $database);
        
        if ( $conn ){
            mysqli_set_charset($con, 'utf8');
            return $conn;
        }
        else 
            return NULL;
        
    }
    
    private static function fechar( $conn ){
        mysqli_close( $conn );
    }
    
    public static function executar( $sql ){
        $conn = self::abrir();
        if( $conn ){
            $result = mysqli_query($conn, $sql);
            self::fechar( $conn );
            return $result;
        } else {
            return FALSE;
        }
    } 
    public static function executarComRetornoId( $sql ){
        $conn = self::abrir();
        $id = 0;
        if( $conn ){
            mysqli_query($conn, $sql);
            $id = mysqli_insert_id($conn);
            self::fechar( $conn );
        }
        return $id;
    } 
    
    public static function consultar( $sql ){
        $conn = self::abrir();
        if( $conn ){
            $result = mysqli_query($conn, $sql);
            self::fechar( $conn );
            return $result;
        } else {
            return NULL;
        }
    } 
    
}

<?php

include_once 'database.php';

class Autocompletar extends Database{

    function buscar($texto){
        $res = array();
        $query = $this->connect()->prepare('SELECT ciudad_destino FROM vuelo WHERE ciudad_destino LIKE :texto');
        $query->execute(['texto' => $texto . '%']);

        if($query->rowCount()){
            while($r = $query->fetch()){
                array_push($res, $r['ciudad_destino']);
            }
        }
        return $res;
    }

}

?>
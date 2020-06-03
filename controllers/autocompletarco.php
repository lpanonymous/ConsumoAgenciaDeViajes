<?php

include_once 'database.php';

class Autocompletarco extends Database{

    function buscar($texto){
        $res = array();
        $query = $this->connect()->prepare('SELECT ciudad_origen FROM vuelo WHERE ciudad_origen LIKE :texto');
        $query->execute(['texto' => $texto . '%']);

        if($query->rowCount()){
            while($r = $query->fetch()){
                array_push($res, $r['ciudad_origen']);
            }
        }
        return $res;
    }

}

?>
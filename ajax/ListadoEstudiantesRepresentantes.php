<?php
    $id = $_GET['id'];
    include "../includes/config.php";//Contiene funcion que conecta a la base de   datos

    $query   = "SELECT re.id, 
                       re.id_representante, 
                       CONCAT(r.name,' ',r.last_name) AS nombre_representante, 
                       re.id_estudiante, 
                       CONCAT(e.name,' ',e.last_name) AS nombre_estudiante, 
                       (CASE re.parentezco WHEN '1' THEN 'HIJO' 
                                           WHEN '2' THEN 'HERMANO' 
                                           ELSE 'SOBRINO' END) AS parentezco, 
                       (CASE re.estado WHEN '1' THEN 'ACTIVO' ELSE 'INACTIVO' END) AS estado 
                FROM representantes_estudiantes re, 
                     users r, 
                     users e 
               WHERE r.id  = re.id_representante 
                 AND e.id  = re.id_estudiante ";
    $query  .= " AND re.id = '{$id}'";
    //echo $query;
    $resultado = mysqli_query($con,$query);

    if ($resultado){
        while($data = mysqli_fetch_assoc($resultado)){
            $arreglo["data"][] = array_map("utf8_encode",$data);
        }
        echo json_encode($arreglo);
    }
    mysqli_free_result($resultado);
    mysqli_close($con);
?>

<?php
    $id_curso = $_GET['id_curso'];

    include "../includes/config.php";//Contiene funcion que conecta a la base de datos

    $query = "SELECT ace.id_curso_oferta as id, 
                     ace.id_actividad, 
                     convert(cast(convert(ace.descripcion using latin1) as binary) using utf8) AS desc_acti, 
                     ace.id_user, 
                     concat(u.name, ' ', u.last_name) as estudiante, 
                     ace.fecha_maxima, 
                     ac.calificable, 
                     ace.documento, 
                     ace.fecha_carga, 
                     ace.calificacion 
      FROM actividades_curso_estudiante ace 
           LEFT JOIN actividades_curso ac ON (ac.id = ace.id_actividad 
                                         AND ac.id_curso_oferta = ace.id_curso_oferta) 
           LEFT JOIN users u on (u.id = ace.id_user) 
     WHERE (ace.id_curso_oferta = '{$id_curso}') ";
    
    //echo $query;
    $result=mysqli_query($con,$query);
    if ($result){
        while($data = mysqli_fetch_assoc($result)){
            $arreglo["data"][] = array_map("utf8_encode",$data);
        }
        echo json_encode($arreglo);
    }
    mysqli_free_result($result);
    mysqli_close($con);
?>

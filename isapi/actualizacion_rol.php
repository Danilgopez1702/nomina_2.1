<?php
$con = new mysqli('mocha3035.mochahost.com', 'inventar_1', '12345', 'inventar_nomina');
if (!$con){
	die('Could not connect: ' . $con->connect_error);
}


$sql =  mysqli_query($con,"SELECT * FROM `guardia_departamento`");

while ($data = mysqli_fetch_assoc($sql)){

    $departamento = $data['id_departamento'];
    $numero = $data['personas_guardia_dep'];


echo "----------------------------------------------------\n----------------------------------------------------\n";


    if($numero == 1){
        
        $sql_select_1 =  mysqli_query($con,"SELECT * FROM `guardia` WHERE `id_departamento` = $departamento ");
        $numero_select_1 = mysqli_num_rows($sql_select_1);

        $sql_select_asc_1 =  mysqli_query($con,"SELECT * FROM `guardia` WHERE `id_departamento` = $departamento  AND `status_guardia` = 1  ");
        $data_select_asc_1 = mysqli_fetch_assoc($sql_select_asc_1);
        $rol_chico_1 = $data_select_asc_1['rol_guardia'];

        if($rol_chico_1 == $numero_select_1){

            $rol_nuevo_1 = 1;
            $sql_cambio_status_1 =  mysqli_query($con,"UPDATE `guardia` SET `status_guardia`= 2 WHERE `rol_guardia` = $rol_chico_1 AND `id_departamento` = $departamento");
            $sql_cambio_persona_1 =  mysqli_query($con,"UPDATE `guardia` SET `status_guardia`= 1 WHERE `rol_guardia` = $rol_nuevo_1 AND `id_departamento` = $departamento");
            var_dump("mamada  1:".$rol_nuevo_1);


        }else{
            $rol_nuevo_1 = ($rol_chico_1+1);
            $sql_cambio_status_1 =  mysqli_query($con,"UPDATE `guardia` SET `status_guardia`= 2 WHERE `rol_guardia` = $rol_chico_1 AND `id_departamento` = $departamento");
            var_dump("mamada numero 1: ".$rol_nuevo_1);

            $sql_cambio_persona_1 =  mysqli_query($con,"UPDATE `guardia` SET `status_guardia`= 1 WHERE `rol_guardia` = $rol_nuevo_1 AND `id_departamento` = $departamento");
        }

        
    }else {
        $sql_select =  mysqli_query($con,"SELECT * FROM `guardia` WHERE `id_departamento` = $departamento ");
        $numero_select = mysqli_num_rows($sql_select);
    
        $sql_select_desc =  mysqli_query($con,"SELECT * FROM `guardia` WHERE `id_departamento` = $departamento  AND `status_guardia` = 1 ORDER BY `rol_guardia` DESC ");
        $data_select_desc = mysqli_fetch_assoc($sql_select_desc);
        $rol_grande = $data_select_desc['rol_guardia'];
    
        $sql_select_asc =  mysqli_query($con,"SELECT * FROM `guardia` WHERE `id_departamento` = $departamento  AND `status_guardia` = 1 ORDER BY `rol_guardia` ASC ");
        $data_select_asc = mysqli_fetch_assoc($sql_select_asc);
        $rol_chico = $data_select_asc['rol_guardia'];
    
        //echo "departamento: ".$departamento." --- numero total de personas: ".$numero_select." ---- el numero mas grande: ".$rol_grande." ---- el numero mas chico: ".$rol_chico. "\n" ;
    
    
        if($rol_grande == $numero_select  && $rol_chico == ($numero_select-1)){
            $rol_nuevo = 1;
            $sql_cambio_status =  mysqli_query($con,"UPDATE `guardia` SET `status_guardia`= 2 WHERE `rol_guardia` = $rol_chico AND `id_departamento` = $departamento");
            $sql_cambio_persona =  mysqli_query($con,"UPDATE `guardia` SET `status_guardia`= 1 WHERE `rol_guardia` = $rol_nuevo AND `id_departamento` = $departamento");
        
            var_dump("entro al 5 y 4");

        }elseif($rol_grande == $numero_select  && $rol_chico == 1){
       
            $rol_nuevo = 2;
            $sql_cambio_status =  mysqli_query($con,"UPDATE `guardia` SET `status_guardia`= 2 WHERE `rol_guardia` = $rol_grande AND `id_departamento` = $departamento ");
            $sql_cambio_persona =  mysqli_query($con,"UPDATE `guardia` SET `status_guardia`= 1 WHERE `rol_guardia` = $rol_nuevo AND `id_departamento` = $departamento");
            
            var_dump("entro al 5 y 1   nuevo:  ".$rol_nuevo);

        }else{
            $rol_nuevo = ($rol_grande+1);
            $sql_cambio_status =  mysqli_query($con,"UPDATE `guardia` SET `status_guardia`= 2 WHERE `rol_guardia` = $rol_chico AND `id_departamento` = $departamento");
            $sql_cambio_persona =  mysqli_query($con,"UPDATE `guardia` SET `status_guardia`= 1 WHERE `rol_guardia` = $rol_nuevo AND `id_departamento` = $departamento");

            var_dump("mamada ".$rol_nuevo);

        }
    }

}
?>
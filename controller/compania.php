<?php

   /*  TODO: LLAMANDO CLASES */
    require_once("../config/conexion.php");

    require_once("../models/Compania.php");
    /* TODO: INICIALIZANDO CLASES */
    // Creando una nueva instancia (objeto) de la clase Compania. 
    $compania = new Compania();


    switch($_GET["op"]){
        /* TODO: Guardar cuando el ID este vacio y editar cunaod se envie el ID */
        case "guardaryeditar":
            if(empty($_POST["com_id"])){
                    $compania->insert_compania($_POST["com_id"]);
            }else{
                    $compania->update_compania($_POST["com_id"],$_POST["com_nom"]);
            }
            break;
         /*    TODO: LISTADO DE REGISTROS FORMATO JSON PARA DATATABLE JS */
        case "listar":
            $datos=$compania->get_compania();
            $data=Array();
            foreach ($datos as $row) {
                   $sub_array = array();
                   $sub_array = $row["com_nom"];
                   $sub_array = "Editar";
                   $sub_array = "Eliminar";
                   $data[] = $sub_array;
            }
           // necesitamos este codigo paracontar cuantos informacion hay

           $results = array(
            "sEcho"=>1,
            "iTotalRecords"=>count($data),
            "iTotalDisplayRecorsd"=>count($data),
            "aaData"=> $data);
           echo json_encode($results);
            break;
            /*    TODO: MOSTRAR INFORMACION DE REGISTROS SEGUN SU ID */
        case "mostrar":
            $datos=$compania->get_compania_x_com_id($_POST["com_id"]);
            if (is_array($datos)==true and count($datos) > 0) {
                foreach ($datos as $row) {
                   $output["com_id"] = $row["com_id"];

                   $output["com_nom"] = $row["com_nom"];
                  
                }
                echo json_encode($output);
            }
            break;
            /*    TODO: ELIMINAR REGISTROS */
        case "eliminar":
            $compania->delete_compania($_POST["com_id"]);
            break;
    }
?>
<?php

/*  TODO: LLAMANDO CLASES */
require_once("../config/conexion.php");

require_once("../models/Proveedor.php");
/* TODO: INICIALIZANDO CLASES */
// Creando una nueva instancia (objeto) de la clase Proveedor. 
$proveedor = new Proveedor();


switch ($_GET["op"]) {
        /* TODO: Guardar cuando el ID este vacio y editar cunaod se envie el ID */
    case "guardaryeditar":
        if (empty($_POST["prov_id"])) {
            $proveedor->insert_proveedor(
                $_POST["emp_id"],
                $_POST["prov_nom"],
                $_POST["prov_ruc"],
                $_POST["prov_telf"],
                $_POST["prov_direcc"],
                $_POST["prov_correo"]
            );
        } else {
            $proveedor->update_proveedor(
                $_POST["prov_id"],
                $_POST["emp_id"],
                $_POST["prov_nom"],
                $_POST["prov_ruc"],
                $_POST["prov_telf"],
                $_POST["prov_direcc"],
                $_POST["prov_correo"]
            );
        }
        break;
        /*    TODO: LISTADO DE REGISTROS FORMATO JSON PARA DATATABLE JS */
    case "listar":
        $datos = $proveedor->get_proveedor_x_emp_id($_POST["emp_id"]);
        $data = array();
        foreach ($datos as $row) {
            $sub_array = array();
            $sub_array[] = $row["PROV_NOM"];
            $sub_array[] = $row["PROV_RUC"];
            $sub_array[] = $row["PROV_TELF"];
            $sub_array[] = $row["PROV_DIRECC"];
            $sub_array[] = $row["PROV_CORREO"];
            $sub_array[] = $row["FECH_CREA"];
            $sub_array[] = '<button type="button" onClick="editar(' . $row["PROV_ID"] . ')" id="' . $row["PROV_ID"] . '" class="btn btn-warning btn-icon waves-effect waves-light"><i class="ri-edit-2-line"></i></button>';
            $sub_array[] = '<button type="button" onClick="eliminar(' . $row["PROV_ID"] . ')" id="' . $row["PROV_ID"] . '" class="btn btn-danger btn-icon waves-effect waves-light"><i class="ri-delete-bin-5-line"></i></button>';
            $data[] = $sub_array;
        }
        // necesitamos este codigo paracontar cuantos informacion hay

        $results = array(
            "sEcho" => 1,
            "iTotalRecords" => count($data),
            "iTotalDisplayRecorsd" => count($data),
            "aaData" => $data
        );
        echo json_encode($results);
        break;
        /*    TODO: MOSTRAR INFORMACION DE REGISTROS SEGUN SU ID */
    case "mostrar":
        $datos = $proveedor->get_proveedor_x_prov_id($_POST["prov_id"]);
        if (is_array($datos) == true and count($datos) > 0) {
            foreach ($datos as $row) {
                $output["PROV_ID"] = $row["PROV_ID"];
                $output["EMP_ID"] = $row["EMP_ID"];
                $output["PROV_NOM"] = $row["PROV_NOM"];
                $output["PROV_RUC"] = $row["PROV_RUC"];
                $output["PROV_TELF"] = $row["PROV_TELF"];
                $output["PROV_DIRECC"] = $row["PROV_DIRECC"];
                $output["PROV_CORREO"] = $row["PROV_CORREO"];
            }
            echo json_encode($output);
        }
        break;
        /*    TODO: ELIMINAR REGISTROS */
    case "eliminar":
        $proveedor->delete_proveedor($_POST["prov_id"]);
        break;
    case "combo";
        $datos = $proveedor->get_proveedor_x_emp_id($_POST["emp_id"]);
        if (is_array($datos) == true and count($datos) > 0) {
            $html = "";
            $html .= "<option selected>Seleccionar</option>";
            foreach ($datos as $row) {
                $html .= "<option value='" . $row["PROV_ID"] . "'>" . $row["PROV_NOM"] . "</option>";
            }
            echo $html;
        }
        break;
}

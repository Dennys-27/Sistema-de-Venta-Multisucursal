<?php
class Venta extends Conectar
{
    /* TODO: Listar Registro por ID en especifico */
    public function insert_venta_x_suc_id($suc_id, $usu_id){
        $conectar = parent::Conexion();
        $sql = "SP_I_VENTA_01 ?,?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $suc_id);
        $query->bindValue(2, $usu_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    /* TODO: Listar Registro por ID en especifico */
    public function insert_venta_detalle($vent_id, $prod_id, $prod_pventa, $detv_cant){
        $conectar = parent::Conexion();
        $sql = "SP_I_VENTA_02 ?,?,?,?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $vent_id);
        $query->bindValue(2, $prod_id);
        $query->bindValue(3, $prod_pventa);
        $query->bindValue(4, $detv_cant);
        $query->execute();
        //return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /* TODO: Listar Registro por ID en especifico */
    public function get_venta_detalle($vent_id){
        $conectar = parent::Conexion();
        $sql = "SP_L_VENTA_01 ?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $vent_id);

        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /* TODO: Listar Registro por ID en especifico */
    public function delete_venta_detalle($detv_id){
        $conectar = parent::Conexion();
        $sql = "SP_D_VENTA_01 ?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $detv_id);
        $query->execute();
    }


    /* TODO: Listar Registro por ID en especifico */
    public function get_venta_calculo($vent_id){
        $conectar = parent::Conexion();
        $sql = "SP_U_VENTA_01 ?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $vent_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public function update_venta($vent_id, $pag_id, $cli_id, $cli_ruc, $cli_direcc, $cli_correo, $vent_coment, $mon_id,$doc_id){
        $conectar = parent::Conexion();
        $sql = "EXEC SP_U_VENTA_03 ?,?,?,?,?,?,?,?,?"; // Se usa EXEC para ejecutar el procedimiento almacenado
        $query = $conectar->prepare($sql);
        $query->bindParam(1, $vent_id, PDO::PARAM_INT);
        $query->bindParam(2, $pag_id, PDO::PARAM_INT);
        $query->bindParam(3, $cli_id, PDO::PARAM_INT);
        $query->bindParam(4, $cli_ruc);
        $query->bindParam(5, $cli_direcc);
        $query->bindParam(6, $cli_correo);
        $query->bindParam(7, $vent_coment);
        $query->bindParam(8, $mon_id, PDO::PARAM_INT);
        $query->bindParam(9, $doc_id, PDO::PARAM_INT);

        // Ejecutar la actualización
        $query->execute();

        // No necesitas fetchAll() después de una actualización
        // return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    /* TODO: Listar detalle de venta */
    public function get_venta($vent_id){
        $conectar = parent::Conexion();
        $sql = "SP_L_VENTA_02 ?";
        $query = $conectar->prepare($sql);
        $query->bindValue(1, $vent_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public function get_venta_listado($suc_id){
        $conectar=parent::Conexion();
        $sql="SP_L_VENTA_03 ?";
        $query=$conectar->prepare($sql);
        $query->bindValue(1,$suc_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_venta_top_productos($suc_id){
        $conectar=parent::Conexion();
        $sql="SP_L_VENTA_04 ?";
        $query=$conectar->prepare($sql);
        $query->bindValue(1,$suc_id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
   
}

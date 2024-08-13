<?php
    class Rol extends Conectar{
        /* TODO: Listar_REGISTROS  */
        public function get_rol_x_suc_id($suc_id){
            $conectar= parent::Conexion();
            $sql = "SP_L_ROL_01 ?";
            $query = $conectar->prepare($sql);

            $query->bindValue(1,$suc_id);

            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Listar REGISTROS POR ID EN ESPECIFICO  */
        public function get_rol_x_rol_id($rol_id){
            $conectar= parent::Conexion();
            $sql = "SP_L_ROL_02 ?";
            $query = $conectar->prepare($sql);

            $query->bindValue(1,$rol_id);

            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: ELIMINAR REGISTROS  */
        public function delete_rol($rol_id){
            $conectar= parent::Conexion();
            $sql = "SP_D_ROL_01 ?";
            $query = $conectar->prepare($sql);

            $query->bindValue(1,$rol_id);

            $query->execute();
        }
       /*  TODO: INSERTAR_REGISTROS  */
        public function insert_rol($suc_id,$rol_nom){
            $conectar= parent::Conexion();
            $sql = "SP_I_ROL_01 ?,?";
            $query = $conectar->prepare($sql);

            $query->bindValue(1,$suc_id);
            $query->bindValue(2,$rol_nom);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: ACTUALIZAR_REGISTROS  */
        public function update_rol($rol_id,$suc_id,$rol_nom){
            $conectar= parent::Conexion();
            $sql = "SP_U_ROL_01 ?,?,?";
            $query = $conectar->prepare($sql);

            $query->bindValue(1,$rol_id);
            $query->bindValue(2,$suc_id);
            $query->bindValue(3,$rol_nom);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        public function validar_acceso_rol($usu_id,$menu_ident){
            $conectar=parent::Conexion();
            $sql="SP_L_MENU_03 ?,?";
            $query=$conectar->prepare($sql);
            $query->bindValue(1,$usu_id);
            $query->bindValue(2,$menu_ident);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
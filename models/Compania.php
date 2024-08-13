<?php
    class Compania extends Conectar{
        /* TODO: Listar_REGISTROS  */
        public function get_compania(){
            $conectar= parent::Conexion();
            $sql = "SP_L_COMPANIA_01";
            $query = $conectar->prepare($sql);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: Listar REGISTROS POR ID EN ESPECIFICO  */
        public function get_compania_x_com_id($com_id){
            $conectar= parent::Conexion();
            $sql = "SP_L_COMPANIA_02 ?";
            $query = $conectar->prepare($sql);

            $query->bindValue(1,$com_id);

            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        /* TODO: ELIMINAR REGISTROS  */
        public function delete_compania($com_id){
            $conectar= parent::Conexion();
            $sql = "SP_D_COMPANIA_01 ?";
            $query = $conectar->prepare($sql);

            $query->bindValue(1,$com_id);

            $query->execute();
        }
       /*  TODO: INSERTAR_REGISTROS  */
        public function insert_compania($com_nom){
            $conectar= parent::Conexion();
            $sql = "SP_I_COMPANIA_01 ?";
            $query = $conectar->prepare($sql);

            
            $query->bindValue(1,$com_nom);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
       /*  TODO: ACTUALIZAR_REGISTROS  */
        public function update_compania($com_id,$com_nom){
            $conectar= parent::Conexion();
            $sql = "SP_U_COMPANIA_01 ?,?";
            $query = $conectar->prepare($sql);

            $query->bindValue(1,$com_id);
           
            $query->bindValue(2,$com_nom);
            $query->execute();

            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>
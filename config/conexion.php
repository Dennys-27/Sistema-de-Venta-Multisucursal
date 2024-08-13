<?php

   session_start();
   class Conectar{
        protected $dbh;

        protected function Conexion(){
            try {
                $conectar = $this->dbh = new PDO("sqlsrv:Server=179.61.12.163\\MSSQLSERVER2019;Database=asoacec1_bd", "asoacec1_bd", "ArcaContal2023");
                return $conectar;
            } catch (Exception $e) {
               print "Error de Conexion BD". $e->getMessage() . "<br/>";
               die();
            }

        }


        public static  function ruta(){
            return "http://localhost/SISTEMAVENTA/";
        }
   }
?>
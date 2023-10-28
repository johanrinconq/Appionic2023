<?php //modelo

    class UsuarioBD{

        private $aliados;

        private $documento;
        private $nombre;
        private $telefono;
        private $comercio;
        private $correo;
        private $tipo_id;
        private $estado;
        private $latitud;
        private $longitud;
        private $plan_id;      

        

        //___________Consultar Usuarios________________
        public function getSolicitudes(){
            require_once('conectarbdD.php');
            $consulta=conectarbdD:: conexion()->query("SELECT * FROM aliados");
            while ($fila=$consulta->fetch(PDO::FETCH_ASSOC)) {
                $this->aliados[]=$fila;
            }
            return $this->aliados;
    }
    public function getSolicitudPorID($id)
        {
            require_once('conectarbdD.php');
            $conexion = conectarbdD::conexion();
            $stmt = $conexion->prepare("SELECT * FROM aliados WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

}

?>
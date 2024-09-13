<?php 
class Auto {    
    private $patente;
    private $marca;
    private $modelo;
    private $dniDuenio;     
    private $mensajeoperacion;   
    
    public function __construct(){
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->dniDuenio = "";        
        $this->mensajeoperacion = "";
    }

    public function setear($patente, $marca, $modelo, $dniDuenio) {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setDuenio($dniDuenio);
    }

    public function getPatente() {
        return $this->patente;
    }
    public function setPatente($valor) {
        $this->patente = $valor;
    }

    public function getMarca() {
        return $this->marca;
    }
    public function setMarca($valor) {
        $this->marca = $valor;
    }

    public function getModelo() {
        return $this->modelo;
    }
    public function setModelo($valor) {
        $this->modelo = $valor;
    }

    public function getDuenio() {
        return $this->dniDuenio;
    }
    public function setDuenio($valor) {
        $this->dniDuenio = $valor;
    }

    public function getmensajeoperacion() {
        return $this->mensajeoperacion;
    }
    public function setmensajeoperacion($valor) {
        $this->mensajeoperacion = $valor;
    }

    public function cargar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto WHERE Patente = '" . $this->getPatente() . "'";
        
        try {
            if ($base->Iniciar()) {
                $res = $base->Ejecutar($sql);
                if ($res > -1 && $res > 0) {
                    $row = $base->Registro();
                    $objDuenio = new Persona();
                    $objDuenio->setNroDni($row['DniDuenio']);
                    $objDuenio->cargar();
                    $this->setear($row['Patente'], $row['Marca'], $row['Modelo'], $objDuenio);
                    $resp = true;
                }
            }
        } catch (PDOException $e) {
            $this->setmensajeoperacion("auto->cargar: " . $e->getMessage());
        }

        return $resp;
    }

    public function insertar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO auto(Patente, Marca, Modelo, DniDuenio) VALUES('" . $this->getPatente() . "', '" . $this->getMarca() . "', '" . $this->getModelo() . "', '" . $this->getDuenio()->getNroDni() . "');";
        
        try {
            if ($base->Iniciar()) {
                if ($lapatente = $base->Ejecutar($sql)) {
                    $this->setPatente($lapatente);
                    $resp = true;
                }
            }
        } catch (PDOException $e) {
            $this->setmensajeoperacion("auto->insertar: " . $e->getMessage());
        }

        return $resp;
    }

    public function modificar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE auto 
                SET Marca = '" . $this->getMarca() . "', 
                    Modelo = '" . $this->getModelo() . "', 
                    DniDuenio = '" . $this->getDuenio()->getNroDni() . "' 
                WHERE Patente = '" . $this->getPatente() . "'";
        
        try {
            if ($base->Iniciar()) {
                if ($base->Ejecutar($sql)) {
                    $resp = true;
                }
            }
        } catch (PDOException $e) {
            $this->setmensajeoperacion("auto->modificar: " . $e->getMessage());
        }

        return $resp;
    }

    public function eliminar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM auto WHERE Patente = '" . $this->getPatente() . "'";
        
        try {
            if ($base->Iniciar()) {
                if ($base->Ejecutar($sql)) {
                    $resp = true;
                }
            }
        } catch (PDOException $e) {
            $this->setmensajeoperacion("auto->eliminar: " . $e->getMessage());
        }

        return $resp;
    }

    public function listar($parametro = "") {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM auto";
        if ($parametro != "") {
            $sql .= ' WHERE ' . $parametro;
        }

        try {
            if ($base->Iniciar()) {
                $res = $base->Ejecutar($sql);
                if ($res > -1) {
                    if ($res > 0) {
                        while ($row = $base->Registro()) {
                            $obj = new Auto();
                            $objDuenio = new Persona();
                            $objDuenio->setNroDni($row['DniDuenio']);
                            $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $objDuenio);
                            array_push($arreglo, $obj);
                        }
                    }
                }
            }
        } catch (PDOException $e) {
            $this->setmensajeoperacion("auto->listar: " . $e->getMessage());
        }

        return $arreglo;
    }
}
?>

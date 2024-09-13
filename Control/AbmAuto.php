<?php
class AbmAuto
{

    public function obtenerTodosLosAutos()
    {
        $auto= new Auto ();
        $arrayAutos =$auto->listar();
        return $arrayAutos;
    }
    public function obtenerDatosAuto($patente)
    {
        $auto= new Auto ();
        $arrayAutos = $auto->listar("Patente = '" . $patente . "'");
        $salida = "";
        if (count($arrayAutos) > 0) {
            $salida = $arrayAutos[0];
        } else {
            $salida = null;
        }
        return $salida;
    }

    public function cargarAuto($patente, $marca, $modelo, $dniDuenio)
    {
        $objAuto = null;
        $salida = false;
        
        // Si el auto no existe, se carga
        if ($this->obtenerDatosAuto($patente) === null) {
            $objAuto = new Auto();
            $objDuenio = new Persona();
            $objDuenio->setNroDni($dniDuenio);
            $objAuto->setear($patente, $marca, $modelo, $objDuenio);         
            $objAuto->insertar();
            $salida = true; // Auto cargado con éxito
        } else {
            $salida = false; // El auto ya está registrado
        }
        return $salida;
    }
    

    public function modificarDuenioAuto($patente, $dniNuevoDuenio)
    {
        $salida = false;
        $auto = $this->obtenerDatosAuto($patente);
        if (($auto !== null)) {
            $objDuenio = new Persona();
            $objDuenio->setNroDni($dniNuevoDuenio);
            $auto->setDuenio($objDuenio);
            $auto->modificar();
            $salida = true;
        }
        return $salida;
    }
}

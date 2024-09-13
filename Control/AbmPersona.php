<?php
class AbmPersona {
    public function obtenerTodasLasPersonas() {
        $persona = new Persona();
        $arrayPersonas = $persona->listar();
        return $arrayPersonas;
    }

    public function encontrarPersona($dni) {
        $persona = new Persona();

        $objPersona = $persona->listar("NroDni = '" . $dni . "'");
        $salida = "";
        if (count($objPersona) > 0) {
            $salida = $objPersona[0];
        } else {
            $salida = null;
        }
        return $salida;
    }

    
    public function cargarPersona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio) {
        $objPersona = null;
        $salida = false;
        if ($this->encontrarPersona($nroDni) === null) { // Corregido de !== a ===
            $objPersona = new Persona();
            $objPersona->setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
            $objPersona->insertar();
            $salida = true;
        }
        return $salida;
    }

    public function modificarPersona($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio) {
        $objPersona = null;
        $salida = false;
        if ($this->encontrarPersona($nroDni) !== null) {
            $objPersona = new Persona();
            $objPersona->setear($nroDni, $apellido, $nombre, $fechaNac, $telefono, $domicilio);
            $objPersona->modificar();
            $salida = true;
        }
        return $salida;
    }
}

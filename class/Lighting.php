<?php


class Lighting extends Connection { 

    public function importLamps() {
        $this->connect();
        $conn = $this->getConn();

        if (($gestor = fopen("lighting.csv", "r")) !== FALSE) {
            //$consulta = $conn->prepare("UPDATE lamps SET lamp_name = ?, lamp_model = ?, lamp_zone = ?, lamp_on = ? WHERE lamp_id = ?");        
            $consulta = $conn->prepare("INSERT INTO lamps (lamp_id, lamp_name, lamp_model, lamp_zone, lamp_on) VALUES (?,?,?,?,?)");
            if ($consulta) {
                while (($datos = fgetcsv($gestor, 1000, ",")) !== FALSE) {
                    $lamp_id = $datos[0];
                    $lamp_name = $datos[1];
                    $lamp_model = $datos[2];
                    $lamp_zone = $datos[3];
                    $lamp_on = $datos[4];
                    $consulta->bind_param("sssss", $lamp_id, $lamp_name, $lamp_model, $lamp_zone, $lamp_on);
                    if (!$consulta->execute()) {
                        echo "Error en la inserción: " . $conn->error . "\n"; 
                    }
                }

                $consulta->close();
                fclose($gestor);
                echo "Importación completada.\n";
            } else {
                echo "Error al preparar la consulta: " . $conn->error . "\n";
            }
        } else {
            echo "No se pudo abrir el archivo CSV.\n";
        }
        
        $conn->close();
    }
    
    

    
    public function getModelId($model_part_number) {
        $this->connect();
        $conn = $this->getConn();

        $consulta = $conn->prepare("SELECT model_id FROM lamp_models WHERE model_part_number = ?");
        $consulta->bind_param("s", $model_part_number);
        $consulta->execute();
        $result = $consulta->get_result();    

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $model_id = $row['model_id'];
        } else {

            return null;
        }
    }


        
    public function getZoneId($zone_name) {
        $this->connect();
        $conn = $this->getConn();

        $consulta = $conn->prepare("SELECT zone_id FROM zones WHERE zone_name = ?");
        $consulta->bind_param("s", $zone_name);
        $consulta->execute();
        $result = $consulta->get_result();    

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $zone_id = $row['zone_id'];
            echo $zone_id;
            return $zone_id;
        } else {

            return null;
        }
    }


    public function getALL(){
        $this->connect();
        $conn = $this->getConn();

        $consulta = $conn->prepare("SELECT lamp_id, lamp_name, lamp_model, lamp_zone, lamp_on FROM lamp");
        $consulta->bind_param("sssss", $lamp_id, $lamp_name, $lamp_model, $lamp_zone, $lamp_on);
        $consulta->execute();
        $result = $consulta->get_result();  
        
        echo $result;
    }
    


}
?>

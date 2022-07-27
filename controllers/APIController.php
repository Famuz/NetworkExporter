<?php 

namespace Controllers;

use Model\Tipo;
use Model\SubTipo;
use Model\Alimentador;
use Model\Importacion;

class ApiController {
    public static function indexTipo() {
        $tipo = Tipo::all();
        echo json_encode($tipo);
    }

    public static function indexSubtipo() {
        $subTipo = SubTipo::all();
        echo json_encode($subTipo);
    }

    public static function indexAlimentador() {
        $alimentador = Alimentador::all();
        echo json_encode($alimentador);
    }

    public static function guardar() {
        $importacion = new Importacion($_POST);
        $importacion->fecha = date('m/d/Y H:i');
        $importacion->estado = 1;
        $resultado = $importacion->guardar();

        echo json_encode($importacion);

        /* $tipo = json_encode($importacion->tipo);
        $subTipo = json_encode($importacion->subtipo);
        $alimentadores = json_encode($importacion->alimentadores);

        echo $tipo;
        echo $subTipo;
        echo $alimentadores;

        //indico la ruta de ubicacion del WSDL
        $location = "http://172.16.1.94:7005/GIS-ADMS_NETEXPORTER-context-root/NetworkExporterExecution?WSDL";

        if($tipo == 'C'){
            $request = "
        <soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" 
        xmlns:sch=\"http://schemas.soa.dms.schneider_electric_dms.com/\" 
        xmlns:v1=\"http://schneider-electric-dms.com/DMS/soa/schemas/StandardHeader/v1#\" 
        xmlns:v11=\"http://schneider-electric-dms.com/DMS/soa/schemas/NetworkExporterExecution/v1#\">
        <soapenv:Header/>
        <soapenv:Body>
            <sch:NetworkExporterExecution>
                <!--Optional:-->
                <header>
                </header>
                <!--Optional:-->
                <payload>
                    <v11:Type>".$tipo."</v11:Type>
                    <!--Optional:-->
                    <v11:FeederList></v11:FeederList>
                    <!--Optional:-->
                    <v11:Version>DMS.DMSOPERACION</v11:Version>
                    <!--Optional:-->
                    <v11:Timestamp>?</v11:Timestamp>
                </payload>
            </sch:NetworkExporterExecution>
        </soapenv:Body>
        </soapenv:Envelope>
        ";
        }elseif ($tipo == 'F' && $subTipo == 'Alimentadores Masiva'){
            $request = "
        <soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" 
        xmlns:sch=\"http://schemas.soa.dms.schneider_electric_dms.com/\" 
        xmlns:v1=\"http://schneider-electric-dms.com/DMS/soa/schemas/StandardHeader/v1#\" 
        xmlns:v11=\"http://schneider-electric-dms.com/DMS/soa/schemas/NetworkExporterExecution/v1#\">
        <soapenv:Header/>
        <soapenv:Body>
            <sch:NetworkExporterExecution>
                <!--Optional:-->
                <header>
                </header>
                <!--Optional:-->
                <payload>
                    <v11:Type>".$tipo."</v11:Type>
                    <!--Optional:-->
                    <v11:FeederList></v11:FeederList>
                    <!--Optional:-->
                    <v11:Version>DMS.DMSOPERACION</v11:Version>
                    <!--Optional:-->
                    <v11:Timestamp>?</v11:Timestamp>
                </payload>
            </sch:NetworkExporterExecution>
        </soapenv:Body>
        </soapenv:Envelope>
        ";
                
        $action = "NetworkExporterExecution";
        $header = [
        'Method: POST',
        'Connection: Keep-Alive',
        'User-Agent: Apache-HttpClient/4.5.5 (Java/16.0.1)',
        'Content-Type: text/xml;charset=UTF-8',
        'SOAPAction: ""'
        ];
        } else {
            $request = "
        <soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" 
        xmlns:sch=\"http://schemas.soa.dms.schneider_electric_dms.com/\" 
        xmlns:v1=\"http://schneider-electric-dms.com/DMS/soa/schemas/StandardHeader/v1#\" 
        xmlns:v11=\"http://schneider-electric-dms.com/DMS/soa/schemas/NetworkExporterExecution/v1#\">
        <soapenv:Header/>
        <soapenv:Body>
            <sch:NetworkExporterExecution>
                <!--Optional:-->
                <header>
                </header>
                <!--Optional:-->
                <payload>
                    <v11:Type>".$tipo."</v11:Type>
                    <!--Optional:-->
                    <v11:FeederList>".$alimentadores."</v11:FeederList>
                    <!--Optional:-->
                    <v11:Version>DMS.DMSOPERACION</v11:Version>
                    <!--Optional:-->
                    <v11:Timestamp>?</v11:Timestamp>
                </payload>
            </sch:NetworkExporterExecution>
        </soapenv:Body>
        </soapenv:Envelope>
        ";
                
        $action = "NetworkExporterExecution";
        $header = [
        'Method: POST',
        'Connection: Keep-Alive',
        'User-Agent: Apache-HttpClient/4.5.5 (Java/16.0.1)',
        'Content-Type: text/xml;charset=UTF-8',
        'SOAPAction: ""'
        ];
        }

        

        //
        $ch = curl_init($location);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);

        $response = curl_exec($ch);
        $error_status = curl_errno($ch);  */
    }

    public static function actualizarEstado() {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            
            $importacion = Importacion::find($id);
            if ($importacion->estado == 1) {
                $importacion->estado = 0;
                $importacion->actualizar();
            } else {
                $importacion->estado = 1;
                $importacion->actualizar();
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }
}
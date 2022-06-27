<?php header('Access-Control-Allow-Origin: *');

@include ('conexion.php');
include ('fpdf/fpdf.php');

@$nroOrden = "";
@$Cantidad = 0;

//$SQL = "";

//$respuesta = $conexion->query($SQL);




class PDF extends FPDF {

    //Cabecera

    function Header()
    {
        //Logo
        $tipoLetra = 'Helvetica';

        $this->Image('../img/SEC.jpg', 12, 3, -300);

        //NroOrden y Fecha
        $this->SetFont($tipoLetra, 'B', 14);

        $posicionEnY = 35;

        $this->SetY($posicionEnY+3);
        $this->SetX(155);
        $this->Cell(1, 5, "Nro: 000-00001", 0 , 'C');


        $this->SetFont($tipoLetra, 'B', 14);
        $this->SetY($posicionEnY+15);
        $this->SetX(120);
        $this->Cell(1, 5, "FECHA: ______/______/______", 0 , 'C');


        $this->SetFont($tipoLetra, 'BU', 15);
        $this->SetY($posicionEnY+33);
        $this->SetX(80);
        $this->Cell(1, 5, "ORDEN DE PROVISION", 0, 'C');



        $this->SetFont($tipoLetra, 'B', 14);
        $this->SetY($posicionEnY+55);
        $this->SetX(35);
        $this->Cell(1, 5, "COMERCIO: ", 0, 'C');

        $this->SetDrawColor(0,0,0);
        $this->Line(65,$posicionEnY+60,180,$posicionEnY+60);

    }

    // Tabla simple
    function BasicTable($header, $datos)
    {
        $tablaPosicionY = 110;
        $tipoLetra = 'Helvetica';

        // Cabecera
        $this->SetY($tablaPosicionY);
        $this->SetX(12);
        $this->Cell(30,7,$header[0],1, '1', 'C');

        $this->SetY($tablaPosicionY);
        $this->SetX(42);
        $this->Cell(155,7,$header[1],1, '1', 'C');
        $this->Ln();



        // Datos
        for ($i=0; $i<12; $i++) {

            $this->SetY($tablaPosicionY+7);
            $this->SetX(12);
            $this->Cell(30,10,$datos[0],1, '1', 'C');

            $this->SetY($tablaPosicionY+7);
            $this->SetX(42);
            $this->Cell(155,10,$datos[0],1, '1', 'C');
            $this->Ln();

            $tablaPosicionY+=10;

        }

        $posicionEnY = 35;

        $this->SetY($posicionEnY+220);
        $this->SetFont($tipoLetra, 'B', 14);
        $this->SetX(50);
        $this->Cell(1, 5, "FIRMA: _________________________", 0, 'C');

        $this->SetY($posicionEnY+235);
        $this->SetX(50);
        $this->Cell(1, 5, "ACLARACION: _________________________", 0, 'C');





    }
}


$tipoLetra = 'Helvetica';
$header = array ('CANTIDAD', 'ARTICULO');
$datos = array (' ');

$pdf = new PDF('P', 'mm', 'A4');
$cantidad = 5;


for ($i=0; $i<$cantidad; $i++){

    $pdf->AddPage();


//Tabla
    $pdf->BasicTable($header, $datos);
}

$pdf->output();


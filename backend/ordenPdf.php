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
        $this->Image('../img/SEC.jpg', 12, 3, -300);

    }

    // Tabla simple
    function BasicTable($header, $datos)
    {
        $tablaPosicionY = 110;

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




    }
}


$tipoLetra = 'Helvetica';
$header = array ('CANTIDAD', 'ARTICULO');
$datos = array (' ');

$pdf = new PDF('P', 'mm', 'A4');

$pdf->AliasNbPages();
$pdf->AddPage();


//NroOrden y Fecha
$pdf->SetFont($tipoLetra, 'B', 14);

$posicionEnY = 35;

$pdf->SetY($posicionEnY+3);
$pdf->SetX(155);
$pdf->Cell(1, 5, "Nro: 000-00001", 0 , 'C');


$pdf->SetFont($tipoLetra, 'B', 14);
$pdf->SetY($posicionEnY+15);
$pdf->SetX(120);
$pdf->Cell(1, 5, "FECHA: ______/______/______", 0 , 'C');


$pdf->SetFont($tipoLetra, 'BU', 15);
$pdf->SetY($posicionEnY+33);
$pdf->SetX(80);
$pdf->Cell(1, 5, "ORDEN DE PROVISION", 0, 'C');



$pdf->SetFont($tipoLetra, 'B', 14);
$pdf->SetY($posicionEnY+55);
$pdf->SetX(35);
$pdf->Cell(1, 5, "COMERCIO: ", 0, 'C');

$pdf->SetDrawColor(0,0,0);
$pdf->Line(65,$posicionEnY+60,180,$posicionEnY+60);



//Tabla
$pdf->BasicTable($header, $datos);


$pdf->SetY($posicionEnY+220);
$pdf->SetFont($tipoLetra, 'B', 14);
$pdf->SetX(50);
$pdf->Cell(1, 5, "FIRMA: _________________________", 0, 'C');

$pdf->SetY($posicionEnY+235);
$pdf->SetX(50);
$pdf->Cell(1, 5, "ACLARACION: _________________________", 0, 'C');

$pdf->output();


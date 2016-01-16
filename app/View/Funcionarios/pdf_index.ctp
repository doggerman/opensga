<?php
App::import('Vendor','xtcpdf');
$pdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$textfont = 'freesans'; // looks better, finer, and more condensed than 'dejavusans'

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Raimundo Chongo');
$pdf->SetTitle('Lista de Estudantes');
$pdf->SetSubject('TCPDF');
// set default header data
$pdf->SetHeaderData('logo.png', 16, 'Ficha do Estudante', 'Instituto Nacional de Comunicação e Imagem de Moçambique');
   
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
//$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
//$pdf->SetFont('helvetica', '', 8);

// add a page
$pdf->AddPage();
$data =  $teste1;
//echo $data[0];
//$pdf->Cell($w[0], 6, $data[0], 'LR', 0, 'C', $fill);
//$data[0]="R";
$texto="80";
//Column titles
//$header = array('ID', 'Nome','Grau Académico','Tipo de Curso');
//$header = array('Nome', 'Organização','Localidade','Número de Cartão');
// ---------------- linha de informacao pessoal-------------------------
$pdf->SetTextColor(180,14,22);
$pdf->SetFont('helvetica', 'B', 7);
$pdf->RoundedRect(15, 17, 180, 4, 1.50, '1111', '1F');
$pdf->Text(18, 17, 'Informacao Pessoal');
//$pdf->Line(13, 22, 80, 30, $style);
$pdf->SetTextColor(7,7,152);
$pdf->SetFont('helvetica', 'B', 6);
$pdf->Text(18, 25, 'Codigo');
$pdf->Text(30, 25,$data[0]);
$pdf->Text(70, 25, 'Nome');
$pdf->Text(18, 30, 'Genero');
$pdf->Text(70, 30, 'Nacionalidade');
$pdf->Text(18, 35, 'Provincia');
$pdf->Text(70, 35, 'Cidade');
$pdf->Text(18, 40, 'Data nascimento');
$pdf->Text(70, 40, 'Data Ingresso');
$pdf->Text(18, 45, 'Proveniencia');
$pdf->Text(70, 45, 'Naturalidade');
$pdf->Text(125, 45, 'Estado');
$pdf->Rect(169, 22, 22, 25, 'DF', $style4, array(220, 220, 200));
//------------- impressao de dados------------------------------------
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('helvetica', 'B', 6);
$pdf->Text(79, 25, $this->data["T0008aluno"]["name"]);
$foto = $this->data["T0008aluno"]["foto"];
$verifica = "/home/webdev2/public_html/sistema/app/webroot/$foto";
//var_dump($verifica);
if($verifica != null)
{
$pdf->Image($verifica, 170, 22, 20, 25, '', '', '', true, 72);
}
else
    $pdf->Image("", 170, 22, 20, 25, '', '', '', true, 72);
$pdf->Text(35, 30, $this->data["Tg0019genero"]["name"]);
$pdf->Text(90, 30, $this->data["Tg0002paise"]["name"]);
$pdf->Text(35, 35, $this->data["Tg0003provincia"]["name"]);
$pdf->Text(90, 35, $this->data["Tg0004cidade"]["name"]);
$pdf->Text(43, 40, $this->data["T0008aluno"]["datanascimento"]);
$pdf->Text(90, 40, $this->data["T0008aluno"]["dataingresso"]);
$pdf->Text(38, 45, $this->data["T0008aluno"]["proveniencianome"]);
$pdf->Text(90, 45, $this->data["T0008aluno"]["proveniencianome"]);
$pdf->Text(138, 45, 'Activo');
$pdf->Text(48, 55, $this->data["Tg0009documento"]["name"]);
$pdf->Text(105, 55, $this->data["T0008aluno"]["numdocumento"]);
$pdf->Text(48, 60, $this->data["T0008aluno"]["docdataemissao"]);
$pdf->Text(105, 60, $this->data["T0008aluno"]["docdataemissao"]);	
$pdf->Text(48, 70, $this->data["T0008aluno"]["moradarua"]);
$pdf->Text(95, 70, $this->data["T0008aluno"]["moradalocal"]);
$pdf->Text(48, 75, $this->data["T0008aluno"]["moradacpostal"]);
$pdf->Text(95, 75, $this->data["Tg0004cidade"]["name"]);
$pdf->Text(40, 80, $this->data["T0008aluno"]["email"]);
$pdf->Text(99, 80, $this->data["T0008aluno"]["telefone"]);
$pdf->Text(99, 80, $this->data["Tg0010areatrabalho"]["telefone"]);
$pdf->Text(42, 90, $this->data["Tg0010areatrabalho"]["name"]);
$pdf->Text(95, 90, $this->data["T0008aluno"]["empresanome"]);
$pdf->Text(48, 95, $this->data["T0008aluno"]["empresamorada"]);
$pdf->Text(102, 95, $this->data["T0008aluno"]["empresacontacto"]);
$pdf->Text(48, 100, $this->data["T0008aluno"]["empresatelefone"]);
$pdf->Text(95, 100, $this->data["T0008aluno"]["empresaemail"]);
$pdf->Text(48, 105, $this->data["T0008aluno"]["empresasite"]);
// ---------------- Fim da informacao pessoal-------------------------


// ---------------- Detalhes de DocumentoIdentificacao-------------------------
$pdf->SetTextColor(180,14,22);
$pdf->SetFont('helvetica', 'B', 7);
$pdf->RoundedRect(15, 50, 180, 4, 1.50, '1111', '1F');
$pdf->Text(18, 50, 'Detalhes de DocumentoIdentificacao');
$pdf->SetTextColor(7,7,152);
$pdf->SetFont('helvetica', 'B', 6);
$pdf->Text(18, 55, 'Tipo de Identificacao');
$pdf->Text(70, 55, 'Numero de DocumentoIdentificacao');
$pdf->Text(18, 60, 'Data de emissao');
$pdf->Text(70, 60, 'Local de Emissao');
// ----------------Fim de Detalhes de DocumentoIdentificacao-------------------------
// ---------------- Detalhes de Domicilio-------------------------
$pdf->SetTextColor(180,14,22);
$pdf->SetFont('helvetica', 'B', 7);
$pdf->RoundedRect(15, 65, 180, 4, 1.50, '1111', '1F');
$pdf->Text(18, 65, 'Detalhes de Domicilio');
$pdf->SetTextColor(7,7,152);
$pdf->SetFont('helvetica', 'B', 6);
$pdf->Text(18, 70, 'Endereco-Rua');
$pdf->Text(70, 70, 'Endereco-Local');
$pdf->Text(18, 75, 'Caixa Postal');
$pdf->Text(70, 75, 'Cidade');
$pdf->Text(18, 80, 'Email Pessoal');
$pdf->Text(85, 80, 'Telefone');
// ---------------- fim Detalhes de Domicilio-------------------------
// ---------------- Detalhes de Domicilio Profissional-------------------------
$pdf->SetTextColor(180,14,22);
$pdf->SetFont('helvetica', 'B', 7);
$pdf->RoundedRect(15, 85, 180, 4, 1.50, '1111', '1F');
$pdf->Text(18, 85, 'Detalhes de Domicilio Profissional');
$pdf->SetTextColor(7,7,152);
$pdf->SetFont('helvetica', 'B', 6);
$pdf->Text(18, 90, 'Area de Trabalho');
$pdf->Text(70, 90, 'Nome da Empresa');
$pdf->Text(18, 95, 'Endereco da Empresa');
$pdf->Text(70, 95, 'Cantacto da Empresa');
$pdf->Text(18, 100, 'Telefone da Empresa');
$pdf->Text(70, 100, 'Email da Empresa');
$pdf->Text(18, 105, 'Site da Empresa');

//-----------------------------------------tratamento de Data-------------------------
$data_actual = date("d-m-Y H:s");
$pdf->Text(160, 11, 'Data');
$pdf->Text(170, 11, $data_actual);
// ---------------- fim de Detalhes de Domicilio profissional-------------------------
//$pdf->Rect(155, 20, 40, 20, 'D', array('all' => $style3));
//$pdf->Text(5, 249, 'Rounded rectangle examples');
//$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
//$pdf->RoundedRect(50, 255, 40, 30, 6.50, '1000');
//$pdf->RoundedRect(95, 255, 40, 30, 10.0, '1111', null, $style6);
//$pdf->RoundedRect(140, 255, 40, 30, 8.0, '0101', 'DF', $style6, array(200, 200, 200));
//Data loading
//$data = $lista;

// print colored table
		// Colors, line width and bold font
/*		$pdf->SetFillColor(255, 0, 0);
		$pdf->SetTextColor(255);
		$pdf->SetDrawColor(128, 0, 0);
		$pdf->SetLineWidth(0.3);
		$pdf->SetFont('', 'B');
		// Header
		$w = array(40, 50, 50, 45);
		$num_headers = count($header);
		for($i = 0; $i < $num_headers; ++$i) {
			$pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
		}
		$pdf->Ln();
		// Color and font restoration
		$pdf->SetFillColor(224, 235, 255);
		$pdf->SetTextColor(0);
		$pdf->SetFont('');
		// Data
		$fill = 0;
		foreach($data as $row) {
			$pdf->Cell($w[0], 6, $row[0], 'LR', 0, 'L', $fill);
			$pdf->Cell($w[1], 6, $row[1], 'LR', 0, 'L', $fill);
			$pdf->Cell($w[2], 6, $row[2], 'LR', 0, 'R', $fill);
			$pdf->Cell($w[3], 6, $row[3], 'LR', 0, 'R', $fill);
			$pdf->Ln();
			$fill=!$fill;
		}
		$pdf->Cell(array_sum($w), 0, '', 'T');*/
// ---------------------------------------------------------testes 
/* $style = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,20,5,10', 'phase' => 10, 'color' => array(255, 0, 0));
$style2 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 0, 0));
$style3 = array('width' => 1, 'cap' => 'round', 'join' => 'round', 'dash' => '2,10', 'color' => array(255, 0, 0));
$style4 = array('L' => 0,
                'T' => array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => '20,10', 'phase' => 10, 'color' => array(100, 100, 255)),
                'R' => array('width' => 0.50, 'cap' => 'round', 'join' => 'miter', 'dash' => 0, 'color' => array(50, 50, 127)),
                'B' => array('width' => 0.75, 'cap' => 'square', 'join' => 'miter', 'dash' => '30,10,5,10'));
$style5 = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 64, 128));
$style6 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => '10,10', 'color' => array(0, 128, 0));
$style7 = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 128, 0));

// Line
$pdf->Text(5, 4, 'Line examples');
$pdf->Line(5, 10, 80, 30, $style);
$pdf->Line(5, 10, 5, 30, $style2);
$pdf->Line(5, 10, 80, 10, $style3);

// Rect
$pdf->Text(100, 4, 'Rectangle examples');
$pdf->Rect(100, 10, 40, 20, 'DF', $style4, array(220, 220, 200));
$pdf->Rect(145, 10, 40, 20, 'D', array('all' => $style3));

// Curve
$pdf->Text(5, 34, 'Curve examples');
$pdf->Curve(5, 40, 30, 55, 70, 45, 60, 75, null, $style6);
$pdf->Curve(80, 40, 70, 75, 150, 45, 100, 75, 'F', $style6);
$pdf->Curve(140, 40, 150, 55, 180, 45, 200, 75, 'DF', $style6, array(200, 220, 200));

// Circle and ellipse
$pdf->Text(5, 79, 'Circle and ellipse examples');
$pdf->SetLineStyle($style5);
$pdf->Circle(25,105,20);
$pdf->Circle(25,105,10, 90, 180, null, $style6);
$pdf->Circle(25,105,10, 270, 360, 'F');
$pdf->Circle(25,105,10, 270, 360, 'C', $style6);

$pdf->SetLineStyle($style5);
$pdf->Ellipse(100,103,40,20);
$pdf->Ellipse(100,105,20,10, 0, 90, 180, null, $style6);
$pdf->Ellipse(100,105,20,10, 0, 270, 360, 'DF', $style6);

$pdf->SetLineStyle($style5);
$pdf->Ellipse(175,103,30,15,45);
$pdf->Ellipse(175,105,15,7.50, 45, 90, 180, null, $style6);
$pdf->Ellipse(175,105,15,7.50, 45, 270, 360, 'F', $style6, array(220, 200, 200));

// Polygon
$pdf->Text(5, 129, 'Polygon examples');
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->Polygon(array(5,135,45,135,15,165));
$pdf->Polygon(array(60,135,80,135,80,155,70,165,50,155), 'DF', array($style6, $style7, $style7, 0, $style6), array(220, 200, 200));
$pdf->Polygon(array(120,135,140,135,150,155,110,155), 'D', array($style6, 0, $style7, $style6));
$pdf->Polygon(array(160,135,190,155,170,155,200,160,160,165), 'DF', array('all' => $style6), array(220, 220, 220));

// Polygonal Line
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 164)));
$pdf->PolyLine(array(80,165,90,160,100,165,110,160,120,165,130,160,140,165), 'D', array(), array());

// Regular polygon
$pdf->Text(5, 169, 'Regular polygon examples');
$pdf->SetLineStyle($style5);
$pdf->RegularPolygon(20, 190, 15, 6, 0, 1, 'F');
$pdf->RegularPolygon(55, 190, 15, 6);
$pdf->RegularPolygon(55, 190, 10, 6, 45, 0, 'DF', array($style6, 0, $style7, 0, $style7, $style7));
$pdf->RegularPolygon(90, 190, 15, 3, 0, 1, 'DF', array('all' => $style5), array(200, 220, 200), 'F', array(255, 200, 200));
$pdf->RegularPolygon(125, 190, 15, 4, 30, 1, null, array('all' => $style5), null, null, $style6);
$pdf->RegularPolygon(160, 190, 15, 10);

// Star polygon
$pdf->Text(5, 209, 'Star polygon examples');
$pdf->SetLineStyle($style5);
$pdf->StarPolygon(20, 230, 15, 20, 3, 0, 1, 'F');
$pdf->StarPolygon(55, 230, 15, 12, 5);
$pdf->StarPolygon(55, 230, 7, 12, 5, 45, 0, 'DF', array('all' => $style7), array(220, 220, 200), 'F', array(255, 200, 200));
$pdf->StarPolygon(90, 230, 15, 20, 6, 0, 1, 'DF', array('all' => $style5), array(220, 220, 200), 'F', array(255, 200, 200));
$pdf->StarPolygon(125, 230, 15, 5, 2, 30, 1, null, array('all' => $style5), null, null, $style6);
$pdf->StarPolygon(160, 230, 15, 10, 3);
$pdf->StarPolygon(160, 230, 7, 50, 26);

// Rounded rectangle
$pdf->Text(5, 249, 'Rounded rectangle examples');
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
$pdf->RoundedRect(5, 255, 40, 30, 3.50, '1111', 'DF');
$pdf->RoundedRect(50, 255, 40, 30, 6.50, '1000');
$pdf->RoundedRect(95, 255, 40, 30, 10.0, '1111', null, $style6);
$pdf->RoundedRect(140, 255, 40, 30, 8.0, '0101', 'DF', $style6, array(200, 200, 200));

// Arrows
$pdf->Text(185, 249, 'Arrows');
$pdf->SetLineStyle($style5);
$pdf->SetFillColor(255, 0, 0);
$pdf->Arrow($x0=200, $y0=280, $x1=185, $y1=266, $head_style=0, $arm_size=5, $arm_angle=15);
$pdf->Arrow($x0=200, $y0=280, $x1=190, $y1=263, $head_style=1, $arm_size=5, $arm_angle=15);
$pdf->Arrow($x0=200, $y0=280, $x1=195, $y1=261, $head_style=2, $arm_size=5, $arm_angle=15);
$pdf->Arrow($x0=200, $y0=280, $x1=200, $y1=260, $head_style=3, $arm_size=5, $arm_angle=15);

// - . - . - . - . - . - . - . - . - . - . - . - . - . - . -

// ellipse

// add a page
$pdf->AddPage();

$pdf->Cell(0, 0, 'Arc of Ellipse');

// center of ellipse
$xc=100;
$yc=100;

// X Y axis
$pdf->SetDrawColor(200, 200, 200);
$pdf->Line($xc-50, $yc, $xc+50, $yc);
$pdf->Line($xc, $yc-50, $xc, $yc+50);

// ellipse axis
$pdf->SetDrawColor(200, 220, 255);
$pdf->Line($xc-50, $yc-50, $xc+50, $yc+50);
$pdf->Line($xc-50, $yc+50, $xc+50, $yc-50);

// ellipse
$pdf->SetDrawColor(200, 255, 200);
$pdf->Ellipse($xc, $yc, $rx=30, $ry=15, $angle=45, $astart=0, $afinish=360, $style='D', $line_style=array(), $fill_color=array(), $nc=2);

// ellipse arc
$pdf->SetDrawColor(255, 0, 0);
$pdf->Ellipse($xc, $yc, $rx=30, $ry=15, $angle=45, $astart=45, $afinish=90, $style='D', $line_style=array(), $fill_color=array(), $nc=2);*/
//----------------------------------------------------------
//Close and output PDF document
$pdf->Output('alunos.pdf', 'I');

?>

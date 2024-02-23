<?php
    require('fpdf\fpdf.php');
    if (!empty($_POST['tekst'])) {
        $tab = [
            '0' => 'bwbWBwBwb',
            '1' => 'BwbWbwbwB',
            '2' => 'bwBWbwbwB',
            '3' => 'BwBWbwbwb',
            '4' => 'bwbWBwbwB',
            '5' => 'bwbWBwbwB', 
            '6' => 'bwbWBwbwB',
            '7' => 'bwbWBwbwB',
            '8' => 'BwbWbwBwb',
            '9' => 'bwBWbwBwb',
            'A' => 'BwbwbWbwB',
            'B' => 'bwBwbWbwB',
            'C' => 'BwBwbWbwb',
            'D' => 'BwBwbWbwb',
            'E' => 'BwbwBWbwb',
            'F' => 'bwBwBWbwb',
            'G' => 'bwbwbWBwB',
            'H' => 'BwbwbWBwb', 
            'I' => 'bwBwbWBwb',
            'J' => 'bwbwBWBwb',
            'K' => 'BwbwbwbWB',
            'L' => 'bwBwbwbWB',
            'M' => 'BwBwbwbWb',
            'N' => 'bwbwBwbWB',
            'O' => 'BwbwBwbWb',
            'P' => 'bwBwBwbWb',
            'R' => 'BwbwbwBWb',
            'S' => 'bwBwbwBWb',
            'T' => 'bwbwBwBWb',
            'U' => 'BWbwbwbwB',
            'V' => 'bWBwbwbwB',
            'W' => 'BWBwbwbwb',
            'X' => 'bWbwBwbwB',
            'Y' => 'BWbwBwbwb', 
            'Z'	=> 'bWBwBwbwb', 
            '-'	=> 'bWbwbwBwB', 
            '.'	=> 'BWbwbwBwb', 
            ' '	=> 'bWBwbwBwb', 
            '$'	=> 'bWbWbWbwb', 
            '/'	=> 'bWbWbwbWb', 
            '+'	=> 'bWbwbWbWb', 
            '%'	=> 'bwbWbWbWb', 
            '*'	=> 'bWbwBwBwb'
        ];
        $przerwa = '';
    
        $tekst = $_POST['tekst'];
        for($i = 0; $i < strlen($tekst); $i++) {
            $znak = strtoupper($tekst[$i]);
            $przerwa .= $tab[$znak].' ';
        }
    
        $przerwa = $tab['*'].$przerwa.$tab['*'];
    
        $d = 3;
        $m = 1;
    
        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->SetFont('Helvetica','',16);
    
        for($i = 0;$i<strlen($przerwa);$i++){
            $znak=$przerwa[$i];
      
            switch ($znak){
                case 'b':
                    $pdf->SetFillColor(0,0,0);
                    $pdf->Cell($m,50,' ',0,0,'C',true);
                    break;
                case 'B':
                $pdf->SetFillColor(0,0,0);
                    $pdf->Cell($d,50,' ',0,0,'C',true);
                    break;
                case 'W':
                    $pdf->SetFillColor(255,255,255);    
                    $pdf->Cell($d,50,' ',0,0,'C',true);
                    break;   
                case 'w':
                default:
                    $pdf->SetFillColor(255,255,255);
                    $pdf->Cell($m,50,' ',0,0,'C',true);
                    break;
            }
        }
        $pdf->Output();
    
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="post">
        <input type="text" name="tekst" id="tekst">
        <input type="submit" value="Generuj">
    </form>   

</body>
</html>

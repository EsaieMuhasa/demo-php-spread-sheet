<?php

require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

$spreadsheet = new Spreadsheet();
$worksheet = $spreadsheet->getActiveSheet();

// Ajouter des valeurs aux cellules
$worksheet->setCellValue('A1', "TITRE");
$worksheet->setCellValue('A3', 'NOMS PRODUIT');
$worksheet->setCellValue('B3', 'QUANTITE');
$worksheet->setCellValue('C3', 'DATE');
//donnee d'exemple 
$worksheet->setCellValue('A4', 'exemple');
$worksheet->setCellValue('B4', 80);
$worksheet->setCellValue('C4', '2020-03-22');

// Enregistrement du fichier Excel
$fileName = __DIR__.DIRECTORY_SEPARATOR.'my-excel-document.xls';


$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'. urlencode($fileName).'"');
header('Cache-Control: max-age=0');


$writer->save($fileName);
$content = file_get_contents($fileName);

echo $content;

@unlink($fileName);
exit();
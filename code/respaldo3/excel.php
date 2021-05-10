<?php

require "util/db.php";
$db = connectDB();

$sql = "SELECT * FROM users";

$stmt = $db->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //Exportar a excel

//require 'vendor/autoload.php';
require '../../test/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
/*$sheet->setCellValue('A1', 'ID');
$sheet->setCellValue('B1', 'FULL_NAME');
$sheet->setCellValue('C1', 'EMAIL');
$sheet->setCellValue('D1', 'USER');*/
$sheet->setCellValueByColumnAndRow(1,1, 'ID');
$sheet->setCellValueByColumnAndRow(2,1, 'FULL_NAME');
$sheet->setCellValueByColumnAndRow(3,1, 'EMAIL');
$sheet->setCellValueByColumnAndRow(4,1, 'USER');

foreach($users as $key => $user) {
    $llave = $key + 2;
    /*$sheet->setCellValue('A'.$llave, $user['id']);
    $sheet->setCellValue('B'.$llave, $user['full_name']);
    $sheet->setCellValue('C'.$llave, $user['email']);
    $sheet->setCellValue('D'.$llave, $user['user_name']);*/
    $sheet->setCellValueByColumnAndRow(1, $llave, $user['id']);
    $sheet->setCellValueByColumnAndRow(2, $llave, $user['full_name']);
    $sheet->setCellValueByColumnAndRow(3, $llave, $user['email']);
    $sheet->setCellValueByColumnAndRow(4, $llave, $user['user_name']);
}

$writer = new Xlsx($spreadsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Users.xlsx"');
$writer->save('php://output');
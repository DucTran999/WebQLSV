<?php 
    session_start();
    if(!isset($_SESSION["Admin"]))
    {
        header("location:login.php");
    }
?>

<?php 

require('config.php');
require_once ('dbhelp.php');
require('Classes/PHPExcel.php');


	$objExcel = new PHPExcel;
	$objExcel -> setActiveSheetIndex();
	$sheet = $objExcel -> getActiveSheet()->setTitle('AT01');

	$rowCount =1;

	$sheet ->setCellValue('A'.$rowCount,'Họ và Tên');
	$sheet ->setCellValue('B'.$rowCount,'Mã SV');
	$sheet ->setCellValue('C'.$rowCount,'Chuyên cần');
	$sheet ->setCellValue('D'.$rowCount,'Bài tập lớn');
	$sheet ->setCellValue('E'.$rowCount,'Giữa kì');
	$sheet ->setCellValue('F'.$rowCount,'Cuối kì');
	$sheet ->setCellValue('G'.$rowCount,'Trung bình môn');

	$result = $conn->query ("SELECT diem.name,msv,cc,btl,ktr,ck,TB FROM diem INNER JOIN lop ON lop.id = diem.id_lop WHERE lop.name ='B17DCAT01-B'");

	while ($row = mysqli_fetch_array($result)) 
	{
		 $rowCount++;
		 $sheet ->setCellValue('A'.$rowCount,$row['name']);
		 $sheet ->setCellValue('B'.$rowCount,$row['msv']);
		 $sheet ->setCellValue('C'.$rowCount,$row['cc']);
		 $sheet ->setCellValue('D'.$rowCount,$row['btl']);
		 $sheet ->setCellValue('E'.$rowCount,$row['ktr']);
		 $sheet ->setCellValue('F'.$rowCount,$row['ck']);
		 $sheet ->setCellValue('G'.$rowCount,$row['cc']);
		 $sheet ->getColumnDimension("A")-> setAutoSize(true);
		 $sheet ->getColumnDimension("B")-> setAutoSize(true);
		 $sheet ->getColumnDimension("C")-> setAutoSize(true);
		 $sheet ->getColumnDimension("D")-> setAutoSize(true);
		 $sheet ->getColumnDimension("E")-> setAutoSize(true);
		 $sheet ->getColumnDimension("F")-> setAutoSize(true);
		 $sheet ->getColumnDimension("G")-> setAutoSize(true);
	}

	$objWriter = new PHPExcel_Writer_Excel2007($objExcel);
	$filename  = 'Bảng điểm.xlsx';
	$objWriter -> save($filename);

	header('Content-Disposition: attachment; filename ="'.$filename.'"');
	header('Content-Type: application/vnd.openxmlformatofficedocument.spreadsheetml.sheet');
	header('Content-Length:'.filesize($filename));
	header('Cache-Control: must-revalidate');
	header('Content-Transfer-Encoding: binary');
	header('Pragma: no-cache');
	readfile($filename);
	return;

?>

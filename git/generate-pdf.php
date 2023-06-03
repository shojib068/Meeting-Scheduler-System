<?php 
include "connection.php";
include "navbar.php";

if (isset($_POST['submit']))
{
// Retrieve the data from the database
$sql = "SELECT cm.id, cm.place,cm.title,cm.date, cm.time,cm.description, GROUP_CONCAT(am.attendee_mail SEPARATOR '  
||     ') AS attendees, a.description,a.topic,a.decision
     FROM call_meeting cm
     JOIN add_meeting am ON cm.id = am.meeting_id
     JOIN agendas a ON cm.id = a.meeting_id
     WHERE cm.id = '$_POST[search]'
     GROUP BY cm.id, cm.place, cm.time, a.topic, a.description, a.decision ";
$result = $db->query($sql);

// Generate the PDF
require('fpdf.php');

$pdf = new FPDF();
$pdf->AddPage();
$pdf->AddFont('Helvetica', '', 'helvetica.php');

$pdf->SetFont('Helvetica', 'B', 16);
$pdf->Cell(100, 10, 'User Data', 0, 1, 'C');


$pdf->Ln(10);

$pdf->SetFont('Helvetica', '', 12);
$pdf->Cell(30, 10, 'id', 1);
$pdf->Cell(60, 10, 'title', 1);
$pdf->Cell(40, 10, 'description', 1);
$pdf->Ln();

while ($row = $result->fetch_assoc()) {
    $pdf->Cell(30, 10, $row['id'], 1);
    $pdf->Cell(60, 10, $row['title'], 1);
    $pdf->Cell(40, 10, $row['desciption'], 1);
    $pdf->Ln();
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
    <input type="text" id="search" name="search" placeholder="search by meeting id">
    <input class="btn btn-primary" type="submit"   name="create_meeting" value="pdf " class="create">
</body>
</html>
<?php
//include autoloader
require (__DIR__ . '/dompdf/vendor/autoload.php');
// reference the Dompdf namespace
use Dompdf\Dompdf;
use Dompdf\Options;
//initialize dompdf class
$options = new Options;
$options->setChroot(__DIR__);
$dompdf = new Dompdf($options);

$dompdf->setPaper('A4', 'portrait');

//$html = file_get_contents('image.html');
include 'connection.php';

$meeting_id = $_POST['meeting_id'];
$query = "SELECT * FROM add_meeting WHERE meeting_id = '" . $meeting_id . "'";
$result= mysqli_query($db,$query);

$query1 = "SELECT * FROM agendas WHERE meeting_id = '" . $meeting_id . "'";
$result1= mysqli_query($db,$query1);

$query2 = "SELECT * FROM call_meeting WHERE id = '" . $meeting_id . "'";
$result2= mysqli_query($db,$query2);



$html = '<img src="logo1.png">';

$html .= "<br>"; $html .= "<br>"; $html .= "<br>"; $html .= "<br>";


$row1 = mysqli_fetch_assoc($result);
$meeting_id = $row1['meeting_id'];
$row2 = mysqli_fetch_assoc($result2);

$type = $row2['title'];
$date = $row2['date'];
$time = $row2['time'];
$place = $row2['place'];

$html .= "<p style='font-size: 20px;'>The $meeting_id of the $type of the Department of Computer 
Science and Engineering was held on $date at 
$time in the $place. 
The meeting was chaired by the president of the department, Professor Dr. Md. Sanaullah Chowdhury.</p>
<p style='font-size: 20px;'>The following members were present in the meeting:</p>";


$i=1;
while ($row = mysqli_fetch_assoc($result)) {

    $attendee_mail = $row['attendee_mail'];
    $html .= '<p style="font-size: 18px;">'.$i . '. ' .$attendee_mail.'<br>'.'</p>'; // Concatenate the attendee_mail values
    $i++;
}
$html .= "<br>";
$html .= "<p style='font-size: 20px;'>The following topics and decisions were made in the meeting:</p>";
$i=1;
while ($row = mysqli_fetch_assoc($result1)) {

    $agendas = $row['topic'];
    $decision = $row['decision'];
    $html .='<p style = "font-size: 18px;">'.'<b>Topic</b>'.' '.'<b>' . $i . '</b>'.': '
    .$agendas.'<br>'.'<b>Decision</b>'.' '.'<b>' . $i . '</b>'.': '.$decision.'<br>'.'</p>';
    $i++;
    // Concatenate the attendee_mail values
}
$html .= "<br>"; $html .= "<br>"; $html .= "<br>"; $html .= "<br>";
$html .= "<br>"; $html .= "<br>"; $html .= "<br>"; $html .= "<br>";
$html .= "<br>"; $html .= "<br>"; $html .= "<br>"; $html .= "<br>";

$html .= '<p style="font-size: 20px;">In the absence of any additional discussions, the chairman 
expressed sincere appreciation to all participants for their presence and 
formally announced the conclusion of the meeting </p><br>
<p><span style="font-size: 18px;">Professor Dr. Md. Sanaullah Chowdhury</span><br>
<span style="font-size: 18px;">Chairman</span><br>
<span style="font-size: 18px;">Department of Computer Science and Engineering</span><br>
<span style="font-size: 18px;">University of Chittagong</span></p>';

$dompdf->loadHtml("$html");

// Render the HTML as PDF
$dompdf->render();
// Output the PDF to a file or to the browser
$dompdf->stream('output.pdf', array('Attachment' => false));
?>

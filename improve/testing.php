<?php 
error_reporting("E_NOTICE"); 
?>
<?php
//include('../header.php');
$conn=mysqli_connect('localhost','root','','vision');


$hy=mysqli_query($conn,"select CODE, ((TEST+EXAM)/2) AS alt, AGGREGATE from studentmark, grades where studentmark.STUDENT_ID='jackson hreb' AND (TEST+EXAM)/2 >=grades.LMARK AND
(TEST+EXAM)/2 <= grades.HMARK;");
$hm=mysqli_num_rows($hy);

while($hw=mysqli_fetch_array($hy)){
//echo $hw['CODE'].' '.$hw['alt'].' '.$hw['AGGREGATE'].'<BR/>';

}
$hy=mysqli_query($conn,"select SUM(AGGREGATE) as aggs from studentmark, grades where studentmark.STUDENT_ID='jackson hreb' AND (TEST+EXAM)/2 >=grades.LMARK AND
(TEST+EXAM)/2 <= grades.HMARK;");
$hw=mysqli_fetch_array($hy);
echo $hw['aggs'].' in '.$hm;


?>
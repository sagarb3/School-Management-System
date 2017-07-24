<?php 
error_reporting("E_NOTICE"); 
?>
<?php
//include('../header.php');
mysqli_connect('localhost','root','');
mysqli_select_db('vision');

$hy=mysqli_query($conn,"select CODE, ((TEST+EXAM)/2) AS alt, AGGREGATE from studentmark, grades where studentmark.STUDENT_ID='$name' AND (TEST+EXAM)/2 >=grades.LMARK AND
(TEST+EXAM)/2 <= grades.HMARK AND studentmark.YEAR='$ya' AND studentmark.TERM='$term';");
$hm=mysqli_num_rows($hy);

while($hw=mysqli_fetch_array($hy)){
//echo $hw['CODE'].' '.$hw['alt'].' '.$hw['AGGREGATE'].'<BR/>';

}
$hy=mysqli_query($conn,"select SUM(AGGREGATE) as aggs from studentmark, grades where studentmark.STUDENT_ID='$name' AND (TEST+EXAM)/2 >=grades.LMARK AND
(TEST+EXAM)/2 <= grades.HMARK AND studentmark.YEAR='$ya' AND studentmark.TERM='$term';");
$hw=mysqli_fetch_array($hy);
echo $hw['aggs'].' in '.($hm+1);


?>
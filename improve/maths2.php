<?php 
error_reporting("E_NOTICE"); 
?>
<?php
//include('../header.php');
mysqli_connect('localhost','root','');
mysqli_select_db('vision');

$hy=mysqli_query($conn,"select CODE, EXAM, AGGREGATE from studentmark, grades WHERE 
studentmark.STUDENT_ID='$name' AND studentmark.EXAM >=grades.LMARK AND studentmark.EXAM<=grades.HMARK AND studentmark.YEAR='$ya' AND studentmark.TERM='$term'");
$hm=mysqli_num_rows($hy);

while($hw=mysqli_fetch_array($hy)){
//echo $hw['CODE'].' '.$hw['TEST'].' '.$hw['AGGREGATE'].'<BR/>';

}
$hy=mysqli_query($conn,"select SUM(AGGREGATE) As aggs from studentmark, grades WHERE 
studentmark.STUDENT_ID='$name' AND studentmark.EXAM >=grades.LMARK AND studentmark.EXAM<=grades.HMARK AND studentmark.YEAR='$ya' AND studentmark.TERM='$term'");
$hw=mysqli_fetch_array($hy);
echo $hw['aggs'].' in '.$hm;


?>
<?php include('../connection.php')?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php 
	 $id=$_REQUEST['id']; 
	 $query=mysqli_query("DELETE FROM  payments WHERE STUDENT_ID=$id");
	 header('location:homeb.php?action=viewpay');	 
	 ?>
	 
</div>
</body>
</html>

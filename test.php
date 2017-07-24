<?php 
error_reporting("E_NOTICE"); 
?>

<?php
////include('header.php');
include('../connection.php');
session_start();

if (!isset($_SESSION['user_id'])){
header('location:../index.php');
}
//
?>
<?php
//mag show sang information sang user nga nag login
$user_id=$_SESSION['user_id'];

$result=mysqli_query($conn,"select * from users where user_id='$user_id'");
$row=mysqli_fetch_array($result);

$FirstName=$row['FNAME'];
$LastName=$row['LNAME'];
?>
<div style="float:right; margin-right:24px;" ;>
		<?php 
echo '<img src="images/admin.png"><font color="orange"> &nbsp;'.$FirstName." ".$LastName .'</font>';?>
		<a href="../logout.php" class="logout">Logout</a></div>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Name of school</title>
<link rel="icon" type="image/ico" href="../images/BOOKS.ico"/>
<meta name="keywords" content="school management system" />
<meta name="description" content="school management system" />
<link href="../school.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="../nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="../css/ddsmoothmenu.css" />
<link href="date/htmlDatepicker.css" rel="stylesheet" />
<script language="JavaScript" src="../date/htmlDatepicker.js" type="text/javascript"></script>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/ddsmoothmenu.js">

/***********************************************
* Smooth Navigational Menu- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

</script>

<script type="text/javascript">

ddsmoothmenu.init({
	mainmenuid: "top_nav", //menu DIV id
	orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
	classname: 'ddsmoothmenu', //class added to menu's outer DIV
	//customtheme: ["#1c5a80", "#18374a"],
	contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

</script>

</head>

<body>

<div id="school_body_wrapper">
<div id="school_wrapper">

	<div id="school_header">
		<div id="site_title"> <a href="#">NAME OF SCHOOL</a> </div>
<!-- end of site_title -->
		<div id="header_right"> <img src="images/user-group-icon.png" width="200" height="150" /> </div>
		<div class="cleaner"></div>
</div>
<!-- end of header -->
    
    <div id="school_menubar">
    	<div id="top_nav" class="ddsmoothmenu">
				<ul>
						<li><a href="?action=home" >Home</a></li>
						<li><a href="#">Update</a>
								<ul>
										<li><a href='?action=teacher'> register teacher</a></li>
										<li><a href='?action=non'>register nonstaff</a></li>
										<li><a href='?action=studentmoney'>enter stud pay</a></li>
								</ul>
						</li>
						<li><a href="#">View records</a>
								<ul>
										<li><a href='?action=recordstudent'>students </a></li>
										<li><a href='?action=recordteacher'>teachers </a></li>
										<li><a href='?action=tattend'>teachers' attendance</a></li>
										<li><a href='?action=recordnonstaff'>nonstaff</a></li>
										<li><a href='?action=report'> std report card</a></li>
										<li><a href='?action=viewpay'>Student pay</a></li>
								</ul>
						</li>
						<li><a href="#">School Clubs</a>
								<ul>
										<li><a href='?action=viewclubs'>available clubs</a></li>
										<li><a href='?action=rclubs'>register a club</a></li>
										<li><a href='?action=member'>enter students</a></li>
										<li><a href='?action=clubmember'>clubs members</a></li>
								</ul>
						</li>
						<li><a href="calendar.php">Veiw calender</a></li>
				</ul>
				
		</div>
        <div id="school_search"> <form action="?action=search" method="post">
			
              <select value=" " name="search" id="keyword" title="student name"  class="txt_field" required >
			  
			  <option><option><?php
						$result = mysqli_query($conn,"SELECT STNAME FROM student ");
						while($row = mysqli_fetch_array($result))
							{  
								echo '<option value="'.$row['STNAME'].'">';
								echo $row['STNAME'];
								echo '</option>';
							}
						?>
							
			  
			  </select>
              <input type="submit" name="submit" value=" " alt="Search" id="searchbutton" title="Search" class="sub_btn"  />
            </form>
        </div>
    </div> <!-- END of school_menubar -->
    
    <div id="school_main">
    	<div id="sidebar" class="float_r"> 
        	<div class="sidebar_box"><span class="bottom"></span>
            	<h3>THE STAFF</h3>   
                <div class="content"> 

                    	Move the mouse here to PAUSE the slide<br/>
                    <marquee behavior="scroll" direction="up"  height="150" scrollamount="1" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 2, 0);">
         
                 <?php 
				$teacher=mysqli_query($conn,"select * from teacher");
				$gets=mysqli_fetch_array($teacher);
				$counts=mysqli_num_rows($teacher);
				$num=1;
				echo '<font color=red> '.$num. '</font>&raquo;  ' .$gets['NAMES'].'<br/>';
				$num=2;

				while($gets=mysqli_fetch_array($teacher)){

				echo '<font color=red> '.$num. '</font>&raquo;  ' .$gets['NAMES'].'<br/>';
				$num++;
				}
				?></marquee><br/>
				
						
						</div>
				<h3>STUDENTS</h3> 
						 <div class="content"> 
 <marquee behavior="scroll" direction="up"  height="150" scrollamount="2" onMouseOver="this.setAttribute('scrollamount', 0, 0);" onMouseOut="this.setAttribute('scrollamount', 2, 0);">

				<?php 
				$student=mysqli_query($conn,"select *from student");
				$gets=mysqli_fetch_array($student);
				$count2=mysqli_num_rows($student);
				$num=1;
				echo '<font color=red> '.$num. ' </font>&raquo;  ' .$gets['STNAME'].'<br/>';
				$num=2;
				while($gets=mysqli_fetch_array($student)){

				echo '<font color=red> '.$num. '</font>&raquo;  ' .$gets['STNAME'].'<br/>';
				$num++;
				}
				?>
							
        </MARQUEE>					
		</div>
            </div>
            
        </div>
         <div id="content" class="float_l">
	  <br/></br>
		
	<?php 
	include('calender.php');
	
	
?><div class="cleaner"></div>
    </div>
    <!-- END of school_main -->
   
    <div id="school_footer">
    	      <div align=center> Copyright &copy; 2013 Your School Name. Designed by S.H JACKSON </div>

    </div> <!-- END of school_footer -->
    
</div> <!-- END of school_wrapper -->
</div> <!-- END of school_body_wrapper -->

</ul></body>
</html>

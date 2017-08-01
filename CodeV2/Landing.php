<!DOCTYPE html>
<?php 
session_start();
require_once('../mysql_connect.php');

if(isset($_POST['submit'])){
	if(!empty($_POST['check']) && !empty($_POST['ageStart']) && !empty($_POST['ageEnd'])){
		$_SESSION['checklist']=$_POST['check'];
		$_SESSION['ageStart'] = $_POST['ageStart'];
		$_SESSION['ageEnd'] = $_POST['ageEnd'];
		header("Location: http://".$_SERVER['HTTP_HOST'].  dirname($_SERVER['PHP_SELF'])."/ListOfStudents.php");
		
	}
}
$query="	SELECT 		name,surname,2017 - year(birthday) as 'age',university
			FROM 		UNIVERSITY";
$result=mysqli_query($dbc,$query);
if(mysqli_num_rows($result) > 0)
{
	while($rows=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$name[] = $rows['name'];
		$surname[] = $rows['surname'];
		$age[] = $rows['age'];
		$university[] = $rows['university'];
	}
}
else 
{
	$name = [];
	$surname = [];
	$age = [];
	$university = [];
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!--custom css-->
    <link rel="stylesheet" href="css/custom-theme.css">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <title>Home</title>
</head>
<body>

<!-- navbar -->
<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="Landing.php"> STUDENTS</a>
        </div>
        <!-- right side stuffs -->
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span></a></li>
            <li><a href="#"><span class="glyphicon glyphicon-calendar"></span></a></li>
            <li><a href="LoginScreen.php">Logout</a></li>
        </ul>
    </div>
</div>

<div id="wrapper" class="container-fluid">

    <!-- Sidebar -->
    <div id="sidebar-wrapper" class="col-md-2">
        <div class="sidebar-nav">
            <div class="list-group root">
                <!-- home -->
                <a href="Landing.php" class="list-group-item active"><span class="glyphicon glyphicon-home"></span> Home</a>			
            </div>
        </div>
    </div>
	
    <!-- insert page content here -->
	<div class="col-md-6">
		<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-horizontal form-label-left">
			<div align="right" class="col-md-6">
				ADMU: <input type="checkbox" name="check[]" value="Ateneo De Manila University"/><br>
				DLSU: <input type="checkbox" name="check[]" value="De La Salle University"/><br>
				LPU: <input type="checkbox" name="check[]" value="Lyceum of the Philippines University"/><br>
				UST: <input type="checkbox" name="check[]" value="University of Santo Tomas"/><br>
				MIT: <input type="checkbox" name="check[]" value="Mapua Institute of Technology"/><br>
				STI: <input type="checkbox" name="check[]" value="Systems Technology Institute"/><br>
				UP: <input type="checkbox" name="check[]" value="University of the Philippines"/>
			</div>
			<br>
			<div align="center" class="col-md-3">
				Age Start: <input type="number" name="ageStart">
				Age End: <input type="number" name="ageEnd">
				<br>
				<input type="submit" name="submit">
			</div>
		</form>
	</div>
	<br>
	<div class="row col-md-6">
	
	<table id="datatable-responsive" class="table table-hover table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					    <thead>
				        <tr>
				        <th>Name</th>
				        <th>University Count</th>
				        </tr>
						</thead>
						<tbody>
						<tr>
						<td width="50%"><div align="center"><b>DLSU
						</div></b></td>
						<td width="50%"><div align="center"><b><?php 	$query="SELECT	 COUNT(*) c
																				  FROM 	university 
																				 WHERE	 university='De La Salle University'";
																		$result=mysqli_query($dbc,$query);
																		$row = mysqli_fetch_assoc($result);
																		echo $row['c'];
																?>
						</div></b></td>
						</tr>
						<tr>
						<td width="50%"><div align="center"><b>LPU
						</div></b></td>
						<td width="50%"><div align="center"><b><?php 	$query="SELECT 	COUNT(*) c 
																				  FROM 	university 
																				 WHERE 	university='Lyceum of the Philippines University'";
																		$result=mysqli_query($dbc,$query);
																		$row = mysqli_fetch_assoc($result);
																		echo $row['c'];?>
						</div></b></td>
						</tr>
						<tr>
						<td width="50%"><div align="center"><b>ADMU
						</div></b></td>
						<td width="50%"><div align="center"><b><?php 	$query="SELECT 	COUNT(*) c 
																				  FROM 	university 
																				 WHERE 	university='Ateneo De Manila University'";
																		$result=mysqli_query($dbc,$query);
																		$row = mysqli_fetch_assoc($result);
																		echo $row['c'];?>
						</div></b></td>
						</tr>
						<tr>
						<td width="50%"><div align="center"><b>UP
						</div></b></td>
						<td width="50%"><div align="center"><b><?php 	$query="SELECT 	COUNT(*) c 
																				  FROM 	university 
																				 WHERE 	university='University of the Philippines'";
																		$result=mysqli_query($dbc,$query);
																		$row = mysqli_fetch_assoc($result);
																		echo $row['c'];?>
						</div></b></td>
						</tr>
						<tr>
						<td width="50%"><div align="center"><b>UST
						</div></b></td>
						<td width="50%"><div align="center"><b><?php 	$query="SELECT 	COUNT(*) c 
																				  FROM 	university 
																				 WHERE 	university='University of Santo Tomas'";
																		$result=mysqli_query($dbc,$query);
																		$row = mysqli_fetch_assoc($result);
																		echo $row['c'];?>
						</div></b></td>
						</tr>
						<tr>
						<td width="50%"><div align="center"><b>MIT
						</div></b></td>
						<td width="50%"><div align="center"><b><?php 	$query="SELECT 	COUNT(*) c 
																				  FROM 	university 
																				 WHERE 	university='Mapua Institute of Technology'";
																		$result=mysqli_query($dbc,$query);
																		$row = mysqli_fetch_assoc($result);
																		echo $row['c'];?>
						</div></b></td>
						</tr>
						<tr>
						<td width="50%"><div align="center"><b>STI
						</div></b></td>
						<td width="50%"><div align="center"><b><?php 	$query="SELECT 	COUNT(*) c 
																				  FROM	university 
																				 WHERE 	university='Systems Technology Institute'";
																		$result=mysqli_query($dbc,$query);
																		$row = mysqli_fetch_assoc($result);
																		echo $row['c'];?>
						</div></b></td>
						</tr>
						</tbody>
		</table>
	</div>
	<div class="col-md-12">
	<table id="example" class="table table-bordered table-hover table-striped">
	 <thead>
			<tr>
				<th>Name</th>
				<th>Surname</th>
				<th>Age</th>
				<th>University</th>
			</tr>
			</thead>
			<tbody>				
				<?php 					
					 for($i=0;$i<count($name);$i++)
					{	
					echo "<tr>
						<td>$name[$i]</td>	                            	
						<td>$surname[$i]</td>
						<td>$age[$i]</td>
						<td>$university[$i]</td>
						</tr>";
					}																								   					
				?> 
		</tbody>
	</table>
	</div>
	</div>
	
	
</div>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('#example').DataTable();
		} );
	</script>
</body>

</html>
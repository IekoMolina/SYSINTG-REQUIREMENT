<!DOCTYPE html>
<html lang="en">
<?php 
session_start();
require_once('../mysql_connect.php');

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
    <title>Table</title>
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
    <div id="page-content-wrapper">

        <h2 class="page-title">Students</h2>

        <div class="row">
                        <div class="col-md-12">
                        	<div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Students<span class="panel-subheader"></span>
                                </h3>
                            </div>
                            <div class="panel-body">
				             <form action="employee-information.php" method="post">
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
											/*$list=$_POST['checklist'];
				                             for($i=0;$i<count($name);$i++)
				                            {	
												
				                            	echo "<tr>
														<td>$name[$i]</td>	                            	
														<td>$surname[$i]</td>
														<td>$age[$i]</td>
														<td>$university[$i]</td>
													  </tr>";
				                            }*/
											
											$list=$_SESSION['checklist'];
				                             for($i=0;$i<count($list);$i++)
				                            {	
												for($x=0;$x<count($name);$x++){
													if($list[$i] == $university[$x] && $age[$x] >= $_SESSION['ageStart'] && $age[$x] <= $_SESSION['ageEnd']){
														echo "<tr>
															<td>$name[$x]</td>	                            	
															<td>$surname[$x]</td>
															<td>$age[$x]</td>
															<td>$university[$x]</td>
															</tr>";
													}
													else if (empty($list) && $age[$x] >= $_SESSION['ageStart'] && $age[$x] <= $_SESSION['ageEnd'])
													{
														echo "<tr>
															<td>$name[$x]</td>	                            	
															<td>$surname[$x]</td>
															<td>$age[$x]</td>
															<td>$university[$x]</td>
															</tr>";
													}														
												}
				                            }
											
									       
											foreach ($list as $i) {
												echo $i;
											}
										
				                        ?> 

				                    </tbody>
				                </table>
				                </form> 
                            </div>
                            <div class="panel-footer text-right">      
                            </div>
                        </div>
                    </div>
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
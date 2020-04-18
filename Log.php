<?php
	include('Config.php');
	$sqlQuery = "SELECT Firstname from employee";
	$result1 = mysqli_query($conn, $sqlQuery);
	$options="";
	while($row1=mysqli_fetch_array($result1))
	{
		$options=$options."<option>$row1[0]</option>";
	}
?>

<html>
	<head>
		<title>Employee's Record</title>
	</head>
<body>
	<form method="post">
		<label>Select Start Date:</label>
		<input type="date" name="SDate">

		<label>Select End Date:</label>
		<input type="date" name="EDate">

		<label>Select Employee:</label>
	<select name="selEmp">
		<?php echo $options;?>
	</select>
	<input type="submit" name="filter" value="filter">
	</form>
		
	<table>
	<thead>
		<tr>
			<td>Firstname</td>
			<td>Lastname</td>
			<td>Time In</td>
			<td>Time Out</td>
		</tr>
	</thead>	
	<?php
			
		if(isset($_POST['filter']))
			{
				$SDate=$_POST["SDate"];
				$EDate=$_POST["EDate"];
				$selEmp=$_POST["selEmp"];
				$sql = "SELECT c.LogId, m.Firstname as Firstname, m.Lastname as Lastname, c.TimeIn,c.TimeOut FROM employee m inner JOIN tbl_employeelog c ON m.EmpID = c.UserId WHERE (Convert(c.TimeIn,Date)  BETWEEN '$SDate' and '$EDate') and m.Firstname = '$selEmp'";
            $result = $conn-> query($sql);
	
			while($row = mysqli_fetch_array($result)) 
				{
					echo '<tr>'
					.'<td>'.$row['Firstname'].'</td>'
					.'<td>'.$row['Lastname'].'</td>'
					.'<td>'.$row['TimeIn'].'</td>'
					.'<td>'.$row['TimeOut'].'</td>'
					.'</tr>'; 

				}
			}
	
	
		
	?>
	
</table>
</body>
</html>
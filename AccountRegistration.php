<?php
include("Config.php")
?>


<!DOCTYPE html>
<html>
<head>
	<title>Account Registration</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
 <link href="css/sb-admin-2.min.css" rel="stylesheet">
 <link href="css/myStyle.css" rel="stylesheet">
</head>
<body>
	<div class="container">
	<table class="table table-bordered table-responsive">
		<thead>
			<tr>
				<td>ID</td>
				<td>Account name</td>
				<td>Username</td>
				<td>Password</td>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = "select * from AccountRegistration";
				$result = $conn->query($query);

				//load data
				while($row = mysqli_fetch_array($result))
				{
					echo '<tr><td>'.$row['ID'].'</td><td>'
					.$row['AccountFN']. ' ' .$row['AccountLN'].' </td><td>'
					.$row['AccountUsername'].'</td><td>'
					.$row['AccountPassword'].'</td></tr>';
				};
			?>
		</tbody>
	</table>
	</div>
</body>
</html>
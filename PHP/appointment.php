<html>
	<head>
		<title>Appointments</title>
	</head>	
	<body>
		<h2>Appointment Infomation</h2>
		
			<td>
			<td>
				<tr><Button><a href = "Patient.php">Patients</a></Button></tr>
				<tr><Button><a href = "bill.php">Bills</a></Button></tr>
				<tr><Button><a href = "payment.php">Payment</a></Button></tr>
				<tr><Button><a href = "treatment.php">Treatment</a></Button></tr>
				<tr><Button><a href = "specialist.php">Specilaist</a></Button></tr>
				<tr><Button><a href = "appointment.php">Appointment</a></Button></tr>
			</td>
			
		<table border="5">
			<tr>
				<td><h2>PPSN</h2></td>
				<td><h2>Time</h2></td>
				<td><h2>Treatment</h2></td>
				<td><h2>Owes</h2></td>
				<td><h2>Follow-Up</h2></td>
			</tr>
			<?php
				$host = "localhost";
				$user = "root";
				$password = "";	
				$database = "dentaldb";
				
				$query = "select * from appointment";
				//Connect to the database
				$connect = mysqli_connect($host,$user,$password,$database) or die("Problem connecting.");
				//Set connection to UTF-8
				mysqli_query($connect,"SET NAMES utf8");
				//Select data
				$result = mysqli_query($connect,$query) or die("Bad Query.");

				mysqli_close($connect);


				while($row = $result->fetch_array())
				{
					echo "<tr>";
					echo "<td><h2>" .$row['ppsn'] . "</h2></td>";
					echo "<td><h2>" .$row['time'] . "</h2></td>";
					echo "<td><h2>" .$row['treatment'] . "</h2></td>";
					echo "<td><h2>" .$row['owesmoney'] . "</h2></td>";
					echo "<td><h2>" .$row['followup'] . "</h2></td>";
				    echo "</tr>";
				}
			?>

		<table>
	</body>
</html>
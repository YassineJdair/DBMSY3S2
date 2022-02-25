<html>
	<head>
		<title>Patient Infomation</title>
	</head>	
	<body>
		<h2>Patient Infomation</h2>
		
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
				<td><h2>FirstName</h2></td>
				<td><h2>Surname</h2></td>
				<td><h2>DOB</h2></td>
				<td><h2>Number</h2></td>
				<td><h2>Address</h2></td>
				<td><h2>XRAY</h2></td>
				<td><h2>Picture_path</h2></td>
				<td><h2>Treatment</h2></td>
			</tr>
			
			<?php
				$host = "localhost";
				$user = "root";
				$password = "";	
				$database = "dentaldb";
				
				$query = "Select ppsn, fname, surname, dob, phonenum, address, dentXray, dentXray_path, treatment from patient";
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
					echo "<td><h2>" .$row['fname'] . "</h2></td>";
					echo "<td><h2>" .$row['surname'] . "</h2></td>";
					echo "<td><h2>" .$row['dob'] . "</h2></td>";
					echo "<td><h2>" .$row['phonenum'] . "</h2></td>";
					echo "<td><h2>" .$row['address'] . "</h2></td>";
					echo "<td><h2><img src=image_patient.php?ppsn=".$row['ppsn']." width=200 height=150/></h2></td>";
					echo "<td><h2><img src=HTTP://".$host.$row['dentXray_path'] . " width=200 height=150/></h2></td>";
					echo "<td><h2>" .$row['treatment'] . "</h2></td>";
				    echo "</tr>";
				}
			?>

		<table>
	</body>
</html>
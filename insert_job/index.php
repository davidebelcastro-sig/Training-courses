<?php
// Include the database connection file
include('db_config.php');
?>

<html>
<head>
	<title>Dynamic Dependent Select Box using jQuery, Ajax and PHP - Clue Mediator</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<div class="container">
		<h3>Dynamic Dependent Select Box - <a href="https://www.cluemediator.com" target="_blank" rel="noopener noreferrer">Clue Mediator</a></h3>
    <br />
		<form action="" method="post">
			<div class="col-md-4">

				<!-- Country dropdown -->
				<label for="country">Country</label>
				<select class="form-control" id="country">
					<option value="">Select Country</option>
					<?php
					$query = "SELECT * FROM countries";
					$result = $con->query($query);
					if ($result->num_rows > 0) {
						while ($row = $result->fetch_assoc()) {
							echo '<option value="'.$row['id'].'">'.$row['country_name'].'</option>';
						}
					}else{
						echo '<option value="">Country not available</option>';
					}
					?>
				</select>
        <br />

				<!-- State dropdown -->
				<label for="country">State</label>
				<select class="form-control" id="state">
					<option value="">Select State</option>
				</select>
        <br />

				<!-- City dropdown -->
				<label for="country">City</label>
				<select class="form-control" id="city">
					<option value="">Select City</option>
				</select>

			</div>
		</form>
	</div>
</body>
</html>
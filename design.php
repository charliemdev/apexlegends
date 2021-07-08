<?php

	try{
		$conn = new PDO('mysql:host=localhost;dbname=u1865077', 'u1865077', '14aug98');
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $exception)
	{
		echo "Oh no, there was a problem - " . $exception->getMessage();
	}

	// select all the characters
	$q_characters = "SELECT * FROM characters";
	$character_set = $conn->query($q_characters);
	$characters = $character_set->fetchAll();

	// select all genders
	$q_genders = "SELECT * FROM gender";
	$gender_set = $conn->query($q_genders);
	$genders = $gender_set->fetchAll();

	// select all legend types
	$q_legend_types = "SELECT * FROM legend_type";
	$lengend_type_set = $conn->query($q_legend_types);
	$legend_types = $lengend_type_set->fetchAll();

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<title>Design - Apex Database Search</title>
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<header>
		<div class="nav-container">
			<h1 class="nav-heading">Apex Legends Search</h1>
	    <nav>
	      <ul>
					<li><a href="index.php">Search</a></li>
					<li><a href="design.php">Design</a></li>
	      </ul>
	    </nav>
		</div>
  </header>
	<main class="design-container">
		<h1>Database Dump</h1>

		<img src="images/apex_database.png">

		<h2>Character Table</h2>
			<?php
			echo "<table>";
			echo "<tr><th>id</th><th>name</th><th>description</th><th>real_name</th><th>tactical</th><th>passive</th><th>ultimate</th><th>gender_id</th><th>type_id</th></tr>";
			foreach($characters as $character)
			{
				echo "<tr>";
				echo "<td>{$character['id']}</td>";
				echo "<td>{$character['name']}</td>";
				echo "<td>{$character['description']}</td>";
				echo "<td>{$character['real_name']}</td>";
				echo "<td>{$character['tactical']}</td>";
				echo "<td>{$character['passive']}</td>";
				echo "<td>{$character['ultimate']}</td>";
				echo "<td>{$character['gender_id']}</td>";
				echo "<td>{$character['type_id']}</td>";
				echo "</tr>";
			}
			echo "</table>";
			?>
		<h2>Gender Table</h2>
			<?php
				echo "<table>";
				echo "<tr><th>id</th><th>gender</th></tr>";
				foreach($genders as $gender)
				{
					echo "<tr>";
					echo "<td>{$gender['id']}</td>";
					echo "<td>{$gender['gender']}</td>";
					echo "</tr>";
				}
				echo "</table>";
			?>
		<h2>Legend Type Table</h2>
			<?php
				echo "<table>";
				echo "<tr><th>id</th><th>type</th></tr>";
				foreach($legend_types as $legend_type)
				{
					echo "<tr>";
					echo "<td>{$legend_type['id']}</td>";
					echo "<td>{$legend_type['type']}</td>";
					echo "</tr>";
				}
				echo "</table>";
			?>
	</main>
</body>
</html>

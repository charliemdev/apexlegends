<?php

	try{
		$conn = new PDO('mysql:host=localhost;dbname=u1865077', 'u1865077', '14aug98');
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $exception)
	{
		echo "Oh no, there was a problem - " . $exception->getMessage();
  }

  // The ID from the query string e.g. details.php?id=1
  $characterId=$_GET['id'];

	$c_query = "SELECT name, description, real_name, tactical, passive, ultimate, gender_id, type_id, gender.gender, legend_type.type
	FROM characters
	INNER JOIN gender ON characters.gender_id=gender.id
	INNER JOIN legend_type ON characters.type_id=legend_type.id
	WHERE characters.id = :id";

  // Prepared statement uses the ID to select a single character
  $stmt = $conn->prepare($c_query);
  $stmt -> bindValue(':id',$characterId);
  $stmt->execute();
  $character = $stmt->fetch();
  $conn = NULL;
?>

<!DOCTYPE html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="content-type" content="text/html;charset=utf-8">
  <title>Apex Database Search</title>
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
  <main>
		<div class="search-container">
			<?php
				if($character) {
					echo "<h1>".$character['name']."</h1>";
				}
			?>
		</div>
		<div class="details-container">
			<div class="details-image">
				<?php
				if($character) {
					echo "<img src='images/characters/{$character['name']}.png'>";
				}
				?>
			</div>
			<div class="details-info">
				<?php
		      if($character) {
		        echo "<strong>Description:</strong> <p>".$character['description']."</p>";
						echo "<strong>Legend Type:</strong><p>".$character['type']."</p>";
						echo "<strong>Real Name:</strong><p>".$character['real_name']."</p>";
						echo "<strong>Gender:</strong><p>".$character['gender']."</p>";
						echo "<strong>Tactical Ability:</strong><p>".$character['tactical']."</p>";
						echo "<strong>Passive Ability:</strong><p>".$character['passive']."</p>";
						echo "<strong>Ultimate Ability:</strong><p>".$character['ultimate']."</p>";
		      } else {
		        echo "<p>No details found.</p>";
		      }
		    ?>
			</div>
		</div>

  </main>
</body>
</html>

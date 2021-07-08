<?php

	try{
		$conn = new PDO('mysql:host=localhost;dbname=u1865077', 'u1865077', '14aug98');
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	}
	catch (PDOException $exception)
	{
		echo "Oh no, there was a problem - " . $exception->getMessage();
  }
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
			<h1>Search Results</h1>
		</div>
		<div class="search-results">
			<?php
			$searchTerm=$_GET['search'];

			if(empty($_GET['search'])) {
				echo "You need to search for something.";
			}
			else {

			$stmt = $conn->prepare("SELECT * FROM characters WHERE name LIKE :searchTerm");
			$stmt->bindValue(":searchTerm","%{$searchTerm}%");
			$stmt->execute();
			$characters = $stmt->fetchAll();

			if($characters){
					foreach ($characters as $character) {
						echo "<div class='character-results'>";
						echo "<div class='character-name'><h3><a href='details.php?id={$character["id"]}'>{$character['name']}</a></h3></div>";
						echo "<div class='character-image'><a href='details.php?id={$character["id"]}'><img src='images/characters/{$character['name']}.png'></a></div>";
						echo "<div class='character-descripton'>{$character['description']}</div>";
						echo "</div>";
					}
					} else {
						echo "<p>No search reaults found.</p>";
					}
				}
			?>
		</div>
  </main>
</body>
</html>

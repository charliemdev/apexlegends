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
			<div class="logo-image"></div>
			<form action="results.php" method="GET">
				<input type="text" name="search" class="form-control" id="search" placeholder="Search for a character">
				<input type="submit" name="submitBtn" value="Search" class="search-btn">
			</form>
		</div>
  </main>
</body>
</html>

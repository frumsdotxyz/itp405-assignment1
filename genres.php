<?php
$pdo = new PDO('sqlite:chinook.db');
$sql = '
select * 
from genres
';
$statement = $pdo->prepare($sql);
$statement->execute();
$genres = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Genres</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>
	<table class="table">
		<tr>
			<th>Genre</th>
		</tr>
		<?php foreach($genres as $genre) : ?>
			<tr>
				<td>
					<a href="tracks.php?genre=<?=$genre->GenreId?>">
						<?=$genre->Name?>
					</a>
				</td>
			</tr>
		<?php endforeach ?>
	</table>
</body>
</html>
<?php
$pdo = new PDO('sqlite:chinook.db');
$sql = '
select tracks.Name as trackName, albums.Title as albumTitle, artists.Name as artistName, tracks.UnitPrice
from tracks
inner join albums
on tracks.AlbumId = albums.AlbumId
inner join artists
on albums.ArtistId = artists.ArtistId
where GenreId = ?
';
$statement = $pdo->prepare($sql);
$statement->bindParam(1, $_GET['genre']);
$statement->execute();
$tracks = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Tracks</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>
<table class="table">
	<tr>
		<th>Track</th>
		<th>Album</th>
		<th>Artist</th>
		<th>Price</th>
	</tr>
	<?php foreach($tracks as $track) : ?>
	<tr>
		<td><?=$track->trackName?></td>
		<td><?=$track->albumTitle?></td>
		<td><?=$track->artistName?></td>
		<td><?=$track->UnitPrice?></td>
	</tr>
	<?php endforeach ?>
</table>
</body>
</html>
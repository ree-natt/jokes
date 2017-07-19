<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
<? foreach($jokesList as $joke): ?>
	<h1><?= $joke['title']; ?></h1>
	<p><?= $joke['description']; ?></p>
<? endforeach ?>
</body>
</html>
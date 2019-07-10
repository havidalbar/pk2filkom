<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Login</title>
</head>

<body>
	<form method="POST">
		{{ csrf_field() }}
		<input name="nim" type="number" required>
		<input name="password" type="password" required>
		<input type="submit" value="LOGIN">
	</form>
</body>

</html>
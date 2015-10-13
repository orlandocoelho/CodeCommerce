<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Test</title>
</head>
<body>
<ul>
    @foreach($categories as $category)
        <li>{{  $category->name }}</li>
    @endforeach
</ul>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Hosting Types</title>
</head>
<body>
    <h1>Hosting Types</h1>
    <ul>
        @foreach($types as $type)
            <li>{{ $type->name }}</li>
        @endforeach
    </ul>
</body>
</html>

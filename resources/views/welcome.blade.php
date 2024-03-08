<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss'],
    ['resources/js/app.js'])
    <title>Document</title>
</head>
<body>
    <div class="alert alert-success" role="alert">
        Bienvenue {{$user->nom_complet}}
      </div>
    
</body>
</html>
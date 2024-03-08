<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <p>
        Bonjour  {{$name}},

Merci de vous être inscrit sur notre site . Avant de pouvoir accéder à toutes les fonctionnalités de notre site, nous avons besoin que vous vérifiiez votre adresse e-mail.

Veuillez cliquer sur le lien ci-dessous pour confirmer votre adresse e-mail :

[Insérer le lien de vérification de l'e-mail ici]

Si vous n'avez pas demandé cette inscription, veuillez ignorer cet e-mail.

Cordialement,
L'équipe ismail 
    </p>
    <a href="{{ $lien }}">confirmation</a>
</body>
</html>
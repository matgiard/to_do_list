<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">TO-DO-LIST - Inscription utilisateur</a>
                <a class="nav-link" href="login.php">Se connecter</a>
            </div>
        </nav>
        <?php require_once 'partials/_errors.php' ?>
<form method="post" action="register.php">
  <div class="mb-3">
    <label for="email" class="form-label">Adresse email</label>
    <input type="email" class="form-control" id="email_user" aria-describedby="emailHelp" name="email_user">
   
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="password_user" name="password_user">
  </div>
  
  <button type="submit" class="btn btn-primary" name="connexion">S'inscrire</button>
</form>
</div>
</body>
</html>

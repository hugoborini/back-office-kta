<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add page</title>
    <link rel="stylesheet" href="styles/css/login.css">
</head>
<body>
<form action="postRoom" method='post' class="form">
  <h2 class="form__title">Login</h2>
  <div class="form__textfield">
    <input type="text" name='name' placeholder="Nom de la Salle">
  </div>
  <div class="form__textfield">
    <textarea type="text" name='descrip' placeholder="description"></textarea>
  </div>
  <div class="form__textfield">
    <input type="text" name='path_image' placeholder="image">
  </div>
  <button class="form__btn">Connexion</button>
</form>
</body>
</html>
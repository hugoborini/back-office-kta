<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catacombes | Ajouter une salle</title>
    <link rel="stylesheet" href="../styles/css/login.css">
</head>
<body>
<form action="postRoom" method='post' class="form" enctype="multipart/form-data">
  <h2 class="form__title">Ajouter une salle</h2> 
  <div class="form__textfield">
    <input type="text" name='name' placeholder="Nom de la salle">
  </div>
  <div class="form__textfield">
    <textarea type="text" name='descrip' rows="6" placeholder="Description"></textarea>
  </div>
  <div class="form__textfield">
    <input type="file" name='image' placeholder="Image">
  </div>
  <button class="form__btn">Connexion</button>
</form>
</body>
</html>
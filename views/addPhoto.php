<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AddPhoto</title>
    <link rel="stylesheet" href="../../../styles/css/admin.css">
    <link rel="stylesheet" href="../../../styles/css/login.css">
</head>
<body class="photo">
<header>Ajouter une Photo a <?=$room_name?></header>
<form action="addPhoto/post" method='post' class="form" enctype="multipart/form-data">
    <div class="form__textfield">
        <input type="file" name='image' placeholder="Image">
    </div>
    <div class="form__textfield">
        <input type="text" name='facts' placeholder="Entre une fact">
    </div>
    <button class="form__btn">Connexion</button>
</form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="css/estilos.css" type="text/css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
</head>

<body>
    <h2 class="titulo">Formulario de contacto</h2>
    <div class="contenedor">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php if (!$sended && isset($name)) echo $name; ?>">
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo" value="<?php if (!$sended && isset($mail)) echo $mail; ?>">
            <textarea name="mensaje" id="" placeholder="Mensaje"><?php if (!$sended && isset($mensaje)) echo $mensaje; ?></textarea>
            <?php if (!empty($err)) : ?>
            <div class="alert error">
                <?php echo $err; ?>
            </div>
            <?php elseif (!$sended && !$err && isset($send)) : ?>
            <div class="alert error">
                <p>Formulario no se ha podido enviar correctamente</p>

                <!--Delete this <p>if you are not on production -->
                <p class="alert error">Its possible if you are on production when you send a email, warning message appears, do you need a hosting with email service to try if it`s functional</p>
            </div>
            <?php elseif ($sended) : ?>
            <div class="alert success">
                <p>Formulario enviado correctamente</p>
            </div>
            <?php endif; ?>
            <input type="submit" name="enviar" value="Enviar" class="btn">
        </form>
    </div>
</body>

</html>
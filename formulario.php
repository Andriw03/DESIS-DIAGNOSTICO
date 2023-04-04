<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <h3>FORMULARIO DE VOTACIÓN</h3>
    <form action="" method="post">
        <div class="formulario">
            <div class="">
                <label for="nombre">Nombre y Apellido</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div class="">
                <label for="alias">Alias</label>
                <input type="text" name="alias" id="alias">
            </div>
            <div class="">
                <label for="rut">RUT</label>
                <input type="text" name="rut" id="">
            </div>
            <div class="">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>
            <div class="">
                <label for="region">Región</label>
                <select name="region" id="region">
                    <option value="1">1</option>
                </select>
            </div>
            <div class="">
                <label for="comuna">Comuna</label>
                <select name="comuna" id="comuna">
                    <option value="1">1</option>
                </select>
            </div>
            <div class="">
                <label for="candidato">Candidato</label>
                <select name="candidato" id="candidato">
                    <option value="1">1</option>
                </select>
            </div>
            <div class="">
                <label for="">Como se enteró de Nosotros</label>
                <input type="checkbox" name="web" id="web"> Web
                <input type="checkbox" name="tv" id="tv"> TV
                <input type="checkbox" name="redes" id="redes"> Redes Sociales
                <input type="checkbox" name="amigo" id="amigo">Amigo

            </div>
            <input type="submit" value="Votar">
        </div>
    </form>
    
</body>
</html>
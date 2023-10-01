<?php

$provincia = [
  'Almeria',
  'Cadiz',
  'Cordoba',
  'Huelva',
  'Granada',
  'Jaen',
  'Malaga'
]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Tailwindcss -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- CDN Fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body bgcolor="#000" text="red">

  <h3 class="text-center text-xl my-4">Formulario</h3>

  <!-- W es en ancho que quiero q ocupe -->
  <div class="w-1/2 p-4 mx-auto border-4 border-red-400 rounded-x1">

    <form action="procesarUno.php" method="POST">
      <div class="mb-4">
        <label for="nombre">Tu nombre</label>
        <input type="text" maxlength="5" name="nombre" id="" placeholder="Ejemplo: sergio">
      </div>

      <input type="email" required name=" email" id="" size="40" placeholder="Ejemplo: gggg@gmail.com">

      <div class="mb-4">
        <label for="nombre">Tu contraseña</label>
        <input type="password" maxlength="5" name="password" id="" placeholder="Contraseña">
      </div>

      //* Cuando no defino ningun tipo en un boton, es de tipo submit
      <br><br>

      <select name="provincias" id="">
        <option value="" selected>Elige una provincia</option>
        <?php

        foreach ($provincia as $item) {
          echo "<option>$item</option>";
        }
        ?>
      </select>

      <div class="mb-4">

        <!--radiobuttons para que solo podamos elegir 1 tenemos que tener el mismo name para que esten en el mismo grupo -->

        <input type="radio" name="procesador" value="1" id=""> Intel
        <input type="radio" name="procesador" value="2" id=""> AMD
        <input type="radio" name="procesador" value="3" id=""> ARM
        <input type="radio" name="procesador" checked value="4" id=""> Otros


      </div>

      <div class="mb-4">

        <!--check para que solo podamos elegir 1 tenemos que tener el mismo name para que esten en el mismo grupo -->
        <!--Necesitamso tener un arary en el name, porque con los check podemos elegir mas de una opcion-->
        
        <input type="checkbox" name="deporte[]" value="1" id=""> Natacion
        <input type="checkbox" name="deporte[]" value="2" id=""> Esgrima 
        <input type="checkbox" name="deporte[]" value="3" id=""> Runing
        <input type="checkbox" name="deporte[]" value="4" id="">  bici 


      </div>

      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-paper-plane"></i>Enviar</button>

      <button type="reset" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Reset</button>

    </form>


</body>

</html>
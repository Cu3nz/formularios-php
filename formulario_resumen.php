<?php
$prov = [
    'Almeria',
    'Cadiz',
    'Cordoba',
    'Huelva',
    'Granada',
    'Jaen',
    'Málaga',
    'Sevilla'
];

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

<body>


    <style>
        button {
            margin-top: 10px;
        }
    </style>
    <h3 class="text-center text-xl my-4">FORMULARIO</h3>
    <div class="w-1/2 p-4 mx-auto border-4 border-red-400 rounded-xl">
        <form action="procesarUnoresumen.php" method="POST" id="miFormulario">
            <div class="mb-4">
                <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tu nombre</label> <!--Para que funcuone el label tenemos que definir el mismo nombre tanto en el for como en el id del input-->
                <input type="text"   class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tú nombre..." name="nombre" id='nombre' />
            </div>
            <div class="mb-4">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tu Email</label>
                <input type="email"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tú email..." name="email" id="email" />
            </div>
            <div class="mb-4">
                <label for="pass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tu Password</label>
                <input type="password"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tú password..." name="password" id="pass" />
            </div>
            <div class="mb-4">
                <label for="prov" class="block mb-2 text-sm font-medium text-gray-900 dark:text-black">Tu Provincia</label>
                <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="provincia" id="prov" />
                <option value="Opcion predefinida (sin valor)">Elige una provincia....</option> <!--Ponemos -1 para algo que despues explicare-->
                <!--Creacion del menu de provincias recorriendo el for each -->
                <?php
                /**
                 * ? Accedemos al array de provincias y guardarmos los valores en $provincias
                 * ? Creamos las opciones y en cada una metemos un valor que almacena el array
                 */

                foreach ($prov as $provincias) {
                    echo "<option>$provincias</option>"; // Crea tantas opciones como valores de $provincia haya en el array
                };

                ?>
                </select>
            </div>
            <div class="mb-4">

                <!-- radiobuttons -->
                <!--Todos tienen que tener el mismo nombre, si tienen diferente serian de distinto grupo y se podria elegir mas de una opcion-->
                <input type="radio" name="procesador" value="1"> INTEL
                <input type="radio" name="procesador" value="2"> AMD
                <input type="radio" name="procesador" value="3"> ARM
                <input type="radio" name="procesador" value="4"> OTROS <!--Este sale selecionado de por si-->

            </div>

            <div class="mb-4">
                <!-- Check -->
                <input type="checkbox" name="deportes[]" value='1'> Natación
                <input type="checkbox" name="deportes[]" value='2'>  Esgrima
                <input type="checkbox" name="deportes[]" value='3'> Runing
                <input type="checkbox" name="deportes[]" value='4' > Bicicleta
            </div>

            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-paper-plane"></i> ENVIAR</button>
                <button type="reset" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"><i class="fa-solid fa-broom"></i> RESET</button>
            </div>



</body>

</html>
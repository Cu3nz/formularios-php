<style>
    .cadena{
        font-size: 20px;
        color: orange;
        font-weight: 800;
    }
</style>
<?php

$provincias = [
    'Almeria',
    'Cadiz',
    'Cordoba',
    'Huelva',
    'Granada',
    'Jaen',
    'Málaga',
    'Sevilla'
];

/**
 * ? almacenamos en las variables lo que introduce el usuario por teclado en el formulario
 * * lo nos que estan en verde entre '' son los name de cada uno de los inputs del formulario, tiene que estar bien escrito
 */
$nombre = trim($_POST['nombre']);
$email = trim($_POST['email']);
$passwd = trim(($_POST['password']));
//$passwd = trim(md5($_POST['password'])); // cifrar la contraseña 
$prov = $_POST['provincia'];
$micro = 0; //! lo inicializo a 0 para que salte un error en el if, porque el rango es entre 1 y 4 por lo tanto si almacena 0 saltara el error.
//! Tanto con los checkbox como los radiobuttons tenemos que hacer una comprobacion para saber si el usuario ha enviado algo por el formulario, porque cuando se deja en blanco, no se sabe si se ha enviado algo o no.

if (isset($_POST['procesador'])) { //* Si existe 
    $micro = (int) $_POST['procesador']; //? como almacena numero enteros el value del formulario (1,2,3,4), le tenemos que hacer un casteo a int. 
    
}

$dep = "";

if (isset($_POST['deportes'])){
    $dep = $_POST['deportes'];
}

/*if (!empty($dep)) { // si la variable no esta vacia
    $cantidadDeportes = count($dep); // devuelve cuantos check ha seleecionado el usuario.
}*/




echo "El nombre del usuario es <span class='cadena'>$nombre</span> , el email es <span class='cadena'>$email</span> y la contraseña es: <span class='cadena'>$passwd</span> y la provincia es <span class='cadena'>$prov</span> y el procesador que ha elegido es <span class='cadena'>$micro</span> y los deportes que ha seleccionado son: $cantidadDeportes";



//! VALIDACIONES

//* El nombre tiene que tener al menos 5 caracteres , si tiene menos nos mostrara un error

if (strlen($nombre) < 5) { //todo strlen calcula el numero de caracteres que tiene la variable nombre
    echo "<p style='color: red; font-size: 20px;'>El nombre tiene menos de 5 caracteres</p>";
}


//? Validacion para el correo

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //! Si el correo que introduce el usuario, no concuerda con el filtro del email, salta el error
    echo "<p style='color: red; font-size: 20px;'>direccion de email incorrecta!!!</p>"; //? esto esta bien por si el usuario nos cambia el tipo de input
}

//? Validacion para la contraseña 
//* La contraseña debe dar un error si tiene menos de 6 caracteres

if (strlen($passwd) < 6 ){ // todo strlen calcula el numero de caracteres que tiene la variable passwd, si la cadena que almacena passwd es menor a 6  muestra el siguiente mensaje de error: 
    echo "<br><br><span style ='color:red; font-size: 20px;'>La contraseña tiene menos de 6 caracteres</span>";
}

//? Validacion para los option de las provincias
//* Mostrar un error si el usuario indica una provincia que no este en el array.
//? en $prov se almacena el valor que selecciona el usuario en el formulario 
//? en $provincias se almacena los valores que hay almacenados en el array.
// todo por lo tanto el funcionamiento del else if es el siguiente: Si el valor de provincia que ha seleccionado el usuario en el formulario ($prov) NO esta almacenado o definido en el array ($provincias) muestra el error.

if ($prov == "Opcion predefinida (sin valor)"){ 
    echo "<p style ='color:red; font-size: 20px;'>Has seleccionado la opción por defecto para las provincias</p>";
} else if (!in_array($prov, $provincias)){
    echo "<p style ='color:red; font-size: 20px;'>La provincia que has seleccionado no esta entre las opciones, estas haciendo cosas con el inspctor que no debes 😈</p>";
}

//? Validacion para los procesadores
//* Mostrar un error si el numero no esta entre 1 y 4 o cuando la variable almacene 0 (ya que la hemos inicializado a 0)

if ($micro < 1 || $micro > 4){ //! si el valor de $micro es menor a 1 o mayor de 4 mostramos un mensaje de error.
    echo "<br><p style='color:red; font-size: 20px'>Opcion Procesador inválida o no seleccion ninguno!!!!</p>";

}

//! preguntar a paco.

if (is_array($dep)){
    foreach ($dep as $value) { //? Accede al array de deportes y almacena los valores (1,2,3,4)
        if ($value < 1 || $value > 4){ //? hacemos el rango de valores que es desde 1 hasta el 4 
            echo "<br><p style='color:red; font-size: 20px' >Opción Deporte incorrecto!!!!!!</p>";
        }
    }
} else { //! si no entra en el if, es porque no ha seleccionado nada y muestra el siguiente mensaje
    echo "<br><p style='color:red; font-size: 20px'>Opción Deporte no seleccionado!!!!!!</p>"; 
};

//terminado

























//! Ejemplos de como se podrian hacer las validaciones de los radiobutton y checkbox con arrays

/**$micro = isset($_POST['procesador']) ? (int)$_POST['procesador'] : 0; // Valor por defecto si no se selecciona ninguno.

$procesadoresValidos = [1, 2, 3, 4];

if (!in_array($micro, $procesadoresValidos)) {
    echo "<br><p style='color:red; font-size: 20px'>Opción de procesador inválida o no se seleccionó ninguna.</p>";
}
 */


 /*$deportesSeleccionados = isset($_POST['deportes']) ? $_POST['deportes'] : [];

$deportesValidos = ['1', '2', '3', '4']; // valores value del formulario

/**
 * ? nos metemos en el array de deportes y almacenamos los deportes que ha seleccionado el usuario en $deportes
 * * Hacemos una condicion, si el valor que ha seleccionado el ususario en el formulario ($deporte) NO esta definida en el array de values del formulario ($deporteValidos), mandamos el error.
 */

/*foreach ($deportesSeleccionados as $valuedep) {
    if (!in_array($valuedep, $deportesValidos)) {
        echo "<br><p style='color:red; font-size: 20px'>Deporte inválido seleccionado.</p>";
        break; // Puedes detener la validación después de encontrar un deporte inválido si lo deseas.
    }
}*/

// Resto de la lógica para procesar los deportes seleccionados si todos son válidos.
 






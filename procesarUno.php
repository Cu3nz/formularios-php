<?php

$prov = [
    'Almeria',
    'Cadiz',
    'Cordoba',
    'Huelva',
    'Granada',
    'Jaen',
    'Malaga'
];


//! trim quita los espacios en blanco de delante y detras
//* cualquier input que se pase por teclado me van a llegar por el formulario, aunque no se marque nada 
$nombre =trim($_POST['nombre']); // defino entre 'el name que he puesto en el input' donde se almacena el nombre 
$email = trim($_POST['email']); // Defino entre 'el name que he puesto en el input' donde se va a almacenar el correo
$password = trim($_POST['password']);
//? los campos de tipo select me va a llegar el primer option que tenga definido, tenemos que comprobar
$provincia = trim($provincia['provincias']);
//! con los checksboks hay que hacer una comprobacion, para saber si hemos elegido una opcion o no, porque sin la comprobacion al no seleccionar nada no define procesador

// si no selecciono nada no me llega al post algo, tenemos que hacer una comprobacion con el isset antes de coger el valor por el post y ya despues controlarlo, la inicializamos a 0 para poder controlar el radiobutton

$micro = 0; //! Para que salte un error en el if, porque el rango es entre 1 y 4 por lo tanto si almacena 0 saltara el error

if (isset($_POST['procesador'])){
    $micro = (int) $_POST['procesador']; // opciones 1,2,3,4 las que estan en el value
}
$dep = "";
if (isset($_POST['deporte'])){
    $dep = $_POST['deporte'];
}

//var_dump($_POST);
//die;



echo "El nombre es $nombre y el email es: $email";

 echo "<br>";

// echo var_dump($_POST);

// echo "<hr>";

// echo var_dump($_REQUEST)

//! cuando no meto ningun dato en un input lo envia en blanco, pero en el caso del nombre el tipo de dato es un string

//var_dump($nombre);

// nombre del archivo php_xdbug.dll 

/**
 * *srtlen calcula la longitud de la cadena 
 */

if (strlen($nombre) < 5){ //! si el tamaño de la cadena del nombre es <5 que me sale el siguiente mensaje de error
    echo "Error el nombre tiene que tener 5 caracteres";
    //die; // Detiene toda la ejecucion php de la pagina, si entra en este if
}

// todo Validacion para el correo con la funcion filter_var

if (!filter_var($email , FILTER_VALIDATE_EMAIL)){ //! si no se cumple el filtrado del correo muestro el siguiente mensaje
    
    echo "<br>Correo incorrecto, estoy enfadado!!!!";
    
} 

if (strlen($password) < 5){ //! si el tamaño de la cadena del nombre es <5 que me sale el siguiente mensaje de error
    echo "Error el password tiene menos de 5 caracteres ";
    die; // Detiene toda la ejecucion php de la pagina, si entra en este if
}

if (in_array($prov, $provincias)){ //! mirar en casa no me sale
     echo "<br> error la provincia No es correcta o no elegiste nose";
}

// if ($provincia == -1){
//     echo "<br> error la provincia No es correcta o no elegiste nose";
// }

if ($micro < 1 || $micro > 4){
    echo "Error, el micro invalida o no selecciono ninguno ";
}

//! 

if (is_array($dep)){ //* si es un array tengo que hacer una validacion
    //? si estoy aqui es porque me han llegado cosas por el checkboks del formulario
    foreach ($dep as  $item) {
        if ($item < 1 || $item > 4){
            echo "Opcion de deporte incorrecto!!!!!!!";
            break;
        }
    }
} else { //! si no no es un array me muestra este mensaje
    echo "Opcion deporte no se ha seleccionado";
}



?> 
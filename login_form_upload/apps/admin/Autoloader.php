<?php
// function my_autoloader($class) {
//     include 'classes/' . $class . '.class.php';
// }

// spl_autoload_register('my_autoloader');

// // Or, using an anonymous function as of PHP 5.3.0
// spl_autoload_register(function ($class) {
//     include 'classes/' . $class . '.class.php';
// });

// class Autoloader
// {
//     public static function register()
//     {
//         spl_autoload_register(function ($class) {
//             $file = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
//             if (file_exists($file)) {
//                 require $file;
//                 return true;
//             }
//             return false;
//         });
//     }
// }
// Autoloader::register();
?>
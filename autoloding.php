<?php
spl_autoload_register(function ($class) {

    $prefix = 'OOP2\\';
    
    $base_dir = __DIR__ . '/';

    // kanxofo wax klass kaybda b hadak ssmiya b $prefix = 'OOP2\\';
    $len = strlen($prefix);

    // bhalila kanhad lih  mnin bda par exemple hna radi ibda mn OOP2\ kayhsab 5 caracteres au kaybda ihat hna relative_class 
    $relative_class = substr($class, $len);
    
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
<?php
    // App root, används för att inkludera filer som ligger i app mappen
    define("APPROOT", dirname(dirname(__FILE__)));

    // Url Root  används i views
    define("URLROOT", "http://localhost/MVC-Lir/public");

    define("URLROOT2", "http://localhost/MVC-Lir/public/index.php?url=");

    define("URLROOT3", "http://localhost/MVC-Lir/public/index.php?url=posts/index");

    define("URLROOT4", "http://localhost/MVC-Lir/public/index.php?url=posts/add");
    define("URLROOT5", "http://localhost/MVC-Lir/public/index.php?url=admins/index");

    define("URLROOT6", "http://localhost/MVC-Lir/public/index.php?url=admins/delete/");

    // Sidans namn
    define("SITENAME", "Legend");

    define("DB_HOST", "localhost");

    define("DB_NAME", "mvc");
    
    define("DB_USER", "root");
    
    define("DB_PASS", "");
?>
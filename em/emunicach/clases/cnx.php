<?php
/*
 * sdsn
 *
 * MySQL     > "mysql:host=hostname;dbname=mysql"
 * PosgreSQL > "pgsql:dbname=pdo;host=localhost"
 * SQLite    > "sqlite:/path/to/database.sdb" , username = null , password = null.
 *             "sqlite::memory"
 *
 * 'options' => array(PDO::ATTR_PERSISTENT => true , PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
 */
return array(
    'db' => array(
        'dsn' => 'mysql:host=localhost;dbname=ittg_sia',
        'username' => 'sia_root',
        'password' => 'sia_password',
        'prefix' => null,
        'collation' => 'utf8',
        'options' => array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)
    	),
    'dummy' => null,
    'otro' => 'aqui valor de la configuración'
	);
?>
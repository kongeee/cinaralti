<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$DBname = "cengelkoycinaralti";

$DBconn = new mysqli($serverName, $userName, $password, $DBname);

if($DBconn->connect_error){
    die("Connection failed" . $DBconn->connect_error);
}



$sql = "CREATE TABLE IF NOT EXISTS admins(
            admin_id INTEGER AUTO_INCREMENT,
            name VARCHAR(50) NOT NULL,
            password VARCHAR(100) NOT NULL,
            PRIMARY KEY(admin_id)
)";
if(!$DBconn->query($sql) === TRUE){
    echo "(admins)table is not created";
}



$sql = "CREATE TABLE IF NOT EXISTS categories(
            category_id INTEGER AUTO_INCREMENT,
            category_name VARCHAR(64) NOT NULL,
            PRIMARY KEY(category_id)
)";
if(!$DBconn->query($sql) === TRUE){
    echo "(categories)table is not created";
}



$sql = "CREATE TABLE IF NOT EXISTS products(
            product_id INTEGER AUTO_INCREMENT,
            category_id INTEGER NOT NULL,
            product_name VARCHAR(64) NOT NULL,
            detail TEXT NOT NULL,
            price FLOAT NOT NULL,
            PRIMARY KEY(product_id),
            FOREIGN KEY (category_id) REFERENCES categories(category_id) ON DELETE CASCADE ON UPDATE CASCADE
)";
if(!$DBconn->query($sql) === TRUE){
    echo "(products)table is not created";
}



$sql = "CREATE TABLE IF NOT EXISTS menus(
            menu_id INTEGER AUTO_INCREMENT,
            menu_name VARCHAR(64) NOT NULL,
            PRIMARY KEY(menu_id)
)";
if(!$DBconn->query($sql) === TRUE){
    echo "(menus)table is not created";
}



$sql = "CREATE TABLE IF NOT EXISTS menu_details(
    detail_id INTEGER AUTO_INCREMENT,
    menu_id INTEGER NOT NULL,
    category_id INTEGER NOT NULL,
    PRIMARY KEY(detail_id),
    FOREIGN KEY (menu_id) REFERENCES menus(menu_id),
    FOREIGN KEY (category_id) REFERENCES categories(category_id)
)";
if(!$DBconn->query($sql) === TRUE){
echo "(menu_details)table is not created";
}




$sql = "CREATE TABLE IF NOT EXISTS image_types(
            type_id INTEGER AUTO_INCREMENT,
            type_name VARCHAR(32) NOT NULL,
            PRIMARY KEY(type_id)
)";
if(!$DBconn->query($sql) === TRUE){
    echo "(image_types)table is not created";
}



$sql = "CREATE TABLE IF NOT EXISTS images(
            image_id INTEGER AUTO_INCREMENT,
            type_id INTEGER NOT NULL,
            image_name VARCHAR(64) NOT NULL,
            image_path VARCHAR(128) NOT NULL,
            PRIMARY KEY(image_id),
            FOREIGN KEY (type_id) REFERENCES image_types(type_id) ON UPDATE CASCADE
)";
if(!$DBconn->query($sql) === TRUE){
    echo "(images)table is not created";
}




$sql = "CREATE TABLE IF NOT EXISTS text_types(
            type_id INTEGER AUTO_INCREMENT,
            type_name VARCHAR(32) NOT NULL,
            PRIMARY KEY(type_id)
)";
if(!$DBconn->query($sql) === TRUE){
    echo "(text_types)table is not created";
}



$sql = "CREATE TABLE IF NOT EXISTS texts(
            text_id INTEGER AUTO_INCREMENT,
            type_id INTEGER NOT NULL,
            icon_id INTEGER,
            title VARCHAR(32) NOT NULL,
            content TEXT NOT NULL,
            PRIMARY KEY(text_id),
            FOREIGN KEY(type_id) REFERENCES text_types(type_id) ON DELETE CASCADE ON UPDATE CASCADE,
            FOREIGN KEY(icon_id) REFERENCES images(image_id)
          
)";
if(!$DBconn->query($sql) === TRUE){
    echo "(texts)table is not created";
}


$sql = "CREATE TABLE IF NOT EXISTS messages(
    message_id INTEGER AUTO_INCREMENT,
    message_status VARCHAR(32) NOT NULL,
    name VARCHAR(64) NOT NULL,
    e_mail VARCHAR(64) NOT NULL,
    ip VARCHAR(64) NOT NULL,
    message TEXT NOT NULL,
    PRIMARY KEY(message_id)
)";
if(!$DBconn->query($sql) === TRUE){
echo "(messages)table is not created";
}

?>
<?php

    // You can use a Json file to give the content

    /*
    function get_posts()
    {
        $postJson = file_get_contents('example/example.json');
        $posts = json_decode($postJson, true);

        return $posts;
    }

    function save_post($posts)
    {
        $json = json_encode($posts, JSON_PRETTY_PRINT);
        file_put_contents('../Utils/example.json', $json);
    }
    */

    function get_connection()
    {
        // Configure your database in config.php
        $config = require __DIR__."\..\config.php";

        $pdo = new PDO(
            $config['database_dsn'],
            $config['database_user'],
            $config['database_pass']
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    function search_posts($limit)
    {
        $pdo = get_connection();

        $query = 'SELECT * FROM postagens';
        if($limit) {
            $query = $query.' LIMIT :resultLimit';
        }
        $stmt = $pdo->prepare($query);
        $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $posts = $stmt->fetchAll();

        return $posts;
    }

    function create_posts($title, $description, $tag)
    {
        $pdo = get_connection();

        $query = "INSERT INTO postagens (title, description, tag) VALUES ('$title', '$description', '$tag')";
        $stmt = $pdo->prepare($query);
        $stmt->execute();
    }
?>
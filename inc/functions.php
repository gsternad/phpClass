<?php

function getDatabaseConnection()
{
    $username = 'root';
    $password = '';
    $db = 'newbase';
    $host = 'localhost';
    $con = "mysql:host=$host; 
            dbname=$db";
    $pdo = new PDO($con, $username, $password);
    return $pdo;
}
function allPosts()
{
    $pdo = getDatabaseConnection();
    $query = 'SELECT * FROM posts
              LEFT JOIN image ON image.id = posts.image
              LEFT JOIN users ON users.id = posts.author';
    $statement = $pdo->query($query);
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    $displayPosts = structurePostsArray($posts);
    return $displayPosts;
}

function structurePostsArray($postsFromDB)
{
    $posts = [];
    $i = 1;
    foreach($postsFromDB as $post)
    {
        $posts[$i] = [
            "title" => $post["title"],
            "content" => $post["content"],
            "image" => [
                "url" => $post["url"],
                "alt" => $post["alt"],
            ],
            "authored on" => $post["created"],
            "authored by" => $post["name"] . " " . $post["surname"],
        ];
        $i++;
    }
    return $posts;
}

/*
function getPost($id)
{
    $posts = allPosts();
    if(!is_numeric($id) || !in_array($id, array_keys($posts)))
    {
        return false;
    }
    return $posts[$id];
}
*/

function getPost($id)
{
    if(!is_numeric($id))
    {
        return false;
    }
    $pdo = getDatabaseConnection();
    $sql = 'SELECT * FROM posts
            INNER JOIN image ON image.id = posts.image
            INNER JOIN users ON users.id = posts.author
            WHERE posts.id = :id';
    $query = $pdo->prepare($sql);
    $query->execute([
        'id' => $id,
    ]);
    $posts = $query->fetchAll(PDO::FETCH_ASSOC);
    $displayPosts = structurePostsArray($posts);
    return $displayPosts[$id];
}

function getData($name = "Janez",
                 $surname = "Novak",
                 $date = "1.1.1970")
{
    return $name . " " . $surname . " " . $date;
}
<?php
    $fruits = ["Apple", "Orange", "Lemon", "Banana", "Kiwi"];
    $i = 1;
    foreach($fruits as $fruit)
    {
        echo $i++ . ": " . $fruit . "<br>";
    }

    echo "<p></p>";
    sort($fruits);
    $i = 1;
    foreach ($fruits as $fruit)
    {
        echo $i++ . ": " . $fruit . "<br>";
    }

    $i = 1;
    echo "<p></p>";
    foreach($fruits as $fruit)
    {
        /*
        if($fruit[0] == 'A' ||
           $fruit[0] == 'E' ||
           $fruit[0] == 'I' ||
           $fruit[0] == 'O' ||
           $fruit[0] == 'U')
        */
        if(in_array($fruit[0], ['A', 'E', 'I', 'O', 'U']))
        {
            echo $i++ . ": " . $fruit . "<br>";
        }
    }

    $associativeArray =
    [
        "Banana" => 33,
        "Orange" => 7,
        "Kiwi" => 13,
        "Apple" => 6,
        "Lemon" => 17
    ];
    echo "<p></p>";
    foreach($associativeArray as $item => $item_value)
    {
        echo $item . " " . $item_value . "<br>";
    }
    // arsort($associativeArray);
    /*
    $arr = array_keys($associativeArray);
    echo $arr[0];
    */
    echo "<p></p>";
    echo key($associativeArray);

    $max = 0;
    $item = " ";
    foreach($associativeArray as $item => $value)
    {
        if($value > $max)
        {
            $max = $value;
            $name = $item;
        }
    }
    echo "<p></p>";
    echo $max;

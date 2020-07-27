<?php

    require_once(__DIR__."/database.php");
    require_once(__DIR__."/functions.php");

    if(isset($_POST["shorten-btn"]))
    {
        //getting the post value of url from textfield and saving to url variable
        $url = filter_var($_POST["url"], FILTER_VALIDATE_URL);
        
        //connecting to database
        $conn_obj = db_connect();

        //selecting all rows from the table urls
        $select_all_query = "SELECT * FROM urls;";
        $select_all_result = select_query($conn_obj, $select_all_query);
        
        //generate random alphanumeric string length of 6 which doesn't match with the links in db
        do{
            $rand_str = generate_rand_str();
        }while (in_array_r("link", $rand_str, $select_all_result) === TRUE);

        //save current datetime in timestamp format
        $datetime = time();
        
        #insert into db after generating the random string for $url
        $insert_result = insert_query($conn_obj, $values="'$rand_str', '$url', '$datetime'");
        
        $shortened_url_value = shortened_url_msg($rand_str, $url);

    }


?>
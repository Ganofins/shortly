<?php

    if(isset($_GET["redirect"]))
    {
        require_once(__DIR__."/../src/database.php");

        //saving the redirect query param value without html chars
        $short_code = htmlspecialchars($_GET["redirect"]);
        
        //connecting to database
        $conn_obj = db_connect();

        //selecting code from the table urls
        $select_code_query = "SELECT * FROM urls WHERE link='$short_code' LIMIT 1;";
        $select_code_result = select_query($conn_obj, $select_code_query);

       if($select_code_result !== null)
       {            
            header("location: ".$select_code_result[0]["redirect_to"]);
       }
       else
       {
            header("location: ../index.php");   
       }
    }
    else
    {
        header("location: ../index.php");
    }

?>
<?php

    require_once(__DIR__."/../env.php");

    function db_connect()
    {
        global $DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT;
        $conn_obj = mysqli_connect($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME);
        
        // Check connection
        if (!$conn_obj)
        {
            return mysqli_connect_error();
        }
        return $conn_obj;
    }


    function db_disconnect($conn_obj)
    {
        mysqli_close($conn_obj);
    }

    /*
        select_query function
    */
    function select_query($conn_obj, $query)
    {
        $result_array = array();
        $result = mysqli_query($conn_obj, $query);

        if(mysqli_num_rows($result) <= 0)
        {
            return null;
        }

        while($row = mysqli_fetch_assoc($result))
        {
            array_push($result_array, $row);
        }
        return $result_array;
    }

    /*
        insert_query function
    */
    function insert_query($conn_obj, $values, $table_name="`urls`", $columns="`link`, `redirect_to`, `created_at`")
    {
        $result = mysqli_query($conn_obj, "INSERT INTO $table_name ($columns) VALUES ($values);");

        if($result === FALSE || $result === NULL)
        {
            return mysqli_error($conn_obj);
        }
        return TRUE;
    }

?>
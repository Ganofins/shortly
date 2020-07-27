<?php

    require_once(__DIR__."/../env.php");

    /**
     *   Function to check in associative array whether the needle exists or not
    */
    function in_array_r($arr_key, $needle='', $haystack=array())
    {
        foreach ($haystack as $item)
        {
            if ($item[$arr_key] === $needle)
            {
                return true;
            }
        }
        return false;
    }

    /**
     *   Function to generate a random string by shuffling the chars and lowercase alphabets
    */
    function generate_rand_str($str_len = 6)
    {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $random_string = substr(str_shuffle($permitted_chars), 0, $str_len);
        return $random_string;
    }

    /**
     * Function to print the shortened url with it's orginial url
    */
    function shortened_url_msg($short_url, $original_url)
    {
        global $APP_URL;
        return "<span>Shortlink for <a href=$original_url>$original_url</a> has been created <a href=$APP_URL/s/$short_url>$short_url</a></span>";
    }

?>
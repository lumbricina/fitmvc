<?php

Class User
{
    function login($POST)
    {
        $DB = new Database();

        $_SESSION['error'] = "";
        if(isset($POST['username']) && isset ($POST['username']))
        {
            $arr['username'] = $POST['username'];
            $arr['password'] = $POST['password'];
            $query = "SELECT * from user where username = :username && password = :password limit 1";
            $data = $DB->read($query,$arr);

            if(is_array($data))
            {
                //logged in
                $_SESSION['user_id'] = $data[0]->id;
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;
            }else{
                $_SESSION['error'] = "wrong username or password";
            }
        }else{
            $_SESSION['error'] = "please enter a valid username and password";
        }
    }

    function check_logged_in()
    {
        if(isset($_SESSION['user_url']))
        {
            $arr['user_url'] = $_SESSION['user_url'];
            $query = "SELECT * from user where url_address = :user_url limit 1";
            $data = $DB->read($query,$arr);

            if(is_array($data))
            {
                //logged in
                $_SESSION['user_id'] = $data[0]->id;
                $_SESSION['user_name'] = $data[0]->username;
                $_SESSION['user_url'] = $data[0]->url_address;

                return true;
            }
        }

        return false;
    }
}
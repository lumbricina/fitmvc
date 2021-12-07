<?php

Class Login extends Controller
{
    function index()
    {
        $data['page_title'] = "Login";
        $this->view("fit/login", $data);
    }

    
}
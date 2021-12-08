<?php

Class Logout extends Controller
{
    function index()
    {
        $data['page_title'] = "Logout";
        $this->view("fit/logout", $data);
    }

    
}
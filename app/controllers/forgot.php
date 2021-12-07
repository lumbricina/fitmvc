<?php

Class Forgot extends Controller
{
    function index()
    {
        $data['page_title'] = "Forgot Password";
        $this->view("fit/forgot", $data);
    }

    
}
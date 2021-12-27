<?php

Class AddUser extends Controller
{
    function index()
    {
        $data['page_title'] = "adduser";
        $this->view("fit/adduser", $data);
    }

    
}
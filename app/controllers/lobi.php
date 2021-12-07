<?php

Class Lobi extends Controller
{
    function index()
    {
        $data['page_title'] = "Lobi";
        $this->view("fit/lobi", $data);
    }

    
}
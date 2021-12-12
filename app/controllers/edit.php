<?php

Class InLobi extends Controller
{
    function index()
    {
        $data['page_title'] = "edit";
        $this->view("fit/edit", $data);
    }

    
}
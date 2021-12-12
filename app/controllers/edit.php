<?php

Class edit extends Controller
{
    function index()
    {
        $data['page_title'] = "edit";
        $this->view("fit/edit", $data);
    }

    
}
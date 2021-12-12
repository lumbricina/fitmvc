<?php

Class Revisi extends Controller
{
    function index()
    {
        $data['page_title'] = "revisi";
        $this->view("fit/revisi", $data);
    }

    
}
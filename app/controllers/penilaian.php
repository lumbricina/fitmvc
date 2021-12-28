<?php

Class Penilaian extends Controller
{
    function index()
    {
        $data['page_title'] = "Penilaian";
        $this->view("fit/penilaian", $data);
    }

    
}
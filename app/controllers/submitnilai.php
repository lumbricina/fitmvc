<?php

Class SubmitNilai extends Controller
{
    function index()
    {
        $data['page_title'] = "submitnilai";
        $this->view("fit/submitnilai", $data);
    }

    
}
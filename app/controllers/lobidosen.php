<?php

Class LobiDosen extends Controller
{
    function index()
    {
        $data['page_title'] = "LobiDosen";
        $this->view("fit/lobidosen", $data);
    }

    
}
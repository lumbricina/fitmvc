<?php

Class Setujui extends Controller
{
    function index()
    {
        $data['page_title'] = "setujui";
        $this->view("fit/setujui", $data);
    }

    
}
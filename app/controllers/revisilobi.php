<?php

Class RevisiLobi extends Controller
{
    function index()
    {
        $data['page_title'] = "revisilobi";
        $this->view("fit/revisilobi", $data);
    }

    
}
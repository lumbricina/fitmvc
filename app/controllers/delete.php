<?php

Class delete extends Controller
{
    function index()
    {
        $data['page_title'] = "delete";
        $this->view("fit/delete", $data);
    }

    
}
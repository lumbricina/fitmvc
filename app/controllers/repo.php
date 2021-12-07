<?php

Class Repo extends Controller
{
    function index()
    {
        $data['page_title'] = "Repo";
        $this->view("fit/repo", $data);
    }

    
}
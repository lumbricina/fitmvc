<?php

Class Tawarkan extends Controller
{
    function index()
    {
        $data['page_title'] = "tawarkan";
        $this->view("fit/tawarkan",$data);
        
        
    }

    
}
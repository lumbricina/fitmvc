<?php

Class Uppropo extends Controller
{
    function index()
    {
        $data['page_title'] = "Uppropo";
        $this->view("fit/uppropo",$data);
        
        
    }

    
}
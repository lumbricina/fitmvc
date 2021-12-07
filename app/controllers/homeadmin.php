<?php

Class HomeAdmin extends Controller
{
    function index()
    {
        $data['page_title'] = "HomeAdmin";
        $this->view("fit/homeadmin",$data);
        
        
    }

    
}
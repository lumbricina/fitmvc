<?php

Class HomeDosen extends Controller
{
    function index()
    {
        $data['page_title'] = "HomeDosen";
        $this->view("fit/homedosen",$data);
        
        
    }

    
}
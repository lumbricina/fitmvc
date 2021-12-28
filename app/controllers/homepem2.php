<?php

Class HomePem2 extends Controller
{
    function index()
    {
        $data['page_title'] = "HomePem2";
        $this->view("fit/homepem2",$data);
        
        
    }

    
}
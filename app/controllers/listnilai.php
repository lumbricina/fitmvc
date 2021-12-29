<?php

Class ListNilai extends Controller
{
    function index()
    {
        $data['page_title'] = "ListNilai";
        $this->view("fit/listnilai",$data);
        
        
    }

    
}
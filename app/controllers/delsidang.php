<?php

Class delsidang extends Controller
{
    function index()
    {
        $data['page_title'] = "delsidang";
        $this->view("fit/delsidang", $data);
    }

    
}
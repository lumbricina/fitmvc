<?php

Class InLobi extends Controller
{
    function index()
    {
        $data['page_title'] = "inlobi";
        $this->view("fit/inlobi", $data);
    }

    
}
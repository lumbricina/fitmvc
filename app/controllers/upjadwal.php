<?php

Class UpJadwal extends Controller
{
    function index()
    {
        $data['page_title'] = "upjadwal";
        $this->view("fit/upjadwal", $data);
    }

    
}
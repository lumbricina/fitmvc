<?php

Class JadwalSidang extends Controller
{
    function index()
    {
        $data['page_title'] = "JadwalSidang";
        $this->view("fit/jadwalsidang", $data);
    }

    
}
<?php

Class Pengajuan extends Controller
{
    function index()
    {
        $data['page_title'] = "Pengajuan";
        $this->view("fit/pengajuan", $data);
    }

    
}
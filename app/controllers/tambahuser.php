<?php

Class TambahUser extends Controller
{
    function index()
    {
        $data['page_title'] = "Tambah User";
        $this->view("fit/tambahuser", $data);
    }

    
}
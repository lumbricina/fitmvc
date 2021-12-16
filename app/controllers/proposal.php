<?php

Class Proposal extends Controller
{
    function index()
    {
        $data['page_title'] = "proposal";
        $this->view("fit/proposal",$data);
        
        
    }


}
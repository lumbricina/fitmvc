<?php

Class SetujuiLobi extends Controller
{
    function index()
    {
        $data['page_title'] = "setujuilobi";
        $this->view("fit/setujuilobi", $data);
    }

    
}
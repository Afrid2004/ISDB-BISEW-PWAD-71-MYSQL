<?php

class CompanyController{
    function index(){
        $data = Company::showCompany();
    }
}
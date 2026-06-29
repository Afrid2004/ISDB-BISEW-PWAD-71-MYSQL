<?php


class CountryController{
    function index(){
        $data = Country::showCountry();
        view("", "data");
    }
}
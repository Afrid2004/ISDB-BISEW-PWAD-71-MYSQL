<?php

class CompanyController
{
    function index()
    {
        $data = Company::showCompany();
        view("", compact("data"));
    }

    function create()
    {
        view('');
    }

    function save()
    {
        if (isset($_POST['btn_submit'])) {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $road = $_POST["road"];
            $phone = $_POST["phone"];
            $district_id = $_POST["district"];
            $country_id = $_POST["country"];
            $company = new Company();
            $company->set($name, $email, $country_id, $road, $phone, $district_id);
            $company->createCompany();
            redirect();
        }
    }
}

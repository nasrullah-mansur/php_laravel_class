<?php

class FormSubmit 
{

    public $db = '';
    public $user;

    public function db_connect () {
       $db = mysqli_connect('localhost', 'root', '', 'users');
       $this->db = $db;

       return $this;
    }

    public function formDataSerialize() {
        // echo '<pre>';
        // // print_r($_SERVER);
        // print_r($_POST);
        // // print_r($_GET);
        // echo '</pre>';

        $this->user = $_POST;

        return $this;
    }

    public function db_store() {
        $full_name = $this->user['full_name'];
        $username = $this->user['username'];
        $email = $this->user['email'];
        $phone = $this->user['phone'];

        $query = "INSERT INTO user_info(full_name, username, email, phone)";
        $query .= "VALUES('$full_name', '$username', '$email', '$phone')";


        $submit = mysqli_query($this->db, $query);

        if($submit) {
            header('Location: http://localhost/test/');
        } 

        else {
            exit();
        }


    }
}


$run = new FormSubmit();

$run->db_connect()->formDataSerialize()->db_store();


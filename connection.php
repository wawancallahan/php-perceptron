<?php 

$connection = mysqli_connect('localhost', 'root', '', 'perceptron');

if ( ! $connection) {
    echo mysqli_connect_error();
    die();
}
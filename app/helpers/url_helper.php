<?php
// This file is full of useful function we can use
    // Simple page redirect
    function redirect($page){
        header('location: ' . URLROOT . '/' . $page);
    }
<?php
require_once 'models/User.php';

// gets POST value or returns an empty string instead
function post($name) {
  return isset($_POST[$name]) ? $_POST[$name] : '';
}

function currentUser() {
  return isset($_SESSION['user']) ? User::get(['name' => $_SESSION['user']]) : null;
}

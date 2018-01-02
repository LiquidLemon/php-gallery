<?php
require_once '../models/User.php';
require_once '../views/LayoutView.php';
require_once '../views/RedirectView.php';

class UserController {
  public function signup() {
    return new LayoutView('signupform');
  }

  public function add() {
    $valid = true;

    $name = post('name');
    if ($name == '') {
      $valid = false;
      Flash::error("Name can't be empty");
    }

    $email = post('email');
    if ($email == '') {
      $valid = false;
      Flash::error("Email can't be empty");
    }

    $password = post('password');
    if ($password == '') {
      $valid = false;
      Flash::error("Password can't be empty");
    }

    $password_r = post('password_r');
    if ($password_r != $password) {
      $valid = false;
      Flash::error("Passwords have to be the same");
    }

    $user = User::get(['name' => $name]);
    if ($user) {
      $valid = false;
      Flash::error("That name is already taken");
    }

    if ($valid) {
      $user = new User($name, $email, password_hash($password, PASSWORD_DEFAULT));
      $user->save();
      Flash::info("You can now log in");
      return new RedirectView('/login', 303);
    } else {
      return new RedirectView('/signup', 303);
    }
  }
}

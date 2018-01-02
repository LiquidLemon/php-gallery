<?php

// gets POST value or returns an empty string instead
function post($name) {
  return isset($_POST[$name]) ? $_POST[$name] : '';
}

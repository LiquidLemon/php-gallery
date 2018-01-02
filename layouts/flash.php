<?php
foreach (Flash::get() as $class => $flash) {
  foreach ($flash as $msg) {
    echo "<div class=\"{$class}\">{$msg}</div>";
  }
}

<?php 

function redirect($url) {
  return header('Location: ' . URLROOT . '/' . $url);
}
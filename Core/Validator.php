<?php

class Validator
{

    public function string($value){
       $value = trim($value);
       return strlen($value) > 0;
    } 
    
function isValidEmail($email) {
  // 1. Basic check for empty string
  if (empty($email)) {
    return false;
  }

  // 2. Use filter_var for basic sanitization and format validation
  $sanitizedEmail = filter_var($email, FILTER_SANITIZE_EMAIL);
  if (!filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {
    return false;
  }

  // 3. Additional validation with regular expression (optional)
  // This step is optional but can provide stricter validation
  // You can adjust the regular expression pattern based on your needs
  $emailPattern = "/^[^\s@]+@[^\s@]+\.[^\s@]+$/";
  if (!preg_match($emailPattern, $sanitizedEmail)) {
    return false;
  }

  // Email is valid
  return true;
}

}

<?php
declare(strict_types=1);

function is_input_empty(string $usrname, string $pwd, string $email)
{
  if (empty($usrname) || empty($pwd) || empty($email)) {
    return true;

  } else {
    return false;
  }
}

function is_email_invalid(string $email)
{
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return true;

  } else {
    return false;
  }
}

function is_username_taken(object $pdo, string $username)
{
  if (get_username($pdo, $username)) {
    return true;

  } else {
    return false;
  }
}

function is_email_registred(object $pdo, string $email)
{
  if (get_email($pdo, $email)) {
    return true;

  } else {
    return false;
  }
}

function create_users(object $pdo, string $pwd, string $username, string $email, string $birthday, string $surname)
{
  return set_users($pdo, $pwd, $username, $email, $birthday, $surname);
}
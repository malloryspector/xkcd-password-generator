<?php
// Create an array of random words
$words = array("notice", "yarn", "want", "second", "cat", "impolite", "pump", "playground", "blue", "box", "day", "produce", "table", "sheet", "apparatus", "protect", "late", "house", "lumpy", "wooden", "banana", "balloon", "dog", "index", "receipt", "proposal", "dear", "faint", "song", "big", "impact", "crowd", "silk", "poem", "define", "budget", "cow", "chicken", "crime", "stock", "arrival", "high", "portrait", "police", "afford");

// Create an array of random symbols
$symbols = array("!", "@", "#", "$", "%", "?", "&", "*");

// Validation
$errorMessage = "";
if (isset($_POST["number_of_words"])) {
  if (!is_numeric($_POST["number_of_words"]) && $_POST["number_of_words"] != "") {
    $errorMessage = "Please enter a valid number to generate a password";
    $password = "";
    return false;
  } else {
    $errorMessage = "";
  }
}

// Default word total
$word_total = 4;

/*
First check to see if a variable is set for "number_of_words" in $_POST
Set the number of words for each password to the variable $word_total
If a value is entered by the user, set word total to that number
If no value is entered default to 4
*/
if (isset($_POST["number_of_words"])) {
  if ($_POST["number_of_words"] != null) {
    $word_total = $_POST["number_of_words"];
  } else {
    $word_total = 4;
  }
}

// Create an array of chosen words
$password_words = array();

/*
Generate password based on the value of $word_total
Get a random word and set that random word into our chosen words array
*/
for ($i = 0; $i < $word_total; $i++) {
  $rand_word = $words[rand(0, count($words)-1)];
  $password_words[$i] = $rand_word;
}

/*
Add number at the end of a random word if checked
*/
if (isset($_POST["add_number"])) {
  $num_qty = $_POST["additional_numbers"];
  for ($i = 1; $i <= $num_qty; $i++) {
    $add_number = rand(1, 9);
    $num_place = rand(0, count($password_words)-1);
    $password_words[$num_place] = $password_words[$num_place] . $add_number;
  }
}

/*
Add symbol at the end of a random word if checked
*/
if (isset($_POST["add_symbol"])) {
  $sym_qty = $_POST["additional_symbols"];
  for ($i = 1; $i <= $sym_qty; $i++) {
    $add_symbol = $symbols[rand(0, count($symbols)-1)];
    $sym_place = rand(0, count($password_words)-1);
    $password_words[$sym_place] = $password_words[$sym_place] . $add_symbol;
  }
}

/*
Join array elements with "-" string to get final password
*/
$password = implode("-", $password_words);

<?php
// Create an array of random words
$words = array("notice", "yarn", "want", "second", "cat", "impolite", "pump", "playground", "blue", "box", "day", "produce", "table", "sheet", "apparatus", "protect", "late", "house", "lumpy", "wooden");

// Default word total
$word_total = 4;

/*
First check to see if an array key is available to use in $_POST array
Set the number of words for each password to the variable $word_total
If a value is entered by the user, set word total to that number
If no value is entered default to 4
*/
if (array_key_exists("number_of_words", $_POST)) {
  if ($_POST["number_of_words"] != null) {
    $word_total = $_POST["number_of_words"];
  } else {
    $word_total = 4;
  }
}

// Create an array of chosen words
$password_words = array();

// Generate password based on the value of $word_total
for ($i = 0; $i < $word_total; $i++) {
  // Get a random word
  $rand_word = $words[rand(0, count($words)-1)];
  // Place our random word into our chosen word array
  $password_words[$i] = $rand_word;
}

// Join array elements with "-" string to get final password
$password = implode ("-", $password_words);

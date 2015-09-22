<?php
/**
 * Create an array of random words
 */
$words = array("notice", "yarn", "want", "second", "cat", "impolite", "pump", "playground", "blue", "box", "day", "produce", "table", "sheet", "apparatus", "protect", "late", "house", "lumpy", "wooden", "banana", "balloon", "dog", "index", "receipt", "proposal", "dear", "faint", "song", "big", "impact", "crowd", "silk", "poem", "define", "budget", "cow", "chicken", "crime", "stock", "arrival", "high", "portrait", "police", "afford");

/**
 * Create an array of random symbols
 */
$symbols = array("!", "@", "#", "$", "%", "?", "&", "*");

/**
 * Validation for $_Post["number_of_words"] field
 *
 * Check to see if a value is set by the user
 *
 * If the value entered is not numeric and not empty
 * set the error message $errorMessage to appear and
 * set $password to be blank so none appears
 */
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

/**
 * Default word total if non is set
 */
$word_total = 4;

/**
 * Check to see if a variable is set for $_POST["number_of_words"]
 *
 * Based on if a variable is set or not and is not null, set the value
 * to either the number the user entered, or default to 4
 */
if (isset($_POST["number_of_words"])) {
  if ($_POST["number_of_words"] != null) {
    $word_total = $_POST["number_of_words"];
  } else {
    $word_total = 4;
  }
}

/**
 * Create an empty array to store the words that will be used
 * to create the password
 */
$password_words = array();

/**
 * Generate a password based on the value of $word_total (how many words to use)
 *
 * Get a random word, set it to $rand_word
 *
 * Set random word $rand_word into our chosen words array $password_words
 */
for ($i = 0; $i < $word_total; $i++) {
  $rand_word = $words[rand(0, count($words)-1)];
  $password_words[$i] = $rand_word;
}

/**
 * Add number(s) at the end of a random word if checked
 *
 * For the quantity of numbers specified $num_qty, grab a random number
 * from 1 to 9, randomly choose a word from the $password_words array
 * and concatenate the number at the end of the word
 */
if (isset($_POST["add_number"])) {
  $num_qty = $_POST["additional_numbers"];
  for ($i = 1; $i <= $num_qty; $i++) {
    $add_number = rand(1, 9);
    $num_place = rand(0, count($password_words)-1);
    $password_words[$num_place] = $password_words[$num_place] . $add_number;
  }
}

/**
 * Add symbol(s) at the end of a random word if checked
 *
 * For the quantity of symbols specified $sym_qty, grab a random symbol
 * from the $symbols array, randomly choose a word from the $password_words
 * array and concatenate the symbol at the end of the word
 */
if (isset($_POST["add_symbol"])) {
  $sym_qty = $_POST["additional_symbols"];
  for ($i = 1; $i <= $sym_qty; $i++) {
    $add_symbol = $symbols[rand(0, count($symbols)-1)];
    $sym_place = rand(0, count($password_words)-1);
    $password_words[$sym_place] = $password_words[$sym_place] . $add_symbol;
  }
}

/**
 * Set the default separator $separator to hyphen
 */
$separator = "-";

/**
 * Change the separator $separator match chosen value
 */
if (isset($_POST["separator"]) && $_POST["separator"] == 1) {
  $separator = "-";
} elseif (isset($_POST["separator"]) && $_POST["separator"] == 2) {
  $separator = " ";
} elseif (isset($_POST["separator"]) && $_POST["separator"] == 3) {
  $separator = "";
} elseif (isset($_POST["separator"]) && $_POST["separator"] == 4) {
  $separator = ".";
}

/**
 * Add chosen or default separator $separator between array of chosen words
 */
$password = implode($separator, $password_words);

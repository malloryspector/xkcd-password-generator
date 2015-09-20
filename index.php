<?php
error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set('display_errors', 1); # Display errors on page (instead of a log file)
?>

<!DOCTYPE html>
<html>
  <head>
    <title>xkcd Style Password Generator</title>
    <meta charset="utf-8" />
    <?php require 'logic.php'; ?>
  </head>

  <body>
    <h1>xkcd Style Password Generator</h1>
    
    <?php echo $password; ?>

    <form method='POST' action='index.php'>

      <input type='text' name='number_of_words'>
      <label for="number_of_words">Number of words</label><br>
      <input type='checkbox' name='add_number'>
      <label for='add_number'>Add a number</label><br>
      <input type='checkbox' name='add_symbol'>
      <label for="add_symbol">Add a symbol</label><br>
      <input type='submit' value='Generate My Password!'>

    </form>


  </body>
</html>

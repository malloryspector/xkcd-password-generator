<?php
error_reporting(E_ALL);       # Report Errors, Warnings, and Notices
ini_set("display_errors", 1); # Display errors on page (instead of a log file)
?>

<!DOCTYPE html>
<html>
  <head>
    <title>xkcd Style Password Generator</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <?php require "logic.php"; ?>
  </head>

  <body>
    <div class="container">
      <h1>xkcd Style Password Generator</h1>

      <div class="password">
        <?php echo $password; ?>
      </div>

      <form method="POST" action="index.php">

        <input type="text" name="number_of_words" maxlength="1" value="<?php if (isset($_POST["number_of_words"])) { echo $_POST["number_of_words"]; } ?>">
        <label for="number_of_words">Number of words (Max 9)</label><br>
        <input type="checkbox" name="add_number" <?php if (isset($_POST["add_number"])) { echo "checked='checked'"; } ?> >
        <label for="add_number">Add a number</label>
        <select name="additional_numbers">
          <option value="1" <?php if (isset($_POST["additional_numbers"]) && $_POST["additional_numbers"] == 1) { echo "selected='true'"; } ?>>1</option>
          <option value="2" <?php if (isset($_POST["additional_numbers"]) && $_POST["additional_numbers"] == 2) { echo "selected='true'"; } ?>>2</option>
          <option value="3" <?php if (isset($_POST["additional_numbers"]) && $_POST["additional_numbers"] == 3) { echo "selected='true'"; } ?>>3</option>
          <option value="4" <?php if (isset($_POST["additional_numbers"]) && $_POST["additional_numbers"] == 4) { echo "selected='true'"; } ?>>4</option>
          <option value="5" <?php if (isset($_POST["additional_numbers"]) && $_POST["additional_numbers"] == 5) { echo "selected='true'"; } ?>>5</option>
        </select><br>
        <input type="checkbox" name="add_symbol" <?php if (isset($_POST["add_symbol"])) { echo "checked='checked'"; } ?> >
        <label for="add_symbol">Add a symbol</label>
        <select name="additional_symbols">
          <option value="1" <?php if (isset($_POST["additional_symbols"]) && $_POST["additional_symbols"] == 1) { echo "selected='true'"; } ?>>1</option>
          <option value="2" <?php if (isset($_POST["additional_symbols"]) && $_POST["additional_symbols"] == 2) { echo "selected='true'"; } ?>>2</option>
          <option value="3" <?php if (isset($_POST["additional_symbols"]) && $_POST["additional_symbols"] == 3) { echo "selected='true'"; } ?>>3</option>
          <option value="4" <?php if (isset($_POST["additional_symbols"]) && $_POST["additional_symbols"] == 4) { echo "selected='true'"; } ?>>4</option>
          <option value="5" <?php if (isset($_POST["additional_symbols"]) && $_POST["additional_symbols"] == 5) { echo "selected='true'"; } ?>>5</option>
        </select><br>
        <input type="submit" value="Generate My Password!">

      </form>
    </div>
  </body>
</html>

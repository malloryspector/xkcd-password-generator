<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
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
    <div id="header">
      <h1>xkcd Style Password Generator</h1>
      <p>Use this application inspired by the <a href="http://xkcd.com/936/">xkcd password strength comic</a> to generate a random password phrase based on the criteria you choose below! According to the strip, this style of password created with phrases is difficult to guess but easier to remember then generating a string of random numbers and letters.</p>
    </div>
    <!-- Password Block -->
    <div class="container">
      <div class="password">
        <h2><?php echo $password; ?></h2>
      </div>
    </div>
    <div class="divider"></div>
    <!-- Form Block -->
    <div class="container">
      <form method="POST" action="index.php">
        <h3>Word Count</h3>
        <label for="number_of_words">Number of words (Max 9)</label><br>
        <p id="error"><?php echo $errorMessage; ?></p>
        <input type="text" name="number_of_words" class="textfield" maxlength="1" value="<?php if (isset($_POST["number_of_words"])) { echo $_POST["number_of_words"]; } ?>">

        <!-- Number Option Section -->
        <h3>Numbers</h3>
        <input type="checkbox" name="add_number" class="checkbox" <?php if (isset($_POST["add_number"])) { echo "checked='checked'"; } ?> >
        <label for="add_number">Add a number</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="additional_numbers" class="dropdown">
          <option value="1" <?php if (isset($_POST["additional_numbers"]) && $_POST["additional_numbers"] == 1) { echo "selected='true'"; } ?>>1</option>
          <option value="2" <?php if (isset($_POST["additional_numbers"]) && $_POST["additional_numbers"] == 2) { echo "selected='true'"; } ?>>2</option>
          <option value"3" <?php if (isset($_POST["additional_numbers"]) && $_POST["additional_numbers"] == 3) { echo "selected='true'"; } ?>>3</option>
          <option value="4" <?php if (isset($_POST["additional_numbers"]) && $_POST["additional_numbers"] == 4) { echo "selected='true'"; } ?>>4</option>
          <option value="5" <?php if (isset($_POST["additional_numbers"]) && $_POST["additional_numbers"] == 5) { echo "selected='true'"; } ?>>5</option>
        </select>
        <label for="additional_numbers">number(s) total</label><br>
        <!-- Symbol Option Section -->
        <h3>Symbols</h3>
        <input type="checkbox" name="add_symbol" class="checkbox" <?php if (isset($_POST["add_symbol"])) { echo "checked='checked'"; } ?> >
        <label for="add_symbol">Add a symbol</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <select name="additional_symbols" class="dropdown">
          <option value="1" <?php if (isset($_POST["additional_symbols"]) && $_POST["additional_symbols"] == 1) { echo "selected='true'"; } ?>>1</option>
          <option value="2" <?php if (isset($_POST["additional_symbols"]) && $_POST["additional_symbols"] == 2) { echo "selected='true'"; } ?>>2</option>
          <option value="3" <?php if (isset($_POST["additional_symbols"]) && $_POST["additional_symbols"] == 3) { echo "selected='true'"; } ?>>3</option>
          <option value="4" <?php if (isset($_POST["additional_symbols"]) && $_POST["additional_symbols"] == 4) { echo "selected='true'"; } ?>>4</option>
          <option value="5" <?php if (isset($_POST["additional_symbols"]) && $_POST["additional_symbols"] == 5) { echo "selected='true'"; } ?>>5</option>
        </select>
        <label for="additional_symbols">symbol(s) total</label><br>
        <input type="submit" class="button" value="Generate Password!">

      </form>
    </div>
  </body>
</html>

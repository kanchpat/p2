<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="P2 Homework for DWA15">
    <title>Password Generator </title>
    <link rel="stylesheet" href="css/styleforpwdgen.css">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
    <?php require 'logic.php';?>
</head>

<body>

<div id="layout">
  <h1> xkcd Password Generator </h1>
    <p class="linkinfo">
     <a href="http://xkcd.com/936/">xkcd Website</a>
    </p>
</div>

<form method='POST' action='index.php'>
		Enter Number of words <input type='text' name='noOfWords'>(Maximum 9)<br>
        <input type="hidden" name="includeNumber" value="0" />
        <input type="hidden" name="includeSymbol" value="0" />
        <input type="hidden" name="mixedCases" value="0" />
        <input type="hidden" name="allUpper" value="0" />
        <input type="hidden" name="allLower" value="0" />
        Do you like to include Number <input type='checkbox' name='includeNumber' value="1"><br>
		Do you like to include Symbol <input type='checkbox' name='includeSymbol' value="1"><br>
        Do you need mix of cases <input type="checkbox" name="mixedCases" value="1"><br>
        Do you need all upper case <input type="checkbox" name="allUpper" value="1"><br>
        Do you need all lower case <input type="checkbox" name="allLower" value="1"><br>
    	<input type='submit' class="button" value='Generate word!'>
</form>
<h3>
    <div class="pwdgen">

    <?php
    if (empty($winnerWord))
            echo $validatedResult;
    else
    {?>
            <?=$winnerWord;?>
    <?php }?>
    </div>
</h3>
<img src="http://imgs.xkcd.com/comics/password_strength.png" alt="xcd password generator">

</body>
</html>

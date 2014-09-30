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
        xkcd password generator is a web comic created by Randall Munroe.
        The main goal of this generator is to create passwords which are easy to remember and tough for computers to guess<br>
     <a href="http://xkcd.com/936/">xkcd Website</a>
    </p>
</div>

<form method='POST' action='index.php'>
		Enter Number of words <input type='text' name='noOfWords'>(Maximum 9)<br>
        <input type="hidden" name="includeNumber" value="0" />
        <input type="hidden" name="includeSymbol" value="0" />
        Do you like to include Number <input type='checkbox' name='includeNumber' value="1"><br>
		Do you like to include Symbol <input type='checkbox' name='includeSymbol' value="1"><br>
        Mixed Cases <input type="radio" name="cases" value="mixedCases">
        Upper Case <input type="radio" name="cases" value="allUpper">
        Lower Case <input type="radio" name="cases" value="allLower" checked="checked"><br>
    	<input type='submit' class="button" value='Generate word!'>
</form>
<h3 class='<?=$class;?>'>
    <?php
    if (empty($winnerWord))
            echo "ERROR:". $validatedResult;
    else
    {?>
            <?=$winnerWord;?>
    <?php }?>
</h3>
<img src="http://imgs.xkcd.com/comics/password_strength.png" alt="xcd password generator">

<p>
    <a href="http://jigsaw.w3.org/css-validator/validator?uri=p2.kanch.me&amp;profile=css3&amp;usermedium=all&amp;warning=1&amp;vextwarning=&amp;lang=en">
    Validate CSS
    </a>
    <br>
    <a href="http://validator.w3.org/check?uri=http%3A%2F%2Fp2.kanch.me%2F">
      Validate HTML
    </a>

</p>

</body>
</html>

<?php require 'wordbank.php';?>
<?php
if (!empty($_POST))
{
    $noOfWords = intVal($_POST["noOfWords"]);
    $includeNumber = $_POST["includeNumber"];
    $includeSymbol = $_POST["includeSymbol"];
    $mixedCases = $_POST["mixedCases"];
    $allUpper = $_POST["allUpper"];
    $allLower = $_POST["allLower"];
    $validatedResult =validateInputEntry($noOfWords,$mixedCases,$allUpper,$allLower);
    if (!empty($validatedResult))
        $class="errgen";
}
else
{
    $noOfWords=4;
    $includeSymbol = 0;
    $mixedCases = 0;
    $includeNumber = 0;
    $allUpper = 0;
    $allLower =0;
}
if (empty($validatedResult))
{
    $words = gatherWords($noOfWords,$wordList);
    $winnerWord= shuffleWord($words,$includeNumber,$includeSymbol,$mixedCases,$allLower,$allUpper);
    $class="pwdgen";
}

function validateInputEntry($noOfWords,$mixedCases,$allUpper,$allLower){
  if (! is_integer($noOfWords))
      return "Not number";
  elseif ($noOfWords > 9)
      return "Restrict number of words";
  elseif ($noOfWords == 0 or $noOfWords < 0)
      return "Please recheck number of words is 0 or less than 0";
  elseif ($allUpper and $allLower and $mixedCases)
      return "All case options selected. Select one";
  elseif ($allLower and $mixedCases)
      return "Lower case and Mixed case options selected";
  elseif ($allUpper and $mixedCases)
      return "Upper case and Mixed case options selected";
  elseif ($allUpper and $allLower)
      return "Lower case and Upper case options selected";
}

function gatherWords($noOfWords,$wordList){
    $words=$wordList[rand(0,count($wordList)-1)];
    for($i=1;$i<$noOfWords;$i++)
        $words=$words.'-'.$wordList[rand(0,count($wordList)-1)];
    return $words;
}

function shuffleWord($words,$num,$sym,$mix,$lower,$upper){
    $Symbols = array('$','#','@','!','%','^','&','*');
    if ($num)
        $numValue=rand(100,200);
    else
        $numValue='';
    if ($sym)
        $symValue=$Symbols[rand(0,7)];
    else
        $symValue='';
    $finalWord = $words.$numValue.$symValue;
    if($lower)
        $finalWord=strtolower($finalWord);
    if($upper)
        $finalWord=strtoupper($finalWord);
    if ($mix)
    {
        $parts = explode('-', $finalWord);
        $parts = array_map('ucfirst', $parts);
        $finalWord = lcfirst(implode('-', $parts));
    }
    return $finalWord;
}
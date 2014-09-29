<?php
// modify state
$libxml_previous_state = libxml_use_internal_errors(true);
$wordList = array();
$count =0;
$wordFile="wordbank.txt";
if(!file_exists($wordFile))
{
    if(filesize($wordFile)>0)
    {
    for($page=01;$page<15;$page++)
    {
    $page_start =str_pad($page,2,'0',STR_PAD_LEFT);
    $page_end = str_pad(++$page,2,'0',STR_PAD_LEFT);
    $url='words-'.$page_start.'-'.$page_end.'-hundred.html';
    $url='http://www.paulnoll.com/Books/Clear-English/'.$url;
    $file = file_get_contents($url);
    $doc = new DOMDocument();
    $doc->loadHTML($file);
    $divs = $doc->getElementsByTagName('li');
    if ( count($divs ) ) {
        foreach ( $divs as $div ) {
            $wordList[$count] = $div->nodeValue;
            file_put_contents ( $wordFile , $wordList[$count], FILE_APPEND );
            $count++;
        }
     }
    }
    }
}

if (count($wordList)==0){
    $lines=array();
    $fp=fopen($wordFile, 'r');
    while (!feof($fp))
    {
        $line=fgets($fp);
        //process line however you like
        $line=trim($line);
        if(!empty($line))
        {       //add to array
        $wordList[]=$line;
        }
    }
    fclose($fp);
}
// handle errors
libxml_clear_errors();
// restore
libxml_use_internal_errors($libxml_previous_state);
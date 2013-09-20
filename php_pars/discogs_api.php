<?php
  
class DiscogsApi {

  public $searchWordsArray;
  public $resultsSearchArray;

  function __construct(){
     $this->searchWordsArray = array();
     $this->resultsSearchArray = array();
  }

  function parser($str){

    $this->getSearchWordsArray($str);

    $parsQuery = $this->translationStrGaps($str);

    $get = json_decode(file_get_contents("http://api.discogs.com/database/search?q=$parsQuery"));

    echo"<pre>";print_r($get); echo"</pre>";
    //exit();
    
    $this->extractDataSearchGet($get);
    

    echo"<pre>";print_r($this->resultsSearchArray);echo"</pre>";
  }

  function getSearchWordsArray($str){
    $this->searchWordsArray = explode(" ", $str);
  }

  function translationStrGaps($str){
    return str_replace(" ", "+", $str);
  }

  function extractDataSearchGet($get){
    foreach ($get->results as $value) {
      $this->resultsSearchArray[$value->title] = array(
        'count' => $this->countOccurringWords(explode(" ", $value->title)),
        'resource_url' => $value->resource_url,
        'id' => $value->id
      );
    }
  }

  function countOccurringWords($value){
    return count(array_intersect($this->searchWordsArray, $value));
  }

}

$str = "Ken Ishii Innerelements";

$obj = new DiscogsApi();
$obj->parser($str);
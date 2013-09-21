<?php
  
class DiscogsApiParserTracklist {

  public $searchWordsArray;
  public $resultsSearchArray;
  public $counterTrackList;
  public $performer;

  function __construct(){
     $this->searchWordsArray = array();
     $this->resultsSearchArray = array();
     $this->counterTrackList;
     $this->performer = "";
  }

  function parserTracklist($str){
    $this->getSearchWordsArray($str);

    $parsQuery = $this->translationStrGaps($str);

    $get = json_decode(file_get_contents("http://api.discogs.com/database/search?q=$parsQuery"));
    
    $this->extractDataSearchGet($get);

    $urlNextTrackList = $this->urlTracklistExtract();

    $NextTrackList = json_decode(file_get_contents($urlNextTrackList));

    return $NextTrackList->tracklist;
  }

  function getSearchWordsArray($str){
    $this->searchWordsArray = explode(" ", $str);
  }

  function translationStrGaps($str){
    return str_replace(" ", "+", $str);
  }

  function extractDataSearchGet($get){
    $this->resultsSearchArray = array();
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

  function setCounterTrackList(){
    $this->counterTrackList = 0;
  }

  function urlTracklistExtract(){
    $urlNextTrackList;
    $this->counterTrackList = 0;
    foreach ($this->resultsSearchArray as $key => $value) {
      if($value['count'] > $this->counterTrackList){
        $this->performer = $key;
        $this->counterTrackList = $value['count'];
        $urlNextTrackList = $value['resource_url'];
      }
    }

    return $urlNextTrackList;
  }

}

class nextTrack extends DiscogsApiParserTracklist {
  public $fiersTrack;
  public $nextTrackPlayList;
  public $arrayPlayList;

  function __construct($fiersTrack){
    $this->fiersTrack = $fiersTrack;
    $this->nextTrackPlayList = "";
    $this->arrayPlayList = array();
  }

  function secondTrack(){
    $track = (count($this->arrayPlayList) == 0) ? $this->fiersTrack : $this->nextTrackPlayList;

    echo $track."<br />";

    $this->draftingPlayList($track);
  }

  function draftingPlayList($track){
    $arrayTrackList = $this->parserTracklist($track);

    array_push($this->arrayPlayList,$this->performer);


    if(count($this->arrayPlayList) <= 2){
      $currentTrackPlayList = $this->extractCurrentTrack($this->performer);

      $this->nextTrackPlayList = $this->extractNextTrack($arrayTrackList, $currentTrackPlayList);

      return $this->secondTrack();
    }

    echo "<pre>"; print_r($this->arrayPlayList); echo "</pre>";
  }

  function extractCurrentTrack($previousTrack){
    $previousTrackArray = explode("-", $previousTrack);
    return trim($previousTrackArray[count($previousTrackArray)-1]);
  }

  function extractNextTrack($arrayTrackList, $currentTrackPlayList){
    $currentPosition = -1;

    foreach ($arrayTrackList as $value) {
      if( $value->title == $currentTrackPlayList ){
        $currentPosition = $value->position;
      }

      if( $currentPosition+1 == $value->position ){
        $currentNextTrack = explode(" ", $value->title);
        return $currentNextTrack[0] . " " . $currentNextTrack[1];
      }
    }
  }
}



$fiersTrack = "Kala";

$obj = new nextTrack($fiersTrack);
$obj->secondTrack();









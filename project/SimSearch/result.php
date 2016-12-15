<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title>類語検索</title>
  </head>
  <body>
    類似単語 : 類似度<br>
    <hr>
    <?php
       $word =  htmlspecialchars($_POST["lang"], ENT_QUOTES);
       $source =  $_POST["source"];

       $mongo = new Mongo("localhost:27017");
       $db = $mongo->selectDB("project");
    $col = $db->selectCollection( $source );
    $query = array("w1"=>$word);
    $cursor = $col->find($query);
    
    while ( $cursor->hasNext() )
    {
    $result = $cursor->getNext();
    echo $result["w2"]." : ".$result["num"]."<br>";
    }
    ?>

  </body>
</html>
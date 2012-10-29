<?php $article_id=$_GET["id"] ?>

<?php $pagetype="article"; ?>

<?php $path = $_SERVER['DOCUMENT_ROOT'];$path .= "/includes/functions.php";include_once($path); ?>

<?php includeheader(); ?>

<?php
$mysql_query = mysql_query("SELECT * 
  FROM articles
  INNER JOIN authors ON articles.author_id = authors.author_id
  INNER JOIN photographers ON articles.photographer_id = photographers.photographer_id
  INNER JOIN issues ON articles.issue_id = issues.issue_id
  WHERE article_id = $article_id
  ");
?>

<?php
  while ($rows = mysql_fetch_array($mysql_query)):

  $article = $rows["article"];
  $author = $rows["author"];
  $author_id = $rows["author_id"];
  $pubdate = $rows["pubdate"];
  $image_id = $rows["image_id"];
  $photographer_id = $rows["photographer_id"];
  $id = $rows["article_id"];

  $file = $_SERVER['DOCUMENT_ROOT'] . "/articles/$id.txt";
  $fulltext = file_get_contents($file);

  if ($image == "") {
    $imagetd = "";
  } else {
    $imagetd = "<img src=\"/img/$image_id.jpg\">";
  }
    
  echo("
  <article>
     <header>
      <h1>$article</h1>
      <p class=\"byline\">By <a href=\"/author.php?id=$author_id\" class=\"author\">$author</a> - <date class=\"date\">$pubdate</date></p>

    </header>
    $fulltext
  </article>");
  
  endwhile;
?>

<?php includefooter(); ?>
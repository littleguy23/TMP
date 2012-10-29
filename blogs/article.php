<?php $blogarticle_id=$_GET["id"] ?>

<?php $pagetype="blogarticle"; ?>

<?php $path = $_SERVER['DOCUMENT_ROOT'];$path .= "/includes/functions.php";include_once($path); ?>

<?php includeheader(); ?>

<?php
$mysql_query = mysql_query("SELECT * 
  FROM blogarticles
  INNER JOIN authors ON blogarticles.author_id = authors.author_id
  INNER JOIN blogs ON blogarticles.blog_id = blogs.blog_id
  INNER JOIN photographers ON blogarticles.photographer_id = photographers.photographer_id
  WHERE blogarticle_id = $blogarticle_id
  ");
?>

<?php
  while ($rows = mysql_fetch_array($mysql_query)):

  $blogarticle = $rows["blogarticle"];
  $author = $rows["author"];
  $author_id = $rows["author_id"];
  $pubdate = $rows["pubdate"];
  $image_id = $rows["image_id"];
  $blog_id = $rows["blog_id"];
  $blog = $rows["blog"];
  $photographer_id = $rows["photographer_id"];
  $id = $rows["blogarticle_id"];

  $file = $_SERVER['DOCUMENT_ROOT'] . "/blogs/articles/$id.txt";
  $fulltext = file_get_contents($file);

  if ($image == "") {
    $imagetd = "";
  } else {
    $imagetd = "<img src=\"/img/$image.jpg\">";
  }
?>

<?php    
  echo("
  <article>
     <header>
      <h1>$blogarticle</h1>
      <p class=\"byline\">By <a href=\"/author.php?id=$author_id\" class=\"author\">$author</a> - <date class=\"date\">$pubdate</date></p>
      $imagetd
    </header>
    $fulltext
  </article>");
  
  endwhile;
?>

<?php includefooter(); ?>
<?php

function connectDB() {
  // Connect to the Server
  $connect = mysql_connect("localhost","root","root") or die("Unable to connect to database");
  // Connect to the Database
  mysql_select_db("tmp")  or die("Unable to select database");
}

function includeheader() {
  $path = $_SERVER['DOCUMENT_ROOT'];$path .= "/includes/header.php";include_once($path);
}

function includefooter() {
  $path = $_SERVER['DOCUMENT_ROOT'];$path .= "/includes/footer.php";include_once($path);
}

function pagetitle() {
  global $pagetype;
  if ($pagetype == "home") {
      echo ": Home";
  } elseif ($pagetype == "blogs") {
      echo ": Blogs";
  } elseif ($pagetype == "article") {
      echo ": Article";
  } else {
      echo "";
  }
}

function bodyclass() {
  global $pagetype;
  if ($pagetype == "home") {
      echo "home";
  } elseif ($pagetype == "blogs") {
      echo "blogs";
  } else {
      echo "";
  }
}

function extrahead() {
  global $pagetype;
    if ($pagetype == "home") {
      $path = $_SERVER['DOCUMENT_ROOT'];$path .= "/includes/headerincludes/homemainhead.php";include_once($path);
  } else {
    // Meh.
  }
}

function homepage_articles($mysql_query) {
  while ($rows = mysql_fetch_array($mysql_query)):

  $article = $rows["article"];
  $author = $rows["author"];
  $pubdate = $rows["pubdate"];
  $image = $rows["image_id"];
  $id = $rows["article_id"];
  $author_id = $rows["author_id"];
  
  $file = $_SERVER['DOCUMENT_ROOT'] . "/articles/$id.txt";
  $fulltext = file_get_contents($file);
  $excerpt = htmlentities(strip_tags(substr($fulltext, 0, 165))); //removes anchors and other tags from the intro
  
  if ($image == "") {
    $imagetd = "";
  } else {
    $imagetd = "<img src=\"/img/$image.png\">";
  }
    
  echo("
  <article>
     <header>
      <h1><a href=\"/article.php?id=$id\">$article</a></h1>
      <p class=\"byline\">By <a href=\"/author.php?id=$author_id\" class=\"author\">$author</a> - <span class=\"date\">$pubdate</span></p>
      $imagetd
    </header>
    <p>$excerpt... <a href=\"/article.php?id=$id\">Read More</a></p>
  </article>");
  
  endwhile;
}
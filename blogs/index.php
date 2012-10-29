<?php $pagetype="blogs"; ?>

<?php $path = $_SERVER['DOCUMENT_ROOT'];$path .= "/includes/functions.php";include_once($path); ?>

<?php includeheader(); ?>

<h1>The Editors' Blogs</h1>

<?php
$mysql_query = mysql_query("SELECT * 
  FROM blogs
  INNER JOIN authors ON blogs.author_id = authors.author_id
  ");
?>

<?php
  while ($rows = mysql_fetch_array($mysql_query)):

  $blog = $rows["blog"];
  $author = $rows["author"];
  $id = $rows["blog_id"];
  $author_id = $rows["author_id"];
  $blog_desc = $rows["blog_desc"];
    
  echo("
    <h2><a href=\"/blogs/blog.php?id=$id\">$blog</a></h2>
    <h4 class=\"byline subtitle\">Written by <a href=\"/author.php?id=$author_id\" class=\"author\">$author</a></h4>
    <img src=\"/img/blogs/$id.png\" alt=\"$blog\">
    <p>$blog_desc</p>");
  
  endwhile;
?>

<?php includefooter(); ?>
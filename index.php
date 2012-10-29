<?php $pagetype="home"; ?>

<?php $path = $_SERVER['DOCUMENT_ROOT'];$path .= "/includes/functions.php";include_once($path); ?>

<?php includeheader(); ?>

<?php
// Query the database
$news_query = mysql_query("SELECT * 
  FROM articles
  INNER JOIN authors ON articles.author_id = authors.author_id
  INNER JOIN issues ON articles.issue_id = issues.issue_id
  WHERE category_id = 1
  LIMIT 0, 5
  ");
  
$opinion_query = mysql_query("SELECT * 
  FROM articles
  INNER JOIN authors ON articles.author_id = authors.author_id
  INNER JOIN issues ON articles.issue_id = issues.issue_id
  WHERE category_id = 2
  LIMIT 0, 3
  ");
  
$sports_query = mysql_query("SELECT * 
  FROM articles
  INNER JOIN authors ON articles.author_id = authors.author_id
  INNER JOIN issues ON articles.issue_id = issues.issue_id
  WHERE category_id = 3
  LIMIT 0, 3
  ");
  
$arts_query = mysql_query("SELECT * 
  FROM articles
  INNER JOIN authors ON articles.author_id = authors.author_id
  INNER JOIN issues ON articles.issue_id = issues.issue_id
  WHERE category_id = 4
  LIMIT 0, 3
  ");

$blog_query = mysql_query("SELECT * 
  FROM blogs
  INNER JOIN authors ON blogs.author_id = authors.author_id
  ");

?>

<section class="head-widget blogs">
  <h1><a href="/blogs/">Editors' Blogs</a></h1>
  <ul>
    <?php
      while ($rows = mysql_fetch_array($blog_query)):

      $blog = $rows["blog"];
      $author = $rows["author"];
      $id = $rows["blog_id"];
      $author_id = $rows["author_id"];
      $blog_desc = $rows["blog_desc"];
        
      echo("
        <li><img src=\"/img/blogs/$id.png\" alt=\"$blog\">
        <a href=\"/blogs/blog.php?id=$id\" class=\"blogname\">$blog</a>
        <a href=\"/author.php?id=$author_id\" class=\"author\">$author</a></li>
        ");
      
      endwhile;
    ?>
  </ul>
</section>

<section class="main-news-place">

  <section class="articles news"> 
    <header><h1>News</h1></header>
    <?php homepage_articles($news_query) ?>
  </section>

  <div class="news-col">

    <section class="articles opinion">
      <header><h1>Opinion</h1></header>
      <?php homepage_articles($opinion_query) ?>
    </section>
      
    <section class="articles sports">
      <header><h1>Sports</h1></header>
      <?php homepage_articles($sports_query) ?>
    </section>

  </div>

  <div class="fun-col">

    <section class="articles arts">
      <header><h1>Arts &amp; Entertainment</h1></header>
      <?php homepage_articles($arts_query) ?>
    </section>
      
    <section class="other-crap">
      <header><h1>Other Crap Goes Here</h1></header>
    </section>

  </div><!-- class="fun-col" -->

</section><!-- class="main-news-place" -->

<?php includefooter(); ?>
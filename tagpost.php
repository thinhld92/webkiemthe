<?php require('includes/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo htmlspecialchars($_GET['id']);?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

	<div id="wrapper">

		<h1>Blog</h1>
		<p>Posts matching tag: <?php echo htmlspecialchars($_GET['id']);?></p>
		<hr />
		<p><a href="./">Blog Index</a></p>

		<div id='main'>

			<?php	
			try {

                $stmt = $db->prepare('SELECT postID, postTitle, postSlug, postDesc, postDate, postTags FROM blog_posts_seo WHERE postTags like :postTags ORDER BY postID DESC');
                $stmt->execute(array(':postTags' => '%'.$_GET['id'].'%'));
				while($row = $stmt->fetch()){
					
					echo '<div>';
						echo '<h1><a href="'.$row['postSlug'].'.html">'.$row['postTitle'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).' in ';

							$stmt2 = $db->prepare('SELECT catTitle, catSlug FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
							$stmt2->execute(array(':postID' => $row['postID']));

							$catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

							$links = array();
							foreach ($catRow as $cat)
							{
							    $links[] = "<a href='c-".$cat['catSlug']."'>".$cat['catTitle']."</a>";
							}
							echo implode(", ", $links);

						echo '</p>';
                    echo '<p>Tagged as: ';
                    $links = array();
                    $parts = explode(',', $row['postTags']);
                    foreach ($parts as $tag)
                    {
                        $links[] = "<a href='t-".$tag."'>".$tag."</a>";
                    }
                    echo implode(", ", $links);
                    echo '</p>';
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p><a href="'.$row['postSlug'].'.html">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

			?>

		</div>

		<div id='sidebar'>
			<?php require('sidebar.php'); ?>
		</div>

		<div id='clear'></div>

	</div>


</body>
</html>
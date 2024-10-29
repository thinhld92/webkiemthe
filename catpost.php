<?php include_once 'model/head_c.php';?>
<main class="main">
<div class="home__container container">
	<?php include_once 'model/file_felt.php';?> 
    <div class="category__container category-margin">
        <div class="category__content">
            <div class="detail-content">
                <div class="head">
                    <h3><?php echo $row['catTitle']; ?></h3>
                    <p class="breadcrums"><a href="<?php echo $url; ?>">Trang chủ</a> / <span><?php echo $row['catTitle']; ?></span></p>
                </div>
                <div class="body">
                    <div class="nav">
                        <ul>
                            <?php
                            $stmt22 = $db->query('SELECT catTitle, catSlug FROM blog_cats ORDER BY catID DESC LIMIT 4');
                            while($row1 = $stmt22->fetch()){
                                echo '<li><a href="'.$url.'c-'.$row1['catSlug'].'">'.$row1['catTitle'].'</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                    <div class="items">
                        <?php   
                        try {

                            $pages = new Paginator('15','p');

                            $stmt = $db->prepare('SELECT blog_posts_seo.postID FROM blog_posts_seo, blog_post_cats WHERE blog_posts_seo.postID = blog_post_cats.postID AND blog_post_cats.catID = :catID');
                            $stmt->execute(array(':catID' => $row['catID']));

                            $pages->set_total($stmt->rowCount());

                            $stmt = $db->prepare('
                                SELECT 
                                blog_posts_seo.postID, blog_posts_seo.postTitle, blog_posts_seo.postSlug, blog_posts_seo.postCont, blog_posts_seo.postDate,blog_posts_seo.postImage, blog_posts_seo.postTags 
                                FROM 
                                blog_posts_seo,
                                blog_post_cats
                                WHERE
                                blog_posts_seo.postID = blog_post_cats.postID
                                AND blog_post_cats.catID = :catID
                                ORDER BY 
                                postDate DESC
                                '.$pages->get_limit());
                            $stmt->execute(array(':catID' => $row['catID']));
                            while($row = $stmt->fetch()){

                                $stmt2 = $db->prepare('SELECT catTitle, catSlug FROM blog_cats, blog_post_cats WHERE blog_cats.catID = blog_post_cats.catID AND blog_post_cats.postID = :postID');
                                $stmt2->execute(array(':postID' => $row['postID']));

                                $catRow = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                                $links = array();
                                foreach ($catRow as $cat)
                                {
                                    $links = "<div class='item'>
                                    <div class='cover'>
                                    <a href='".$row['postSlug'].".html' target='_blank'>
                                    <img src='static/assets/imgs/logo.png'>
                                    </a>
                                    </div>
                                    <div class='detail'>
                                    <h3>
                                    <a href='".$row['postSlug'].".html' target='_blank'>
                                    <span class='time'>[".date('d/m/y', strtotime($row['postDate']))."]</span> ".$row['postTitle']." </a>
                                    </h3>
                                    <p>".strip_tags(substr($row['postCont'],0,380))."...</p>
                                    </div>
                                    </div>";
                                }
                                echo $links;
                            }
                        } catch(PDOException $e) {
                            echo $e->getMessage();
                        }
                        ?>
                    </div>
                    <div class="paging">
                        <div class="paging-inner">
                            <ul>
                                <?php echo $pages->page_links('c-'.$_GET['id'].'&'); ?> 
                                <!-- <li><a href="/su-kien/1" class="active">&laquo;</a></li>
                                <li class="active"><a href="/su-kien/1" title="Trang 1">1</a></li>
                                <li class=""><a href="/su-kien/2" title="Trang 2">2</a></li>
                                <li class=""><a href="/su-kien/3" title="Trang 3">3</a></li>
                                <li class=""><a href="/su-kien/4" title="Trang 4">4</a></li>
                                <li><a href="/su-kien/15" class="">&raquo;</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
</div>
</main>


<?php include_once 'model/footer.php'; ?>
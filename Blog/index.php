<?php
require('Connection.php');
include ('include_dao.php');
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>Blog Gui Ribeiro</title>
		<meta name="description" content="" />
		<meta name="author" content="Guilherme Santiago" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />

		<!-- Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
		<link rel="shortcut icon" href="/favicon.ico" />
		<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
		<link rel="stylesheet" href="style.css" />
		<link rel="stylesheet" href="js/nivo-slider/nivo-slider.css" type="text/css" media="screen"/>
		<link rel="stylesheet" href="js/nivo-slider/themes/default/default.css" />
		<script src="js/jquery-1.8.3.min.js" type="text/javascript"></script>
		<script src="js/nivo-slider/jquery.nivo.slider.js" type="text/javascript"></script>
		<script src="js/nivo-slider/jquery.nivo.slider.pack.js" type="text/javascript"></script>
		
	</head>

	<body>
            <div id="align_content">
                <div id="floatIcon">
                    <a href="https://www.facebook.com/adriano.zorzi"><img src="images/facebook.png" alt="" /></a>
                    <a href="#"><img src="images/google.png" alt="" /></a>
                    <a href="#"><img src="images/linkedin.png" alt="" /></a>
                    <a href="#"><img src="images/skype.png" alt="" /></a>
                    <a href="#"><img src="images/twitter.png" alt="" /></a>
                    <a href="#"><img src="images/vimeo.png" alt="" /></a>
                </div>
            </div>
            <div class="clear"></div>
		<header>
			<nav>
                            <div id="fundo">
				<div id="menu_Align">
					<ul>
						<li id="menu_Logo"></li>
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Sobre</a></li>
						<li><a href="#">Contato</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<div id="fundo">
                    <div id="align_content">
			<div class="slider-wrapper theme-default">
				<div id="slider" class="nivo-slider">
					<img src="images/cars.png" alt="" title="Aqui vai a legenda da imagem" />
					<img src="images/nemo.png" alt="" />
					<img src="images/slider.png" alt="" />
					<img src="images/toystory.png" alt="" />
					<img src="images/walle.png" alt="" />
				</div>
			</div>
			
			<script type="text/javascript">
$(window).load(function() {
    $('#slider').nivoSlider({
        effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
        slices: 15, // For slice animations
        boxCols: 8, // For box animations
        boxRows: 4, // For box animations
        animSpeed: 500, // Slide transition speed
        pauseTime: 3000, // How long each slide will show
        startSlide: 0, // Set starting Slide (0 index)
        directionNav: true, // Next & Prev navigation
        controlNav: true, // 1,2,3... navigation
        controlNavThumbs: false, // Use thumbnails for Control Nav
        pauseOnHover: true, // Stop animation while hovering
        manualAdvance: false, // Force manual transitions
        prevText: 'Prev', // Prev directionNav text
        nextText: 'Next', // Next directionNav text
        randomStart: false, // Start on a random slide
        beforeChange: function(){}, // Triggers before a slide transition
        afterChange: function(){}, // Triggers after a slide transition
        slideshowEnd: function(){}, // Triggers after all slides have been shown
        lastSlide: function(){}, // Triggers when last slide is shown
        afterLoad: function(){} // Triggers when slider has loaded
    });
});
</script>
	
            <section>
                <?php 
                $result = DAOFactory::getPostsDAO()->queryLimit(2);
                
                foreach ($result as $single){
                    $contentPost = new Post;
                    $contentPost = $single;
                    $idPost = $contentPost->idPosts;
                    $titlePosts = $contentPost->titlePosts;
                    $dataPosts = $contentPost->dataPosts;
                    $categoryPosts = $contentPost->categoryPosts;
                    $imagePosts = $contentPost->imagePosts;
                    $authorPosts = $contentPost->authorPosts;
                    $contentPosts = $contentPost->contentPosts;
                    ?>
                                <article>
                    <img src="images/<?php echo $imagePosts; ?>" alt="" width="140px" height="160px" />
                    <div class="title"><?php echo $titlePosts; ?></div>
                    <div class="content">
                        <?php echo limString($contentPosts, 200); ?>
                        <a href="#">Continue Lendo</a>

                    </div>
                </article>

                <?php
                }
                ?>
            </section>
                    <aside>
                        <div id="newsletter">
                            <form action="functions.php" method="post">
                                <div>
                                    <label for="name">Email</label>
                                    <input type="text" name="email" id="name" value="" tabindex="1" />
                                </div>
                                <div>
                                    <input type="hidden" name="action" value="cadastrar" />
                                    <input type="submit" value="Submit" />
                                </div>
                            </form>
                        </div>
                    </aside>
                    </div>
                </div>
            <footer>
                &copy; Todos os direitos reservados - 2015 - Adriano Zorzi
            </footer>
	</body>
</html>
<?php 
function limString($string, $value, $clean = false){
    if($clean == true){
        $string = strip_tags($string);
    }
    if(strlen($string) <= $value){
        return $string;
    }
    $lim_String = substr($string, 0, $value);
    $last = strrpos($lim_String, ' ');
    return substr($string, 0, $last);
}
?>
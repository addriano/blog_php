<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Blog php</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="js/slide.js"
    </head>
        <header>
            <nav>
                <div id="menu_Align">
                    <ul>
                        <li id="menu_logo"></li>
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Sobre</a></li>
                        <li><a href="#">Contato</a></li>
                    </ul>
                </div>
            </nav>
        </header>
    		<section>
			<div class="slider-wrapper theme-default">
				<div id="slider" class="nivo-slider">
                                    <script type="text/javascript">
                                        function slide1(){
                                        document.getElementById('id').src="image/gostosa5.jpg";
                                        setTimeout("slide2()", 1000)
                                        }
                                         
                                        function slide2(){
                                        document.getElementById('id').src="image/gostosa4.jpg";
                                        setTimeout("slide3()", 1000)
                                        }
                                         
                                        function slide3(){
                                        document.getElementById('id').src="image/gostosa3.jpg";
                                        setTimeout("slide1()", 1000)
                                        }
                                    </script> 
				</div>
			</div>
			
		</section>
    <body onLoad="slide1()">
        <img src="image/gostosa2.jpg" id="id">
    </body>
    		

</html>

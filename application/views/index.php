<!DOCTYPE html>
<html lang="en">
<head>
   <!--meta tags-->
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="portfolio template based on HTML5">
    <meta name="keywords" content="onepage, developer, resume, cv, personal, portfolio, personal resume, clean, modern">
    <meta name="author" content="MouriThemes">   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--template title-->
    <title><?= lang('me')?> - Personal Portfolio</title>   
    
    <base href="<?= base_url()?>" />
    
    <!--favicon-->
    <link rel="apple-touch-icon" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="57x57" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    
    <!--theme fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700&display=swap" rel="stylesheet"> 
    
    <!--bootstrap css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!--elegant icon font-->
    <link rel="stylesheet" href="css/line-icons.min.css">     
    
    <!--font awesome css-->
    <link rel="stylesheet" href="css/font-awesome.min.css">    
    
    <!--owl carousel css-->
    <link rel="stylesheet" href="css/owl.carousel.css">     
    <link rel="stylesheet" href="css/owl.theme.default.css">      
    
    <!--youtube player css-->
    <link rel="stylesheet" href="css/jquery.mb.YTPlayer.min.css">    
    
    <!--magnific popup css-->
    <link rel="stylesheet" href="css/magnific-popup.css">
    
    <!--theme css-->
    <link rel="stylesheet" href="css/style.css">      
    
    <!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZFQFNFMC4K"></script>
<script>
  window.dataLayer = window.dataLayer || []; function gtag(){dataLayer.push(arguments);} gtag('js', new Date());gtag('config', 'G-ZFQFNFMC4K');
</script>
</head>
<body>
    
    <!-- Loader -->
    <div class="loader_bg"><div class="loader"></div></div> 
    
    <!--Start Navbar-->
    <header class="nav-area navbar-fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-menu">
                        <div class="navbar navbar-cus">
                            <div class="navbar-header">
                                <a href="<?= base_url() ?>" class="navbar-brand"><span class="logo"><span>D</span>avydenko Victor</span></a> 
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>   
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>  
                                </button>
                            </div>

                            <div class="navbar-collapse collapse">
                                <nav>
                                    <ul class="nav navbar-nav navbar-right">
                                        <li class="active"><a class="smooth-menu" href="#home"><?= lang('home') ?></a></li>
                                        <li><a class="smooth-menu" href="#about"><?= lang('about') ?></a></li>
                                        <li><a class="smooth-menu" href="#services"><?= lang('services') ?></a></li>
                                        <li><a class="smooth-menu" href="#portfolio"><?= lang('portfolio') ?></a></li> 
                                        <li><a class="smooth-menu" href="#blog"><?= lang('blog') ?></a></li> 
                                        <li><a class="smooth-menu" href="#contact"><?= lang('contact') ?></a></li>
                                        
                                        <li class="dropdown language-selector">
                                            <span style="color:lightcoral;">Language</span>  
                                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-close-others="true">
                                            <img src="images/lang/<?= $this->session->userdata('lng') ?>.png"  style="width:25px"/>
                                          </a>
                                          <ul class="dropdown-menu pull-right" style="min-width: 78px;">
                                            <li>
                                              <a href="<?= base_url() ?>en/">
                                                <img src="images/lang/en.png" style="width:25px"/>
                                                <span>EN</span>
                                              </a>
                                            </li>
                                            <li class="active">
                                              <a href="<?= base_url() ?>ua/">
                                                <img src="images/lang/ua.png" style="width:25px"/>
                                                <span>UA</span>
                                              </a>
                                            </li>
                                            <li>
                                              <a href="<?= base_url() ?>ru/">
                                                <img src="images/lang/ru.png" style="width:25px"/>
                                                <span>RU</span>
                                              </a>
                                            </li>
                                          </ul>
                                        </li>
                                        
                                    </ul>
                                    
                                </nav>
                            
                            </div>
                
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </header>
    <!--End Navbar-->
    
    <!--Starts Home-->
    <div class="banner-area cus-border" id="home">
        <a class="video-bg" data-property="{videoURL:'https://youtu.be/zh_NiHHsgyk',containment:'#home'}"></a>
        <div class="banner-table">
            <div class="banner-table-cell">
                <div class="welcome-text">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12"> 
                                <div class="banner-text"> 
                                    <h1><?= lang('me')?></h1>   
                                    <h2 class="text-affect">Text Effect</h2>    
                                    <p>
                                        <span><a target="_blank" href="https://fb.com/belovedwik"><i class="fa fa-facebook"></i></a></span>
                                        <span><a target="_blank" href="https://www.linkedin.com/in/belovedwik/"><i class="fa fa-linkedin"></i></a></span>
                                        <span><a target="_blank" href="http://t.me/belovedwik"><i class="fa fa-telegram"></i></a></span>
                                        <span><a href="viber://chat?number=0936313718"><i class="fa fa-whatsapp"></i></a></span> 
                                    </p>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Home-->
    
    <!--Start About-->
    <div class="about-area section-padding" id="about">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header">
                        <h2><?= $about->header ?> </h2>
                        <div class="line"></div>
                        <?= $about->short_text ?> 
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6">
                    <div class="about-img">
                        <img src="images/about/about.jpg" alt="">
                    </div> 
                </div>
                <div class="col-md-6 col-xs-12 col-sm-12 col-lg-6"> 
                    <div class="about-text">
                        <h2><?= $about->name ?> </h2>
                        <?= $about->full_text ?>
                        <a href="#portfolio" class="about-btn"><?= lang('myWork')?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End About-->
    
    <!--Starts Services-->
    <div class="services-area section-padding" id="services">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header">
                        <h2><?= $services->header ?></h2>
                        <div class="line"></div> 
                        <?= $services->short_text ?> 
                    </div>
                </div>
            </div>
            <div class="row">
                <?
                foreach($servicesIcons as $record)
                { 
                ?> 
                <div class="col-md-4 col-sm-6">
                    <div class="single-service">
                        <div class="icon-area">
                            <i class="icon <?= $record->short_text ?>"></i> 
                        </div>
                        <h4><?= $record->name?></h4>
                        <p><?= $record->full_text ?></p>
                    </div>
                </div>
                <? } ?>
            </div>
        </div>
    </div>
    <!--End Services-->
    
    <!--Starts Portfolio-->
    <div id="portfolio" class="portfolio-area section-padding"> 
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header">
                        <h2><?= $project->header ?> </h2> 
                        <div class="line"></div> 
                        <?= $project->short_text ?>  
                    </div>
                </div>
            </div>
            <div class="portfolio-content">
				<div class="port-nav">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-xs-12">
								<ul class="port-nav-list">
									<li class="active">
										<a class="img-filter" data-filter="*">All</a>
									</li>
                                    <?
                                    $unic = array();
                                    foreach($projectsImg as $proj)
                                    {
                                        $projTxt = explode(' ', trim($proj->short_text) );
                                        
                                        foreach($projTxt as $proj)
                                        {
                                            if (!in_array( trim($proj), $unic))
                                                $unic[] = $proj;
                                        }
                                      
                                    }
                                    
                                    foreach($unic as $cat)
                                    { ?>
                                    <li>
										<a class="img-filter" data-filter=".<?= $cat ?>"><?= ucfirst($cat) ?></a>
									</li>    
                                    <?
                                    }
                                    ?>
                                  </ul>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row port-items" id="img-filter" style="position: relative; height: 570px;">
                        <?
                        foreach($projectsImg as $proj)
                        {
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 single-port <?= $proj->short_text ?>" >
							<div class="project-item">
								<a class="zoom1" href="images/<?= $proj->image?>"><img alt="portfolio image" src="images/<?= $proj->image?>">
								<div class="overlay">
									<div class="overlay-inner">
										<h4><?= $proj->name ?></h4>
										<p><?= $proj->short_text ?></p>
									</div>
								</div></a>
							</div>
						</div>
                        <?
                        }
                        ?>
					</div>
				</div>
			</div>
        </div>
    </div>    
    <!--End Portfolio-->
    
    <!--Starts Testimonial--> 
    <div class="testimonial-area section-padding">
    <div class="container">
        <div class="row">
                <div class="col-md-12">
                    <div class="section-header">
                        <h2><?= $review->header ?></h2>  
                        <div class="line"></div> 
                        <p><?= $review->short_text ?></p>  
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="client-testimonial-carousel owl-carousel">
                        <? foreach($reviewsList as $review) {?>
                        <div class="single-testimonial-item">
                            <p><?= $review->short_text ?></p> 
                            <div class="img-clint">
                                <img src="images/<?= $review->image ?>" alt="testimonial image"> <!--edit image--> 
                            </div>
                            <h3><?= $review->name ?> <span><?= $review->header?></span></h3>
                        </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End Testimonial-->
    
    <!--Starts Offer-->
    <div class="offer-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="single-offer">
                        <h2><?= $freelance->header ?></h2>
                        <p><?= $freelance->short_text ?></p>
                        <a href="#contact" class="offer-btn"><?= lang('hire') ?></a> 
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <!--Ends Offer-->
    
    <!--Starts Blog-->
    <div class="blog-area section-padding" id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="section-header">
                        <h2><?= $news->header ?></h2>  
                        <div class="line"></div> 
                        <p><?= $news->short_text ?></p>  
                    </div>
                </div> 
            </div>
            <div class="row">
                <? foreach($newsList as $item) {?>
                <div class="col-md-4">
                    <div class="single-blog">
                        <div class="img-area">
                            <img src="images/<?= $item->image?>" alt="">
                        </div>
                        <div class="img-details">
                            <div class="dates">
                                <h4><?= date( "Y-m-d", strtotime( $item->createDT)) ?></h4>
                            </div>
                            <div class="titles">
                                <h3><?= $item->name ?></h3>
                                <p><?= $item->short_text ?></p>
                                <!--a href="#"><i class="fa fa-arrow-right"></i>Read More</a--> 
                            </div>
                        </div>
                    </div>
                </div>
                <? } ?>
            </div>
        </div>
    </div>  
    <!--End Blog-->
    
    <!--Starts Contact-->
    <div class="contact-area section-padding" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12"> 
                    <div class="section-header">
                        <h2><?= $contact->header?></h2>  
                        <div class="line"></div> 
                        <p><?= $contact->short_text?></p>  
                    </div>
                </div> 
            </div>
            <div class="row text-center"> 
                <div class="col-md-8 col-md-offset-2">
                    <form id="contact-form" method="post" action="contact.php">

                    <div class="messages"></div>
                    <!--you can change the message in contact.php file -->

                    <div class="controls">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_name" type="text" name="name" class="form-control" placeholder="<?= lang('yName') ?>" required="required" data-error="Name Required"> 
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_email" type="email" name="email" class="form-control" placeholder="<?= lang('Your') ?> Email" data-error="Email Required">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input id="form_subject" type="text" name="title" class="form-control" placeholder="<?= lang('yTitle') ?>" data-error="Subject Required">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea id="form_message" name="message" class="form-control" placeholder="<?= lang('yMess') ?>" rows="4" required="required" data-error="What do want to know"></textarea>
                                    <div class="help-block with-errors"></div>  
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="btn btn-send custom-button-4"><?= lang('btn_sbm_mess') ?></button>
                            </div>
                        </div>
                    </div>

                </form>
                </div>
            </div>
        </div>
    </div>    
    <!--End Contact-->
    
    <!--Starts Footer-->
    
    <div class="footer-area">
        <div class="container"> 
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
                    <p>© All Right Reserved By <a href="#">belovedwik</a></p>  
                </div>
            </div>
        </div>
    </div>
                    
    <!--End Footer-->        
    
    
    
  
    
    <!--Latest version JQuery-->
    <script src="js/jquery.min.js">
        $(function(){
    $('.selectpicker').selectpicker();
});
        
        </script>
    <script src="js/jquery.min.js"></script>

    <!--Bootstrap js-->
    <script src="js/bootstrap.min.js"></script>

	<!--Magnific popup js-->
	<script src="js/jquery.magnific-popup.js"></script>

	<!--Owl Carousel js-->
	<script src="js/owl.carousel.js"></script>
	
	<!--youtube player js-->
    <script src="js/jquery.mb.YTPlayer.js"></script>  
	
	<!--waypoints js-->
    <script src="js/jquery.waypoints.js"></script>
	
	<!--typed js-->
    <script src="js/typed.js"></script>	  
    
	<!--portfolio filter js-->
	<script src="js/isotope.pkgd.min.js"></script>  

    <!--Validator js-->
    <script src="js/validator.js"></script>

    <!--Contact js-->
    <script src="js/contact.js"></script>

    <!--Main js-->
    <script src="js/main.js"></script>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <base href="<?php echo site_url();  ?>">
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" type="text/css" href="css/mask.css">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link href="css/style1.css" rel='stylesheet' type='text/css' />


</head>
<body>
<span class="openBtn"></span>
<div class="nav">
    <div class="navBg"></div>
    <ul class="navUl">
        <li class="about"><a href="#">ABOUT</a></li>
        <li class="service"><a href="#">SERVICES</a></li>
        <li class="portfolio"><a href="#">PORTFOLIO</a></li>
        <li class="blog"><a href="#">BLOG</a></li>
        <li class="contact"><a href="welcome/contact">CONTACT</a></li>
    </ul>
    <span class="closeBtn"></span>
</div>

<div id="header" style="height: 200px">

</div>

<div class="single">
    <div class="container">
        <div class="singel_right">
            <div class="col-md-8">
                <div class="contact-form">
                    <form method="post" action="welcome/message">
                        <p class="comment-form-author"><label for="author">Your Name:</label>
                            <input type="text" name="username" class="textbox">
                        </p>
                        <p class="comment-form-author"><label for="author">Email:</label>
                            <input type="text" name="email" class="textbox">
                        </p>
                        <p class="comment-form-author"><label for="author">Message:</label>
                            <textarea name="message"></textarea>
                        </p>
                        <input name="submit" type="submit" id="submit" value="Submit">
                    </form>
                </div>
            </div>
            <div class="col-md-4 contact_right">
                <h3>Address</h3>
                <div class="address">
                    <i class="pin_icon"></i>
                    <div class="contact_address">
                        Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="address">
                    <i class="phone"></i>
                    <div class="contact_address">
                        1-25-2568-897
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="address">
                    <i class="mail"></i>
                    <div class="contact_email">
                        <a href="lvhongwei.com">lvhongwei</a>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

        </div>
    </div>
</div>
<span class="gotop"></span>
<script src="js/require.js" data-main="js/index.js"></script>

</body>
</html>
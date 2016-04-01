<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <base href="<?php echo site_url();  ?>">
    <link rel="stylesheet" type="text/css" href="css/common.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="css/single.css">
    <style type="text/css">
        h2{
            text-align: center;
            font-size: 50px;
        }
        table.gridtable {
            font-family: verdana,arial,sans-serif;
            font-size:11px;
            color:#333333;
            border-width: 1px;
            border-color: #666666;
            border-collapse: collapse;
            width: 1150px;
        }
        table.gridtable th {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #dedede;
        }
        table.gridtable td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #ffffff;
        }
    </style>


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
<div id="single">
    <div class="wrap">
        <img src="img/single.jpg" alt="">
        <p>
            <?php echo $blog->content;?>
        </p>
        <div class="single-comment">
            <h5>Written by <a href="">admin</a></h5>
            <div class="single-detail">
                <img src="img/avatar.png" alt="">
                <p>View all posts by:
                    <a href="">admin</a>
                </p>
            </div>
        </div>

        <h2>评论区</h2>
            <div class="am-u-sm-12">
                <table class="gridtable">
                    <thead>
                    <tr>
                        <th class="table-id">Name</th>
                        <th class="table-title">Email</th>
                        <th class="table-type">Website</th>
                        <th class="table-set">Subject</th>
                        <th class="table-set">add-time</th>


                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($comments as $comment){
                        ?>
                        <tr>
                            <td><?php echo $comment -> uname; ?></td>
                            <td><?php echo $comment -> email; ?></td>
                            <td><?php echo $comment -> website; ?></td>
                            <td><?php echo $comment -> subject; ?></td>
                            <td><?php echo $comment -> add_time; ?></td>

                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>



        <div class="single-comment-area">
            <h3>Add New Comment</h3>
            <form action="welcome/comment" method="post">

                <input type="hidden" name="blog_id" value="<?php echo $this -> input -> get('blog_id');?>">
                <p>
                    <label for="">Name</label>
                    <span>*</span>
                    <input type="text" name="uname">
                </p>
                <p>
                    <label for="">Email</label>
                    <span>*</span>
                    <input type="text" name="email">
                </p>
                <p>
                    <label for="">Website</label>
                    <span>*</span>
                    <input type="text" name="website">
                </p>
                <p>
                    <label for="">Subject</label>
                    <span>*</span>
                    <textarea  id="" cols="30" rows="10" name="subject"></textarea>
                </p>
                <p>
                    <input type="submit" value="submit comment">
                </p>
            </form>
        </div>
    </div>

</div>

        <div class="footer-right">
            <ul>
                <li><a href=""><span class="face" ></span></a></li>
                <li><a href=""><span class="twit" ></span></a></li>
                <li><a href=""><span class="dri" ></span></a></li>
                <li><a href=""><span class="tech" ></span></a></li>
            </ul>
        </div>
    </div>
</div>

<span class="gotop"></span>
<script src="js/require.js" data-main="js/index.js"></script>

</body>
</html>
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>文章修改</title>
    <meta name="description" content="这是一个 table 页面">
    <meta name="keywords" content="table">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <base href="<?php echo site_url();?>">

    <link rel="icon" type="image/png" href="assets/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="assets/css/amazeui.min.css"/>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
<!--[if lte IE 9]>
<p class="browsehappy">你正在使用<strong>过时</strong>的浏览器,暂不支持。 请 <a href="http://browsehappy.com/" target="_blank">升级浏览器</a>
    以获得更好的体验！</p>
<![endif]-->

<?php include 'admin-header.php'; ?>

<div class="am-cf admin-main">
    <?php include 'admin-sidebar.php'; ?>

        <!-- content end -->
    <div class="admin-content">
        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">文章管理</strong> </div>
        </div>

        <hr/>

        <div class="am-g">

            <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">

            </div>

            <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                <form class="am-form am-form-horizontal">


                    <!--           <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">文章ID</label>
                                <div class="am-u-sm-9">
                                  <input type="email" id="user-weibo" placeholder="文章ID">
                                </div>
                              </div>
                     -->
<!--                    --><?php
//                    foreach($row as $row){
//                        ?>
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">标题</label>
                        <div class="am-u-sm-9">
                            <input type="hidden" id="user-name" name="blog_id" value='<?php echo $row-> blog_id; ?>' placeholder="标题">
                            <input type="text" id="user-name" name="title" value="<?php echo $row-> title; ?>" placeholder="标题">
                        </div>
                    </div>

                    <div class="am-form-group">
                        <label for="user-phone" class="am-u-sm-3 am-form-label">作者</label>
                        <div class="am-u-sm-9">
                            <input type="email" id="user-phone" name="author" value="<?php echo $row-> author; ?>" placeholder="输入你的用户管理对应 ID ">
                        </div>
                    </div>



                    <div class="am-form-group">
                        <label for="user-intro" class="am-u-sm-3 am-form-label">文章</label>
                        <div class="am-u-sm-9">
                            <textarea  class="" rows="22" name="content" id="user-intro"  placeholder="文章"><?php echo $row-> content; ?> </textarea>
                        </div>
                    </div>

<!--                    --><?php
//                        }
//                            ?>



                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button type="button" id="fabiao"  class="fabiao am-btn am-btn-primary">修改文章</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--[if lt IE 9]>
    <script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
    <script src="assets/js/amazeui.ie8polyfill.min.js"></script>
    <![endif]-->

    <!--[if (gte IE 9)|!(IE)]><!-->
    <script src="assets/js/jquery.min.js"></script>
    <!--<![endif]-->
    <script src="assets/js/amazeui.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script>

        $(function(){
            $('#fabiao').on('click', function(){
                var $title = $('[name="title"]');
                var $author = $('[name="author"]');
                var $content = $('[name="content"]');
                var $blog_id=$('[name="blog_id"]')
                /*if($username.val() == ''){
                 alert('请输入用户名!');
                 $username.focus();
                 }*/
//                $.post(url, data, callback, type);
                $.post('welcome/genggai_blog', {
                    title:$title.val(),
                    author:$author.val(),
                    content:$content.val(),
                    blog_id:$blog_id.val()
                }, function(res){
                    if(res == 'fail'){
                        $title.css({
                            border: '1px solid red'
                        });
                    }else if(res == 'success'){
                        alert('成功!');
                    }
                });
            });

//            $('[name="username"]').on('blur', function(){
//                $.get('welcome/check_name', {uname: this.value}, function(res){
//                    if(res == 'fail'){
//                        alert('用户名已存在!');
//                    }
//                })
//            });

        });



    </script>
</body>
</html>



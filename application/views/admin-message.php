<!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>留言管理</title>
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

  <!-- content start -->
  <div class="admin-content">

    <div class="am-cf am-padding">
      <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">表格</strong> / <small>Table</small></div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-plus"></span> 新增</button>
            <button type="button" class="am-btn am-btn-default"><span class="am-icon-trash-o"></span> 删除</button>
          </div>
        </div>
      </div>
    </div>

    <div class="am-g">
      <div class="am-u-sm-12">
          <table class="am-table am-table-striped am-table-hover table-main">
            <thead>
              <tr>
                <th class="table-check"><input type="checkbox" /></th>
                <th class="table-id">ID</th>
                <th class="table-title">用户名</th>
                <th class="table-type">Email</th>
                <th class="table-type">留言</th>
                <th class="table-type">时间</th>
                <th class="table-set">操作</th>
              </tr>
          </thead>
          <tbody>
          <?php
            foreach($messages as $message){
          ?>
              <tr>
                <td><input type="checkbox" /></td>
                <td><?php echo $message -> message_id; ?></td>
                <td><a href="#"><?php echo $message -> username; ?></a></td>
                <td><?php echo $message -> email; ?></td>
                <td><?php echo $message -> message; ?></td>
                <td><?php echo $message -> add_time; ?></td>

                <td>
                  <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <button data-id="<?php echo $message -> message_id; ?>" class="bianji am-btn am-btn-default am-btn-xs am-text-secondary"><span class="am-icon-pencil-square-o"></span> 编辑</button>
                      <button data-id="<?php echo $message -> message_id; ?>" class="shanchu am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only"><span class="am-icon-trash-o"></span> 删除</button>
                    </div>
                  </div>
                </td>
              </tr>
          <?php
            }
          ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>
  <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
  <hr>
  <p class="am-padding-left">© lhw</p>
</footer>

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
   $('.shanchu').on('click', function(){
     var messageId =  $(this).data('id');
     if(confirm('确定是否删除记录，不可恢复!?')){
       location.href = 'welcome/delete_message?message_id='+messageId;
     }
   });
 });
</script>
</body>
</html>

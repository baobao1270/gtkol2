<!DOCYPTE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="renderer" content="webkit">
	<meta http-equiv="Cache-Control" content="no-siteapp"/>
	<link rel="stylesheet" href="https://jcdn-1251131545.file.myqcloud.com/amazeui/css/amazeui.min.css">
	<script src="https://jcdn-1251131545.file.myqcloud.com/jquery2.min.js"></script>
	<script src="https://jcdn-1251131545.file.myqcloud.com/amazeui/js/amazeui.min.js"></script>
	
	<?php $v_href = false; ?>
	<?php require_once(dirname(__file__) . '/index-json.php'); ?>
	
	<title><?php v_name($v_href); ?> | <?php v_commonTitle($v_href); ?></title>
</head>
<body>
    <div class="am-g am-g-fixed">
	    <div class="am-u-md-2">&nbsp;</div>
	    <div class="am-u-md-8 am-u-sm-12 main">
		    <h1 id="title"><?php v_name($v_href); ?></h1>
			<ol class="am-breadcrumb">
                <li><a href="https://josephcz.win/">博客</a></li>
				<?php if($v_href){ ?>
                    <li><a href=".."><?php v_title(false); ?></a></li>
                    <li class="am-active"><?php v_name($v_href); ?></li>
				<?php }else{ ?>
				    <li class="am-active"><?php v_name(false); ?></li>
				<?php } ?>
            </ol>
		    <hr>
			
		    <ul class="am-avg-sm-2">
			    <?php foreach($json["children"] as $chd){ ?>
					<li style="margin-bottom: 8px">
					    <?php if($chd["open"]){ ?>
					    <a href="<?=$chd['href'];?>" class="am-btn am-btn-default am-btn-block am-round" style="width: 90%;margin-left: 5%"><?=$chd['name'];?></a>
					    <?php }else{ ?>
						<a href="<?=$chd['href'];?>" class="am-btn am-btn-default am-btn-block am-round am-disabled" style="width: 90%;margin-left: 5%"><?=$chd['name'];?></a>
						<?php } ?>
					</li>
				<?php } ?>
            </ul>
		</div>
	    <div class="am-u-md-2">&nbsp;</div>
	</div>
</body>
</html>
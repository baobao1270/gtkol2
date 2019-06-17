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
	
	<style>
	table{
        width: 100%;
        border: 3px solid black;
        text-align: center;
    }
    
    td{
        padding-top: .3em;
        padding-bottom: .3em;
        font-size: 1.15em;
        border-left: 2px solid black;
    }
    
    thead td, table .sumstat{
        background-color: #e0e0e0;
        font-weight: bold;
        border-top: 3px solid black;
        border-bottom: 3px solid black;
    }
    
    tbody td{
        border-bottom: 1px solid black;
    }
    
    tbody .classtd{
        border-bottom: 2px solid black;
    }
    
    tbody input{
        width: 3em;
        text-align: center;
    }
	</style>
	<?php $v_href = 'cetcalc'; ?>
	<?php require_once(dirname(dirname(__file__)) . '/index-json.php'); ?>
	<title><?php v_title($v_href); ?> | <?php v_commonTitle($v_href); ?></title>
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
			<b>作文/翻译请填写 100 分制分数<br><br></b>
            
			<div class="am-tabs">
			    <ul class="am-tabs-nav am-nav am-nav-tabs">
				    <li id="tabSwitch-0" class="am-active"><a href="javascript: void(0)" onclick="switchTab(0);">CET-4</a></li>
				    <li id="tabSwitch-1"><a href="javascript: void(0)" onclick="switchTab(1);">CET-6</a></li>
				</ul>
				
				<div class="am-tabs-bd">
				    <div class="am-tab-panel am-active am-scrollable-horizontal" id="tab-0">
					    <?php require_once(dirname(__file__).'/cet4.layout.html'); ?>
					</div>
					
					<div class="am-tab-panel am-scrollable-horizontal" id="tab-1">
					    <?php require_once(dirname(__file__).'/cet6.layout.html'); ?>
					</div>
				</div>
			</div>
            
            <?php require_once(dirname(__file__).'/related-links.layout.html'); ?>
			
			<script>
			function switchTab(tabId){
				if(tabId == 0){
					$('#tab-0').addClass('am-active');
					$('#tab-1').removeClass('am-active');
					$('#tabSwitch-0').addClass('am-active');
					$('#tabSwitch-1').removeClass('am-active');
				}else{
					$('#tab-1').addClass('am-active');
					$('#tab-0').removeClass('am-active');
					$('#tabSwitch-1').addClass('am-active');
					$('#tabSwitch-0').removeClass('am-active');
				}
			}
			
			</script>
            <script src="autocalc.js"></script>
			
		</div> 
	    <div class="am-u-md-2">&nbsp;</div>
	</div>
</body>
</html>
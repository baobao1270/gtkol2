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
	.am-input-group{
	    margin-top: 10px;
		margin-bottom: 10px;
	}
	
	label{
		font-size: 1.6rem;
		margin: 0 0;
	}
	</style>
	<?php $v_href = 'ircalc'; ?>
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
			
			<div class="am-tabs">
			    <ul class="am-tabs-nav am-nav am-nav-tabs">
				    <li id="tabSwitch-0" class="am-active"><a href="javascript: void(0)" onclick="switchTab(0);">年化收益</a></li>
				    <li id="tabSwitch-1"><a href="javascript: void(0)" onclick="switchTab(1);">万份收益</a></li>
				</ul>
				
				<div class="am-tabs-bd">
				    <div class="am-tab-panel am-active" id="tab-0">
					    <div class="am-input-group">
			                <span class="am-input-group-label am-round">本金金额</span>
				            <input type="number" class="am-form-field itembox am-round" id="f0-capital" min="1">
							<span class="am-input-group-label am-round">元</span>
			            </div>
						&emsp;目前只支持本金为整数<br>
						
						<div class="am-input-group">
			                <span class="am-input-group-label am-round">年化利率</span>
				            <input type="number" class="am-form-field itembox am-round" id="f0-ir" min="0.01" max="100">
							<span class="am-input-group-label am-round">％</span>
			            </div>
						&emsp;收益率为两位小数的百分数<br>
						
						<div class="am-input-group">
			                <span class="am-input-group-label am-round">持有时间</span>
				            <input type="number" class="am-form-field itembox am-round" id="f0-t" min="1">
							<span class="am-input-group-label am-round">
							    <label for="f0-tu-y"><input type="radio" id="f0-tu-y" onclick="switchRadio(0);">年</label>/
							    <label for="f0-tu-m"><input type="radio" id="f0-tu-m" onclick="switchRadio(1);">月</label>/
							    <label for="f0-tu-d"><input type="radio" id="f0-tu-d" onclick="switchRadio(2);">日</label>
							</span>
			            </div>
						&emsp;<input type="checkbox" id="f0-yr360">一年按照 360 天算（默认为 365 天）<br><br>
						
						<button type="button" class="am-btn am-btn-primary am-round am-btn-block" onclick="calc(0);">计算</button>
						<p class="r"></p>						
					</div>
					
					<div class="am-tab-panel" id="tab-1">
					    <div class="am-input-group">
			                <span class="am-input-group-label am-round">本金金额</span>
				            <input type="number" class="am-form-field itembox am-round" id="f1-capital" min="1">
							<span class="am-input-group-label am-round">元</span>
			            </div>
						&emsp;目前只支持本金为整数<br>
						
						<div class="am-input-group">
			                <span class="am-input-group-label am-round">万份收益</span>
				            <input type="number" class="am-form-field itembox am-round" id="f1-ir" min="0.0001" max="100">
							<span class="am-input-group-label am-round">元</span>
			            </div>
						&emsp;万份收益为四位小数<br>
						
						<div class="am-input-group">
			                <span class="am-input-group-label am-round">持有时间</span>
				            <input type="number" class="am-form-field itembox am-round" id="f1-t" min="1">
							<span class="am-input-group-label am-round">
							    <label for="f1-tu-y"><input type="radio" id="f1-tu-y" onclick="switchRadio(0);">年</label>/
							    <label for="f1-tu-m"><input type="radio" id="f1-tu-m" onclick="switchRadio(1);">月</label>/
							    <label for="f1-tu-d"><input type="radio" id="f1-tu-d" onclick="switchRadio(2);">日</label>
							</span>
			            </div>
						&emsp;<input type="checkbox" id="f1-yr360">一年按照 360 天算（默认为 365 天）<br><br>
						
						<button type="button" class="am-btn am-btn-primary am-round am-btn-block" onclick="calc(1);">计算</button>
						<p class="r"></p>
					</div>
				</div>
			</div>
			
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
			
			function switchRadio(id){
				if(id == 0){
					$('#f0-tu-y').attr("checked", 'checked');
					$('#f0-tu-m').attr("checked", false);
					$('#f0-tu-d').attr("checked", false);
					$('#f1-tu-y').attr("checked", 'checked');
					$('#f1-tu-m').attr("checked", false);
					$('#f1-tu-d').attr("checked", false);
				}else if(id == 1){
					$('#f0-tu-y').attr("checked", false);
					$('#f0-tu-m').attr("checked", 'checked');
					$('#f0-tu-d').attr("checked", false);
					$('#f1-tu-y').attr("checked", false);
					$('#f1-tu-m').attr("checked", 'checked');
					$('#f1-tu-d').attr("checked", false);
				}else{
					$('#f0-tu-y').attr("checked", false);
					$('#f0-tu-m').attr("checked", false);
					$('#f0-tu-d').attr("checked", 'checked');
					$('#f1-tu-y').attr("checked", false);
					$('#f1-tu-m').attr("checked", false);
					$('#f1-tu-d').attr("checked", 'checked');
				}
			}
			
			function getDataIDPrefix(id){
				if(id == 0){
					return '#f0-';
				}
				return'#f1-';
			}
			
			function getDataJson(id){
			    var prefix = getDataIDPrefix(id);
			    var prefixTu = prefix + 'tu-';
				var data = {
					tab: id,
					c : $(prefix + 'capital').val(),
					ir: $(prefix + 'ir').val(),
					t : $(prefix + 't').val(),
					yr360: $(prefix + 'yr360').is(':checked'),
					tu_y: $(prefixTu + 'y').is(':checked'),
					tu_m: $(prefixTu + 'm').is(':checked'),
					tu_d: $(prefixTu + 'd').is(':checked')
				}
				
				return data;
			}
			
			function calc(id){			
				$.get('calc.php', getDataJson(id), calcCallback);
			}
			
			function calcCallback(data){
				$('.r').html(data);
			}
			</script>
			
		</div> 
	    <div class="am-u-md-2">&nbsp;</div>
	</div>
</body>
</html>
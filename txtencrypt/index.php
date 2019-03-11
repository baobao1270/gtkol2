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
	
	#please-turn-down{
	    text-align: center;
		color: red;
		margin-top: 1000px;
        margin-bottom: 1000px;
		display: none;
	}
	</style>
	<?php $v_href = 'txtencrypt'; ?>
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
			
			<div class="am-form">
			    <div class="am-form-group">
                    <label>加密内容</label>
                    <textarea class="am-radius" id="f-txt" rows="7"></textarea>
                </div>
				
				<div class="am-form-group">
                    <label>加密算法</label>
                    <select class="am-round" id="f-algo">
					    <option value="md2">MD2</option>
					    <option value="md4">MD4</option>
					    <option value="md5" selected = "selected">MD5</option>
					    <option value="sha1">SHA-1</option>
					    <option value="sha256">SHA-256</option>
					    <option value="sha384">SHA-384</option>
					    <option value="sha512">SHA-512</option>
						<option value="hmac-md2">HMAC-MD2</option>
					    <option value="hmac-md4">HMAC-MD4</option>
					    <option value="hmac-md5">HMAC-MD5</option>
					    <option value="hmac-sha1">HMAC-SHA1</option>
					    <option value="hmac-sha3-256">HMAC-SHA3-256</option>
					    <option value="hmac-sha3-384">HMAC-SHA3-384</option>
					    <option value="hmac-sha3-512">HMAC-SHA3-512</option>
					    <option value="hmac-sha256">HMAC-SHA-256</option>
					    <option value="hmac-sha384">HMAC-SHA-384</option>
					    <option value="hmac-sha512">HMAC-SHA-512</option>
					</select>
                </div>
				
				<div class="am-form-group">
                    <label>HMAC 密码</label>
                    <textarea class="am-radius" id="f-key" rows="3"></textarea>
                </div>
				
				<button type="button" class="am-btn am-btn-primary am-round am-btn-block" style="margin-bottom: 50px" onclick="encode();">加密</button>
				
				<div class="am-form-group">
                    <label>加密结果</label>
					<textarea type="text" class="am-form-field" id="f-result" style="cursor:text;" rows="2" disabled>d41d8cd98f00b204e9800998ecf8427e</textarea>
                </div>
				
			</div>
		</div>
	    <div class="am-u-md-2">&nbsp;</div>
	</div>
	<script>
	function isHMAC(){
		if($('#f-algo').val().substr(0,4) === 'hmac'){ return true; }
		return false;
	}
	
	function getEncodePostData(){
		if(isHMAC()){
			var key = $('#f-key').val();
		}
		var txt = $('#f-txt').val();
		var r = {"key": key, "txt": txt};
		return r;
	}
	
	function getEncodeApiURL(){
		return './=/' + $('#f-algo').val() + '.php';
	}
	
	function encodeCallback(r){
		$('#f-result').val(r);
	}
	
	function encode(){
		$.post(getEncodeApiURL(), getEncodePostData(), encodeCallback);
	}
	</script>
</body>
</html>
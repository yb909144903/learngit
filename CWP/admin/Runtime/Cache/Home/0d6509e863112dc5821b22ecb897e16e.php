<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>校园随拍后台管理</title>
	<link rel="stylesheet" type="text/css" href="/CWP/admin/Public/css/base.css" />
	<link rel="stylesheet" type="text/css" href="/CWP/admin/Public/css/demo1.css" />
	<link rel="stylesheet" type="text/css" href="/CWP/admin/Public/css/style.css" />
	<link rel="stylesheet" type="text/css" href="/CWP/admin/Public/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/CWP/admin/Public/layui/css/layui.css">
	<script src="/CWP/admin/Public/layui/layui.js"></script>
	<script src="/CWP/admin/Public/js/jquery-3.1.1.min.js"></script>
	<script src="/CWP/admin/Public/bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.css" />
	<script src="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script>document.documentElement.className="js";var supportsCssVars=function(){var e,t=document.createElement("style");return t.innerHTML="root: { --tmp-var: bold; }",document.head.appendChild(t),e=!!(window.CSS&&window.CSS.supports&&window.CSS.supports("font-weight","var(--tmp-var)")),t.parentNode.removeChild(t),e};supportsCssVars()||alert("Please view this demo in a modern browser that supports CSS Variables.");</script>
</head>
	<body class="demo-1">
		<main>
			<div class="content">
				<canvas class="scene scene--full" id="scene"></canvas>
				<script type="x-shader/x-vertex" id="wrapVertexShader">
					attribute float size;
					attribute vec3 color;
					varying vec3 vColor;
					void main() {
						vColor = color;
						vec4 mvPosition = modelViewMatrix * vec4( position, 1.0 );
						gl_PointSize = size * ( 350.0 / - mvPosition.z );
						gl_Position = projectionMatrix * mvPosition;
					}
				</script>
				<script type="x-shader/x-fragment" id="wrapFragmentShader">
					varying vec3 vColor;
					uniform sampler2D texture;
					void main(){
						vec4 textureColor = texture2D( texture, gl_PointCoord );
						if ( textureColor.a < 0.3 ) discard;
						vec4 color = vec4(vColor.xyz, 1.0) * textureColor;
						gl_FragColor = color;
					}
				</script>
				<div class="content__inner">
					<h2 class="content__title">校园随拍</h2>
					<h3 class="content__subtitle">CAMPUS WITH PAT</h3>
					<h2 class="content__subtitle" data-toggle="modal" data-target="#myModal" style="margin-top: 10px;">登录</h2>

					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div id="modalDialog" class="modal-dialog" style="width: 300px">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
										&times;
									</button>
									<h4 class="modal-title" id="myModalLabel">
										校园随拍
									</h4>
								</div>
								<form method="post" action="<?php echo U('Login/checklogin');?>">
								<div class="modal-body">
									<div class="from-group">
										<input type="username" name="username" placeholder="请输入账号" required lay-verify="required" autocomplete="off" class="layui-input">
										<input type="password" name="password" placeholder="请输入密码" required lay-verify="required" autocomplete="off" class="layui-input">
									</div>
								</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-danger btn-block">
										登录
									</button>
								</div>
								</form>
							</div><!-- /.modal-content -->
						</div><!-- /.modal -->
					</div>
				</div>
			</div>
		</main>
		<script>
            $(document).ready(function(){

                $("#modalDialog").draggable();//为模态对话框添加拖拽
                $("#myModal").css("overflow", "hidden");//禁止模态对话框的半透明背景滚动

            })
		</script>
		<script src="/CWP/admin/Public/js/demo.js"></script>
		<script src="/CWP/admin/Public/js/three.min.js"></script>
		<script src="/CWP/admin/Public/js/TweenMax.min.js"></script>
		<script src="/CWP/admin/Public/js/demo1.js"></script>
	</body>
</html>
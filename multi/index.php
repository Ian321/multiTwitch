<?php
	if ( isset ($_POST["n"]) && !empty($_POST["n"])) {
		$toArray = explode(" ",$_POST["n"]);
		$andBack = implode("/",$toArray);
		header("Location: ".$andBack);
	}
	if ( isset($_GET["m"]) && !empty($_GET["m"]) ) {
		$select = 0;
		$streams = explode("/",$_GET["m"]);
		$streams = array_filter($streams);
		if(preg_match('/[^A-Za-z0-9\-_/%]+/', implode("",$streams))>0) {
			die ("Try this on another server <img src=\"https://static-cdn.jtvnw.net/emoticons/v1/93064/1.0\" alt=\"forsenE\">");
		}
		$howmany = count($streams);
		if ($howmany >= 5) {
			die ("You can only watch 4 streams at the same time <img src=\"https://static-cdn.jtvnw.net/emoticons/v1/93064/1.0\" alt=\"forsenE\">");
		}
	}
	if (isset($howmany) && $howmany >= 1){
		$select = 0;
	} else {
		$select = 1;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<!--
		Made by Ignaz Kraft aka Ian678
		With the help of https://www.twitch.tv/fourtf/profile
		Have fun with it :)
		-->
		<meta charset="utf-8">
		<title>Multistream</title>
		<script type="text/javascript" src="/jquery-3.0.0.min.js"></script>
		<style>
		body {    
			margin: 0 !important;
			padding: 0 !important;
			height: 100%;
			overflow: hidden;
		}
		#form1 {
			height: 25px;
			width: 327px;
			display: inline-block;
			position: absolute;
			top:0;
			bottom: 0;
			left: 0;
			right: 0;
			margin: auto;
		}
		</style>
	</head>
	<body>
		<?php 
			$leftORright = "left";
			foreach($streams as $var){
				echo "<iframe src=\"https://player.twitch.tv/?channel=".$var."\" class=\"stream\" style=\"width: "."50%".";height: "."123px".";float: ".$leftORright."\" frameborder=\"0\" scrolling=\"no\"></iframe>";
				if ($leftORright != "left") {
					$leftORright = "left";
				} else {
					$leftORright = "right";
				}
			}
		?>
		<?php 
		if ($howmany == 3){
			foreach ($streams as $var) {
				echo "<iframe src=\"https://www.twitch.tv/".$var."/chat\" class=\"chat\" frameborder=\"0\" scrolling=\"no\" height=\"123px\" width=\"16.6666667%\"></iframe>";
			}
		} elseif ($howmany == 2) {
			foreach ($streams as $var) {
				echo "<iframe src=\"https://www.twitch.tv/".$var."/chat\" class=\"chat\" frameborder=\"0\" scrolling=\"no\" height=\"123px\" width=\"50%\"></iframe>";
			}
		} elseif ($howmany == 1) {
			echo "<iframe src=\"https://www.twitch.tv/".$var."/chat\" class=\"chat\" frameborder=\"0\" scrolling=\"no\" height=\"123px\" width=\"345px\"></iframe>";
		}
		?>
		<?php if ($howmany == 2 || $howmany == 3) : ?>
		<script defer type="text/javascript">
			<!--
			$(document).ready(function () {
				<?php if ($howmany == 2 || $howmany == 3) : ?>
				$(".chat").height($(window).height() / 2);
				<?php endif; ?>
				$(".stream").height($(window).height() / 2);
				$( window ).resize(function() {
					<?php if ($howmany == 2 || $howmany == 3) : ?>
					$(".chat").height($(window).height() / 2);
					<?php endif; ?>
					$(".stream").height($(window).height() / 2);
				});
			});
			-->
		</script>
		<?php endif; ?>
		<?php if ($howmany == 1) : ?>
		<script defer type="text/javascript">
			<!--
			$(document).ready(function () {
				$(".chat").height($(window).height());
				$(".stream").height($(window).height());
				$(".stream").width($(window).width() - 345);
				$( window ).resize(function() {
					$(".chat").height($(window).height());
					$(".stream").height($(window).height());
					$(".stream").width($(window).width() - 345);
				});
			});
			-->
		</script>
		<?php endif; ?>
		<?php if ($howmany == 4) : ?>
		<script defer type="text/javascript">
			<!--
			$(document).ready(function () {
				$(".stream").height($(window).height() / 2);
				$( window ).resize(function() {
					$(".stream").height($(window).height() / 2);
				});
			});
			-->
		</script>
		<?php endif; ?>
		<?php if ($select == 1) : ?>
		<div id="form1">
			<form id="DatForm" method="post">
				<input type="text" name="n" placeholder="Use 'space' in between each streamer." style="width: 232px;float: left;">
				<input type="submit" style="width: 88px;float: right;" value="Submit">
			</form>
		</div>
		<script type="text/javascript" defer>
			<!--
			$(document).ready(function () {
				$(function(){$("#DatForm").submit(function(){$("input[type='submit']",this).val("Please Wait").attr("disabled","disabled");return true})});
			});
			-->
		</script>
		<?php endif; ?>
	</body>
</html>

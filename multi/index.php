<?php
	if (isset ($_POST["n"]) && !empty($_POST["n"])) {
		$thePOST = $_POST["n"];
		if (strpos($thePOST, '\'space\'') !== false) {
			$thePOST = explode("'", $thePOST);
			while (in_array("space", $thePOST)){
				if(($key = array_search("space", $thePOST)) !== false) {
					unset($thePOST[$key]);
				}
			}
			$thePOST = implode("/", $thePOST);
		}
		$toArray = explode(" ", $thePOST);
		if (isset($_POST["html5"]) && $_POST["html5"] == "yes") {
			array_push($toArray, "H5");
		}
		$andBack = implode("/", $toArray);
		header("Location: ".$andBack);
	}
	if (isset($_GET["m"]) && !empty($_GET["m"])) {
		$select = 0;
		$streams = explode("/", $_GET["m"]);
		$streams = array_filter($streams);
		if (in_array("H5", $streams)) {
			if(($key = array_search("H5", $streams)) !== false) {
				unset($streams[$key]);
				$isHTML5 = true;
			} else {
				$isHTML5 = false;
			}
		}
		if(preg_match('/[^A-Za-z0-9\-_]/', implode("", $streams))>0) {
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
<?php if ($select == 1) : ?>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<style>
		body {
			margin: 0 !important;
			padding: 0 !important;
			height: 100%;
			overflow: hidden;
		}
		#form1 {
			height: 50px;
			width: 335px;
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
		<div id="form1">
			<form id="DatForm" method="post">
				<div>
					<input type="text" name="n" placeholder="Use 'space' in between each streamer." style="width: 232px; float: left; margin-bottom: 10px;">
					<input type="submit" style="width: 88px; float: right; margin-bottom: 10px;" value="Submit">
				</div>
				<div>
					<a style="float: left;">Current player:</a>
					<select name="html5" style="float: right;">
						<option value="no">Flash</option>
						<option value="yes">HTML5 (Might be buggy)</option>
					</select>
				</div>
			</form>
		</div>
		<script type="text/javascript" defer>
			<!--
			$(document).ready(function () {
				$(function(){$("#DatForm").submit(function(){$("input[type='submit']",this).val("Please Wait").attr("disabled","disabled");return true})});
			});
			-->
		</script>
	</body>
</html>
<?php endif; ?>
<?php if ($select == 0 && $howmany == 1) : ?>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<style>
		body {
			margin: 0 !important;
			padding: 0 !important;
			height: 100%;
			overflow: hidden;
			background-color: black;
		}
		</style>
	</head>
	<body>
		<iframe src="https://player.twitch.tv/?channel=<?php echo $streams[0]; if ($isHTML5) { echo "&html5";} ?>" class="stream" style="width: 50%; height: 123px; float: left" frameborder="0" scrolling="no"></iframe>
		<iframe src="https://www.twitch.tv/<?php echo $streams[0]; ?>/chat" class="chat" frameborder="0" scrolling="no" height="123px" width="340px"></iframe>
		<script defer type="text/javascript">
			<!--
			$(document).ready(function () {
				$(".chat").height($(window).height());
				$(".stream").height($(window).height());
				$(".stream").width($(window).width() - 340);
				$( window ).resize(function() {
					$(".chat").height($(window).height());
					$(".stream").height($(window).height());
					$(".stream").width($(window).width() - 340);
				});
			});
			-->
		</script>
	</body>
</html>
<?php endif; ?>
<?php if ($select == 0 && $howmany == 2) : ?>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<style>
		body {
			margin: 0 !important;
			padding: 0 !important;
			height: 100%;
			overflow: hidden;
			background-color: black;
		}
		</style>
	</head>
	<body>
		<iframe src="https://player.twitch.tv/?channel=<?php echo $streams[0]; if ($isHTML5) { echo "&html5";} ?>" class="stream" style="width: 50%; height: 123px; float: left" frameborder="0" scrolling="no"></iframe>
		<iframe src="https://player.twitch.tv/?channel=<?php echo $streams[1]; if ($isHTML5) { echo "&html5";} ?>" class="stream" style="width: 50%; height: 123px; float: right" frameborder="0" scrolling="no"></iframe>
		<iframe src="https://www.twitch.tv/<?php echo $streams[0]; ?>/chat" class="chat" style="height: 123px; width: 50%; float: left" frameborder="0" scrolling="no"></iframe>
		<iframe src="https://www.twitch.tv/<?php echo $streams[1]; ?>/chat" class="chat" style="height: 123px; width: 50%; float: right" frameborder="0" scrolling="no"></iframe>
		<script defer type="text/javascript">
			<!--
			$(document).ready(function () {
				$(".chat").height($(window).height() / 2);
				$(".stream").height($(window).height() / 2);
				$( window ).resize(function() {
					$(".chat").height($(window).height() / 2);
					$(".stream").height($(window).height() / 2);
				});
			});
			-->
		</script>
	</body>
</html>
<?php endif; ?>
<?php if ($select == 0 && $howmany == 3) : ?>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<style>
		body {
			margin: 0 !important;
			padding: 0 !important;
			height: 100%;
			overflow: hidden;
			background-color: black;
		}
		</style>
	</head>
	<body>
		<div class="line1" style="float: left;">
			<iframe src="https://player.twitch.tv/?channel=<?php echo $streams[1]; if ($isHTML5) { echo "&html5";} ?>" class="stream1" style="width: 123px; height: 123px; float: left;" frameborder="0" scrolling="no"></iframe>
			<iframe src="https://www.twitch.tv/<?php echo $streams[0]; ?>/chat" class="chat" style="height: 123px; width: 340px; float: left;" frameborder="0" scrolling="no"></iframe>
			<iframe src="https://player.twitch.tv/?channel=<?php echo $streams[2]; if ($isHTML5) { echo "&html5";} ?>" class="stream1" style="width: 123px; height: 123px; float: left;" frameborder="0" scrolling="no"></iframe>
		</div>
		<div class="line2" style="float: right;">
			<iframe src="https://www.twitch.tv/<?php echo $streams[1]; ?>/chat" class="chat" style="height: 123px; width: 340px; float: left;" frameborder="0" scrolling="no"></iframe>
			<iframe src="https://player.twitch.tv/?channel=<?php echo $streams[0]; if ($isHTML5) { echo "&html5";} ?>" class="stream2" style="width: 123px; height: 123px; float: left" frameborder="0" scrolling="no"></iframe>
			<iframe src="https://www.twitch.tv/<?php echo $streams[2]; ?>/chat" class="chat" style="height: 123px; width: 340px; float: left;" frameborder="0" scrolling="no"></iframe>
		</div>
		<script defer type="text/javascript">
			<!--
			$(document).ready(function () {
				$(".chat").height($(window).height() / 2);
				$(".stream1").height($(window).height() / 2);
				$(".stream2").height($(window).height() / 2);
				$(".stream1").width(($(window).width() - 340) / 2);
				$(".stream2").width($(window).width() - 680);
				$( window ).resize(function() {
					$(".chat").height($(window).height() / 2);
					$(".stream1").height($(window).height() / 2);
					$(".stream2").height($(window).height() / 2);
					$(".stream1").width(($(window).width() - 340) / 2);
					$(".stream2").width($(window).width() - 680);
				});
			});
			-->
		</script>
	</body>
</html>
<?php endif; ?>
<?php if ($select == 0 && $howmany == 4) : ?>
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
		<style>
		body {
			margin: 0 !important;
			padding: 0 !important;
			height: 100%;
			overflow: hidden;
			background-color: black;
		}
		</style>
	</head>
	<body>
		<div class="line1" style="float: left;">
			<iframe src="https://player.twitch.tv/?channel=<?php echo $streams[0]; if ($isHTML5) { echo "&html5";} ?>" class="stream1" style="width: 123px; height: 123px; float: left;" frameborder="0" scrolling="no"></iframe>
			<iframe src="https://www.twitch.tv/<?php echo $streams[0]; ?>/chat" class="chat" style="height: 123px; width: 340px; float: left;" frameborder="0" scrolling="no"></iframe>
			<iframe src="https://www.twitch.tv/<?php echo $streams[1]; ?>/chat" class="chat" style="height: 123px; width: 340px; float: left;" frameborder="0" scrolling="no"></iframe>
			<iframe src="https://player.twitch.tv/?channel=<?php echo $streams[1]; if ($isHTML5) { echo "&html5";} ?>" class="stream1" style="width: 123px; height: 123px; float: left;" frameborder="0" scrolling="no"></iframe>
		</div>
		<div class="line2" style="float: right;">
			<iframe src="https://player.twitch.tv/?channel=<?php echo $streams[2]; if ($isHTML5) { echo "&html5";} ?>" class="stream1" style="width: 123px; height: 123px; float: left" frameborder="0" scrolling="no"></iframe>
			<iframe src="https://www.twitch.tv/<?php echo $streams[2]; ?>/chat" class="chat" style="height: 123px; width: 340px; float: left;" frameborder="0" scrolling="no"></iframe>
			<iframe src="https://www.twitch.tv/<?php echo $streams[3]; ?>/chat" class="chat" style="height: 123px; width: 340px; float: left;" frameborder="0" scrolling="no"></iframe>
			<iframe src="https://player.twitch.tv/?channel=<?php echo $streams[3]; if ($isHTML5) { echo "&html5";} ?>" class="stream1" style="width: 123px; height: 123px; float: left" frameborder="0" scrolling="no"></iframe>
		</div>
		<script defer type="text/javascript">
			<!--
			$(document).ready(function () {
				$(".chat").height($(window).height() / 2);
				$(".stream").height($(window).height() / 2);
				$(".stream").width(($(window).width() - 680) / 2);
				$( window ).resize(function() {
					$(".chat").height($(window).height() / 2);
					$(".stream").height($(window).height() / 2);
					$(".stream").width(($(window).width() - 680) / 2);
				});
			});
			-->
		</script>
	</body>
</html>
<?php endif; ?>

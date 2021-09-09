<?php

$modx->regClientHTMLBlock('
	<script>
		$(".'.$gallery.' a").colorbox({
			rel : "'.$gallery.'",
			current : "{current} / {total}"
		});
	</script>
');
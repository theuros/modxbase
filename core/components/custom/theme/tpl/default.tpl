<!doctype html>
<html lang="{$_modx->config.cultureKey}">
<head>
    {$_modx->resource.head ?: '@FILE page/head.tpl' | chunk}
    <!-- -->
</head>

<body>


aaaaaaaaa

<div class="container">
	{'@FILE page/header.tpl' | chunk}

	DEFAULT

	{
		$_modx->resource.display ?: '@FILE chunks/content/default.tpl' | chunk
	}
    

	{'@FILE page/footer.tpl' | chunk}
	

	<div class="border">		
		{$_modx->lexicon->load('theme:default')}
		{$_modx->lexicon('test')}
	</div>
	
</div>


</body>
</html>

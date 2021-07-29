<!doctype html>
<html lang="{$_modx->config.cultureKey}">
<head>
    {$_modx->resource.head ?: '@FILE page/head.tpl' | chunk}
    <!-- {$_modx->lexicon->load('theme:default')} -->
</head>

<body>

<div class="container">
	{'@FILE page/header.tpl' | chunk}
	{$_modx->resource.display ?: '@FILE content/default.tpl' | chunk}
	<div class="border my-3 p-3">
		Lexicon: {$_modx->lexicon('test')}
	</div>
	{'@FILE page/footer.tpl' | chunk}
</div>
{'@FILE page/scripts.tpl' | chunk}

</body>
</html>

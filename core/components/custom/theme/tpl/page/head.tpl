<title>
	{$_modx->resource.longtitle ?: $_modx->resource.pagetitle} - {$_modx->config.site_name}
</title>

<base href="{$_modx->config.site_url}" />

<meta charset="{$_modx->config.modx_charset}" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<meta name="description" content="{$_modx->resource.description}">
<meta name="author" content="" />
<meta name="copyright" content="" />

{if $_modx->resource.searchable}
	<meta name="robots" content="index,follow" />
{else}
	<meta name="robots" content="noindex,nofollow" />
{/if}

<link rel="stylesheet" href="{$_modx->config.theme}css/styles.min.css" />

<script>
	var ajaxUrl = "{$_modx->makeUrl(5,'','','full')}";
</script>
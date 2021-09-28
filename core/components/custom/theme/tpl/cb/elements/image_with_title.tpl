{switch $layoutId}
	{case '1'}
		{var $w = 1400}
	{case '2'}
		{var $w = 800}
	{case '3'}
		{var $w = 470}
	{case '4'}
		{var $w = 350}
	{default}
		{var $w = 800}
{/switch}

{var $ptOptions = '@FILE cb/helpers/pthumb_size_options.php' | snippet : ['ratio' => $ratio, 'width' => $w]}

{var $opt = '@FILE cb/helpers/options_check.php' | snippet : ['input' => $options]}

{if $opt.nocrop} 
	{set $ptOptions = $ptOptions~'&far=1&bg=#e6e6e7'}
{else}
	{set $ptOptions = $ptOptions~'&zc=1'}
{/if}

{if $opt.aoe} 
	{set $ptOptions = $ptOptions~'&aoe=1'}
{/if}

<figure class="figure">
	{if $opt.enlarge}<a href="{'pthumb' | snippet : ['input' => $url, 'options' => 'w=1024']}" class="lightbox">{/if}
	<img src="{'pthumb' | snippet : ['input' => $url, 'options' => $ptOptions]}" width="{$w}" height="{$h}" alt="{$alt | strip_tags}" title="{$attrTitle}" class="img-fluid" loading="lazy" decoding="async">
	{if $opt.enlarge}</a>{/if}
	{if $title}
		<figcaption class="figure-caption text-end">
			{$title}
		</figcaption>
	{/if}
</figure>
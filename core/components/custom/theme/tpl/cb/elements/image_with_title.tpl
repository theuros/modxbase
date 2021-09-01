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

{switch $ratio}
	{case '1:1'}
		{var $h = $w}
		{var $ptOptions = 'w='~$w~'&h='~$h}
	{case '4:3'}
		{var $h = (3 * $w) / 4}
		{set $h = '@FILE helpers/round.php' | snippet : ['input' => $h]}
		{var $ptOptions = 'w='~$w~'&h='~$h}
	{case '16:9'}
		{var $h = (9 * $w) / 16}
		{set $h = '@FILE helpers/round.php' | snippet : ['input' => $h]}
		{var $ptOptions = 'w='~$w~'&h='~$h}
	{case '21:9'}
		{var $h = (9 * $w) / 21}
		{set $h = '@FILE helpers/round.php' | snippet : ['input' => $h]}
		{var $ptOptions = 'w='~$w~'&h='~$h}
	{case '9:21'}
		{var $h = (21 * $w) / 9}
		{set $h = '@FILE helpers/round.php' | snippet : ['input' => $h]}
		{var $ptOptions = 'w='~$w~'&h='~$h}
	{case '9:16'}
		{var $h = (16 * $w) / 9}
		{set $h = '@FILE helpers/round.php' | snippet : ['input' => $h]}
		{var $ptOptions = 'w='~$w~'&h='~$h}
	{case '3:4'}
		{var $h = (4 * $w) / 3}
		{set $h = '@FILE helpers/round.php' | snippet : ['input' => $h]}
		{var $ptOptions = 'w='~$w~'&h='~$h}
	{default}
		{var $h = ($height * $w) / $width}
		{set $h = '@FILE helpers/round.php' | snippet : ['input' => $h]}
		{var $ptOptions = 'w='~$w}
{/switch}


{var $opt = '@FILE cb/options/options_check.php' | snippet : ['input' => $options]}

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
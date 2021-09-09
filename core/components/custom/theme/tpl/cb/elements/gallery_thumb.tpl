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

{switch $columns}	
	{case '2'}
		{var $class = 'col-6'}
	{case '3'}
		{var $class = 'col-4'}
	{case '4'}	
		{var $class = 'col-3'}
	{default}
		{var $class = 'col-2'}
{/switch}

{set $w = $w / $columns}
{set $w = '@FILE helpers/round.php' | snippet : ['input' => $w]}

{var $ptOptions = '@FILE cb/options/pthumb_size_options.php' | snippet : ['ratio' => $ratio, 'width' => $w, 'zc' => 1]}

<li class="{$class} mb-4">
	<a href="{'pthumb' | snippet : ['input' => $url, 'options' => 'w=1024']}">
		<img src="{'pthumb' | snippet : ['input' => $url, 'options' => $ptOptions]}" width="{$w}" height="{$h}" alt="{$alt | strip_tags}" title="{$attrTitle}" class="img-fluid" loading="lazy" decoding="async">
	</a>
</li>
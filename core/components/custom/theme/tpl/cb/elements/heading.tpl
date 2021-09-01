{var $class = ''}

{if $color}
	{set $class = 1}
{/if}

{if $alignment}
	{set $class = 1}
{/if}

{if $class}
	<{$level} class="{$color} {$alignment}">{$value}</{$level}>
{else}
	<{$level}>{$value}</{$level}>
{/if}
<header class="p-3">
	<nav class="btn-group d-flex align-content-center">
	    {'pdoMenu' | snippet : [
	        'parents' => 0,
	        'level' => 1,
	        'tplOuter' => '@INLINE {$wrapper}',
	        'tpl' => '@INLINE <a href="{$link}" class="btn btn-primary">{$menutitle}</a>'
	    ]}
	</nav>
</header>
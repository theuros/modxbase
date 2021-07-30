<header class="pt-3">
	
	<form action="{$_modx->makeUrl(6)}" method="get" class="pb-2 d-flex justify-content-end">
        <input type="text" name="search" class="form-control w-auto d-inline" placeholder="Iskalnik">
        <input type="submit" value="Search" class="btn btn-primary ms-2">
	</form>

	<nav class="btn-group d-flex align-content-center">
	    {'pdoMenu' | snippet : [
	        'parents' => 0,
	        'level' => 1,
	        'tplOuter' => '@INLINE {$wrapper}',
	        'tpl' => '@INLINE <a href="{$link}" class="btn btn-primary">{$menutitle}</a>'
	    ]}
	</nav>
</header>
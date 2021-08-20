{if $colWidth > 0}
	<div class="row {$justifyContent}">
	    <div class="col-{$colWidth}">
	    	{$col1}
	    	<hr />
	    	js: {$justifyContent}
	    </div>
	</div>
{else}
	{$col1}
{/if}
<script src="themes/sklodekor/js/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
{if $MENU != ''}
	
	<!-- Menu -->
    <div class="navbar">
    <a data-toggle="collapse" data-target=".nav-collapse" class="btn btn-navbar">
<i class="icon-bar"></i>
</a>

<div class="nav-collapse"> 
		<ul class="nav nav-pills pull-right">
			{$MENU}
			{if $MENU_SEARCH}
				<li class="sf-search noBack" style="float:right">
					<form id="searchbox" action="{$link->getPageLink('search')}" method="get">
						<p>
							<input type="hidden" name="controller" value="search" />
							<input type="hidden" value="position" name="orderby"/>
							<input type="hidden" value="desc" name="orderway"/>
							<input type="text" name="search_query" value="{if isset($smarty.get.search_query)}{$smarty.get.search_query|escape:'htmlall':'UTF-8'}{/if}" />
						</p>
					</form>
				</li>
			{/if}
		</ul>
        </div></div>
	<!--/ Menu -->
{/if}
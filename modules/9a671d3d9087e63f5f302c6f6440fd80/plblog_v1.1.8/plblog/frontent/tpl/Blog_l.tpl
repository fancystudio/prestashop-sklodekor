<!-- Lastest post -->
	{if $PL_DISPLAY_CATEGORY == 'Left'}
	{/if}
{/if}
{if $PL_DISPLAY_TAG != 'Disable'}
	{if $PL_DISPLAY_TAG == 'Left'}
		<div class="block pl_tag">
			<h4>{l s='Blog tags' mod='plblog'}</h4>
			<div class="block_content center">
				<p class="block_content">
					{foreach from=$tags item=tag}
						{if $tag['id_pl_blog_tags'] != 1}
							<a href="{$plTools->getTagLink($tag['id_pl_blog_tags'], $tag['tags_name'])}">{$tag['tags_name']}</a>
						{/if}
					{/foreach}			
				</p>
			</div>
		</div>
	{/if}
{/if}
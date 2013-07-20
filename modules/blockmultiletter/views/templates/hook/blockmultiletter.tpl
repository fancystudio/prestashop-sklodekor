<!-- Block Newsletter module-->
<div class="span3" id="social_block">
	<h4>{l s='Newsletter' mod='blockmultiletter'}</h4>
	<div class="block_content newsletter-bottom">
	{if isset($msg) && $msg}
		<p class="{if $nw_error}warning_inline{else}success_inline{/if}">{$msg}</p>
	{/if}
        <p>{l s='Subscribe our newsletter to receive our newest promo' mod='blockmultiletter'}</p>
        <div class="input-append">
		<form action="{$link->getPageLink('index')}" method="post" class="newsletter-form">

            <input type="text" name="email" size="18"
                value="{if isset($value) && $value}{$value}{else}{l s='your e-mail' mod='blockmultiletter'}{/if}"
                onfocus="javascript:if(this.value=='{l s='your e-mail' mod='blockmultiletter'}')this.value='';"
                onblur="javascript:if(this.value=='')this.value='{l s='your e-mail' mod='blockmultiletter'}';"
                class="span12" 
                style="border-color:#727174; font-weight:200"/>
            <!--<select name="action">
                <option value="0"{if isset($action) && $action == 0} selected="selected"{/if}>{l s='Subscribe' mod='blockmultiletter'}</option>
                <option value="1"{if isset($action) && $action == 1} selected="selected"{/if}>{l s='Unsubscribe' mod='blockmultiletter'}</option>
            </select>-->
                <input type="submit" value="ok" class="button_mini newsletter-submit" name="submitNewsletter" />
            <input type="hidden" name="action" value="0" />
		</form>
        </div>
	</div>
</div>
<!-- /Block Newsletter module-->

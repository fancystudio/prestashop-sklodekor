		{if !$content_only}
				</div>
            </div>
        </div>
    </div>
    {if in_array($page_name,array('index','category','product'))}
    <div class="container">
        <div class="row-fluid">
            {Hook::exec('multiManHook')}
        </div>
    </div>
    {/if}

    <!-- Footer -->
    <div id="footer" class="footer">
        <div id="footer-back">
            <div class="container">
                <div class="row-fluid nice-columns">
                    {$HOOK_FOOTER}
                </div>
                {if strlen(Configuration::get('MULTI_TWITTER_ACC'))}
                <div class="row-fluid">
                    <div class="span12 twitter-footer">
                        <div class="footer-block-inner">
                            <div class="twitter-container">
                                <div class="twitter-inner">
                                    <span id="twitter-msg">{l s='Loading...'}</span>
                                    <span id="twitter-tmt">&nbsp;</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {/if}
            </div>
        </div>
    </div>
    <div class="copyright">
        
            <div class="container">
                <span class="pull-right footer-copyright" >Copyright © 2012 - 2013 sklodekor.sk All rights reserved. Designed & powered by:
<a href="http://www.fancy-studio.sk" onclick="window.open(this.href, 'OffSite').focus(); return false;">
 <img src="themes/sklodekor/img/fancy-logo.png" alt="fancy studio" width="81" height="16" style="margin-left:4px" /></a>                
          </span>
            <div style="clear: both"></div>  
        </div>
    
    
    </div>
    <a href="#" class="scrollup">&uarr;</a>
	{/if}
	</body>
</html>

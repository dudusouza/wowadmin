<div class="tabbable">
    <ul class="tabs nav nav-tabs">
        {foreach from=$arrTabs item=arrTab}
            <li class="{if $arrTab@first}active{/if}"><a data-toggle="tab" href="#{$arrTab.name}">{$arrTab.title}</a></li>
            {/foreach}
    </ul>
    <div class="tab-content tabs-flat">
        {foreach from=$arrTabs item=arrTab}
            <div id="{$arrTab.name}" class="tab-pane {if $arrTab@first}in active{/if}">
                {foreach from=$arrTab.arrFields item=arrField}
                    <div class="form-group flexform">
                        {if $arrField.label != ""}
                            <label for="field_{$arrField.name}" class="clearfix blocklabel">{$arrField.label}</label>
                        {/if}
                        <div class="clearfix blockfield">
                            {$arrField.field}
                        </div>
                    </div>
                {/foreach}
            </div>
        {/foreach}
    </div>
</div>
<button type="submit" class="btn btn-default">{admlang}lbl_add{/admlang}</button>
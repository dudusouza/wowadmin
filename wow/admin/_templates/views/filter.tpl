<div class="row">
    <div class="col-md-12">
        <form role="form" class="form-horizontal col-lg-6" method="post">
            {foreach from=$arrFields item=arrField}
                <div class="form-group">
                    {if $arrField.label != ""}
                        <label for="field_{$arrField.name}" class="col-sm-2 control-label no-padding-right">{$arrField.label}</label>
                    {/if}
                    <div class="col-sm-10">
                        {$arrField.field}
                    </div>
                </div>
            {/foreach}
            <button type="submit" class="btn btn-blue">
                <i class="fa fa-filter"></i>  {admlang}btn_filter{/admlang}
            </button>
            <a class="btn btn-danger" href="{$formurl}">
                <i class="fa fa-eraser"></i>  {admlang}btn_clear{/admlang}
            </a>
        </form>
    </div>
</div>
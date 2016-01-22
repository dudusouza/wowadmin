<div class="col-sm-{$width}">
    <input type="text" name="{$name}" id="field_{$name}" class="form-control {if $mask!=null}mask{/if}" {if $mask!=null}data-mask="{$mask}"{/if} value="{$value}" maxlength="{$length}" />
</div>
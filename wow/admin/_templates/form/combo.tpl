<div class="col-sm-{$width}">
    <select type="text" name="{$name}" id="field_{$name}" class="form-control col-md-{$width}">
        <option></option>
        {foreach from=$arr key=k item=valuecombo}
            <option {if {$k}=={$val}}selected{/if} value="{$k}">{$valuecombo}</option>
        {/foreach}
    </select>
</div>
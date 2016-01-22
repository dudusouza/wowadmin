<hr>
<div class="row">
    <div class="col-md-6">
        {$widegetdefault}
    </div>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            {if $widegettableleft != ''}
                <th></th>
                {/if}
                {foreach from=$arrColumns item=column}
                <th>{$column}</th>
                {/foreach}
                {if $widegettable != ''}
                <th>{admlang}title_actions{/admlang}</th>
                {/if}
        </tr>
    </thead>
    <tbody>
        {foreach from=$arrData item=data}
            <tr>
                {if $widegettableleft != ''}
                    <td>{$widegettableleft|replace:"#ID#":{$data.__wow__pkname__}}</td>
                {/if}
                {foreach key=k from=$data item=dataitem}
                    {if $k != '__wow__pkname__'}
                        <td>{$dataitem}</td>
                    {/if}
                {/foreach}
                {if $widegettable != ''}
                    <td>{$widegettable|replace:"#ID#":{$data.__wow__pkname__}}</td>
                {/if}
            </tr>
        {/foreach}
    </tbody>
</table>
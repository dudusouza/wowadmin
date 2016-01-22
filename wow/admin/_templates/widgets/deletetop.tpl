<div class="btn-group">
    <button class="btn btn-danger" id="delete-itens">
        <i class="fa fa-remove"></i> {admlang}lbl_delete{/admlang}
    </button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
        <span class="caret"></span>
    </button>
    <ul class="dropdown-menu"> 
        <li>
            <a href="javascript: void(0);" id="delete-all">{admlang}lbl_delete_all{/admlang}</a>
        </li>
    </ul>    
</div>
{literal}
    <script>
        (function () {
            var formurl = '{/literal}{$formurl}{literal}';
            var desejadeletar = '{/literal}{admlang}msg_deleteitem{/admlang}{literal}';
                    var desejadeletarall = '{/literal}{admlang}msg_deleteitem_all{/admlang}{literal}';
                            $('#delete-all').click(function () {
                                if (confirm(desejadeletarall)) {
                                    var url = formurl + '/action/delete-many/' + values.join(':');
                                    window.location = url;
                                }
                            });
                            $('#delete-itens').click(function () {
                                if ($('.delete-item:checked').length > 0) {
                                    if (confirm(desejadeletar.replace('{total}', $('.delete-item:checked').length))) {
                                        var values = [];
                                        $('.delete-item:checked').each(function (i) {
                                            var deleteObj = $('.delete-item:checked').eq(i);
                                            values.push(deleteObj.val());
                                        });
                                        var url = formurl + '/action/delete/many/' + values.join(':');
                                        window.location = url;
                                    }
                                }

                            });
                        })();
    </script>
{/literal}
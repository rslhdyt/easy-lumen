<script type="text/javascript">
    var user = {
        url: App.siteUrlApi + '/users',
        table: $('#datagrid-user'),
        formDialog: function(type){
            return $('#dialog-users-' + type);
        },
        getSelected: function() {
            return this.table.datagrid('getSelected');
        },
        create: function() {
            this.formDialog('create').dialog('open').dialog('center').dialog('setTitle','Tambah User');
            $('#form-users-create').form('clear');
            this.url = App.siteUrlApi + '/users';
        },
        edit: function() {
            var userData = this.getSelected();

            if (userData) {
                this.formDialog('edit').dialog('open').dialog('center').dialog('setTitle','Edit User');
                $('#form-users-edit').form('load', userData);

                this.url = App.siteUrlApi + '/users/' + userData.id;
            }
        },
        cancel: function(type) {
            this.formDialog(type).dialog('close');
            $('#form-users-' + type).form('clear');
        },
        store: function() {
            var userData = $('#form-users-create').serialize();

            if ($('#form-users-create').form('validate')) {
                $.post(this.url, userData).done(function(result) {
                    user.formDialog('create').dialog('close');
                    user.table.datagrid('reload');
                });
            }

        },
        update: function() {
            var userData = $('#form-users-edit').serialize();

            $.ajax({
                type:'PUT',
                url:this.url,
                data: userData,
                success:function(result){
                    user.formDialog('edit').dialog('close');
                    user.table.datagrid('reload');

                    $.messager.show({
                        title: 'success',
                        msg: result.message
                    });
                }
            });
        },
        delete: function() {
            var userData = this.getSelected();

            if (userData)
            {
                $.messager.confirm('Confirm','Are you sure you want to delete record?',function(response){
                    if (response){
                        $.ajax({
                            type:'DELETE',
                            url:App.siteUrlApi + '/users/' + userData.id,
                            success:function(result){
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.message
                                });
                                user.table.datagrid('reload');
                            }
                        });  
                    }
                });
            }
        },
        search: function(keyword, name, parent) {
            user.table.datagrid('load', {
                q: keyword
            });
        }
    }
</script>
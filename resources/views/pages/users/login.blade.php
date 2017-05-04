@extends('layouts.login')

@section('content-title')
Anggota
@endsection

@section('content')
<div id="dd" class="easyui-dialog" title="Login Sikopit" style="width:400px;height:186px;"
        data-options="iconCls:'icon-lock',resizable:false,modal:true,closable:false,draggable:false,top:'100px'" buttons="#dialog-buttons-login">
    <form id="form-login" method="post" novalidate style="margin:0;padding:10px 30px">
        <div style="margin-bottom:10px">
            <input name="email" class="easyui-textbox" required="true" validType="email" label="Email:" style="width:100%" labelWidth="130px;">
        </div>

        <div style="margin-bottom:10px">
            <input name="password" class="easyui-passwordbox" required="true" label="Password:" style="width:100%" labelWidth="130px;">
        </div>
    </form>
</div>

<div id="dialog-buttons-login">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onClick="Auth.login(event)">Login</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onClick="Auth.forgot()">Forgot Password</a>
</div>

<script type="text/javascript">
    window.Auth = {
        form: $('#form-login'),
        url: App.siteUrlApi + '/login',
        login: function(e) {
            e.preventDefault;

            var credentials = this.form.serialize();

            if (this.form.form('validate')) {
                $.post(this.url, credentials, function(result){
                    console.log(result);
                    Cookies.set('api-token', result.data.api_token);

                    window.location = App.siteUrl + '/p/dashboard';
                });
            }
        }
    };
</script>
@endsection
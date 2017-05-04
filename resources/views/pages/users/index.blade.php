@extends('layouts.app')

@section('content-title')
Dashboard > User
@endsection

@section('content')
<table id="datagrid-user" title="Data Users" url="{{ url_api('users') }}" class="easyui-datagrid" data-options="singleSelect:true,method:'get',border:false,pagination:true,toolbar:'#toolbar-general',rownumbers:true,itemId:'email'" style="height:100%" pageSize="20">
    <thead>
        <tr>
            <th data-options="field:'checkbox',checkbox:true"></th>
            <th data-options="field:'id',hidden:true"></th>
            <th data-options="field:'name',resizable:false" width="15%">Nama</th>
            <th data-options="field:'email',resizable:false" width="15%">Email</th>
        </tr>
    </thead>
</table>

{!! app_easyui_toolbar_general('toolbar-general', [ 
    ['txt' => 'Tambah User', 'icon' => 'icon-add', 'on_click' => 'user.create()'], 
    ['txt' => 'Edit User', 'icon' => 'icon-edit', 'on_click' => 'user.edit()'], 
    ['txt' => 'Hapus User', 'icon' => 'icon-remove', 'on_click' => 'user.delete()'], 
    ['txt' => 'Advance Search', 'icon' => 'icon-search']
], ['search_callback' => 'user.search']) !!}

<div id="dialog-users-create" class="easyui-dialog" modal="true" style="width:450px" closed="true" buttons="#dialog-buttons-create">
    
</div>
<div id="dialog-buttons-create">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onClick="user.store()" style="width:90px">Save</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onClick="user.cancel('create')" style="width:90px">Cancel</a>
</div>

<div id="dialog-users-edit" class="easyui-dialog" modal="true" style="width:450px" closed="true" buttons="#dialog-buttons-edit">
    <form id="form-users-edit" method="put" novalidate style="margin:0;padding:10px 30px">
        <div style="margin-bottom:10px">
            <input name="name" class="easyui-textbox" required="true" label="Name:" style="width:100%" labelWidth="130px;">
        </div>
        <div style="margin-bottom:10px">
            <input name="email" class="easyui-textbox" required="true" validType="email" label="Email:" style="width:100%" labelWidth="130px;">
        </div>
    </form>
</div>
<div id="dialog-buttons-edit">
    <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onClick="user.update()" style="width:90px">Update</a>
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onClick="user.cancel('edit')" style="width:90px">Cancel</a>
</div>
@endsection

@section('content-right')
<div data-options="region:'east', split:true, collapsed: true" title="East" style="width:15%;">
    <form id="form-users-create" method="post" novalidate style="margin:0;padding:10px 30px">
       @include('pages.users._form-input')

       <div class="button-form">
            <a href="#" class="easyui-linkbutton" onClick="targetCustomer.save()">Save</a>
            <a href="#" class="easyui-linkbutton" onClick="targetCustomer.cancelForm()">Cancel</a>
        </div>
    </form>
</div>
@endsection

@section('scripts')
    @include('pages.users._scripts')
@endsection
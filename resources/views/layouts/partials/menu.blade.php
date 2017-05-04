<input class="easyui-searchbox" data-options="prompt:'Please Input Value'" style="width:93%">
<ul class="easyui-tree">
    <li>
        <span>Dashboard</span>
        <ul>
            <li><a href="{{ url_web('dashboard') }}">Dashboard</a></li>
        </ul>
    </li>
    <li>
        <span>Administrator</span>
        <ul>
            <li><a href="{{ url_web('users') }}">Users</a></li>
        </ul>
    </li>
</ul>
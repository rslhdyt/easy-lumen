@include('layouts.partials.header')
<body>
    <div class="easyui-layout main-layout" style="height:500px">
        <div class="layout-top" data-options="region:'north', border:false">
            <h2>Easy Lumen</h2>

            <a href="#" class="logout" onClick="Auth.logout()">Logout</a>
        </div>
        <div data-options="region:'south',split:true" style="height:50px;padding:5px;" id="log"></div>

        @yield('content-right')
        
        <div class="layout-left" data-options="region:'west',split:true" title="Menu" style="width:15%;">
            @include('layouts.partials.menu')
        </div>
        <!-- center -->
        <div class="layout-center" title="@yield('content-title')" data-options="region:'center'" style="width:70%;">
            @yield('content')
        </div>
    </div>

    <div class="overlay"></div>
    @include('layouts.partials.footer')
</body>
</html>
<script type="text/javascript" src="/js/jquery.min.js"></script>
<script type="text/javascript" src="/js/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/js/js.cookie.js"></script>
<script src="{{ url('js/app.js') }}"type="text/javascript"></script>

<script type="text/javascript">
    window.Auth = {
        logout: function() {
            Cookies.remove('api-token');
            window.location = App.siteUrl + '/p/user/login';
        }
    }
</script>

@yield('scripts')
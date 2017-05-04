<?php

function app_easyui_toolbar_general($selector, $links = [], $options = [], $style = 'padding:2px 5px;')
{
    $toolbar = '<div id="' . $selector . '" style="' . $style . '">';

    foreach ($links as $key => $link) {
        $on_click = !empty($link['on_click']) ? 'onClick="' . $link['on_click'] . '"' : '';

        $toolbar .= '<a href="#" class="easyui-linkbutton" iconCls="' . $link['icon'] . '" plain="true" ' . $on_click . '>' . $link['txt'] . '</a>';
    }

    $toolbar .= '<span style="float:right;"><input id="' . $selector . '-searchbox" class="easyui-searchbox" data-options="prompt:\'Please Input Value\',searcher:' . $options['search_callback'] . '" style="width:100%" autofocus="true"></span>';

    $toolbar .= '</div>';

    return $toolbar;
}

function app_easyui_toolbar_search()
{
    return '<div id="toolbar-search" style="padding:2px 5px;">
        Date From: <input class="easyui-datebox" style="width:110px">
        To: <input class="easyui-datebox" style="width:110px">
        <a href="#" class="easyui-linkbutton" iconCls="icon-search">Search</a>
    </div>';
}

function url_web($url)
{
    return url('p/' . $url);
}

function url_api($url)
{
    return url('api/' . $url);
}

/**
 * Generate a random string, using a cryptographically secure 
 * pseudorandom number generator (random_int)
 * 
 * For PHP 7, random_int is a PHP core function
 * For PHP 5.x, depends on https://github.com/paragonie/random_compat
 * 
 * @param int $length      How many characters do we want?
 * @param string $keyspace A string of all possible characters
 *                         to select from
 * @return string
 */
function random_str($length, $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
{
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}

if (! function_exists('bcrypt')) {
    /**
    * Hash the given value.
    *
    * @param  string  $value
    * @param  array   $options
    * @return string
    */
    function bcrypt($value, $options = [])
    {
       return app('hash')->make($value, $options);
    }
}
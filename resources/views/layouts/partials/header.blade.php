<!DOCTYPE html>
<html>
<head>
    <title>Easy Lumen</title>

    <link rel="stylesheet" type="text/css" href="/css/themes/gray/easyui.css">
    <link rel="stylesheet" type="text/css" href="/css/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <script type="text/javascript">
        window.App = <?php echo json_encode([
            'siteUrl'    => url('/'),
            'siteUrlApi' => url('api'),
        ]); ?>
    </script>
</head>
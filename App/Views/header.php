<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= $this->title; ?></title>
        <meta name="description" content="<?= $this->title; ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="/css/main.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.10/semantic.min.css">
        <script src="https://cdn.jsdelivr.net/semantic-ui/2.2.10/semantic.min.js"></script>

    </head>
    <body>

        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
        
        <div id="navigation">
            <?php require 'navigation.php'; ?>
        </div>

        <div id="sidebar">
            <?php require 'sidebar.php'; ?>
        </div>

        <div class="ui container">
            <div class="ui clearing"></div>
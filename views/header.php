<!DOCTYPE html>

<html>

    <head>

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <a href="/"><img alt="C$50 Finance" src="/img/logo.png"/></a>
                </div>
                <?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav nav-pills">
                        <li><a style= "font-size:14px;" href="index.php"><?= $firstname ?> <?= $lastname ?></a></li>
                        <li><a style= "font-size:14px;" href="quote.php">Quote</a></li>
                        <li><a style= "font-size:14px;" href="buy.php">Buy</a></li>
                        <li><a style= "font-size:14px;" href="sell.php">Sell</a></li>
                        <li><a style= "font-size:14px;" href="history.php">History</a></li>
                        <li><a style= "font-size:14px;" href="extra.php">Deposit</a></li>
                        <li><a style= "font-size:14px;" href="logout.php">Log Out</a></li>
                    </ul>
                <?php endif ?>
            </div>

            <div id="middle">

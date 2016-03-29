<body style="background-color: #e6ecff"/>
<h1><?= $stock["name"] ?>'s (<?= $stock["symbol"] ?>)</h1>
<h3>stock is worth: $<?= $stock["price"] ?></h3>
<a class="btn btn-default" href="buy.php?symbol=<?= $stock["symbol"] ?>" role="button">
    <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Buy</a>

<body style="background-color: #ffcccc"/>
<form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input class="form-control" value="<?= $symbol_name ?>" name="symbol" placeholder="Symbol" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="shares" placeholder="Num. of Shares" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                    Buy
                    
            </button>
        </div>
    </fieldset>
</form>
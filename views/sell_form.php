<body style="background-color: #ffffe6"/>
<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-control" name="symbol">
                <option value="Symbol">Symbol</option>
                <?php 
                foreach( $symbols as $symbol)
                {
                    echo '<option value="'.$symbol["symbols"].'">'.$symbol["symbols"].'</option>';
                }
                ?>
            </select>
        </div>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="shareamount" placeholder="N° of Shares" type="int"/>
        </div>        
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
                 Sell
            </button>
        </div>
    </fieldset>
</form>

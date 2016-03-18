<table class ="table table-striped">
    <thead>
        <tr>
            <th class="text-left" style= "font-family:Verdana; font-size:18px; color:#0066FF">Transaction</th>
            <th class="text-left" style= "font-family:Verdana; font-size:18px; color:red">Date</th>
            <th class="text-left" style= "font-family:Verdana; font-size:18px; color:#FFCC00">Symbol</th>
            <th class="text-left" style= "font-family:Verdana; font-size:18px; color:green">Shares</th>
            <th class="text-left" style= "font-family:Verdana; font-size:18px; color:red">Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($table as $cell): ?>
            <tr>
                <td><?= $cell["type"] ?></td>
                <td><?= $cell["time"] ?></td>
                <td><?= $cell["symbols"] ?></td>
                <td><?= $cell["shares"] ?></td>
                <td><?= $cell["price"] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
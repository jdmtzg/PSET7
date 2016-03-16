<table class ="table table-striped">
    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
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
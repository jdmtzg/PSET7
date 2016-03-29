
<table class ="table table-striped">
    <thead>
        <tr>
            <th class="text-left" style= "font-family:Verdana; font-size:18px; color:#0066FF">Name</th>
            <th class="text-left" style= "font-family:Verdana; font-size:18px; color:#CC0000">Symbol</th>
            <th class="text-left" style= "font-family:Verdana; font-size:18px; color:#FFCC00">Shares</th>
            <th class="text-left" style= "font-family:Verdana; font-size:18px; color:green">Price</th>
            <th class="text-left" style= "font-family:Verdana; font-size:18px; color:#CC0000">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($positions as $position): ?>
            <tr>
                <td><?= $position["name"] ?></td>
                <td><?= $position["symbol"] ?></td>
                <td><?= $position["shares"] ?></td>
                <td>$<?= $position["price"] ?></td>
                <td>$<?= $position["total"] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<h3>Your blance is: </h3>
<h4>$<?=$cash?></h4>
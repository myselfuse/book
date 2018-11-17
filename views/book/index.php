<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<?= Html::a('增加', ['book/add'], ['class' => 'btn btn-primary']) ?>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>ISBN</th>
            <th>书名</th>
            <th>作者</th>
            <th>出版日期</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($books as $book): ?>
            <tr>
                <td><?=$book->isbn?></td>
                <td><?=$book->name?></td>
                <td><?=$book->author?></td>
                <td><?=$book->pdate?></td>
                <th>
                <?= Html::a('删除', ['book/delete', 'id' => $book->id], ['class' => 'btn btn-warning']) ?>
                </th>
            </tr>
        <?php endforeach; ?>	
    </tbody>
	</table>

<?= LinkPager::widget(['pagination' => $pagination]) ?>
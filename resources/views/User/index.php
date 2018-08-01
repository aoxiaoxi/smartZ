<?php foreach ($userlist as $item): ?>
    <a class="big" href="<?php echo APP_URL ?>/item/view/<?php echo $item['id'] ?>" title="点击修改">
        <span class="item">
            <?php echo $item['name'] ?>
            <?php echo $item['email'] ?>
        </span>
    </a>
    ----
    <a class="big" href="<?php echo APP_URL ?>/item/delete/<?php echo $item['id']?>">删除</a>
    <br/>
<?php endforeach ?>
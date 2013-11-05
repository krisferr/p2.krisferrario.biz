<h2> See Tweets</h2>
<br/>
<br/>
<br/>


<?php foreach($posts as $post): ?>

<article>

    <h3><?=$post['first_name']?> <?=$post['last_name']?> tweeted:</h3>

    <p class= view> <?=$post['content']?></p>

    <time datetime="<?=Time::display($post['created'],'Y-m-d G:i')?>">
        <?=Time::display($post['created'])?>
    </time>
    
    <aside>
            <!-- For those posts owned by this user id provide option to delete post-->
            <?php if ($post['post_user_id'] == $user->user_id): ?>
                <a class=change href='/posts/delete/<?=$post['post_id']?>'>Delete it</a>
                <a class=change href='/posts/edit/<?=$post['post_id']?>'>Edit it</a>
            <? endif; ?> 
    </aside>  

</article>
<br/>

<?php endforeach; ?>

<form method='POST' action='/posts/p_edit/<?=$post_id?>'>

        <h2>Edit Post</h2>
        <textarea rows="4" cols="100" name='content' id='content'><?=$post_text?></textarea>
        
        <br><br>
        
        <input type='Submit' value='Edit Post'>

</form>
<?php
foreach($v['notes'] as $note){
    ?>
    <div class="simple_note" rel="<?=$note['id']?>"><?=$note['text']?></div>

<?php
}
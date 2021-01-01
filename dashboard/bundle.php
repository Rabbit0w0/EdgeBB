<?php   
$file="./_bundles";
$temp=scandir($file);
?>
<?php foreach($temp as $v): ?>
    <?php $a=$file.'/'.$v;?>
    <?php if(!is_dir($a)):?>
        <script src="<?php echo $a; ?>"></script>
    <?php endif; ?>
<? endforeach;?>
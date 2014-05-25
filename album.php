<? include_once('top.html'); ?>
<? include_once('header.html'); ?>

<div class="container">

<div class="panel panel-default">
  <div class="panel-heading">
    <h2 class="panel-title"><? printAlbumTitle(); ?></h2>
      <? foreach (getParentBreadcrumb() as $el) { ?>
      <a class="muted"href="<?= html_encode($el['link'])?>"><?= html_encode($el['text']) ?></a>
  <? } ?>
    <p>	<?php printAlbumDesc(); ?> </p>
  </div>
  <div class="panel-body">     
  <div class="mt40">
    <section class="row">
    <? while (next_album()) { ?>
        <article class="col-xs-12 col-sm-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="<?php echo html_encode(getAlbumLinkURL()); ?>">
                      <?php printCustomAlbumThumbImage( $alt, $size, $width = 500, $height = 400 ); ?>
                    </a>
                </div>
                <div class="panel-footer mh">
                     <h4><a href="<?php echo html_encode(getAlbumLinkURL()); ?>">
	                     <?php printAlbumTitle(); ?></h4></a>
	                     <p><?php printAlbumDesc(); ?></p>
                    <span class="pull-right">

                    </span>
                </div>
            </div>
        </article>
    <? } ?>

    <? while (next_image()) { ?>
        <article class="col-xs-11 col-sm-5 col-md-2">
           <div class="panel panel-default">
              <div class="panel-body">
            <a href="<?php echo html_encode(getImageLinkURL()); ?>" title="<?php printBareImageTitle(); ?>">
               <?php printCustomSizedImage( $alt, $size, $width = 500, $height = 400 ); ?>
            </a>
            </div>
           </div>
        </article>
    <? } ?>
    </section>   
</div>

  </div>
</div>






<?
$nav = getPageNavList (false, 9, true, getCurrentPage(), max(1, getTotalPages(false) ) );
if (count($nav) > 3) { ?>
    <ul class="pagination">
    <? foreach($nav as $k=>$v) {
          $label = $k;
          if ($k == 'prev') {
            $label = '&laquo;';
          }else if ($k == 'next') {
            $label = '&raquo;';
          }
          $c = '';
          if (empty($v)) {
            $c = 'class="disabled"';
          } else if ($k == getCurrentPage()) {
            $c = 'class="active"';
          }
          ?>

          <li <?= $c ?> ><a href="<?=html_encode($v)?>"><?= $label ?></a></li>
          <?
    } ?>
    <ul>
    </div>
<?
}
?>

<?php include_once('footer.html'); ?>
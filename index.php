<? include_once "top.html" ?>
<? include_once "header.html" ?>
<body>
<div class="container mt40">
    <section class="row">
    <? while (next_album()) { ?>
        <article class="col-xs-12 col-sm-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="<?php echo html_encode(getAlbumLinkURL()); ?>">
                      <?php printCustomAlbumThumbImage( $alt, $size, $width = 500, $height = 400 ); ?>
                    </a>
                </div>
                <div class="panel-footer">
                     <h4><a href="<?php echo html_encode(getAlbumLinkURL()); ?>">
                           <span class="text-muted glyphicon glyphicon-book"></span>

                           <a class="text-muted" href="<?php echo html_encode(getAlbumLinkURL()); ?>">

	                     <?php printAlbumTitle(); ?></h4></a>
	                     
	        <?php
			$anumber = getNumAlbums();
			$inumber = getNumImages();
			if ($anumber > 0 || $inumber > 0) {
				echo '<a class="text-muted" href='. html_encode(getAlbumLinkURL()). '> ';
				if ($anumber == 0) {
					if ($inumber != 0) {
						printf(ngettext('%u image','%u images', $inumber), $inumber);
					}
				} else if ($anumber == 1) {
					if ($inumber > 0) {
						printf(ngettext('1 Album,&nbsp;%u image','1 Album,&nbsp;%u images', $inumber), $inumber);
					} else {
						printf(gettext('1 Album'));
					}
				} else {
					if ($inumber == 1) {
						printf(ngettext('%u Album,&nbsp;1 image','%u Albums,&nbsp;1 image', $anumber), $anumber);
					} else if ($inumber > 0) {
						printf(ngettext('%1$u Album,&nbsp;%2$s','%1$u Albums,&nbsp;%2$s', $anumber), $anumber, sprintf(ngettext('%u image','%u images',$inumber),$inumber));
					} else {
						printf(ngettext('%u Album','%u Albums', $anumber), $anumber);
					}
				}
				echo '</a><br />';
			}
			echo shortenContent(strip_tags(getAlbumDesc()), 50, '...');
		?>
                    <span class="pull-right">
                    
                    

                    </span>
                </div>
            </div>
        </article>
    <? } ?>
    </section>   
</div>

  <? while (next_image()) { ?>   
        <article class="col-xs-12 col-sm-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="<?php echo html_encode(getAlbumLinkURL()); ?>">
                      <?php printCustomAlbumThumbImage( $alt, $size, $width = 500, $height = 400 ); ?>
                    </a>
                </div>
                <div class="panel-footer">
                     <h4><a href="<?php echo html_encode(getAlbumLinkURL()); ?>">
	                     <?php printAlbumTitle(); ?></h4></a>
	                     <p><?php printAlbumDesc(); ?></p>
                    <span class="pull-right">

                    </span>
                </div>
            </div>
        </article>     
    <? } ?>

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
   
<?
}
?>
  </div>
<? include_once "footer.html" ?>



<? include_once "top.html" ?>
<? include_once "header.html" ?>

<div class="container">
      <? foreach (getParentBreadcrumb() as $el) { ?>
      <? }
      $ab = getAlbumBreadcrumb();
      ?>
      <h3><?= html_encode($ab['title']) ?> </h3>     
      <a href="<?= html_encode($ab['link'])?>">Back to Album</a> 
        <div class="btn-group pull-right">
            <a type="button" class="btn btn-inverse <?= hasPrevImage() ? '':'disabled'?>" href="<?=hasPrevImage() ? html_encode(getPrevImageURL()) : '#'?>">Prev</a>
            <a type="button" class="btn btn-inverse <?= hasNextImage() ? '':'disabled'?>" href="<?=hasNextImage() ? html_encode(getNextImageURL()) : '#'?>">Next</a>
        </div>

<? if (strpos($_zp_current_image->imagetype, 'image') !== false) { ?>
<? 
  $w = '90%';
  if ($_zp_current_image->get('width') < $_zp_current_image->get('height')) {
    $w = '60%';
  }
?>

    <p class="text-center">
    <!--<img src="<?=html_encode(getCustomSizedImageMaxSpace(1080, 720))?>" width="<?= $w ?>">-->
    <?php printCustomSizedImage( $alt, $size, $width = 1130, $height = 600 ); ?>

    </p>
</div>
<? }else if (strpos($_zp_current_image->imagetype, 'video') !== false) { ?>
<?
$preview_url = WEBPATH.ALBUM_FOLDER_EMPTY . $_zp_current_image->albumname .'/'. $_zp_current_image->objectsThumb;
$video_url = $_zp_current_image->webpath;
?>
<div class="container" style="text-align: center;">
<div id="myVideo" width="90%"><p>Loading the player....</p></div>
</div>
<script type="text/javascript" src="<?= $bs_functions->getJWPlayerPath() . '/jwplayer.js' ?>"></script>
    <script type="text/javascript">
        jwplayer("myVideo").setup({
            file: "<?=html_encode($video_url)?>",
            image: "<?=html_encode($preview_url)?>",
            title: "",
            aspectratio: "16:9",
            skin: "<?= $bs_functions->getJWPlayerPath() . '/six.xml' ?>",
            autostart: false,
            stretching: "exactfit",
            width: "90%",
            controls: true
        });
    </script>
<? } ?>

<? include_once('footer.html'); ?>

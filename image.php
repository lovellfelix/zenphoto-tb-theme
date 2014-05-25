<? include_once "top.html" ?>
<? include_once "header.html" ?>

<div class="container">

	<div class="row">
     
	     <div class="col-xs-12 col-sm-6 col-md-9">   
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
			
	        <?php printCustomSizedImage( $alt, $size, $width = 840, $height = 620 ); ?>
	        
	        <? }else if (strpos($_zp_current_image->imagetype, 'video') !== false) { ?>
				<?
				$preview_url = WEBPATH.ALBUM_FOLDER_EMPTY . $_zp_current_image->albumname .'/'. $_zp_current_image->objectsThumb;
				$video_url = $_zp_current_image->webpath;
				?>				
				<? include($bs_functions->getJWPlayerPath() . '/player.html'); ?>	        
	        <? } ?>                  
        </div>
        
        
      <div class="col-xs-12 col-md-3">
		      <div class="panel panel-default">
		      <div class="panel-heading">
			      <h3 class="panel-title">Gallery Information</h3></div>
		      <div class="panel-body">     
		        
		      </div>
		
		</div>


            <div class="row">

                <div class="col-xs-6 col-md-12">
	             <span class="pull-left"><i class="fa fa-eye"></i> <? echo getHitcounter(); ?> </span> 
	             <span class="pull-right"><i class="fa fa-calendar"></i> <?php printAlbumDate(); ?></span>
                </div>
             
                <div class="col-xs-6 col-md-12">
                <br />
                <input class="form-control" id="disabledInput" type="text" placeholder="<?= html_encode(getFullImageURL());?>" disabled>
	            <span class="pull-right"><i class="fa fa-download"></i> <a href="<?= html_encode(getFullImageURL());?>"> Download</a></span>

                </div>
             

                <div class="col-xs-6 col-md-8">



                </div>
                



            </div>



            
        </div>
    </div>
    
    

<? include_once('footer.html'); ?>

<?php get_header(); ?>
<?php  
  $hbanner = get_field('banner', HOMEID);
  if($hbanner):
  $banner_img = !empty($hbanner['image'])? cbv_get_image_tag( $hbanner['image'] ): '';
  $banner = !empty($hbanner['bg_image'])? cbv_get_image_src( $hbanner['bg_image'] ): '';
  $is_video = !empty($hbanner['upload_video'])?' has-vdo':''; 
?>
<section class="hm-banner<?php echo $is_video; ?>">
  <div class="hm-banner-bg-black"></div>
  <?php if( !empty($hbanner['upload_video']) ): ?>
  <div class="hm-video-cntlr">
    <video id="bnr-vdo" autoplay muted loop>
      <source src="<?php echo $hbanner['upload_video'];?>" type="video/mp4">
    </video>
  </div>
  <?php else: ?>
  <div class="hm-bnr-img-ctlr">
    <div class="hm-banner-bg inline-bg" style="background-image: url(<?php echo $banner; ?>);"></div>
  </div>
  <?php endif; ?>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="hm-bnr-cntlr">
            <div class="hm-banner-des">
              <?php if( !empty($hbanner['title']) ) printf( '<h1 class="hm-bnr-title fl-h1">%s</h1>', $hbanner['title'] ); ?>
              <div class="hm-banner-des-inr">
                <?php if( !empty($hbanner['description']) ) echo wpautop( $hbanner['description'] );?>
              </div>
              <?php
                $hlink = $hbanner['link'];
                if( is_array( $hlink ) &&  !empty( $hlink['url'] ) ){
                    printf('<div class="hm-bnr-btn"><a class="fl-red-btn fl-btn-angel" href="%s" target="%s">%s</a></div>', $hlink['url'], $hlink['target'], $hlink['title']); 
                }
              ?>
            </div>
            <?php if( empty($hbanner['upload_video']) ): ?>
          <div class="hm-bnr-img hide-sm">
            <?php echo $banner_img; ?>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php
$showhidepoker = get_field('showhidepoker', HOMEID);
if($showhidepoker): 
  $poker = get_field('pokersec', HOMEID);
?>
<?php 
$args = array(
    'post_type' => 'poker_sites',
    'posts_per_page'=> 5,
    'orderby' => 'date',
    'order'=> 'DESC'
);
?>
<section class="best-site-selection-sec">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-entry-hdr text-center">
          <?php if( !empty($poker['title']) ) printf('<h2 class="fl-h3 sec-entry-hdr-title">%s</h2>', $poker['title']); ?>
        </div>
        <div class="best-site-selection-sec-cntlr">

          <div class="best-site-cart-dsc">
            <div class="best-site-cart-dsc-cntlr">
              <ul class="reset-list">
                <li class="bg-transparent">
                  <div class="bst-site-cart-item-heading">
                    <div class="pog-site-thumbnail-name">
                      <span><?php _e('POKER ROOM', 'poker'); ?></span>
                    </div>
                    <div class="pog-site-price-grt-title">
                      <span><?php _e('PAYMENT GRADE', 'poker'); ?></span>
                    </div>
                    <div class="pog-site-bonus-title">
                      <span><?php _e('BONUS', 'poker'); ?></span>
                    </div>
                  </div>
                </li>
                <?php 
                  $hideload_more = false;
                  $query = new WP_Query($args);
                  if($query->have_posts()){
                  while( $query->have_posts() ){ $query->the_post();
                  $imgID = get_post_thumbnail_id(get_the_ID());
                  $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): community_placeholder('tag');
                  $rating = get_field('rating', get_the_ID());
                  $pay_grade = get_field('payment_grade', get_the_ID());
                  $bonus_percent = get_field('bonus_percent_value', get_the_ID());
                  $bonus_text = get_field('bonus_text', get_the_ID());
                  $play_link = get_field('play_link', get_the_ID());
                  $review_link = get_field('review_link', get_the_ID());
                ?>
                <li>
                  <div class="bst-site-cart-item">
                    <div class="pog-site-thumbnail">
                      <a>
                        <?php echo $imgtag; ?>
                      </a>
                      <div class="pog-site-des">
                        <h6 class="fl-h6 best-site-title"><?php the_title(); ?></h6>
                        <div class="site-reting">
                        <?php cbv_get_rating($rating); ?>
                        </div>
                        <div class="site-des">
                          <?php the_excerpt(); ?>
                        </div>
                      </div>
                    </div>
 
                    <div class="pog-site-bonus">

                      <div class="pog-site-price-grt">
                        <div class="pog-site-price-grt-cntlr">
                          <?php if(!empty($pay_grade)) printf('<strong>%s</strong>', $pay_grade); ?>
                        </div>
                      </div>

                      <div class="POG-site-bonus-lft">
                      <?php 
                        if( !empty($bonus_percent) ) printf('<strong>%s%s</strong>', $bonus_percent, '%'); 
                        if( !empty($bonus_text) ) printf('<span>%s</span>', $bonus_text); 
                      ?>
                      </div>
                    </div>

                    <div class="pog-site-btn">
                        <div class="pog-site-bonus-btn">
                          <?php
                          if( is_array( $play_link ) &&  !empty( $play_link['url'] ) ){
                            $playtitle = !empty($play_link['title'])?$play_link['title']:'Play Now';
                            printf('<a class="fl-btn" href="%s" target="%s">%s</a>', $play_link['url'], $play_link['target'], $playtitle); 
                          }else{
                            printf('<a class="fl-btn" href="%s">%s</a>', '#', 'Play Now'); 
                          }
                          if( is_array( $review_link ) &&  !empty( $review_link['url'] ) ){
                            $reviewtitle = !empty($review_link['title'])?$review_link['title']:'review';
                            printf('<a class="fl-btn" href="%s" target="%s">%s</a>', $review_link['url'], $review_link['target'], $reviewtitle); 
                          }else{
                            printf('<a class="fl-btn" href="%s">%s</a>', '#', 'review'); 
                          }
                          ?>
                        </div>
                    </div>

                  </div>
                </li>
                <?php } ?>
              <?php }else{ $hideload_more = true;?>
                <li><div class="notfound"><?php _e('No Result.', 'poker'); ?></div></li>
              <?php } wp_reset_postdata(); ?>
              </ul>
              <ul class="reset-list" id="ajax-content">
                
              </ul>
            </div>
          </div>
          <?php if( !$hideload_more ): ?>
          <div class="more-btn">
            <div class="ajaxloading" id="ajxaloader" style="display:none"><img src="<?php echo THEME_URI; ?>/assets/images/loading.gif" alt="loader"></div>
            <a href="#" id="loadMore"  data-page="1" data-url="<?php echo admin_url("admin-ajax.php"); ?>" ><?php _e('LOAD MORE', 'poker'); ?></a>
          </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php
$showhidetools = get_field('showhidetools', HOMEID);
if($showhidetools): 
  $strategy = get_field('strategysec', HOMEID);
  $strategy_title = get_field('strategy_title', HOMEID);
  if($strategy):
?>
<section class="Poker-Strategy-Tools-sec ">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="sec-entry-hdr text-center">
          <?php if( !empty($strategy_title) ) printf( '<h2 class="fl-h3 sec-entry-hdr-title">%s</h2>',$strategy_title ); ?>
        </div>
        <div class="Poker-Strategy-Tools-sec-cntlr">
          <div class="pk-strtgy-tls-lft-img">
            <?php if( !empty($strategy['flash']) ) printf( '<span>%s</span>', $strategy['flash'] ); ?>
            <div class="pk-strtgy-tls-img inline-bg" style="background-image: url(<?php if( !empty($strategy['image']) ) echo cbv_get_image_src( $strategy['image'] ); ?>);"></div>
          </div>
          <div class="pk-strtgy-tls-des">
            <?php
              if( !empty($strategy['title']) ) printf( '<h3 class="fl-h5 pk-strtgy-tls-title">%s</h3>', $strategy['title'] );
              if( !empty($strategy['description']) ) echo wpautop( $strategy['description'] );
              $stlink = $strategy['link'];
              if( is_array( $stlink ) &&  !empty( $stlink['url'] ) ){
                  printf('<div class="pk-strtgy-tls-des-btn"><a class="pk-strtgy-tls-des-btn" href="%s" target="%s">%s<svg class="btn-arrow" width="53" height="24" viewBox="0 0 53 24" fill="#FF5C26">
                    <use xlink:href="#btn-arrow"></use> 
                  </svg></a></div>', $stlink['url'], $stlink['target'], $stlink['title']); 
              }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php
$showhidenews = get_field('showhidenews', HOMEID);
if($showhidenews): 
  $news = get_field('newssec', HOMEID);
  if($news):
?>
<section class="news-section">
  <div class="news-sec-cntlr">
    <div class="news-sec-entry-hdr-cntlr">
      <div class="sec-entry-hdr">
        <?php if( !empty($news['title']) ) printf( '<h2 class="fl-h3 sec-entry-hdr-title">%s</h2>', $news['title'] ); ?>
      </div>
      <?php if( !empty($news['select_news']) ): ?>
      <div class="fl-prev-next">
        <span class="fl-prev">
          <i>
            <svg class="slider-lft-arrow-svg" width="90" height="24" viewBox="0 0 90 24" fill="#7D8D98">
              <use xlink:href="#slider-lft-arrow-svg"></use> 
            </svg>
          </i>
        </span>
        <span class="fl-next">
          <i>
            <svg class="slider-rgt-arrow-svg" width="90" height="24" viewBox="0 0 90 24" fill="#7D8D98">
              <use xlink:href="#slider-rgt-arrow-svg"></use> 
            </svg>
          </i>
        </span>
      </div>
      <?php endif; ?>
    </div>
    <?php 
      $newsobj = $news['select_news'];
      if( empty($newsobj) ){
          $newsobj = get_posts( array(
            'post_type' => 'post',
            'posts_per_page'=> 4,
            'orderby' => 'date',
            'order'=> 'desc',
            'suppress_filters' => false
          ) );  
      } 
    ?>
    <?php if( $newsobj ): ?>
    <div class="news-grid newsSlider">
      <?php 
      foreach( $newsobj as $news_row ): 
        $newsimgID = get_post_thumbnail_id($news_row->ID);
        $nimgsrc = !empty($newsimgID)? cbv_get_image_src($newsimgID): news_placeholder();
      ?>
      <div class="news-grid-item">
        <div class="item-overlay"></div>
        <div class="news-grid-item-inner">
          <div class="news-grid-item-img">
            <div class="news-grid-item-img-ineer">
              <a href="<?php echo get_the_permalink($news_row->ID); ?>" class="overlay-link"></a>
              <div class="news-grid-item-div inline-bg" style="background-image: url(<?php echo $nimgsrc; ?>);"></div>
            </div>
          </div>
          <div class="news-grid-item-des">
            <h6 class="news-grid-item-title fl-h6"><a href="<?php echo get_the_permalink($news_row->ID); ?>"><?php echo get_the_title($news_row->ID); ?></a></h6>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php get_footer(); ?>
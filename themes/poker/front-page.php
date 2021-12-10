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
    'posts_per_page'=> -1
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
          <div class="table-dsc">
            <table>
              <thead class="tbl-thead">
                <tr>
                  <th colspan="2" class="site-name"><span class="mHc">POKER ROOM</span></th>
                  <th class="payment"><span class="mHc">PAYMENT GRADE</span></th>
                  <th colspan="2" class="bonus"><span class="mHc">BONUS</span></th>
                </tr>
              </thead>
              <tbody class="tbl-bdy">
                 <tr>
                  <td class="best-site-thumbnail">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/best-site-logo-1.png">
                    </a>
                  </td>
                  <td class="bst-site-des">
                    <div class="best-site-des">
                      <h6 class="fl-h6 best-site-title">Poker Room</h6>
                      <div class="site-reting">
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star-smple.png" alt=""></span>
                      </div>
                      <div class="site-des">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                      </div>
                    </div>
                  </td>
                  <td class="payment-grate">
                    <div class="payment-grate-inner">
                      <div class="payment-grt-cntlr">
                        <span>a+</span>
                      </div>
                    </div>
                  </td>
                  <td class="site-bonus">
                    <div class="site-bonus-lft">
                      <strong>100%</strong>
                      <span>Up to $2500</span>
                    </div>
                  </td>
                  <td class="play-btn">
                    <div class="site-bonus-btn">
                      <a href="#" class="fl-btn">Play Now</a>
                      <a href="#" class="fl-btn">review</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="best-site-thumbnail">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/best-site-logo-2.png">
                    </a> 
                  </td>
                  <td class="bst-site-des">
                    <div class="best-site-des">
                      <h6 class="fl-h6 best-site-title">Poker Room</h6>
                      <div class="site-reting">
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                      </div>
                      <div class="site-des">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                      </div>
                    </div>
                  </td>
                  <td class="payment-grate">
                    <div class="payment-grate-inner">
                      <div class="payment-grt-cntlr">
                        <span>a+</span>
                      </div>
                    </div>
                  </td>
                  <td class="site-bonus">
                    <div class="site-bonus-lft">
                      <strong>100%</strong>
                      <span>Up to $2500</span>
                    </div>
                  </td>
                  <td class="play-btn">
                    <div class="site-bonus-btn">
                      <a href="#" class="fl-btn">Play Now</a>
                      <a href="#" class="fl-btn">review</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="best-site-thumbnail">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/best-site-logo-3.png">
                    </a> 
                  </td>
                  <td class="bst-site-des">
                    <div class="best-site-des">
                      <h6 class="fl-h6 best-site-title">Poker Room</h6>
                      <div class="site-reting">
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                      </div>
                      <div class="site-des">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                      </div>
                    </div>
                  </td>
                  <td class="payment-grate">
                    <div class="payment-grate-inner">
                      <div class="payment-grt-cntlr">
                        <span>a+</span>
                      </div>
                    </div>
                  </td>
                  <td class="site-bonus">
                    <div class="site-bonus-lft">
                      <strong>100%</strong>
                      <span>Up to $2500</span>
                    </div>
                  </td>
                  <td class="play-btn">
                    <div class="site-bonus-btn">
                      <a href="#" class="fl-btn">Play Now</a>
                      <a href="#" class="fl-btn">review</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="best-site-thumbnail">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/best-site-logo-4.png">
                    </a> 
                  </td>
                  <td class="bst-site-des">
                    <div class="best-site-des">
                      <h6 class="fl-h6 best-site-title">Poker Room</h6>
                      <div class="site-reting">
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                      </div>
                      <div class="site-des">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                      </div>
                    </div>
                  </td>
                  <td class="payment-grate">
                    <div class="payment-grate-inner">
                      <div class="payment-grt-cntlr">
                        <span>a+</span>
                      </div>
                    </div>
                  </td>
                  <td class="site-bonus">
                    <div class="site-bonus-lft">
                      <strong>100%</strong>
                      <span>Up to $2500</span>
                    </div>
                  </td>
                  <td class="play-btn">
                    <div class="site-bonus-btn">
                      <a href="#" class="fl-btn">Play Now</a>
                      <a href="#" class="fl-btn">review</a>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td class="best-site-thumbnail">
                    <a href="#">
                      <img src="<?php echo THEME_URI; ?>/assets/images/best-site-logo-5.png">
                    </a> 
                  </td>
                  <td class="bst-site-des">
                    <div class="best-site-des">
                      <h6 class="fl-h6 best-site-title">Poker Room</h6>
                      <div class="site-reting">
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                        <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                      </div>
                      <div class="site-des">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                      </div>
                    </div>
                  </td>
                  <td class="payment-grate">
                    <div class="payment-grate-inner">
                      <div class="payment-grt-cntlr">
                        <span>a+</span>
                      </div>
                    </div>
                  </td>
                  <td class="site-bonus">
                    <div class="site-bonus-lft">
                      <strong>100%</strong>
                      <span>Up to $2500</span>
                    </div>
                  </td>
                  <td class="play-btn">
                    <div class="site-bonus-btn">
                      <a href="#" class="fl-btn">Play Now</a>
                      <a href="#" class="fl-btn">review</a>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="best-site-cart-dsc">
            <div class="best-site-cart-dsc-cntlr">
              <ul class="reset-list">
                <li>
                  <div class="bst-site-cart-item-heading">
                    <div class="pog-site-thumbnail-name">
                      <span>POKER ROOM</span>
                    </div>
                    <div class="pog-site-price-grt-title">
                      <span>PAYMENT GRADE </span>
                    </div>
                    <div class="pog-site-bonus-title">
                      <span>BONUS</span>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="bst-site-cart-item">
                    <div class="pog-site-thumbnail">
                      <a href="#">
                        <img src="<?php echo THEME_URI; ?>/assets/images/best-site-logo-1.png" alt="">
                      </a>
                      <div class="pog-site-des">
                        <h6 class="fl-h6 best-site-title">Poker Room</h6>
                        <div class="site-reting">
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star-smple.png" alt=""></span>
                        </div>
                        <div class="site-des">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                        </div>
                      </div>
                    </div>
 
                    <div class="pog-site-bonus">

                      <div class="pog-site-price-grt">
                        <div class="pog-site-price-grt-cntlr">
                          <span>a+</span>
                        </div>
                      </div>

                      <div class="POG-site-bonus-lft">
                        <strong>100%</strong>
                        <span>Up to $2500</span>
                      </div>
                    </div>

                    <div class="pog-site-btn">
                        <div class="pog-site-bonus-btn">
                          <a href="#" class="fl-btn">Play Now</a>
                          <a href="#" class="fl-btn">review</a>
                        </div>
                    </div>

                  </div>
                </li>

                <li>
                  <div class="bst-site-cart-item">
                    <div class="pog-site-thumbnail">
                      <a href="#">
                        <img src="<?php echo THEME_URI; ?>/assets/images/best-site-logo-2.png" alt="">
                      </a>
                      <div class="pog-site-des">
                        <h6 class="fl-h6 best-site-title">Poker Room</h6>
                        <div class="site-reting">
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star-smple.png" alt=""></span>
                        </div>
                        <div class="site-des">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                        </div>
                      </div>
                    </div>
 
                    <div class="pog-site-bonus">

                      <div class="pog-site-price-grt">
                        <div class="pog-site-price-grt-cntlr">
                          <span>a+</span>
                        </div>
                      </div>

                      <div class="POG-site-bonus-lft">
                        <strong>100%</strong>
                        <span>Up to $2500</span>
                      </div>
                    </div>

                    <div class="pog-site-btn">
                        <div class="pog-site-bonus-btn">
                          <a href="#" class="fl-btn">Play Now</a>
                          <a href="#" class="fl-btn">review</a>
                        </div>
                    </div>

                  </div>
                </li>

                 <li>
                  <div class="bst-site-cart-item">
                    <div class="pog-site-thumbnail">
                      <a href="#">
                        <img src="<?php echo THEME_URI; ?>/assets/images/best-site-logo-3.png" alt="">
                      </a>
                      <div class="pog-site-des">
                        <h6 class="fl-h6 best-site-title">Poker Room</h6>
                        <div class="site-reting">
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star-smple.png" alt=""></span>
                        </div>
                        <div class="site-des">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                        </div>
                      </div>
                    </div>
 
                    <div class="pog-site-bonus">

                      <div class="pog-site-price-grt">
                        <div class="pog-site-price-grt-cntlr">
                          <span>a+</span>
                        </div>
                      </div>

                      <div class="POG-site-bonus-lft">
                        <strong>100%</strong>
                        <span>Up to $2500</span>
                      </div>
                    </div>

                    <div class="pog-site-btn">
                        <div class="pog-site-bonus-btn">
                          <a href="#" class="fl-btn">Play Now</a>
                          <a href="#" class="fl-btn">review</a>
                        </div>
                    </div>

                  </div>
                </li>

                 <li>
                  <div class="bst-site-cart-item">
                    <div class="pog-site-thumbnail">
                      <a href="#">
                        <img src="<?php echo THEME_URI; ?>/assets/images/best-site-logo-4.png" alt="">
                      </a>
                      <div class="pog-site-des">
                        <h6 class="fl-h6 best-site-title">Poker Room</h6>
                        <div class="site-reting">
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star-smple.png" alt=""></span>
                        </div>
                        <div class="site-des">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                        </div>
                      </div>
                    </div>
 
                    <div class="pog-site-bonus">

                      <div class="pog-site-price-grt">
                        <div class="pog-site-price-grt-cntlr">
                          <span>a+</span>
                        </div>
                      </div>

                      <div class="POG-site-bonus-lft">
                        <strong>100%</strong>
                        <span>Up to $2500</span>
                      </div>
                    </div>

                    <div class="pog-site-btn">
                        <div class="pog-site-bonus-btn">
                          <a href="#" class="fl-btn">Play Now</a>
                          <a href="#" class="fl-btn">review</a>
                        </div>
                    </div>

                  </div>
                </li>
                 <li>
                  <div class="bst-site-cart-item">
                    <div class="pog-site-thumbnail">
                      <a href="#">
                        <img src="<?php echo THEME_URI; ?>/assets/images/best-site-logo-5.png" alt="">
                      </a>
                      <div class="pog-site-des">
                        <h6 class="fl-h6 best-site-title">Poker Room</h6>
                        <div class="site-reting">
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star.png" alt=""></span>
                          <span><img src="<?php echo THEME_URI; ?>/assets/images/star-smple.png" alt=""></span>
                        </div>
                        <div class="site-des">
                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut </p>
                        </div>
                      </div>
                    </div>
 
                    <div class="pog-site-bonus">

                      <div class="pog-site-price-grt">
                        <div class="pog-site-price-grt-cntlr">
                          <span>a+</span>
                        </div>
                      </div>

                      <div class="POG-site-bonus-lft">
                        <strong>100%</strong>
                        <span>Up to $2500</span>
                      </div>
                    </div>

                    <div class="pog-site-btn">
                        <div class="pog-site-bonus-btn">
                          <a href="#" class="fl-btn">Play Now</a>
                          <a href="#" class="fl-btn">review</a>
                        </div>
                    </div>

                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="more-btn">
            <a href="#">LOAD MORE</a>
          </div>
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
    <?php if( !empty($news['select_news']) ): ?>
    <div class="news-grid newsSlider">
      <div class="news-grid-item">
        <div class="item-overlay"></div>
        <div class="news-grid-item-inner">
          <div class="news-grid-item-img">
            <div class="news-grid-item-img-ineer">
              <a href="#" class="overlay-link"></a>
              <div class="news-grid-item-div inline-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/news-grid-1.jpg);"></div>
            </div>
          </div>
          <div class="news-grid-item-des">
            <h6 class="news-grid-item-title fl-h6"><a href="#">What You Need to Start Playing Online Poker?</a></h6>
          </div>
        </div>
      </div>
      <div class="news-grid-item">
        <div class="item-overlay"></div>
        <div class="news-grid-item-inner">
          <div class="news-grid-item-img">
            <div class="news-grid-item-img-ineer">
              <a href="#" class="overlay-link"></a>
              <div class="news-grid-item-div inline-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/banner-img-2.jpg);"></div>
            </div>
          </div>
          <div class="news-grid-item-des">
            <h6 class="news-grid-item-title fl-h6"><a href="#">What Types of Poker Games Can I Play?</a></h6>
          </div>
        </div>
      </div>
      <div class="news-grid-item">
        <div class="item-overlay"></div>
        <div class="news-grid-item-inner">
          <div class="news-grid-item-img">
            <div class="news-grid-item-img-ineer">
              <a href="#" class="overlay-link"></a>
              <div class="news-grid-item-div inline-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/banner-img-3.jpg);"></div>
            </div>
          </div>
          <div class="news-grid-item-des">
            <h6 class="news-grid-item-title fl-h6"><a href="#">Top 10 Poker Tips for Beginners</a></h6>
          </div>
        </div>
      </div>
      <div class="news-grid-item">
        <div class="item-overlay"></div>
        <div class="news-grid-item-inner">
          <div class="news-grid-item-img">
            <div class="news-grid-item-img-ineer">
              <a href="#" class="overlay-link"></a>
              <div class="news-grid-item-div inline-bg" style="background-image: url(<?php echo THEME_URI; ?>/assets/images/banner-img-2.jpg);"></div>
            </div>
          </div>
          <div class="news-grid-item-des">
            <h6 class="news-grid-item-title fl-h6"><a href="#">What You Need to Start Playing Online Poker?</a></h6>
          </div>
        </div>
      </div>
    </div>
    <?php endif; ?>
  </div>
</section>
<?php endif; ?>
<?php endif; ?>
<?php get_footer(); ?>
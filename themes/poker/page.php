<?php get_header(); ?>
<section class="innerpage-con-wrap">
  <?php if( have_rows('content') ){ ?>
  <article class="default-page-con">
    <?php while ( have_rows('content') ) : the_row(); ?>
    <?php 
    if( get_row_layout() == 'fc_texteditor' ){ 
    $fc_text = get_sub_field('fctexteditor');
    ?>
    <div class="block">
      <div class="dfp-text-module">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="block-910">
                <?php echo wpautop($fc_text); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php 
    }elseif( get_row_layout() == 'image_text' ){ 
    $fc_afbeelding = get_sub_field('fc_image');
    $imgsrc = cbv_get_image_src($fc_afbeelding);
    $imgtag = cbv_get_image_tag($fc_afbeelding);
    $fc_tekst = get_sub_field('fc_text');
    $fc_link = get_sub_field('link');
    $positie_afbeelding = get_sub_field('position_image');
    $imgposcls = ( $positie_afbeelding == 'right' ) ? ' fl-dft-rgtimg-lftdes' : '';
    ?>
    <div class="block">
      <div class="fl-dft-overflow-module">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="fl-dft-lftimg-rgtdes clearfix<?php echo $imgposcls; ?>">
                <div class="fl-dft-overflow-module-in-bg"></div>
                <div class="fl-dft-lftimg-rgtdes-lft has-inline-bg">
                  <div class="inline-bg" style="background-image: url(<?php echo $imgsrc; ?>);"></div>
                  <div class="fl-dft-lftimg-rgtdes-lft-img">
                    <?php echo $imgtag; ?>
                  </div>
                </div>
                <div class="fl-dft-lftimg-rgtdes-rgt">
                    <?php 
                    echo wpautop($fc_tekst); 
                    if( is_array( $fc_link ) &&  !empty( $fc_link['url'] ) ){
                        printf('<a class="fl-red-btn" href="%s" target="%s">%s</a>', $fc_link['url'], $fc_link['target'], $fc_link['title']); 
                    }
                    ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>
    <?php endwhile; ?>
  </article>
  <?php } ?>
</section>
<?php get_footer(); ?>
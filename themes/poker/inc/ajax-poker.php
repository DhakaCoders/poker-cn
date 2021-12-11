<?php
function ajax_poker_load_more($args) {
    //init ajax
    $ajax = false;
    //check ajax call or not
    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
        $ajax = true;
    }
    //number of posts per page default
    $num = 5;
    //page number
    $paged = 1;
    if(isset($_POST['page']) && !empty($_POST['page'])){
        $paged = $_POST['page'] + $paged;
    }
    $query = new WP_Query(array( 
        'post_type'=> 'poker_sites',
        'post_status' => 'publish',
        'posts_per_page' =>$num,
        'paged'=>$paged,
        'orderby' => 'date',
        'order'=> 'DESC'
      ) 
    );
   // printr($query);
    if($query->have_posts()){
    ?>
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
    while($query->have_posts()): $query->the_post();
	  $imgID = get_post_thumbnail_id(get_the_ID());
	  $imgtag = !empty($imgID)? cbv_get_image_tag($imgID): poker_placeholder('tag');
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
    <?php 
    endwhile;
    } wp_reset_postdata();
    
    //check ajax call
    if($ajax) wp_die();
}

/*
 * load more script ajax hooks
 */
add_action('wp_ajax_nopriv_ajax_poker_load_more', 'ajax_poker_load_more');
add_action('wp_ajax_ajax_poker_load_more', 'ajax_poker_load_more');
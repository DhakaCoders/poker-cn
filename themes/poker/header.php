<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="theme-color" content="#FF1C1C">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <?php $favicon = get_theme_mod('favicon'); if(!empty($favicon)) { ?> 
  <link rel="shortcut icon" href="<?php echo $favicon; ?>" />
  <?php } ?>
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]--> 
  <?php wp_head(); ?> 
</head>
<body <?php body_class(); ?>>
<div class="bdoverlay"></div>
<svg style="display: none;">
    <symbol id="btn-arrow"width="53" height="24" viewBox="0 0 53 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M52.0607 13.0607C52.6464 12.4749 52.6464 11.5251 52.0607 10.9393L42.5147 1.3934C41.9289 0.807612 40.9792 0.807612 40.3934 1.3934C39.8076 1.97918 39.8076 2.92893 40.3934 3.51472L48.8787 12L40.3934 20.4853C39.8076 21.0711 39.8076 22.0208 40.3934 22.6066C40.9792 23.1924 41.9289 23.1924 42.5147 22.6066L52.0607 13.0607ZM0 13.5H51V10.5H0V13.5Z" fill="#FF282E"/>
    </symbol>
     <symbol id="slider-rgt-arrow-svg" width="90" height="24" viewBox="0 0 90 24"  xmlns="http://www.w3.org/2000/svg">
    <path d="M89.0607 13.0607C89.6464 12.4749 89.6464 11.5251 89.0607 10.9393L79.5147 1.39339C78.9289 0.807605 77.9792 0.807605 77.3934 1.39339C76.8076 1.97918 76.8076 2.92893 77.3934 3.51471L85.8787 12L77.3934 20.4853C76.8076 21.0711 76.8076 22.0208 77.3934 22.6066C77.9792 23.1924 78.9289 23.1924 79.5147 22.6066L89.0607 13.0607ZM1.31134e-07 13.5L88 13.5L88 10.5L-1.31134e-07 10.5L1.31134e-07 13.5Z" fill=""/>
    </symbol>
    <symbol id="slider-lft-arrow-svg" width="90" height="24" viewBox="0 0 90 24" xmlns="http://www.w3.org/2000/svg">
    <path d="M0.93934 10.9393C0.353553 11.5251 0.353553 12.4749 0.93934 13.0607L10.4853 22.6066C11.0711 23.1924 12.0208 23.1924 12.6066 22.6066C13.1924 22.0208 13.1924 21.0711 12.6066 20.4853L4.12132 12L12.6066 3.51471C13.1924 2.92893 13.1924 1.97918 12.6066 1.39339C12.0208 0.807605 11.0711 0.807605 10.4853 1.39339L0.93934 10.9393ZM90 10.5L2 10.5L2 13.5L90 13.5L90 10.5Z" fill=""/>
    </symbol>
</svg>
<?php 
  $logoObj = get_field('hdlogo', 'options');
  if( is_array($logoObj) ){
    $logo_tag = '<img src="'.$logoObj['url'].'" alt="'.$logoObj['alt'].'" title="'.$logoObj['title'].'">';
  }else{
    $logo_tag = '';
  }
  $pagelink = get_field('link', 'options');
  $page_link = !empty($pagelink)?$pagelink:'#';
?>
<header class="header">
  <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="header-inr clearfix">
            <div class="hdr-lft">
              <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                  <?php echo $logo_tag; ?>
                </a>
              </div>
            </div>
            <div class="hdr-rgt hide-md">
              <div class="hdr-main-menu">
                <nav class="main-nav">
                  <?php 
                    $mmenuOptions = array( 
                        'theme_location' => 'cbv_main_menu', 
                        'menu_class' => 'clearfix reset-list',
                        'container' => '',
                        'container_class' => ''
                      );
                    wp_nav_menu( $mmenuOptions ); 
                  ?>
                </nav>
              </div>
              <div class="hdr-rgt-btn">
                <a href="<?php echo $page_link; ?>" class="hdr-btn"><?php _e('View Casinos', 'poker'); ?></a>
              </div>
            </div>
            <div class="hamburgar-cntlr show-md">
                <div class="hamburgar">
                  <div class="hamburger-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
  </div>
</header>

<!-- Mobile header -->
<div class="xs-mobile-menu ">
  <div class="xs-pop-up-menu-top">
    <div class="logo">
      <a href="<?php echo esc_url(home_url('/')); ?>">
        <?php echo $logo_tag; ?>
      </a>
    </div>
    <div class="hamburgar-cntlr show-md">
      <div class="hamburgar">
        <div class="hamburger-icon">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
  </div>
  <div class="xs-menu">
    <div class="hdr-menu">
      <nav class="main-nav">
        <?php 
          $menuOptions = array( 
              'theme_location' => 'cbv_mobile_menu', 
              'menu_class' => 'reset-list clearfix',
              'container' => 'ul',
              'container_class' => ''
            );
          wp_nav_menu( $menuOptions ); 
        ?>
      </nav>
    </div>

    <div class="xs-contact-btn">
      <a href="<?php echo $page_link; ?>" class="fl-btn"><?php _e('View Casinos', 'poker'); ?></a>
    </div>
  </div>
</div>

<!-- end of header -->
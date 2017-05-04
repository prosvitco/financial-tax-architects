<?php if ( is_active_sidebar( 'sidebar-header' ) ) { ?>
<div class="header-top">
  <div class="container">
    <div class="row">
        <?php dynamic_sidebar('sidebar-header'); ?>
    </div>
  </div>
</div>
<?php } ?>

<header role="banner" class="header navbar-default">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
            
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">
                    <?= __('Toggle navigation', 'sage'); ?></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>      

                <?php if( !empty($logo_image = get_field('logo_image', 'option') ) ): ?>
                <a class="navbar-logo navbar-brand" href="<?= esc_url(home_url('/')); ?>">
                    <img src="<?php echo $logo_image['url']; ?>" alt="<?php echo $logo_image['alt']; ?>" class="img-responsive" />
                </a>                    
                <?php endif; ?>
            </div>

            <nav id="navigation" class="navigation navbar-collapse collapse">

                <?php 
                if (has_nav_menu('navbar-left-menu')) :
                    wp_nav_menu(['theme_location' => 'navbar-left-menu', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav navbar-left menu-nav']);
                endif; 
                ?>

                <?php 
                if (has_nav_menu('navbar-right-menu')) :
                    wp_nav_menu(['theme_location' => 'navbar-right-menu', 'walker' => new wp_bootstrap_navwalker(), 'menu_class' => 'nav navbar-nav navbar-right menu-nav']);
                endif; 
                ?>

            </nav>

        </div>
    </div>
</header>
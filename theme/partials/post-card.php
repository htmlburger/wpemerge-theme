<div class="card shadow m-3 <?php post_class( 'article' );?>">
  <?php if ( has_post_thumbnail() ) : ?>
    <div class="article__thumbnail">
      <?php the_post_thumbnail('post-thumbnail', ['class'=>'card-img-top h-auto']); ?>
    </div>
  <?php endif; ?>
  <div class="card-body">
    <header class="article__head">
      <h2 class="article__title card-title">
        <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( app_get_permalink_title() ); ?>">
          <?php the_title(); ?>
        </a>
      </h2>
      <?php Theme::partial( 'post-meta' ); ?>
    </header>
    <div class="article__body">
      <div class="article__entry">
        <?php the_excerpt(); ?>
      </div>
    </div>
  </div>

</div>

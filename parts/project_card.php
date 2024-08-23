<div class="project__card">
    <a href="<?php echo get_the_permalink(); ?>" class="">
        <?php 
            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, 'full')[0];
            echo '<img src="' . esc_url($thumbnail_url) . '" data-src="' . esc_url($thumbnail_url) . '" alt="' . get_the_title() . '">';
        ?>
    </a>
    <div class="project__tags">
      <?php the_terms( get_the_ID() , 'competences' ); ?>
    </div>
</div>
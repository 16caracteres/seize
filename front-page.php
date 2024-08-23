<?php get_header(); ?>

<section id="accueil" class="home">

    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>    
    	
        <h1><?php the_title(); ?></h1> 
        <?php the_content(); ?>

	<?php endwhile; endif; ?>

    <div class="skills__list">
        <?php 
            $category = get_terms( 'competences',
            array(
                'orderby' => 'slug' )
            );     
            foreach ( $category as $cat) {
                echo $cat->name;
            }
        ?>
    </div>

</section>

<section id="projets" class="projects">
    <div class="projects__list">
        <?php 
            $args = array(
                'post_type' => 'portfolio',
                'posts_per_page' => -1,
                'post_status' => 'publish',
                'order' => 'date',
                'order_by' => 'desc'
            );

            $homepage_query = new WP_Query( $args );

            if( $homepage_query->have_posts() ) : while( $homepage_query->have_posts() ) : $homepage_query->the_post();
                
                get_template_part( 'parts/project_card' ); 

                endwhile;
                endif;

            wp_reset_postdata();
        ?>
    </div>
</section>

<section id="parcours" class="experiences">
    <div>
        <?php the_field( 'experience_1' ); ?>
        <?php the_field( 'experience_2' ); ?>
        <?php the_field( 'experience_3' ); ?>
        <?php the_field( 'experience_4' ); ?>
    </div>
</section>

<section id="contact" class="contact">
    <?php
    echo do_shortcode('[contact-form-7 id="bd32bf8" title="Formulaire de contact 1"]');
    ?>
</section>

<?php get_footer(); ?>
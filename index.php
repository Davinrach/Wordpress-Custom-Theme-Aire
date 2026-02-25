<?php get_header(); ?>

<div class="container mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
    <main id="primary" class="site-main flex-grow">
        <?php
        if ( have_posts() ) :
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('mb-12 bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition-shadow'); ?>>
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail aspect-video overflow-hidden">
                            <?php the_post_thumbnail('large', ['class' => 'w-full h-full object-cover']); ?>
                        </div>
                    <?php endif; ?>
                    
                    <div class="p-6 md:p-8">
                        <header class="entry-header mb-4">
                            <?php the_title( '<h2 class="entry-title text-3xl font-bold text-gray-900 leading-tight mb-2 hover:text-blue-600 transition-colors"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
                            <div class="entry-meta text-sm text-gray-500 flex items-center gap-4">
                                <span><?php echo get_the_date(); ?></span>
                                <span><?php the_category(', '); ?></span>
                            </div>
                        </header>
                        <div class="entry-content text-gray-600 leading-relaxed mb-6">
                            <?php the_excerpt(); ?>
                        </div>
                        <footer class="entry-footer">
                            <a href="<?php echo esc_url( get_permalink() ); ?>" class="inline-flex items-center text-blue-600 font-semibold hover:text-blue-800 transition-colors">
                                Read More 
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </footer>
                    </div>
                </article>
                <?php
            endwhile;
            
            the_posts_navigation(array(
                'prev_text' => 'Older posts',
                'next_text' => 'Newer posts',
                'class'     => 'flex justify-between items-center py-4 border-t border-gray-100 font-medium text-blue-600'
            ));
        else :
            echo '<div class="bg-gray-50 rounded-lg p-12 text-center text-gray-500">No content found</div>';
        endif;
        ?>
    </main>
    
    <div class="lg:w-1/3">
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>


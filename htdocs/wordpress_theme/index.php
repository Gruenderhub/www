<?php

get_header(); ?>

<div id="right">

    <div id="headnav">
        <nav class="categories">
            <?php foreach (get_terms('category', array('parent' => 0, 'hierarchical' => false)) as $cat): ?>
            <a href="<?php echo get_category_link($cat); ?>"><?php echo $cat->name; ?></a>
            <?php endforeach; ?>
        </nav>

        <nav class="nav-single">
            <span class="nav-previous"><?php previous_post_link('%link', '<span class="meta-nav">' . _x('&larr;', 'Previous post link', 'twentytwelve') . '</span> %title'); ?></span>
            <span class="nav-next"><?php next_post_link('%link', '%title <span class="meta-nav">' . _x('&rarr;', 'Next post link', 'twentytwelve') . '</span>'); ?></span>
        </nav>
    </div>

    <?php while (have_posts()) : the_post(); ?>

    <article class="post" id="post">
        <h2>
            <?php the_title(); ?>
            <small><a href="<?php the_permalink(); ?>" class="alignright"><i class="icon-link"></i> URL</a></small>
        </h2>

        <div class="content">
            <?php the_content(); ?>
        </div>

        <aside>

            <dl>
                <?php $exc = get_the_excerpt(); if ($exc): ?>
                <dt>Zusammenfassung</dt>
                <dd class="excerpt"><?php echo $exc; ?></dd>
                <?php endif; ?>
                <?php if (get_the_author_meta('description')) : ?>
                <dt>Autor</dt>
                <dd class="author-info">
                    <a href="<?php echo get_the_author_meta('url'); ?>" rel="met friend author"><?php echo get_avatar(get_the_author_meta('user_email'), 100); ?><?php echo get_the_author(); ?>
                    </a><br>
                    <small><?php the_author_meta('description'); ?></small>
                </dd>
                <?php endif; ?>
                <dt>Veröffentlicht am</dt>
                <dd><?php echo strftime('%d. %B %Y', get_the_date('U')); ?></dd>
                <?php the_tags('<dt>Tags</dt><dd>', ', ', '</dd>'); ?>
                <?php if (current_user_can('edit_posts')) : ?>
                <dt>Tools</dt>
                <dd>
                    <a href="<?php echo get_edit_post_link(); ?>"><i class="icon-pencil"></i> bearbeiten</a><br>
                </dd>
                <?php endif; ?>
            </dl>
        </aside>
    </article>

    <?php endwhile; // end of the loop. ?>

    <hr/>

    <?php
    if (is_single()):
        // Posts in dieser Kategorie rendern
        $theCat = array_shift(get_the_category());
        $the_query = new WP_Query(sprintf('post_type=post&post_status=publish&orderby=date&order=DESC&cat=%d&post__not_in[]=%d', $theCat->term_id, $post->ID));
        if ($the_query->have_posts()):
            ?>
            <nav class="articles">
                Mehr in <strong><?php echo $theCat->name; ?></strong>:<br>
                <?php
                while ($the_query->have_posts()) :
                    $the_query->the_post();
                    ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <?php
                endwhile;
                wp_reset_query();
                ?></nav><?php
        endif;
    endif;
    ?>

</div>

<?php get_footer(); ?>
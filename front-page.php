<?php get_header(); ?>

<!-- 🏁 Hero Section -->
<section class="hero bg-dark text-white text-center py-5">
    <div class="container">
        <h1 class="display-4">Welcome to CarFixPro</h1>
        <p class="lead">Your Trusted Auto Repair & Maintenance Partner</p>
        <a href="<?php echo site_url('/contact'); ?>" class="btn btn-primary btn-lg mt-3">Book an Appointment</a>
    </div>
</section>

<!-- 🔧 Dynamic Services Section -->
<section class="services py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-3">Our Services</h2>
            <p class="text-muted">High-quality automotive services tailored to your needs.</p>
        </div>

        <div class="row text-center">
            <?php
            $services = new WP_Query([
                'post_type'      => 'car_service',
                'posts_per_page' => 3
            ]);

            if ($services->have_posts()) :
                while ($services->have_posts()) : $services->the_post();
            ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php the_title(); ?></h5>
                            <p class="card-text"><?php echo wp_trim_words(get_the_content(), 20); ?></p>
                        </div>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No services found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>

<!-- 💡 Why Choose Us Section -->
<section class="why-choose-us bg-light py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-3">Why Choose CarFixPro?</h2>
            <p class="text-muted">We're committed to providing top-tier service, transparency, and value.</p>
        </div>

        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded h-100">
                    <i class="fas fa-tools fa-2x mb-3 text-primary"></i>
                    <h5>Certified Mechanics</h5>
                    <p>All our technicians are certified and trained to handle any repair job with confidence.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded h-100">
                    <i class="fas fa-clock fa-2x mb-3 text-primary"></i>
                    <h5>Quick Turnaround</h5>
                    <p>We value your time. Our shop works efficiently to get your car back on the road fast.</p>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="p-4 border rounded h-100">
                    <i class="fas fa-thumbs-up fa-2x mb-3 text-primary"></i>
                    <h5>Honest Pricing</h5>
                    <p>No hidden charges. Upfront quotes with fair and competitive pricing guaranteed.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 💬 Testimonials Section -->
<section class="testimonials bg-white py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="mb-3">What Our Clients Say</h2>
            <p class="text-muted">Real reviews from satisfied customers.</p>
        </div>

        <div class="row justify-content-center">
            <?php
            $testimonials = new WP_Query([
                'post_type'      => 'testimonial',
                'posts_per_page' => 3,
                'orderby'        => 'date',
                'order'          => 'DESC'
            ]);

            if ($testimonials->have_posts()) :
                while ($testimonials->have_posts()) : $testimonials->the_post();
            ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm p-3">
                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p class="mb-3"><?php the_content(); ?></p>
                                <footer class="blockquote-footer"><?php the_title(); ?></footer>
                            </blockquote>
                        </div>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="text-center mt-3">
                                <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="rounded-circle" width="60" height="60" alt="<?php the_title(); ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p class="text-muted">No testimonials found.</p>';
            endif;
            ?>
        </div>
    </div>
</section>




<?php get_footer(); ?>

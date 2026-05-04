<body data-spy="scroll" data-offset="80">

    <!-- START PRELOADER -->
    <div class="preloader">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
    <!-- END PRELOADER -->

    <!-- START NAVBAR -->
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar js-sticky-header site-navbar-target" role="banner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-6 col-xl-2">
                    <?php if ($domain->image_domain != null) { ?>
                        <img class="img-thumbnail img-preview" src="<?= base_url('assets/uploads/img/') . $domain->image_domain; ?>" style="max-width:150px;
    height:auto;">
                    <?php } else { ?>
                        <a href="<?= base_url() ?>" class="navbar-brand">
                            <h1 class="mb-0 site-logo"><a href="<?= base_url(); ?>"><?= $domain->meta_title ?></a></h1>
                        </a>
                    <?php } ?>
                </div>
                <div class="col-12 col-md-10 d-none d-xl-block">
                    <nav class="site-navigation position-relative text-right" role="navigation">
                        <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">

                            <?php
                            $current = uri_string();
                            ?>

                            <?php foreach ($menus as $menu): ?>

                                <?php
                                $isActiveParent = ($current == $menu['slug']);
                                ?>

                                <?php if (!empty($menu['children'])): ?>

                                    <?php
                                    // Cek apakah salah satu child aktif
                                    $isChildActive = false;
                                    foreach ($menu['children'] as $child) {
                                        if ($current == $child['slug']) {
                                            $isChildActive = true;
                                            break;
                                        }
                                    }
                                    ?>

                                    <li class="has-children <?= ($isActiveParent || $isChildActive) ? 'active' : '' ?>">
                                        <a href="<?= base_url($menu['slug']) ?>" class="nav-link">
                                            <?= ucwords(strtolower($menu['nama_menu'])) ?>
                                        </a>

                                        <ul class="dropdown">
                                            <?php foreach ($menu['children'] as $child): ?>

                                                <li class="<?= ($current == $child['slug']) ? 'active' : '' ?>">
                                                    <a href="<?= base_url($child['slug']) ?>" class="nav-link">
                                                        <?= ucwords(strtolower($child['nama_menu'])) ?>
                                                    </a>
                                                </li>

                                            <?php endforeach; ?>
                                        </ul>
                                    </li>

                                <?php else: ?>

                                    <li class="<?= $isActiveParent ? 'active' : '' ?>">
                                        <a href="<?= base_url($menu['slug']) ?>" class="nav-link">
                                            <?= ucwords(strtolower($menu['nama_menu'])) ?>
                                        </a>
                                    </li>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </ul>
                    </nav>
                </div>

                <!-- Mobile Toggle -->
                <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3" style="position: relative; top: 3px;">
                    <a href="#" class="site-menu-toggle js-menu-toggle float-right">
                        <span class="icon-menu h3"></span>
                    </a>
                </div>
            </div>
        </div>
    </header>
    <!-- END NAVBAR-->
    <!-- START HOME -->
    <?php if (!empty($sections)): ?>

        <?php foreach ($sections as $sec): ?>

            <?php if ($sec->section == "HERO"): ?>
                <div id="kenburns_061"
                    class="carousel slide ps_indicators_txt_icon ps_control_txt_icon kbrns_zoomInOut thumb_scroll_x swipe_x ps_easeOutQuart"
                    data-bs-ride="carousel"
                    data-bs-interval="10000">

                    <?php if ($sec->has_carousel == 1):

                        $get_carousel = $this->Menu_model
                            ->fetch_data('tbl_carousel', [
                                'section_id' => $sec->id,
                                'url_id'     => $this->domain->id
                            ])->result();

                        if (!empty($get_carousel)):
                    ?>

                            <div class="carousel-inner" role="listbox">

                                <?php $no = 0;
                                foreach ($get_carousel as $row): ?>
                                    <div class="carousel-item <?= ($no == 0) ? 'active' : ''; ?>">

                                        <!-- Background Image -->
                                        <img src="<?= base_url('assets/uploads/img/') . $row->image; ?>"
                                            alt="<?= htmlspecialchars($row->title); ?>"
                                            class="d-block w-100">

                                        <!-- Overlay Content -->
                                        <div class="kenburns_061_slide kenburns_061_slide_center text-center"
                                            data-animation="animated fadeInDown">

                                            <?php if ($no == 0): ?>
                                                <h1><?= $row->title; ?></h1>
                                            <?php else: ?>
                                                <h2><?= $row->title; ?></h2>
                                            <?php endif; ?>

                                            <?php if (!empty($row->subtitle)): ?>
                                                <h3><?= $row->subtitle; ?></h3>
                                            <?php endif; ?>

                                            <?php if (!empty($row->alt_text)): ?>
                                                <p><?= $row->alt_text; ?></p>
                                            <?php endif; ?>

                                            <!-- CTA -->
                                            <div class="mt-4">

                                                <?php if (!empty($row->link)): ?>
                                                    <a href="<?= $row->link; ?>" class="btn btn-primary me-2">
                                                        Konsultasi Sekarang
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (!empty($row->facebook_link)): ?>
                                                    <a href="<?= $row->facebook_link; ?>"
                                                        target="_blank"
                                                        class="btn btn-outline-light me-2">
                                                        Selengkapnya
                                                    </a>
                                                <?php endif; ?>

                                                <?php if (!empty($row->instagram_link)): ?>
                                                    <a href="<?= $row->instagram_link; ?>"
                                                        target="_blank"
                                                        class="btn btn-success">
                                                        Details
                                                    </a>
                                                <?php endif; ?>

                                            </div>

                                        </div>
                                    </div>
                                <?php $no++;
                                endforeach; ?>

                            </div>

                            <!-- Controls -->
                            <button class="carousel-control-prev"
                                type="button"
                                data-bs-target="#kenburns_061"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </button>

                            <button class="carousel-control-next"
                                type="button"
                                data-bs-target="#kenburns_061"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </button>

                    <?php endif;
                    endif; ?>
                </div>
                <div class="container">
                    <div class="row">
                        <?= $sec->content; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if ($sec->section == "SERVICES"): ?>
        <!-- FEATURES -->
        <section class="feature_area">
            <div class="container">
                <div class="row feature_bg">
                    <div class="section-title text-center">
                        <h2><?= $sec->title; ?></h2>
                        <p><?= $sec->subtitle; ?></p>
                    </div>
                    <?= $sec->content; ?>
                </div><!-- END ROW -->
            </div><!--- END CONTAINER -->
        </section>
        <!-- END FEATURES -->
    <?php endif; ?>
    <!-- START COUNTER -->
    <?php if ($sec->section == "BANNER"): ?>


    <?php endif; ?>
    <?php if ($sec->section == "LATEST"): ?>
        <?php if (!empty($sec->title)): ?>
            <div class="container">
                <div class="row">
                    <h1><?= $sec->title; ?> </h1>
                </div>
            </div>
        <?php endif; ?>
        <?php if (empty($sec->content)): ?>
            <?= $sec->content; ?>

        <?php endif; ?>
    <?php endif; ?>
    <!-- START WHY CHOOSE US -->

    <?php if ($sec->section == "PORTFOLIO"): ?>
        <section class="why_choose_area section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
                        <div class="single_why_choose">
                            <h2>We create <br /> amazing digital <br /> products</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book. It is a long established fact that a reader. It was popularised in the with the release.</p>
                            <a class="btn_one" href="about.html">Learn More</a>
                        </div>
                    </div><!--- END COL -->
                    <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
                        <div class="single_why_choose_img">
                            <img src="<?= base_url('assets/monoline/assets/') ?>img/home-office.png" class="img-fluid" alt="about-image" />
                        </div>
                    </div><!--- END COL -->
                </div><!--- END ROW -->
            </div><!--- END CONTAINER -->
        </section>

    <?php endif; ?>
    <!-- END WHY CHOOSE US-->

    <!-- START PORTFOLIO -->
    <section id="portfolio" class="portfolio_area section-padding">
        <div class="container-fluid">
            <div class="section-title text-center">
                <h2>Latest Works</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            </div>
            <div class="col-lg-12 text-center">
                <div class="portfolio_filter">
                    <ul>
                        <li class="active filter" data-filter="all">All</li>
                        <li class="filter" data-filter=".branding">Branding</li>
                        <li class="filter" data-filter=".webtemplate">Web Template</li>
                        <li class="filter" data-filter=".seo">SEO</li>
                        <li class="filter" data-filter=".digital">Digital Marketing</li>
                    </ul>
                </div>
            </div>
            <div class="portfolio-grid">
                <div class="row">
                    <div class="col-lg-4 col-sm-6 col-xs-12 portfolio-item mix webtemplate seo">
                        <div class="single-gallery">
                            <img src="<?= base_url('assets/monoline/assets/') ?>img/portfolio/1.jpg" class="img-fluid" alt="gallery Image">
                            <a href="<?= base_url('assets/monoline/assets/') ?>img/portfolio/1.jpg" class="gallery_enlarge_icon"><i class="ti-eye"></i></a>
                            <h4><a href="single_project.html">View Project</a></h4>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-4 col-sm-6 col-xs-12 portfolio-item mix branding">
                        <div class="single-gallery">
                            <img src="<?= base_url('assets/monoline/assets/') ?>img/portfolio/2.jpg" class="img-fluid" alt="gallery Image">
                            <a href="<?= base_url('assets/monoline/assets/') ?>img/portfolio/2.jpg" class="gallery_enlarge_icon"><i class="ti-eye"></i></a>
                            <h4><a href="single_project.html">View Project</a></h4>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-4 col-sm-6 col-xs-12 portfolio-item  mix webtemplate digital">
                        <div class="single-gallery">
                            <img src="<?= base_url('assets/monoline/assets/') ?>img/portfolio/3.jpg" class="img-fluid" alt="gallery Image">
                            <a href="<?= base_url('assets/monoline/assets/') ?>img/portfolio/3.jpg" class="gallery_enlarge_icon"><i class="ti-eye"></i></a>
                            <h4><a href="single_project.html">View Project</a></h4>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-6 col-sm-6 col-xs-12 portfolio-item  mix digital seo">
                        <div class="single-gallery">
                            <img src="<?= base_url('assets/monoline/assets/') ?>img/portfolio/4.jpg" class="img-fluid" alt="gallery Image">
                            <a href="<?= base_url('assets/monoline/assets/') ?>img/portfolio/4.jpg" class="gallery_enlarge_icon"><i class="ti-eye"></i></a>
                            <h4><a href="single_project.html">View Project</a></h4>
                        </div>
                    </div><!-- End Col -->
                    <div class="col-lg-6 col-sm-6 col-xs-12 portfolio-item mix webtemplate seo">
                        <div class="single-gallery">
                            <img src="<?= base_url('assets/monoline/assets/') ?>img/portfolio/5.jpg" class="img-fluid" alt="gallery Image">
                            <a href="<?= base_url('assets/monoline/assets/') ?>img/portfolio/5.jpg" class="gallery_enlarge_icon"><i class="ti-eye"></i></a>
                            <h4><a href="single_project.html">View Project</a></h4>
                        </div>
                    </div><!-- End Col -->
                </div><!-- END ROW -->
                <div class="col-lg-12 text-center">
                    <div class="portfolio_btn">
                        <a class="btn_one" href="portfolio.html">View More</a>
                    </div>
                </div><!-- END Col -->
            </div>
        </div><!-- END CONTAINER -->
    </section>
    <!-- END PORTFOLIO -->

    <!-- SKILLS -->
    <section class="skills_area section-padding" style="background-image: url(<?= base_url('assets/monoline/assets/') ?>img/bg/skill-bg.jpg);  background-size:cover;background-position:center;">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-8 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
                    <div class="skill_bg">
                        <div class="skill_content">
                            <h2>Generating New Ideas. Solving Big Problems</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard ever since the when an unknown printer.</p>
                        </div>
                        <div class="skill_bar">
                            <div class="progress-bar-linear">
                                <p class="progress-bar-text">Web Design
                                    <span>85%</span>
                                </p>
                                <div class="progress-bar">
                                    <span data-percent="85"></span>
                                </div>
                            </div>
                            <div class="progress-bar-linear">
                                <p class="progress-bar-text">Branding
                                    <span>70%</span>
                                </p>
                                <div class="progress-bar">
                                    <span data-percent="70"></span>
                                </div>
                            </div>
                            <div class="progress-bar-linear">
                                <p class="progress-bar-text">Mobile App
                                    <span>60%</span>
                                </p>
                                <div class="progress-bar">
                                    <span data-percent="60"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- END COL -->
            </div><!-- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END SKILLS -->

    <!-- PROMOTIONAL AREA -->
    <div class="promotional_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="promotional_content">
                        <img src="<?= base_url('assets/monoline/assets/') ?>img/team-image.jpg" class="img-fluid" alt="team-image" />
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    </div>
                </div><!-- END COL -->
            </div><!-- END ROW -->
        </div><!--- END CONTAINER -->
    </div>
    <!-- END PROMOTIONAL AREA -->

    <!-- TESTIMONIALS -->
    <div class="testimonial_area section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2>From Our client</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            </div>
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
                            <div class="single_testimonial">
                                <div class="testimonial_img">
                                    <img src="<?= base_url('assets/monoline/assets/') ?>img/testimonial/1.jpg" alt="testimonial-image" />
                                </div>
                                <p>Sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut labore.</p>
                                <h4>Alex Chohan</h4>
                                <h5>Director, Accurate themes</h5>
                            </div>
                        </div><!-- END COL  -->
                        <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
                            <div class="single_testimonial">
                                <div class="testimonial_img">
                                    <img src="<?= base_url('assets/monoline/assets/') ?>img/testimonial/2.jpg" alt="testimonial-image" />
                                </div>
                                <p>Sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut labore.</p>
                                <h4>Johnson Brown</h4>
                                <h5>Marketing Head, Spyro themes</h5>
                            </div>
                        </div><!-- END COL  -->
                        <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                            <div class="single_testimonial">
                                <div class="testimonial_img">
                                    <img src="<?= base_url('assets/monoline/assets/') ?>img/testimonial/3.jpg" alt="testimonial-image" />
                                </div>
                                <p>Sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut labore.</p>
                                <h4>Devid Miller</h4>
                                <h5>Founder, theme ocean</h5>
                            </div>
                        </div><!-- END COL  -->
                        <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s" data-wow-offset="0">
                            <div class="single_testimonial">
                                <div class="testimonial_img">
                                    <img src="<?= base_url('assets/monoline/assets/') ?>img/testimonial/4.jpg" alt="testimonial-image" />
                                </div>
                                <p>Sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ut labore.</p>
                                <h4>Maya Khan</h4>
                                <h5>Chairman, Web template</h5>
                            </div>
                        </div><!-- END COL  -->
                    </div>
                </div>
            </div><!-- END ROW -->
        </div><!--- END CONTAINER -->
    </div>
    <!-- END TESTIMONIALS -->

    <!-- BLOG -->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2>Latest Blog</h2>
                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            </div>
            <div class="row text-center">
                <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
                    <div class="home_single_blog">
                        <img src="<?= base_url('assets/monoline/assets/') ?>img/blog/1.jpg" class="img-fluid" alt="blog-image" />
                        <div class="home_blog_content">
                            <div class="blog_title_info">
                                <h2><a href="blog_single.html">Tiktok Illegally collecting data sharing</a></h2>
                                <span>August 31, 2026</span>
                                <span><a href="blog_single.html">Marketing</a></span>
                            </div>
                            <p>Sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur elit.</p>
                            <a class="home_b_btn" href="blog_single.html">Read More</a>
                        </div>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
                    <div class="home_single_blog">
                        <img src="<?= base_url('assets/monoline/assets/') ?>img/blog/2.jpg" class="img-fluid" alt="blog-image" />
                        <div class="home_blog_content">
                            <div class="blog_title_info">
                                <h2><a href="blog_single.html">How can use our latest news by Monoline</a></h2>
                                <span>Sep 01, 2026</span>
                                <span><a href="blog_single.html">Design</a></span>
                            </div>
                            <p>Sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur elit.</p>
                            <a class="home_b_btn" href="blog_single.html">Read More</a>
                        </div>
                    </div>
                </div><!-- END COL -->
                <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
                    <div class="home_single_blog">
                        <img src="<?= base_url('assets/monoline/assets/') ?>img/blog/3.jpg" class="img-fluid" alt="blog-image" />
                        <div class="home_blog_content">
                            <div class="blog_title_info">
                                <h2><a href="blog_single.html">Convincing reasons you need to learn</a></h2>
                                <span>Sep 02, 2026</span>
                                <span><a href="blog_single.html">Agency</a></span>
                            </div>
                            <p>Sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur elit.</p>
                            <a class="home_b_btn" href="blog_single.html">Read More</a>
                        </div>
                    </div>
                </div><!-- END COL -->
            </div><!-- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END BLOG -->

    <!-- CONTACT -->
    <div id="contact" class="contact_area section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="section-title-white">Say Hello, Let’s Start Something new</h2>
                <p class="section-title-white">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
            </div>
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-sm-12 col-xs-12 text-center wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
                    <div class="contact">
                        <form id="contact-form" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" name="subject" class="form-control" placeholder="Subject" required="required">
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea rows="6" name="message" class="form-control" placeholder="Type your message that on your mind..." required="required"></textarea>
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" value="Send message" name="submit" id="submitButton" class="contact_btn" title="Submit Your Message!">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- END COL  -->
            </div><!-- END ROW -->
        </div><!--- END CONTAINER -->
    </div>
    <!-- END CONTACT -->

    <!-- START PARTNER LOGO -->
    <div class="partner-logo section-padding">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-2 col-sm-4 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
                    <div class="single_logo single_logo_bm">
                        <a href="#"><img src="<?= base_url('assets/monoline/assets/') ?>img/partner/1.png" alt="" class="img-fluid" /></a>
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-2 col-sm-4 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
                    <div class="single_logo">
                        <a href="#"><img src="<?= base_url('assets/monoline/assets/') ?>img/partner/2.png" alt="" class="img-fluid" /></a>
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-2 col-sm-4 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s" data-wow-offset="0">
                    <div class="single_logo single_logo_bm">
                        <a href="#"><img src="<?= base_url('assets/monoline/assets/') ?>img/partner/3.png" alt="" class="img-fluid" /></a>
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-2 col-sm-4 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s" data-wow-offset="0">
                    <div class="single_logo">
                        <a href="#"><img src="<?= base_url('assets/monoline/assets/') ?>img/partner/4.png" alt="" class="img-fluid" /></a>
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-2 col-sm-4 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s" data-wow-offset="0">
                    <div class="single_logo">
                        <a href="#"><img src="<?= base_url('assets/monoline/assets/') ?>img/partner/5.png" alt="" class="img-fluid" /></a>
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-2 col-sm-4 col-xs-12 no-padding wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s" data-wow-offset="0">
                    <div class="single_logo">
                        <a href="#"><img src="<?= base_url('assets/monoline/assets/') ?>img/partner/6.png" alt="" class="img-fluid" /></a>
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </div>
    <!-- END PARTNER LOGO -->
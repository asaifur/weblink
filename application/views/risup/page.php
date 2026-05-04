    <!-- Header -->
    <header class="risup-header">
        <div class="container risup-nav">
            <!-- Logo -->
            <div class="risup-logo">
                <?php if ($domain->image_domain != null) { ?>
                    <a href="<?php echo base_url(''); ?>">
                        <img src="<?php echo base_url('assets/uploads/img/') . $domain->image_domain; ?>" alt="Logo" style="max-width:150px; height:auto;">
                    </a>
                <?php } else { ?>
                    <a href="<?php echo base_url(); ?>"><?php echo $domain->meta_title; ?></a>
                <?php } ?>
            </div>

            <!-- Navigation -->
            <nav class="risup-menu">
                <ul>
                    <?php
                    $current = uri_string();
                    foreach ($menus as $menu):
                        $url = base_url($menu['slug']);
                        $isActive = ($current == $menu['slug']) ? 'active' : '';

                        if (!empty($menu['children'])) {
                            foreach ($menu['children'] as $child) {
                                if ($current == $child['slug']) {
                                    $isActive = 'active';
                                }
                            }
                        }
                    ?>
                        <li>
                            <a href="<?php echo $url; ?>" class="<?php echo $isActive; ?>">
                                <?php echo ucwords(strtolower($menu['nama_menu'])); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>

            <!-- CTA Button -->
            <a href="<?php echo $domain->wa_link; ?>" class="risup-btn">Hubungi Kami</a>
        </div>
    </header>

    <!-- Main Content -->
    <?php if (!empty($sections)): ?>
        <?php foreach ($sections as $sec): ?>

            <!-- Hero Section -->
            <?php if ($sec->section == "HERO"): ?>
                <section class="risup-hero" style="background-image: url('<?php echo base_url('assets/uploads/img/') . $sec->image; ?>');">
                    <div class="container">
                        <h1><?php echo $sec->title; ?></h1>
                        <p><?php echo $sec->content; ?></p>
                        <?php if ($sec->link): ?>
                            <a href="<?php echo $sec->link; ?>" class="risup-btn">Pelajari Lebih Lanjut</a>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

            <!-- Products Section -->
            <?php if ($sec->section == "PRODUCTS"): ?>
                <section class="risup-products">
                    <div class="container">
                        <div class="risup-section-title">
                            <h2><?php echo $sec->title; ?></h2>
                            <p><?php echo $sec->content; ?></p>
                        </div>
                        <div class="risup-product-grid">
                            <?php
                            // Assuming products are fetched from a model
                            $products = $this->Menu_model->fetch_data('tbl_products', ['section_id' => $sec->id])->result();
                            foreach ($products as $product):
                            ?>
                                <div class="risup-product-card">
                                    <div class="risup-product-img" style="background-image: url('<?php echo base_url('assets/uploads/img/') . $product->image; ?>');"></div>
                                    <div class="risup-product-info">
                                        <h3 class="risup-product-title"><?php echo $product->title; ?></h3>
                                        <p class="risup-product-price">Rp <?php echo number_format($product->price, 0, ',', '.'); ?></p>
                                        <a href="#" class="risup-btn">Lihat Detail</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <!-- Categories Section -->
            <?php if ($sec->section == "CATEGORIES"): ?>
                <section class="risup-categories">
                    <div class="container">
                        <div class="risup-section-title">
                            <h2><?php echo $sec->title; ?></h2>
                        </div>
                        <div class="risup-category-grid">
                            <?php
                            $categories = $this->Menu_model->fetch_data('tbl_categories', ['section_id' => $sec->id])->result();
                            foreach ($categories as $category):
                            ?>
                                <div class="risup-category-card">
                                    <div class="risup-category-icon">
                                        <i class="fas fa-utensils"></i>
                                    </div>
                                    <h3 class="risup-category-title"><?php echo $category->title; ?></h3>
                                    <p><?php echo $category->description; ?></p>
                                    <a href="#" class="risup-btn">Lihat Produk</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <!-- Advantages Section -->
            <?php if ($sec->section == "ADVANTAGES"): ?>
                <section class="risup-advantages">
                    <div class="container">
                        <div class="risup-section-title">
                            <h2><?php echo $sec->title; ?></h2>
                        </div>
                        <div class="risup-advantage-grid">
                            <div class="risup-advantage-item">
                                <div class="risup-advantage-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <h3 class="risup-advantage-title">Efisien</h3>
                                <p>Proses memasak lebih cepat dan hasil sempurna.</p>
                            </div>
                            <div class="risup-advantage-item">
                                <div class="risup-advantage-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <h3 class="risup-advantage-title">Tahan Lama</h3>
                                <p>Bahan berkualitas tinggi, anti karat.</p>
                            </div>
                            <div class="risup-advantage-item">
                                <div class="risup-advantage-icon">
                                    <i class="fas fa-hand-sparkles"></i>
                                </div>
                                <h3 class="risup-advantage-title">Mudah Dibersihkan</h3>
                                <p>Permukaan licin dan higienis.</p>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>

            <!-- Contact Section -->
            <?php if ($sec->section == "CONTACT"): ?>
                <section class="risup-contact">
                    <div class="container">
                        <h2><?php echo $sec->title; ?></h2>
                        <p><?php echo $sec->content; ?></p>
                        <a href="<?php echo $domain->wa_link; ?>" class="risup-btn">Hubungi Kami</a>
                    </div>
                </section>
            <?php endif; ?>

        <?php endforeach; ?>
    <?php endif; ?>
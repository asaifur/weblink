<!-- START FOOTER -->
<div class="footer" style="background-image: url(<?= base_url('assets/monoline/assets/') ?>img/bg/footer.png);  background-size:cover;">
    <div class="container">
        <div class="row footer_bg">
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="footer_logo">
                    <img src="<?= base_url('assets/monoline/assets/') ?>img/logo.png" alt="" />
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce vitae risus nec dui venenatis dignissim.</p>
                </div>
                <div class="social_profile">
                    <ul>
                        <li><a href="#" class="f_facebook"><i class="fa fa-facebook" title="Facebook"></i></a></li>
                        <li><a href="#" class="f_twitter"><i class="fa fa-youtube" title="Twitter"></i></a></li>
                        <li><a href="#" class="f_instagram"><i class="fa fa-instagram" title="Instagram"></i></a></li>
                        <li><a href="#" class="f_linkedin"><i class="fa fa-linkedin" title="LinkedIn"></i></a></li>
                    </ul>
                </div>
            </div><!--- END COL -->
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="single_footer">
                    <h4>Frequently Asked Questions</h4>
                    <ul>
                        <li><a href="#">Privacy & Securty</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Communications</a></li>
                        <li><a href="#">Referral Terms</a></li>
                        <li><a href="#">Disclaimers</a></li>
                    </ul>
                </div>
            </div><!--- END COL -->
            <div class="col-lg-3 col-sm-6 col-xs-1">
                <div class="single_footer">
                    <h4>Artikel</h4>
                    <?php
                    $artikel = $this->Menu_model->fetch_data_pages_by_limit_order('table_pages', ['id_domain' => $this->domain->id])->result();
                    foreach ($artikel as $row): ?>
                        <ul>
                            <li><a href="<?= $row->link ?>">Licenses</a></li>
                            <li><a href="#">market API</a></li>
                            <li><a href="#">Careers and job</a></li>
                            <li><a href="#">Emplois en France</a></li>
                            <li><a href="#">Jobs in Deutschland </a></li>
                        </ul>
                    <?php endforeach; ?>
                </div>
            </div><!--- END COL -->
            <div class="col-lg-3 col-sm-6 col-xs-12">
                <div class="newsletter-form">
                    <h4>Alamat Kami</h4>
                    <?= $this->domain->iframe; ?>
                </div>
            </div><!--- END COL -->
        </div><!--- END ROW -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="footer_copyright">
                    <p>&copy; 2026 Monoline. All Rights Reserved by <a href="<?= $this->domain->wa_link ?>" target="_blank"><?= $this->domain->domain_name; ?></a></p>
                    <p>Distributed by <a href="https://wa.me/6285283782281" target="_blank"> Optima Digital Solution</a></p>
                </div>
            </div>
        </div>
    </div><!--- END CONTAINER -->
</div>
<!-- END FOOTER -->

<!-- Latest jQuery -->
<script src="<?= base_url('assets/monoline/assets/') ?>js/jquery-1.12.4.min.js"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="<?= base_url('assets/monoline/assets/') ?>bootstrap/js/bootstrap.min.js"></script>
<!-- modernizer JS -->
<script src="<?= base_url('assets/monoline/assets/') ?>js/modernizr-2.8.3.min.js"></script>
<!-- owl-carousel min js  -->
<script src="<?= base_url('assets/monoline/assets/') ?>owlcarousel/js/owl.carousel.min.js"></script>
<!-- magnific-popup js -->
<script src="<?= base_url('assets/monoline/assets/') ?>js/jquery.magnific-popup.min.js"></script>
<!-- jquery mixitup js -->
<script src="<?= base_url('assets/monoline/assets/') ?>js/jquery.mixitup.js"></script>
<!-- jquery appear js -->
<script src="<?= base_url('assets/monoline/assets/') ?>js/jquery.appear.js"></script>
<!-- countTo js -->
<script src="<?= base_url('assets/monoline/assets/') ?>js/jquery.inview.min.js"></script>
<!-- jquery touchSwipe min JS -->
<script src="<?= base_url('assets/monoline/assets/') ?>js/jquery.touchSwipe.min.js"></script>
<!-- stellar js -->
<script src="<?= base_url('assets/monoline/assets/') ?>js/jquery.stellar.min.js"></script>
<!-- WOW - Reveal Animations When You Scroll -->
<script src="<?= base_url('assets/monoline/assets/') ?>js/wow.min.js"></script>
<!-- form contact js -->
<script src="<?= base_url('assets/monoline/assets/') ?>js/form-contact.js"></script>
<!-- scrolltopcontrol js -->
<script src="<?= base_url('assets/monoline/assets/') ?>js/menu.js"></script>
<script src="<?= base_url('assets/monoline/assets/') ?>js/jquery.sticky.js"></script>
<script src="<?= base_url('assets/monoline/assets/') ?>js/scrolltopcontrol.js"></script>
<!-- scripts js -->
<script src="<?= base_url('assets/monoline/assets/') ?>js/scripts.js"></script>

<script>
    /* Counter Section Customization */
    .counter_feature {
        background: linear - gradient(135 deg, #1a1a2e 0%, # 16213 e 100 % );
        color: #fff;
        position: relative;
        overflow: hidden;
    }

    .single - project {
            padding: 30 px 15 px;
            transition: transform 0.3 s ease;
        }

        .single - project: hover {
            transform: translateY(-5 px);
        }

        .single - project img {
            width: 60 px;
            height: 60 px;
            margin - bottom: 15 px;
            filter: brightness(0) invert(1); /* Ubah icon jadi putih */
        }

        .counter - num {
            font - size: 2.5 rem;
            font - weight: 700;
            color: #f39c12; /* Warna emas untuk highlight */
            margin: 10 px 0;
            line - height: 1;
        }

        .counter - desc {
            font - size: 0.9 rem;
            color: rgba(255, 255, 255, 0.8);
            margin - top: 5 px;
        }

        .video_btn {
            border - radius: 15 px;
            padding: 60 px 20 px;
            position: relative;
        }

        .video - play {
            display: inline - flex;
            align - items: center;
            justify - content: center;
            width: 80 px;
            height: 80 px;
            background: #f39c12;
            border - radius: 50 % ;
            color: #fff;
            font - size: 2 rem;
            transition: all 0.3 s ease;
            box - shadow: 0 5 px 20 px rgba(243, 156, 18, 0.4);
        }

        .video - play: hover {
            transform: scale(1.1);
            background: #e67e22;
        }

        .video - caption {
            font - size: 1 rem;
            opacity: 0.9;
        }

    /* Responsive */
    @media(max - width: 768 px) {
        .counter - num {
                font - size: 2 rem;
            }
            .single - project {
                margin - bottom: 20 px;
            }
    }
</script>
</body>

</html>
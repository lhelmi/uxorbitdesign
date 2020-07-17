<main class="bg-primary-color margin-top-2">
    <div class="container h-100 pb-4">
        <div class="row align-items-center h-50 pt-3">
            <div class="col-12 col-lg-8 text-left">
                <div class="u-ml-auto">
                    <div class='rating-stars u-flex u-pt-xsmall'>
                        <ul>
                            <li style="padding-right: 14px;">Rating</li>
                        </ul>
                        <ul>
                            <?php
                            for ($i = 0; $i < 5; $i++) {

                                if ($i < $courses['rating']) {
                                    echo "
														<li class='star selected'>
															<i class='fa fa-star fa-fw'></i>
														</li>";
                                } else {
                                    echo "
														<li class='star'>
															<i class='fa fa-star fa-fw'></i>
														</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <h2 class="text-merriweather mb-4 u-text-bold font-color-white"><?php echo $courses['title'] ?></h2>
                <div class="o-media">
                    <div class="o-media__img u-mr-xsmall">
                        <div class="c-avatar c-avatar--xsmall">
                            <img class="c-avatar__img" src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 3 2'%3E%3C/svg%3E" data-src="<?php echo $courses['author']['photo'] ?>" alt="<?php echo $courses['author']['name'] ?>">
                        </div>
                    </div>
                    <div class="o-media__body font-color-white">
                        <?php echo $courses['author']['name'] ?>
                        <small class="u-block u-text-mute">
                            <?php echo $courses['author']['headline'] ?>
                        </small>
                    </div>
                </div>
                <hr style="border-top: 1px solid rgb(68, 36, 167) !important;">
                <div class="row">
                    <div class="col-lg-8 col-lg-12">
                        <div class="row">
                            <div class="info-kelas col-6 col-lg-3 text-left">
                                <p class="header-title font-color-white">KATEGORI</p>
                                <a class="sub-title text-uppercase font-color-biru" href="<?php echo $courses['sub_category']['url'] ?>" title="<?php echo $courses['sub_category']['name'] ?>"><?php echo $courses['sub_category']['name'] ?></a>
                            </div>
                            <div class="info-kelas col-6 col-lg-3 text-left">
                                <p class="header-title font-color-white">SERTIFIKAT</p>
                                <i class="material-icons no">
                                    <?php if(!empty($courses['price'])){ ?>
                                        Bersertifikat
                                    <?php }else{ ?>
                                        Tidak ada sertifikat.
                                    <?php } ?>
                                </i>
                            </div>
                            <div class="info-kelas col-6 col-lg-3 text-left">
                                <?php if(!empty($courses['price'])){ ?>
                                    <p class="header-title font-color-white">MEMBER</p>
                                    <p class="sub-title font-color-biru"><?= $get_bough['bough'] ?></p>
                                <?php }else{ ?>
                                    <p class="header-title font-color-white">MEMBER</p>
                                    <p class="sub-title font-color-biru"><?= $get_akses['count'] ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
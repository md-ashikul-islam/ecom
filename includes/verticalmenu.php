<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-4 hidden-sm hidden-xs">
            <div class="biolife-vertical-menu none-box-shadow  ">
                <div class="vertical-menu vertical-category-block always ">
                    <div class="block-title">
                        <span class="menu-icon">
                            <span class="line-1"></span>
                            <span class="line-2"></span>
                            <span class="line-3"></span>
                        </span>
                        <span class="menu-title">Categories</span>
                        <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                    </div>
                    <div class="wrap-menu">
                        <ul class="menu clone-main-menu">
                            <?php
                                foreach($ctgDatas as $ctgData){
                            ?>
                                <li class="menu-item menu-item-has-children has-megamenu">
                                    <a href="category.php?status=catView&&id= <?php echo $ctgData['ctg_id']; ?>" class="menu-name" data-title="<?php echo $ctgData['ctg_name']; ?>"><?php echo $ctgData['ctg_name']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9 col-md-8 col-xs-12">
            <div class="main-slide block-slider nav-change hover-main-color type02">
                <ul class="biolife-carousel" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}'>
                    <li>
                        <div class="slide-contain slider-opt04__layout01 light-version first-slide">
                            <div class="media"></div>
                            <div class="text-content">
                                <i class="first-line">Pomegranate</i>
                                <h3 class="second-line">Vegetables 100% Organic</h3>
                                <p class="third-line">A blend of freshly squeezed green apple & fruits</p>
                                <p class="buttons">
                                    <a href="#" class="btn btn-bold">Shop now</a>
                                    <a href="#" class="btn btn-thin">View lookbook</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slide-contain slider-opt04__layout01 light-version second-slide">
                            <div class="media"></div>
                            <div class="text-content">
                                <i class="first-line">Pomegranate</i>
                                <h3 class="second-line">Vegetables 100% Organic</h3>
                                <p class="third-line">A blend of freshly squeezed green apple & fruits</p>
                                <p class="buttons">
                                    <a href="#" class="btn btn-bold">Shop now</a>
                                    <a href="#" class="btn btn-thin">View lookbook</a>
                                </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="slide-contain slider-opt04__layout01 light-version third-slide">
                            <div class="media"></div>
                            <div class="text-content">
                                <i class="first-line">Pomegranate</i>
                                <h3 class="second-line">Vegetables 100% Organic</h3>
                                <p class="third-line">A blend of freshly squeezed green apple & fruits</p>
                                <p class="buttons">
                                    <a href="#" class="btn btn-bold">Shop now</a>
                                    <a href="#" class="btn btn-thin">View lookbook</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
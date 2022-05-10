 <!-- Brand area start -->
 
 <div class="brand-area mb-60px">
    <div class="container">
        <div class="brand-slider slider-nav-style-1  slider-nav-style-2">
            <div class="brand-slider-wrapper swiper-wrapper">
                @foreach($brands ?? '' as $key => $brand)
                    <div class="brand-slider-item swiper-slide custom-brand">
                        <a href="#">
                            <img src="{{ asset('/uploads/brands/' . $brand->image) }}" alt="" />
                        </a>
                    </div>
                @endforeach
            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<!-- Brand area end -->
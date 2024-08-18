<!-- start product lazy load -->
<section class="mb-4">
    <section class="container-xxl">
        <section class="row">
            <section class="col">
                <section class="content-wrapper bg-white p-3 rounded-2">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>مطالب مرتبط</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="lazyload-wrapper">
                        <section class="lazyload light-owl-nav owl-carousel owl-theme">

                            @forelse($relatedPostUser as $relatedPostUser)

                            <section class="item">
                                <section class="lazyload-item-wrapper">
                                    <section class="product">

                                        <a class="product-link" href="{{ route('customer.member.post-user', $relatedPostUser->slug) }}">
                                            <br><br>
                                            <section class="product-image">
                                                @if($postItem->image)
                                                <img class="" src="{{ asset($relatedPostUser->image['indexArray']['medium']) }}" alt="{{ $postItem->title }}">
                                                @else

                                                <p>بدون تصویر</p>
                                                <br><br><br><br><br><br><br><br><br><br>
                                                @endif
                                            </section>
                                            <section class="product-colors"></section>
                                            <section class="product-name">
                                                <h3>موضوع:<br>{{ $relatedPostUser->title }}</h3>
                                            </section>
                                            <section class="product-name">
                                                <h3>نویسنده:<br>{{ $relatedPostUser->userAuthor->full_name }}</h3>
                                            </section>
                                            <section class="product-price-wrapper">
                                            </section>

                                        </a>
                                    </section>
                                </section>
                            </section>
                            @empty
                            <p>محصولی یافت نشد</p>
                            @endforelse


                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
<!-- end product lazy load -->
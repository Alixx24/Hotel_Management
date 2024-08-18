<aside id="sidebar" class="sidebar col-md-3">


    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
        <form action="{{ route('customer.postUsers') }}" method="get">
            <input type="hidden" name="sort" value="{{ request()->sort }}">
            <!-- start sidebar nav-->
            <section class="sidebar-nav">
                


            </section>
            <!--end sidebar nav-->
    </section>

    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
        <section class="content-header mb-3">
            <section class="d-flex justify-content-between align-items-center">
                <h2 class="content-header-title content-header-title-small">
                    جستجو در نتایج
                </h2>
                <section class="content-header-link">
                    <!--<a href="#">مشاهده همه</a>-->
                </section>
            </section>
        </section>

        <section class="">
            <input class="sidebar-input-text" type="text" placeholder="جستجو بر اساس نام،  ..." value="{{ request()->search }}" name="search">
        </section>
    </section>

   






    <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
        <section class="sidebar-filter-btn d-grid gap-2">
            <button class="btn btn-danger" type="submit">اعمال فیلتر</button>
        </section>
    </section>

    </form>
    <div class="mb-3">
        <a href="{{ route('customer.postUsers') }}" class="btn btn-warning">حذف فیلتر ها</a>
    </div>


</aside>
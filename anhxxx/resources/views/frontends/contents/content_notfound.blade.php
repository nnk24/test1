<section>
    <div class="tab-content mt-5">
        <div class="m-margin-top-150px" id="nav-home" role="tabpanel"
             aria-labelledby="nav-home-tab">
            <div class="container-fluid">
                <div class="m-margin-top-bottom-30px">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="text-center">
                                <a href="{{url('/')}}"><p class="h1 text-warning">404</p></a>
                                <p class="text-secondary">Trang không tồn tại</p>
                            </div>
                        </div>
                        <div class="col-md-3">
                            @include('frontends.includes.menu.menu_type')
                            @include('frontends.includes.menu.menu_region')
                            @include('frontends.includes.menu.menu_top_view')
                            @include('frontends.includes.menu.menu_tag')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--end contents-->
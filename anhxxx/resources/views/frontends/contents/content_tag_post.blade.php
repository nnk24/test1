<section>
    <div class="tab-content">
        <div class="m-margin-top-110px">
            <div class="container-fluid">
                <div class="m-margin-top-bottom-30px">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="clearfix mb-5 p-3 border-bottom">
                                @include('frontends.includes.menu.menu_tag')
                            </div>
                            <div class="mb-3"><p class="h3"><i class="fa fa-id-card text-info"></i> Bài viết</p></div>
                            @if(isset($groups))
                                @if (count($groups))
                                    <div class="grid">
                                        @foreach($groups as $group)
                                            <div class="grid-item wow zoomIn">
                                                <div class="m-positon-p">
                                                    <a href="{{url($group->name_seo)}}" class="m-a-p"
                                                       data-toggle="tooltip" title="{{$group->name}}">
                                                        <img class="safelyLoadImage"
                                                             src="{{in_array(substr($group->thumbnail, 0, 4), $first_url_image)?$group->thumbnail:asset($group->thumbnail)}}">
                                                        <div class="m-none">
                                                            <div class="m-bg-img"></div>
                                                            <div class="m-text m-s-t">
                                                                @if(isset($group->created_at))<h5
                                                                        class="text-dark small">{{date_format($group->created_at, "d") . ' Th' . date_format($group->created_at, "m," ). date_format($group->created_at, "Y" )}}</h5>@endif
                                                                <h2 class="text-light h3">{!! str_limit($group->name,$limit=7,$end='...') !!}</h2>
                                                                <p class="text-danger"><i
                                                                            class="fa fa-eye"></i> {{post_views($group->view)}}
                                                                    -
                                                                    <i class="fa fa-picture-o"></i> {{count($group->image)}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="mb-3 mt-2 w-50 m-auto">
                                        {{Illuminate\Pagination\AbstractPaginator::defaultView("pagination::bootstrap-4")}}
                                        {{ $groups->links() }}
                                    </div>
                                @else
                                    @include('frontends.includes.notfounds.not_item')
                                @endif
                            @else
                                @include('frontends.includes.notfounds.back_home')
                            @endif
                        </div>
                        <div class="col-md-3">
                            @include('frontends.includes.menu.menu_type')
                            @include('frontends.includes.menu.menu_region')

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--end contents-->
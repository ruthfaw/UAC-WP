<div class="container search nav-item px-4 py-3">
    <form action="/search" class="d-flex" method="GET">
        <input type="search" class="form-control form px-5-control-lg" placeholder="@lang('home.searchbar.fow')" name="keyword" style="margin-top: 20px;">
        {{-- <a class="btn" role="button" href="" style="margin-top:20px;border:1px solid rgb(131, 121, 121)">Search</a> --}}
        <button class="btn btn-prim" type="submit" style="color:white;margin-top:20px;border:1px solid rgb(131, 121, 121)">@lang('home.searchbar.search_bt')</button>
    </form>
</div>

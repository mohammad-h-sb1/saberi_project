<header class="rtl">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">فروشگاه فایل</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('front.posts.index')}}">مقالات <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.html">درباره ما</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('front.category')}}">دسته بندی ها</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.dashboard')}}">داشبورد</a>
                </li>
            </ul>
            <form class="form-inline flex-nowrap my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="جستجو ..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0 ml-md-0 ml-2" type="submit">جستجو</button>
            </form>
        </div>
    </nav>
</header>

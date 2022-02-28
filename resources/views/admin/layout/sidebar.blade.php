<!doctype html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('images/logo.png')}}" type="image/ico"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/product/product.css') }}">
    {{--    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">--}}
    @stack('style')
    <style>
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    {{--    form validation--}}
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}

</head>
<body>

<div class="wrapper d-flex align-items-stretch text-black-50">
    <nav id="sidebar">
        <div class="p-4 pt-5w">
            @php $user = App\Models\User::find(Auth::user()->id) @endphp
            <img
                src="{{ $user->ProfilePicture? asset('storage/UserProfile/'.$user->ProfilePicture->name) : asset('images/user.png') }}"
                class="img logo rounded-circle mb-5">
            <a class="mb-5">{{ $user->fullname  }}</a>
            <ul class="list-unstyled components mb-5">
                <li class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.index') }}">Home</a>
                </li>
                <li class="{{ request()->is('admin/product/*') ? 'active' : '' }}">
                    <a href="#product" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Product</a>
                    <ul class="collapse list-unstyled {{ request()->is('admin/product/*') ? 'show' : '' }}"
                        id="product">
                        <li class="{{ request()->is('admin/product/add') ? 'active' : '' }}">
                            <a href="{{ route('admin.product.add') }}">Add Products</a>
                        </li>
                        <li class="{{ request()->is('admin/product/listview') ? 'active' : '' }}">
                            <a href="{{ route('admin.product.listview') }}">List View</a>
                        </li>
                        <li class="{{ request()->is('admin/product/gridView') ? 'active' : '' }}">
                            <a href="{{ route('admin.product.gridView') }}">Grid View</a>
                        </li>
                        <li class="{{ request()->is('admin/product/bulk_product_upload') ? 'active' : '' }}">
                            <a href="{{ route('admin.product.bulk_product_upload') }}">Bulk Product Uploads</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/category/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.category.index') }}">Category</a>
                </li>
                <li class="{{ route('admin.category.index') }}">
                    <a href="#">Brand</a>
                </li>
                <li class="{{ request()->is('admin/user/*') ? 'active' : '' }}">
                    <a href="{{ route('admin.user.index') }}">Users</a>
                </li>
                <li>
                    <a href="#">Orders</a>
                </li>
                <li class="">
                    <a class="nav-link text-danger" href="{{ route('admin.logout') }}">Logout</a>
                </li>
            </ul>

            <div class="footer">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a
                        href="http://kpmakwana.tech/" target="_blank">kpmakwana.tech</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>

        </div>
    </nav>

    <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 bg-white ">
        @yield('nav')
        <nav class="navbar navbar-expand-lg bg-dark">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item dropdown-header dropdown mr-2">
                            <a class="dropdown-toggle" href="#menu" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Product
                            </a>
                            <div class="dropdown-menu" id="menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.product.listview') }}">All Product</a>
                                <a class="dropdown-item" href="{{ route('admin.product.add') }}">Add Product</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown-header dropdown mr-2">
                            <a class="dropdown-toggle" href="#category_menu" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Category
                            </a>
                            <div class="dropdown-menu" id="category_menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.category.index') }}">All Category</a>
                                <a class="dropdown-item" href="{{ route('admin.category.add') }}">Add Category</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown-header dropdown mr-2">
                            <a class="dropdown-toggle" href="#brand_menu" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Brand
                            </a>
                            <div class="dropdown-menu" id="brand_menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.brand.index') }}">All Brand</a>
                                <a class="dropdown-item" href="{{ route('admin.brand.add') }}">Add Brand</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        {{--        <div class="col-md-12">--}}
        {{--            @php--}}
        {{--                $route = Request::route()->getName();--}}
        {{--                $pieces = explode(".", $route);--}}
        {{--            @endphp--}}
        {{--            @foreach($pieces as $path)--}}
        {{--                <a href="{{ $path == "admin" ? route('admin.index'):"" }}">{{ $path }}</a>&nbsp;&gt;--}}
        {{--            @endforeach--}}
        {{--        </div>--}}
        @yield('content')
    </div>
</div>
@stack('script')
{{--<script src="{{ asset('js/jquery.min.js') }}"></script>--}}
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>--}}
<script src="{{ asset('js/popper.js') }}"></script>
{{--<script src="{{asset('js/bootstrap.min.js')}}"></script>--}}
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>

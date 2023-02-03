<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>

<!-- Meta -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Title -->
<title>E-Menu</title>

<!-- Favicons -->
<link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
<link rel="apple-touch-icon" href="{{ asset('assets/img/favicon_60x60.png') }}">
<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/favicon_76x76.png') }}">
<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/favicon_120x120.png') }}">
<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/favicon_152x152.png') }}">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;700&family=Raleway:wght@100;200;400;500&display=swap" rel="stylesheet">

<!-- CSS Core -->
<link rel="stylesheet" href="{{ asset('dist/css/core.css') }}" />

<!-- CSS Theme -->
<link id="theme" rel="stylesheet" href="{{ asset('dist/css/theme-beige.css') }}" />

</head>

<body>

<!-- Body Wrapper -->
<div id="body-wrapper" class="animsition">


    <!-- Header / End -->



    <!-- Content -->
    <div id="content">

        <!-- Page Title -->
        <div class="page-title bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-4">
                        <h1 class="mb-0">قائمة الطعام</h1>
                        <h4 class="text-muted mb-0">مطعم بزل</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-md-10 offset-md-1" role="tablist">

                        
                        @foreach ($categories as $category)

                        <div id="{{ $category->title }}" class="menu-category">
                            <div class="menu-category-title collapse-toggle" role="tab" data-target="#menuBurgersContent" data-toggle="collapse" aria-expanded="true">
                                <div class="bg-image"><img src="{{asset($category->image)}}" alt="{{$category->title}}"></div>
                                <h2 class="title">{{ $category->title }}</h2>
                            </div>
                            <div id="menuBurgersContent" class="menu-category-content collapse show">
                                <div class="p-4">
                                    <div class="row gutters-sm">

                                        @foreach ($category->products as $pr)
                                        <div class="col-lg-4 col-6">
                                            <!-- Menu Item -->
                                            <div class="menu-item menu-grid-item">
                                                <img class="mb-4" src="{{asset($pr->image)}}" alt="{{$pr->title}}">
                                                <h6 class="mb-0 text-center">{{$pr->title}}</h6>
                                                <span class="text-muted text-sm text-center">{!! $pr->content !!}</span>
                                                <div class="row align-items-center mt-4">
                                                    <div class="col-sm-6"><span class="text-md mr-4"><span data-product-base-price>{{$pr->price}}</span> ريال </span></div>
                                                    {{-- <div class="col-sm-6 text-sm-right mt-2 mt-sm-0"><button class="btn btn-outline-secondary btn-sm" data-action="open-cart-modal" data-id="1"><span>Add to cart</span></button></div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                     
                                       
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer id="footer" class="bg-dark dark">

            <div class="container">
                            <div class="footer-second-row text-center">
                    <span class="text-muted">Copyright E-Menu 2023©. Made with love by Puzzle.</span>
                </div>
            </div>

            <!-- Back To Top -->
            <button id="back-to-top" class="back-to-top"><i class="ti ti-angle-up"></i></button>

        </footer>
        <!-- Footer / End -->

    </div>
    <!-- Content / End -->


   

    <!-- Body Overlay -->
    <div id="body-overlay"></div>

</div>





<!-- JS Core -->
<script src="{{ asset('dist/js/core.js') }}"></script>

</body>

</html>

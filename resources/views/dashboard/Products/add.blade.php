@extends('dashboard.layouts.layout')

@section('body')
    <!-- Breadcrumb -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">{{ __('dashboard.dashboard') }} </li>
        <li class="breadcrumb-item"><a href="#">{{ __('dashboard.categories') }}</a>
        </li>
        <li class="breadcrumb-item active">{{ __('dashboard.add product') }}</li>

        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <a class="btn btn-secondary" href="#"><i class="icon-speech"></i></a>
                <a class="btn btn-secondary" href="./"><i class="icon-graph"></i> &nbsp;{{ __('dashboard.categories') }}</a>
                <a class="btn btn-secondary" href="#"><i class="icon-settings"></i> &nbsp;{{ __('dashboard.add product') }}</a>
            </div>
        </li>
    </ol>


    <div class="container-fluid">

        <div class="animated fadeIn">
            <form action="{{ Route('dashboard.Products.storeProduct') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="row">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <strong>{{ __('dashboard.Products') }}</strong>
                        </div>
                        <div class="card-block">



                            <div class="form-group col-md-12">
                                <label>{{ __('dashboard.image') }}</label>
                                <input type="file" name="image" class="form-control"
                                    placeholder="{{ __('dashboard.image') }}">
                            </div>

                            <div class="form-group col-md-12">
                                <label>{{ __('dashboard.price') }}</label>
                                <input type="number" name="price" class="form-control" required>
                            </div>


                            <div class="form-group col-md-12">
                                <label>{{ __('dashboard.status') }}</label>
                                <select name="category_id" id="" class="form-control" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->title }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>





                        <div class="card">
                            <div class="card-header">
                                <strong>{{ __('dashboard.translations') }}</strong>
                            </div>
                            <div class="card-block">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    @foreach (config('app.languages') as $key => $lang)
                                        <li class="nav-item">
                                            <a class="nav-link @if ($loop->index == 0) active @endif"
                                                id="home-tab" data-toggle="tab" href="#{{ $key }}" role="tab"
                                                aria-controls="home" aria-selected="true">{{ $lang }}</a>
                                        </li>
                                    @endforeach

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    @foreach (config('app.languages') as $key => $lang)
                                        <div class="tab-pane mt-3 fade @if ($loop->index == 0) show active in @endif"
                                            id="{{ $key }}" role="tabpanel" aria-labelledby="home-tab">
                                            <br>
                                            <div class="form-group mt-3 col-md-12">
                                                <label>{{ __('dashboard.title') }} - {{ $lang }}</label>
                                                <input type="text" name="{{ $key }}[title]" class="form-control"
                                                    placeholder="{{ __('dashboard.title') }}">
                                            </div>

                                            <div class="form-group col-md-12">
                                                <label>{{ __('dashboard.content') }}</label>
                                                <textarea name="{{ $key }}[content]" class="form-control" id="editor" cols="50" rows="10"></textarea>
                                            </div>
                                            

                                            <div class="form-group col-md-12">
                                                <label>{{ __('dashboard.tags') }}</label>
                                                <textarea name="{{ $key }}[tags]" class="form-control" id="" ></textarea>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i>
                                إرسال</button>

                        </div>



                    </div>
            </form>
        </div>
    </div>
@endsection

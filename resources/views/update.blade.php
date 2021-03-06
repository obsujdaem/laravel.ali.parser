@extends('layouts.html')

@section('title', $product->description)

@section('content')

    <h1 class="mx-auto mt-5" style="max-width: 1200px;">{{__('content.updateTitle')}}</h1>
    <div class="row main">

        <form style="font-size: 15px; width: 600px;" class="col" method="post"
              action="{{route('shop.update', $product->id)}}">
            @csrf
            @method('PATCH')

            <div class="form-group">
                <label for="category">{{__('content.form.category')}}</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option {{($category->category_name === $product->category->name) ? "selected='selected'" : ''}}
                                value="{{$category->category_id}}">{{$category->category_name}}</option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">{{__('content.form.descriptionEn')}}</label>
                <textarea class="form-control" name="description_en" rows="2">{{$product->productLocalization->where('localization_name', 'en')->first()->product_description}}</textarea>
                @error('description_en')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="description">{{__('content.form.descriptionRu')}}</label>
                <textarea class="form-control" name="description_ru" rows="2">{{$product->productLocalization->where('localization_name', 'ru')->first()->product_description}}</textarea>
                @error('description_ru')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="row">
                <div class="form-group col">
                    <label for="old_price">{{__('content.form.oldPrice')}}, €</label>
                    <input type="number" class="form-control" name="old_price" step="0.01"
                           value="{{$product->old_price}}">
                    @error('old_price')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col">
                    <label for="sales">{{__('content.form.sale')}}, %</label>
                    <input type="number" class="form-control" name="sales" value="{{$product->sales}}">
                    @error('sales')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group">
                <label for="img_url">{{__('content.form.link')}}</label>
                <input type="url" class="form-control" name="img_url"
                       value="{{$product->img_url}}">
                @error('img_url')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="row">
                <div class="form-group col">
                    <label for="order_count">{{__('content.form.orders')}}</label>
                    <input type="number" class="form-control" name="order_count" value="{{$product->order_count}}">
                    @error('order_count')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group col">
                    <label for="stock_availability">{{__('content.form.inStock')}}</label>
                    <input type="number" class="form-control" name="stock_availability"
                           value="{{$product->stock_availability}}">
                    @error('stock_availability')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="form-group pb-5 mt-5">
                <input type="submit" class="form-control" value="{{__('content.form.updateButton')}}">
            </div>

        </form>
        <div class="col">

            <h1 class="mx-auto mt-5" style="width: 400px;">{{__('content.previewTitle')}}</h1>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-4">
                        <img class="img-fluid" src="{{$product->img_url}}" alt="">
                    </div>
                    <div class="col-8">
                        <div class="row">
                            <div class="col">
                                <p style="font-size: 20px;">{{$product->description}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col font-weight-bold">
                                {{$product->price}} €
                            </div>
                            <div class="col font-weight-bold">
                                <s style="opacity: .5">{{$product->old_price}} €</s>
                            </div>
                            <div class="col">
                        <span class="badge badge-danger"
                              style="height: 30px;">{{$product->sales}} %</span>
                            </div>
                        </div>
                        <div class="row mt-3" style="font-size: 18px;">
                            <div class="col">
                                {{__('content.orders')}}: {{$product->order_count}}
                            </div>
                            <div class="col">
                                {{__('content.inStock')}}: {{$product->stock_availability}}
                            </div>
                        </div>
                        <div class="row mt-5 text-right" style="opacity: 0.7; ">
                            <div class="col">
                                <p style="font-size: 20px;">{{__('content.dateAdded')}}: {{date('Y-m-d', strtotime($product->created_at))}}</p>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group right">
                            <a href="{{route('shop.view', $product->id)}}"
                               class="btn btn-sm btn-outline-secondary">{{__('navigation.view')}}</a>
                            <a href="{{route('shop.delete', $product->id)}}"
                               class="btn btn-sm btn-outline-secondary">{{__('navigation.delete')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

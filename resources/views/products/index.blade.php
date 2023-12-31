@extends('layouts.app')
 
 @section('content')
 <div class="row">
 @foreach ($recommend_products as $recommend_product)
             <div class="col-4">
                 <a href="{{ route('products.show', $recommend_product) }}">
                     @if ($recommend_product->image !== "")
                     <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                     @else
                     <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                     @endif
                 </a>
                 <div class="row">
                     <div class="col-12">
                         <p class="samuraimart-product-label mt-2">
                             {{ $recommend_product->name }}<br>
                         </p>
                     </div>
                 </div>
             </div>
             @endforeach


 <div class="top-bar">
         @component('components.topbar', ['categories' => $categories])
         @endcomponent
</div>
     <div class="col-9">
     <div class="container">
     @if ($category !== null)
                 <a href="{{ route('products.index') }}">トップ</a> > <a href="#">{{ $category->name }}</a> 
                 <h1>{{ $category->name }}の商品一覧{{$total_count}}件</h1>
        @endif
         </div>
         <div>
             Sort By
             @sortablelink('id', 'ID')
</div>
         <div class="container mt-4">
             <div class="row w-100">
                 @foreach($products as $product)
                 <div class="col-3">
                     <a href="{{route('products.show', $product)}}">
                         <img src="{{ asset('img/dummy.png')}}" class="img-thumbnail">
                     </a>
                     <div class="row">
                         <div class="col-12">
                             <p class="samuraimart-product-label mt-2">
                                 {{$product->name}}<br>
                                
                             </p>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
         </div>
     </div>
 </div>
 @endsection


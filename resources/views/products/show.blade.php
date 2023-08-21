@extends('layouts.app')
 
 @section('content')
 

 <div class="row w-75">
 <div class="col-5 offset-1">
             <img src="{{ asset('img/dummy.png')}}" class="w-100 img-fluid">
            
         <div class="col">
             <div class="d-flex flex-column">
                 <h1 class="">
                 {{$product->name}}
                 </h1>
                 <p class="">
                     {{$product->description}}
                 </p>
                 <hr>
             </div>
             @auth
             <form method="POST" class="m-3 align-items-end">
                 @csrf
                 <input type="hidden" name="id" value="{{$product->id}}">
                 <input type="hidden" name="name" value="{{$product->name}}">
               
                
    
                 <div class="row">
                     <div class="col-5">
                     @if($product->isFavoritedBy(Auth::user()))
                         <a href="{{ route('products.favorite', $product) }}" class="btn samuraimart-favorite-button text-favorite w-100">
                             <i class="fa fa-heart"></i>
                             お気に入り解除
                         </a>
                         @else
                         <a href="{{ route('products.favorite', $product) }}" class="btn samuraimart-favorite-button text-favorite w-100">
                             <i class="fa fa-heart"></i>
                             お気に入り
                         </a>
                         @endif
                     </div>
                 </div>
             </form>
             @endauth
         </div>
 
         <div class="offset-1 col-11">
             <hr class="w-100">
         </div>
 
         <div class="offset-1 col-10">
              <!-- レビューを実装する箇所になります -->
              <div class="row">
                 @foreach($comments as $comment)
                 <div class="offset-md-5 col-md-5">
                     <p class="h3">{{$comment->content}}</p>
                     <label>{{$comment->created_at}} {{$comment->user->name}}</label>
                 </div>
                 @endforeach
             </div><br />
 
             @auth
             <div class="row">
                 <div class="offset-md-5 col-md-5">
                     <form method="POST" action="{{ route('comments.store') }}">
                         @csrf
                         <h4>コメント</h4>
                         @error('content')
                             <strong>コメントをする</strong>
                         @enderror
                         <textarea name="content" class="form-control m-2"></textarea>
                         <input type="hidden" name="product_id" value="{{$product->id}}">
                         <button type="submit" class="btn samuraimart-submit-button ml-2">コメントする</button>
                     </form>
                 </div>
             </div>
             @endauth
         </div>
     </div>
 </div>
 @endsection

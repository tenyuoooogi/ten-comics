<div class="container">
     @foreach ($categories as $category)
     <label class="topbar"><a href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a></label>
        @endforeach 
 </div>
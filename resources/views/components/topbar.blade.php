<div class="container">
     @foreach ($categories as $category)
     <label class="samuraimart-topbar-category-label"><a href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a></label>
        @endforeach

        
 </div>
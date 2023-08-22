<div class="container">
    @foreach ($names as $name)
    
     @foreach ($categories as $category)
     @if($category->name === $name)
     <label class="samuraimart-topbar-category-label"><a href="{{ route('products.index', ['category' => $category->id]) }}">{{ $category->name }}</a></label>
     @endif
        @endforeach 
     @endforeach

        
 </div>
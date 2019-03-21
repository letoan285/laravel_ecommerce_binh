
<h3>Categoryid co name:{{ $cate->name }} </h3>
<hr>
<strong>San sam cung danh muc</strong>
<ul>
    @foreach ($cate->products as $product)
    <li>
        <img width="120" src="{{ $product->image }}" alt="">
       <p>{{ $product->name }}</p> 
    </li>
        
    @endforeach
</ul>
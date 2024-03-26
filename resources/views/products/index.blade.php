@extends('layouts.app')
@section('content')
<main class="container">
    <section>
        <div class="titlebar">
            <h1>Products</h1>
            <a href="/products/create"><button>Add Product</button></a>
        </div>
        <div class="table">
            <div class="table-filter">
                <div>
                    <ul class="table-filter-list">
                        <li>
                            <p class="table-filter-link link-active">All</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="table-search">   
                <div>
                    <button class="search-select">
                       Search Product
                    </button>
                    <span class="search-select-arrow">
                        <i class="fas fa-caret-down"></i>
                    </span>
                </div>
                <div class="relative">
                    <input class="search-input" type="text" name="search" placeholder="Search product..." value="{{ request('search') }}">
                </div>
            </div>
            <div class="table-product-head">
                <p>Image</p>
                <p>Name</p>
                <p>Category</p>
                <p>Inventory</p>
                <p>Actions</p>
            </div>
            <div class="table-product-body">
                @if (count($products) > 0)
                    @foreach ($products as $product)
                    <img src="{{asset('images/' . $product->image)}}"/>
                    <p>{{$product->name}}</p>
                    <p>{{$product->category}}</p>
                    <p>{{$product->quantity}}</p>
                    <div>     
                        <button class="btn btn-success" >
                            <i class="fas fa-pencil-alt" ></i> 
                        </button>
                        <button class="btn btn-danger" >
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </div>
                    @endforeach
                    
                @endif
                
            </div>
            <div class="table-paginate">
                <div class="pagination">
                    <a href="#" disabled>&laquo;</a>
                    <a class="active-page">1</a>
                    <a>2</a>
                    <a>3</a>
                    <a href="#">&raquo;</a>
                </div>
            </div>
        </div>
    </section>
</main>
    
@endsection
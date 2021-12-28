@extends('admin.layouts.app')
@section('content')
    <ol class="breadcrumb" style="background-color: aliceblue; font-size: 15px; border-radius: 15px">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">{{$page_name}}</li>
    </ol>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>{{$page_name}}</h2>
                    <ul class="header-dropdown m-r--5">
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Add New prodcuts</a>
                    </ul>
                </div>
                <div class="body">
                   <label>Product Name: {{ $product->name }}</label><br/>
                   <label>Product Category: {{ $product->productCategories->name }}</label><br/>
                   <label>Product Price: {{ number_format($product->price,2) }}</label><br/>
                   <label>Special price: {{ number_format($product->default_discount,2) }}</label><br/>
                   <label>SEO Title: </label><br/>
                    @foreach ($product->productMeta as $products)
                        @if($products->key == 'title')
                            <?php echo $products->value ?>
                        @endif    
                    @endforeach
                   <label>Meta Description: </label><br/>
                    @foreach ($product->productMeta as $products)
                        @if($products->key == 'description')
                            <?php echo $products->value ?>
                        @endif    
                    @endforeach

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Faq</th>
                                    <th>Features & Benifit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        @foreach ($product->productMeta as $products)
                                            @if($products->key == 'faq')
                                                <?php echo $products->value ?>
                                            @endif    
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($product->productMeta as $products)
                                            @if($products->key == 'features')
                                                <?php echo $products->value ?>
                                            @endif    
                                        @endforeach
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
   
@endsection

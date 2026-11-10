@extends('master.index')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Home /</span><span class="text-muted fw-light">Products /</span> Edit Product</h4>

        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Edit Product</h5>
            <div class="card-body">
                @foreach ($edit as $product)
                    <form id="formAuthentication" class="mb-3" action="{{ route('products.update', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 
                        <div class="row">
                            <!-- Product Name -->
                            <div class="col-md-8 mb-3">
                                <label for="productName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="productName" name="name" value="{{ $product->name }}" placeholder="Enter product name" required>
                            </div>

                            <!-- Description -->
                            <div class="col-md-8 mb-3">
                                <label for="productDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="productDescription" name="description" placeholder="Enter product description" rows="4" required>{{ $product->description }}</textarea>
                            </div>

                            <!-- Price -->
                            <div class="col-md-4 mb-3">
                                <label for="productPrice" class="form-label">Price</label>
                                <input type="number" class="form-control" id="productPrice" name="price" value="{{ $product->price }}" placeholder="Enter product price" required>
                            </div>

                            <!-- Quantity -->
                            <div class="col-md-4 mb-3">
                                <label for="productQuantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="productQuantity" name="quantity" value="{{ $product->quantity }}" placeholder="Enter product quantity" required>
                            </div>

                            <!-- Image -->
                            <div class="col-md-8 mb-3">
                                <label for="productImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if ($product->image)
                                    <img src="{{ asset('img/' . $product->image) }}" width="90" height="120" alt="Product Image">
                                @endif
                            </div>

                            <!-- Status -->
                            <div class="col-md-4 mb-3">
                                <label for="productStatus" class="form-label">Status</label>
                                <select class="form-select" id="productStatus" name="status" required>
                                    <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Stocking</option>
                                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Out of stock</option>
                                </select>
                            </div>

                            <!-- Category -->
                            <div class="col-md-8 mb-3">
                                <label for="productCategory" class="form-label">Category</label>
                                <select class="form-select" id="productCategory" name="CatId" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->CatId == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- CPU -->
                            <div class="col-md-8 mb-3">
                                <label for="productCpu" class="form-label">CPU</label>
                                <select class="form-select" id="productCpu" name="CpuId" required>
                                    @foreach ($cpus as $cpu)
                                        <option value="{{ $cpu->id }}" {{ $product->CpuId == $cpu->id ? 'selected' : '' }}>{{ $cpu->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- GPU -->
                            <div class="col-md-8 mb-3">
                                <label for="productGpu" class="form-label">GPU</label>
                                <select class="form-select" id="productGpu" name="GpuId" required>
                                    @foreach ($gpus as $gpu)
                                        <option value="{{ $gpu->id }}" {{ $product->GpuId == $gpu->id ? 'selected' : '' }}>{{ $gpu->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- RAM -->
                            <div class="col-md-8 mb-3">
                                <label for="productRam" class="form-label">RAM</label>
                                <select class="form-select" id="productRam" name="RamId" required>
                                    @foreach ($rams as $ram)
                                        <option value="{{ $ram->id }}" {{ $product->RamId == $ram->id ? 'selected' : '' }}>{{ $ram->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- ROM -->
                            <div class="col-md-8 mb-3">
                                <label for="productRom" class="form-label">ROM</label>
                                <select class="form-select" id="productRom" name="RomId" required>
                                    @foreach ($roms as $rom)
                                        <option value="{{ $rom->id }}" {{ $product->RomId == $rom->id ? 'selected' : '' }}>{{ $rom->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <button class="btn btn-primary">Update Product</button>
                    </form>
                @endforeach
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
    </div>
    <!-- / Content -->
@endsection

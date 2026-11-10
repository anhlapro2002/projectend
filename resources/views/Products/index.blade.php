@extends('master.index')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        @if (session('error'))
            <div class="alert alert-danger" id="myText">
                {{ session('error') }}
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success" id="myText">
                {{ session('success') }}
            </div>
        @endif
   
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Product </h4>
        <a class="btn btn-outline-primary" href="{{route('products.create')}}">Add Product</a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">product</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product's name</th>
                        <th>price</th>
                        <th>Image</th>
                        <th>Configuration</th>   
                        <th>Status</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @method('PUT')
                    @csrf
                    @foreach($products as $prd)<tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$prd->id}}</strong></td>
                        <td>{{$prd->name}}</td>
                        <td>{{$prd->price}}$</td>
                        <td style="text-align: center">
                            <img src="{{ asset('img/' . $prd->image) }}" width="90" height="120" >
                        </td>
                        <td>{{$prd->ramname}}, {{$prd->romname}}, {{$prd->cpuname}}, {{$prd->gpuname}}</td>
                        <td>@if($prd->status == 0) <span class="badge bg-label-success me-1">Stocking</span>@else<span class="badge bg-label-danger me-1">Out of stock</span>@endif
                        <td>{{$prd->catname}}</td>
                        <td>
                            
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i> 
                                </button>
                                
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('editprd', ['id' => $prd->id]) }}"
                                    ><i class="bx bx-edit-alt me-1" ></i> Edit</a
                                    >

                                </div>
                               
                            </div>
                        </td>
                    </tr> 
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item {{ ($products->onFirstPage()) ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $products->url(1) }}">
                        <i class="tf-icon bx bx-chevrons-left"></i>
                    </a>
                </li>
                <li class="page-item {{ ($products->onFirstPage()) ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $products->previousPageUrl() }}">
                        <i class="tf-icon bx bx-chevron-left"></i>
                    </a>
                </li>
                @for ($i = 1; $i <= $products->lastPage(); $i++)
                    <li class="page-item {{ ($products->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item {{ ($products->hasMorePages()) ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $products->nextPageUrl() }}">
                        <i class="tf-icon bx bx-chevron-right"></i>
                    </a>
                </li>
                <li class="page-item {{ ($products->hasMorePages()) ? '' : 'disabled' }}">
                    <a class="page-link" href="{{ $products->url($products->lastPage()) }}">
                        <i class="tf-icon bx bx-chevrons-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- / Pagination -->
    </div>
        <hr class="my-5" />
    </div>
    <!-- / Content -->
@endsection

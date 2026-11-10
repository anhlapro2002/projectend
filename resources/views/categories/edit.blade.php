@extends('master.index')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Home /</span>
            <span class="text-muted fw-light">Category /</span> Edit Category
        </h4>

        <!-- Form chỉnh sửa danh mục -->
        <div class="card">
            <h5 class="card-header">Edit Category</h5>
            <div class="card-body">
                <form id="editCategoryForm" class="mb-3" action="{{ route('editcat.update', ['category' => $category->id]) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3">
                                <label for="inputName" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="Enter category name..." value="{{ $category->name }}">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection

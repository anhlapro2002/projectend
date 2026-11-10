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
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Employee </h4>
        <a class="btn btn-outline-primary" href="{{route('addep')}}">Add new Employee</a>
        <!-- Basic Bootstrap Table -->
        <div class="card">
            <h5 class="card-header">Employee</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @csrf
                    @foreach($employee as $ep)<tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$ep->id}}</strong></td>
                        <td>{{$ep->name}}</td>
                        <td>
                            {{$ep->email}}
                        </td>
                        <td>
                            {{$ep->address}}, {{$ep->wardname}}, {{$ep->disname}}, {{$ep->proname}}
                        </td>
                        <td>
                            {{$ep->phone}}
                        </td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('editep', ['id' => $ep->id]) }}"
                                    ><i class="bx bx-edit-alt me-1" ></i> Edit</a
                                    >
                                    <form method="post" action="" class="dropdown-item">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

                                    <script>
                                        function confirmDelete(button) {
                                            Swal.fire({
                                                title: 'Confirm deletion?',
                                                text: 'Are you sure?',
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'OK',
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    const form = button.closest('form');
                                                    if (form) {
                                                        form.submit();
                                                    }
                                                }
                                            });
                                        }
                                    </script>

                                </div>
                            </div>
                        </td>
                    </tr> @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Basic Bootstrap Table -->
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item first">
                    <a class="page-link" href="{{ $employee->url(1)}}">
                        <i class="tf-icon bx bx-chevrons-left"></i>
                    </a>
                </li>
                <li class="page-item prev">
                    <a class="page-link" href="{{ $employee->previousPageUrl()}}">
                        <i class="tf-icon bx bx-chevron-left"></i>
                    </a>
                </li>
                @for ($i = 1; $i <= $employee->lastPage(); $i++)
                    <li class="page-item {{ ($employee->currentPage() == $i) ? 'active' : '' }}">
                        <a class="page-link" href="{{ $employee->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="page-item next">
                    <a class="page-link" href="{{ $employee->nextPageUrl() }}">
                        <i class="tf-icon bx bx-chevron-right"></i>
                    </a>
                </li>
                <li class="page-item last">
                    <a class="page-link" href="{{ $employee->url($employee->lastPage()) }}">
                        <i class="tf-icon bx bx-chevrons-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <hr class="my-5" />
    </div>
    <!-- / Content -->
@endsection

@extends('layouts.base')


<!-- Triển khai title -->
@section('title', 'Major')

@extends('layouts.header')

@section('main')
    <!-- Modal Delete Defail -->
    <div class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true" id="exampleModal1">
        <div class="modal-dialog">
            <div class="modal-content bg-warning">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel1">DELETE FAILED</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Toasts Add-->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <i class="bi bi-check-lg"></i>
                <strong class="me-auto"></strong>
                <small>1 mins ago</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{ session('message') }}
            </div>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col" id="admin_content">
                <a href="{{ route('majors.create') }}"><button class="btn btn-success">Add new</button></a>

                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col" style="width:15%">Name</th>
                            <th scope="col" style="width:40%">Description</th>
                            <th scope="col" style="width:10%">Duration</th>
                            <th class="text-center" scope="col" style="width:10%">Detail</th>
                            <th class="text-center" scope="col" style="width:10%">Edit</th>
                            <th class="text-center" scope="col" style="width:10%">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($majors as $major)
                            <tr>
                                <th scope="row" id="{{ $major->id }}">
                                    {{ $major->id }}
                                </th>
                                <td>
                                    {{ $major->name }}
                                </td>
                                <td>
                                    {{ $major->description }}
                                </td>
                                <td>
                                    {{ $major->duration }} year
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('majors.show', ['major' => $major->id]) }}"><i
                                            class="bi bi-eye-fill"></i></a>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('majors.edit', ['major' => $major->id]) }}"><i
                                            class="bi bi-pencil-square">
                                        </i></a>
                                </td>
                                <td class="text-center">
                                    <a href="#" data-bs-toggle="modal"
                                        data-bs-target="#confirmDeleteModal{{ $major->id }}"><i
                                            class="bi bi-trash3-fill"></i></a>
                                </td>
                                <!-- Modal xác nhận xóa -->
                                <div class="modal fade" id="confirmDeleteModal{{ $major->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Nofication</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>You sure delete?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="{{ route('majors.destroy', ['major' => $major->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pagination custom-pagination justify-content-center mt-5">
                    {{ $majors->links() }}
                </div>
            </div>
        </div>
    </div>

    <footer>
        <hr>
        <h4 class="text-center text-uppercase">TLU'S</h4>
    </footer>

    <script>
        var element = document.getElementById('tacgia');
        element.className = 'nav-link active';
    </script>
    @if (session('result'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var check = '{{ session('result') }}';
                if (check === 'store_true' ||
                    check === 'update_true' ||
                    check === 'delete_true') {
                    var toastElement = document.getElementById('liveToast');
                    var toast = new bootstrap.Toast(toastElement);
                    toast.show();
                } else if (check === 'delete_false') {
                    var modal = new bootstrap.Modal(document.getElementById('exampleModal1'));
                    modal.show();
                }
            });
        </script>
    @endif
@endsection

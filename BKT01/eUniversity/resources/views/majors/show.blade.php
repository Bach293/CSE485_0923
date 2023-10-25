@extends('layouts.base')


<!-- Triển khai title -->
@section('title', 'Major')

@extends('layouts.header')

@section('main')
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-warning">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">EDIT FAILED</h1>
                </div>
                <div class="modal-body" id="modalBody">
                    @if (session('message'))
                        {{ session('message') }}
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col text-center" id="admin_content">
                <h2>MAJOR</h2>
                <form action="#" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">ID</span>
                        <input type="text" class="form-control" value="{{ $major->id }}" disabled>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Name</span>
                        <input type="text" class="form-control" name="artist_name" id="artist_name"
                            placeholder="Enter a name" value="{{ $major->name }}" readonly>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="description" name="description" style="height: 150px" readonly>{{ $major->description }}</textarea>
                        <label for="description" readonly>Description</label>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1" style="width:100px">Duration</span>
                        <input type="text" class="form-control" aria-label="Text input with dropdown button"
                            name="art_type" id="art_type" readonly value="{{ $major->duration }} year">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false" style="width:300px">Select duration</button>
                        <ul class="dropdown-menu dropdown-menu-end"
                            style="width:300px; max-height: 300px; overflow-y: auto;">
                            <li class="dropdown-item" onclick="selectName('1')">1
                            </li>
                            <li class="dropdown-item" onclick="selectName('2')">2
                            </li>
                            <li class="dropdown-item" onclick="selectName('3')">3
                            </li>
                            <li class="dropdown-item" onclick="selectName('4')">4
                            </li>
                            <li class="dropdown-item" onclick="selectName('5')">5
                            </li>
                        </ul>
                    </div>

                    <div class="d-flex justify-content-end">
                        <a href="{{ route('majors.index') }}" style="text-decoration: none;">
                            <button type="button" class="btn btn-warning">Close</button>
                        </a>
                    </div>
                </form>

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

        function selectName(name) {
            document.getElementById('art_type').value = name;
        }
    </script>
    @if (session('result'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var check = '{{ session('result') }}';
                if (check === 'update_exist' || check === 'update_false') {
                    var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                    modal.show();
                }
            });
        </script>
    @endif
    <script>
        function validateForm(event) {
            var artist_name = document.getElementById('artist_name').value;
            var description = document.getElementById('description').value;
            var art_type = document.getElementById('art_type').value;
            var errorMessage = "";
            var regexNull = /^\s*$/;
            if (regexNull.test(artist_name) ||
                regexNull.test(description) ||
                regexNull.test(art_type)) {
                errorMessage = "An error occurred:";
                event.preventDefault();

                if (regexNull.test(artist_name)) {
                    errorMessage += "\n- Artist name has not been entered.";
                }
                if (regexNull.test(description)) {
                    errorMessage += "\n- Description has not been entered.";
                }
                if (regexNull.test(art_type)) {
                    errorMessage += "\n- Duration has not been selected.";
                }
                var modal = new bootstrap.Modal(document.getElementById('exampleModal'));
                modal.show();
                document.getElementById('modalBody').innerText = errorMessage;
            }
        }
    </script>
@endsection

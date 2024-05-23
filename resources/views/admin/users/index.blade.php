@extends('admin.dashboard')

@section('dashboard')
    <div class="container mt-3" style="width: 930px">
       
        @if ($message = Session::get('success'))
            <div class="alert alert-success fade show" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    <span><strong>Success :</strong> {{ $message }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @elseif ($message = Session::get('failed'))
            <div class="alert alert-warning fade show" role="alert">
                <div class="d-flex justify-content-between align-items-center">
                    <span><strong>Warning :</strong> {{ $message }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        {{-- ------------ --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="nn1">Users Admin Page</h1>
                
            </div>
            <hr class="m-0">
            <div class="card-body">
             <form action="{{ route('users.searchAjax') }}" method="GET" id="search-form">
                <div class="input-group mb-2 gg">
                    <input type="text" class="form-control" id="search-input" name="search" placeholder="Search with email or name ">
                    <div class="input-group-append">
                         <button class="btn btn-primary " type="submit">Search</button> 
                       
                    </div >   
                </div>
            </form>
          
                <form action="{{ route('users.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" name="submit_btn" value="approve" class="btn btn-success mt-0 mb-3" >
                        <i class="fa-solid fa-check"></i>&nbsp; Approve
                    </button>

                    <button type="submit" name="submit_btn" value="disapprove" class="btn btn-danger mt-0 mb-3" width="200px">
                        <i class="fa-solid fa-close"></i>&nbsp; DisApprove
                    </button>
                    
                         <table class="table table-bordered table-striped text-center">
                            <thead>
                                <tr class="nn">
                                    <th><input type="checkbox" name="select_all_id" id="select_all_id"></th>
                                    <th>#</th>
                                    <th>image</th>
                                    <th>name</th>
                                    <th class="w-50">Email</th>
                                    <th>type</th>
                                    <th>is validated</th>
                                </tr>
                            </thead>
                            <tbody id="users-table">
                                @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="users[]" class="checkbox_ids" value="{{ $user->id }}">
                                        </td>
                                        <td>{{ $user->id }}</td>
                                        <td>
                                            <img src="{{ 'http://127.0.0.1:8887/storage/app/'.$user->image }}" width ="50" height="40"/>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email  }}</td>
                                        <td>{{ $user->user_type  }}</td>
                                        <td>
                                            @if ($user->is_validated == false)
                                                <span class=" bg-danger p-1 rounded text-light" >not approved</span>
                                            @else
                                                <span class="bg-success p-1 rounded text-light">approved</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <span class="text-danger fs-2 bg-danger text-white p-2">No Data Available !</span>
                                @endforelse
                            </tbody>

                           
                        </table>
                    {{-- </form> --}}
                </form>

                {{ $users->links() }}

            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#search-form').submit(function(event) {
            event.preventDefault();
            var searchValue = $('#search-input').val();
            $.ajax({
                url: "{{ route('users.searchAjax') }}",
                data: { search: searchValue },
                method: 'GET',
                success: function(response) {
                    var users = response.users;
                    var html = '';
                    for (var i = 0; i < users.length; i++) {
                        var user = users[i];
                        html += '<tr>';
                        html += '<td><input type="checkbox" name="select_all_id" id="select_all_id"></td>';
                        html += '<td>' + user.id + '</td>';
                        html += '<td><img src="http://127.0.0.1:8887/storage/app/' + user.image + '" width="50" height="40"/></td>';
                        html += '<td>' + user.name + '</td>';
                         html += '<td>' + user.email + '</td>';
                        html += '<td>' + user.user_type + '</td>';
                        html += '<td>';
                        if (user.is_validated == false) {
                            html += '<span class="bg-danger p-1 rounded text-light">not approved</span>';
                        } else {
                            html += '<span class="bg-success p-1 rounded text-light">approved</span>';
                        }
                        html += '</td>';
                        html += '</tr>';
                    }
                    $('#users-table').html(html);
                }
            });
        });
    });
</script>
    

@endsection

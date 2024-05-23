@extends('admin.dashboard')

@section('dashboard')


      
    <div class="container mt-3" style="width: 930px">
        {{-- ------------ --}}
         <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h1 class="nn1 ">Result page </h1>
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
                  

                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr class="nn">
                                <th>#</th>
                                <th>image</th>
                                <th>name</th>
                                <th class="w-50">Email</th>
                                <th>Score</th>
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody id="users-table">
                            @forelse ($users as $user)
                                <tr>
                                   <td>{{ $user->id }}</td>
                                    <td>
                                        <img src="{{ 'http://127.0.0.1:8887/storage/app/'.$user->image }}" width ="50" height="40"/>
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email  }}</td>
                                    <td>
                                        @if ($user->results->isNotEmpty())
                                            @foreach ($user->results as $result)
                                                {{ $result->score }}
                                            @endforeach
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                {{-- <td>
                                    <form action="{{ route('email.index') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="result_status" value="success">
                                        <button type="submit" class="bg-success rounded text-light">Success</button>
                                    </form>
                                    <form action="{{ route('email.index') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                        <input type="hidden" name="result_status" value="failed">
                                        <button type="submit" class="bg-danger  rounded text-light">Failed</button>
                                    </form>
                                
                                </td> --}}
                           </tr> 
                             @empty
                                <span class="text-danger fs-2 bg-danger text-white p-2">No Data Available !</span>
                            @endforelse
                        </tbody>
                    </table>

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
                        // html += '<td><input type="checkbox" name="select_all_id" id="select_all_id"></td>';
                        html += '<td>' + user.id + '</td>';
                        html += '<td><img src="http://127.0.0.1:8887/storage/app/' + user.image + '" width="50" height="40"/></td>';
                        html += '<td>' + user.name + '</td>';
                         html += '<td>' + user.email + '</td>';
                        html += '<td>' + user.score + '</td>';
                        html += '<td>';
                            html += '<span class="bg-danger p-1 rounded text-light">Failed</span>';

                            html += '<span class="bg-success p-1 rounded text-light">Succes</span>';
                        
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


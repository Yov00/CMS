@extends('layouts.app')

@section('content')
<div class="card card-default">
    <div class="card-header">
        Users
    </div>
    <div class="card-body">

        @if($users->count() > 1)
            <table class="table" style="font-size:13px;">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Give priviliges </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            
                        <tr>
                            <td>

                              <img src="{{Gravatar::src($user->email)}}" style="width:40px;height:40px;border-radius:50%;" alt="">
                            </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                            {{$user->role}}
                                        </td>
                                        <td>
                                       
                                        <form action="{{route('user.makeAdmin',$user->id)}}" method="POST" >
                                            @method('PATCH')
                                            @csrf
                                            @if($user->role != 'admin')
                                                <button type="submit" class="btn btn-dark btn-sm" style="font-size: 13px!important;width:150px">
                                                    Make Admin
                                                </button>
                                                @else
                                                <button type="submit" class="btn btn-info btn-sm" style="font-size: 13px!important;width:150px">
                                                        Remove Admin 
                                                    </button>
                                            @endif
                                        </form>
                                        
                                       
                                        
                                        </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3>No users yet</h3>
                @endif

    </div>
</div>
  
@endsection
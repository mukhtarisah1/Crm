@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        
        <div class="">
            <div class="d-flex">
                <span class="h1">Welcome {{auth()->user()->name}}</span> 
                <span class="ms-auto"><a href="{{ route('admin.register') }}" class="btn btn-success ">Create Employee</a></span>
            </div>
            <div>
                <div>
                    @if(session('success'))
                        <div class=" alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if(session('status'))
                        <div class=" alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status')}}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Names</th>
                          
                          <th scope="col">Customers</th>
                          <th scope="col">Assign Customers</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                            @forelse ( $users as $user)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td><a href="{{route('admin.show', $user->id)}}"> {{$user->name}} </a></td>
                                <td>Customers</td>
                                <td><div>Customer 1,</div>
                                    <div>Customer 1,</div>
                                    <div>Customer 1,</div>
                                </td>
                                <td >
                                    <div class="d-flex">
                                        <a href="{{route('admin.edit', $user->id)}}" class="btn btn-success btn-sm"> Update</a>  &nbsp;
                                        <form action="{{route('admin.delete', $user->id)}}" method="POST">@csrf @method('delete')
                                             <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                  
                                </td>
                              </tr>
                                
                            @empty
                                There are no employee users now
                            @endforelse
                        
                        
                        
                      </tbody> 
                </table>
            </div>
           
           
           
        </div>

    </div>

@endsection
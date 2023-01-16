@extends('layouts.app')

@section('content')
<div class="container">
    <div class=" straight" >
        
            <div class="card" style="width: 23rem;">
                <div class="d-flex align-items-center justify-content-around">
                    <div class="text-center ">
                        <img src={{ asset('/images/avatar.png') }} class="img-fluid p-1 card-image" alt="avatar">
                        <p class="mt-2">Role:
                             @if(Auth::user()->role->type== 1)
                                    Admin 
                                
                                @elseif (Auth::user()->role->type== 2)
                                    Employee
                                
                            @endif</p>
                    </div>
                    
                    <div class="card-body pe-1">
                      <h5 class="card-title">{{$user->name}}</h5>
                      <cite>Kaduna Nigeria</cite>
                      <p class="card-text"> <i class="bi bi-envelope"></i> {{$user->email}}</p>
                      <p class="card-text"><i class="bi bi-globe"></i> <a href="#">www.minicrm.com</a></p>
                      <p class="card-text"><i class="bi bi-calendar-event"></i>
                         {{$user->created_at->diffForHumans()}}
                      </p>
                      <p><a href="{{route('admin.edit', $user->id)}}" class="btn btn-primary">Edit details</a></p>
            
                    </div>
                </div> 
            </div>

        
        
            <div class="card " style="width: 43rem ;">
                <div class="card-header">
                  <h3>Current Tasks Information</h3>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                          <th scope="col">Customers</th>
                          <th scope="col">Assign Customers</th>
                          <th scope="col">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                            <tr>
                                <td><div>Customer 1,</div>
                                    <div>Customer 1,</div>
                                    <div>Customer 1,</div>
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example" name="user_type" >
                                        @error('name') is-invalid @enderror"
                                        <option selected>Add Customer</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Employee</option>
                                      </select>
                                </td>
                                <td >
                                    <div class="d-flex">
                                        <form action="{{route('admin.delete', $user->id)}}" method="POST">@csrf @method('delete') <button>Delete</button></form>
                                    </div>
                                  
                                </td>
                              </tr>
                      </tbody> 
                </table>
        
    </div>
    
    
</div>
@endsection
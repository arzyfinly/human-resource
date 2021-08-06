@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form method="post" action="{{ route('companies.update', $companies->id) }}" id="myForm">
                        @csrf
                        @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>                    
                                <input type="text" name="name" class="form-control" id="name" value="{{ $companies->name }}" aria-describedby="name" >                
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>                    
                                <input type="text" name="email" class="form-control" id="email" value="{{ $companies->email }}" aria-describedby="email" >                
                            </div>
                            <div class="form-group">
                                <label for="writer">Logo</label>                    
                                <input type="text" name="logo" class="form-control" id="logo" value="{{ $companies->logo }}" aria-describedby="logo" >                
                            </div>
                            <div class="form-group">
                                <label for="writer">Web URL</label>                    
                                <input type="text" name="web_url" class="form-control" id="web_url" value="{{ $companies->web_url }}" aria-describedby="web_url" >                
                            </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 
    
        @elseif(session()->has('error'))
    
            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>
    
    @endsection
    
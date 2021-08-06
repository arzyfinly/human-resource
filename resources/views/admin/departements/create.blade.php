@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form method="post" action="{{ route('departements.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="name">Name</label>                    
                                <input type="text" name="name" class="form-control" id="name" aria-describedby="name" >  
                                @foreach ($errors->get('name') as $message)
                                <small class="text-danger">{{ $message }}</small>
                                @endforeach              
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>                    
                                <textarea name="description" class="form-control" id="description" aria-describedby="description" ></textarea>
                                @foreach ($errors->get('description') as $message)
                                <small class="text-danger">{{ $message }}</small>
                                @endforeach
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

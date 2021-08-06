@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show">{{ Session::get('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if (Session::has('failed'))
                    <div class="alert alert-danger alert-dismissible fade show">{{ Session::get('failed') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                    <a href="departements/create" class="btn btn-md btn-success mb-3">Add Departement</a>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="text-center" scope="col">Name</th>
                            <th class="text-center" scope="col">Description</th>
                            <th class="text-center" scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($departements as $departement)
                            <tr>
                                <td class="text-center" >{{ $departement->name }}</td>
                                <td class="text-center">{{ $departement->description }}</td>
                                <td class="text-center">
                                    <form action="{{ route('departements.destroy',$departement->id) }}" onsubmit="return confirm('Yakin akan dihapus')" method="POST">                      
                                        <a class="btn btn-primary" href="{{ route('departements.edit',$departement->id) }}">Edit</a>                       
                                        @csrf
                                        @method('DELETE')                         
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                          @empty
                              <div class="alert alert-danger">
                                  Data Kosong.
                              </div>
                          @endforelse
                        </tbody>
                      </table>  
                      {{ $departements->links() }}
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

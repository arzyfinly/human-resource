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
                    <a href="companies/create" class="btn btn-md btn-success mb-3">Add Company</a>
                    
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="text-center" scope="col">Name</th>
                            <th class="text-center" scope="col">Email</th>
                            <th class="text-center" scope="col">Logo</th>
                            <th class="text-center" scope="col">Web URL</th>
                            <th class="text-center" scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse ($companies as $company)
                            <tr>
                                <td class="text-center">{{ $company->name }}</td>
                                <td class="text-center">{{ $company->email }}</td>
                                <td class="text-center">
                                    @if (strlen($company->logo) > 0)
                                        <img src="{{ asset('image/' . $company->logo) }}" width="80px">
                                    @endif
                                </td>
                                <td class="text-center">{{ $company->web_url }}</td>
                                <td class="text-center">
                                    <form action="{{ route('companies.destroy',$company->id) }}" onsubmit="return confirm('Yakin akan dihapus')" method="POST">                      
                                        <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>                       
                                        @csrf
                                        @method('DELETE')                         
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                          @empty
                              <div class="alert alert-danger">
                                  Data Kosong
                              </div>
                          @endforelse
                        </tbody>
                      </table>  
                      {{ $companies->links() }}
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

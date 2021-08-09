@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form method="post" action="{{ route('employees.store') }}" id="myForm">
                        @csrf
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" id="first_name" aria-describedby="first_name" >
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" id="last_name" aria-describedby="last_name" >
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="username" name="username" class="form-control" id="username" aria-describedby="username" >
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" aria-describedby="password" >
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" class="form-control" id="phone" aria-describedby="phone" >
                            </div>
                            <label for="Photo">Photo</label>
                            <div class="form-group">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" id="email" aria-describedby="email" >
                            </div>
                            <div class="form-group">
                                <label for="company_id">Company</label>
                                    <select name="company_id" id="company_id">
                                        <option value="Pilih Kondisi"></option>
                                            @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="departement_id">Departement</label>
                                    <select name="departement_id" id="departement_id">
                                        <option value="Pilih Kondisi"></option>
                                            @foreach ($departements as $departement)
                                            <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                            @endforeach
                                    </select>
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

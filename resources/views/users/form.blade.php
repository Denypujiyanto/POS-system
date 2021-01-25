@extends('layouts.app', [
'elementActive' => 'supplier'
])


@section('content')
<div class="content">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ isset($data->id) ? 'Edit' : 'Tambah'}} User</h3>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <?php
                    $url = isset($data->id) ? route('user.update', $data->id) : route('user.store');
                    ?>
                    <form method="POST" action="{{ $url }}" id="form" autocomplete="off">
                        @csrf
                        @if(isset($data->id))
                        @method('patch')
                        @endif
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" required class="form-control" placeholder="Masukan Nama"
                                value="{{ $data->name }}">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" required class="form-control" placeholder="Masukan Alamat"
                                value="{{ $data->email }}">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password" minlength="8" class="form-control"
                                placeholder="Masukan Password" value="">
                        </div>
                        <?php
                        $selectedAdmin = $data->level == 'admin' ? 'selected' : '';
                        $selectedKepala = $data->level == 'kepala' ? 'selected' : '';
                        $selectedKasir = $data->level == 'kasir' ? 'selected' : '';
                        $selectedPartman = $data->level == 'partman' ? 'selected' : '';
                        $selectedFinance = $data->level == 'finance' ? 'selected' : '';

                        ?>
                        <div class="form-group">
                            <label>Level</label>
                            <select class="form-control" name="level">
                                <option value="admin" {{ $selectedAdmin }}>Admin</option>
                                <option value="kepala" {{ $selectedKepala }}>Kepala Bengkel</option>
                                <option value="partman" {{ $selectedPartman }}>Partman</option>
                                <option value="kasir" {{ $selectedKasir }}>Kasir</option>
                                <option value="finance" {{ $selectedKasir }}>Finance</option>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).on('submit', (e) => {
        if ($('#password').value().length < 8) {
            alert('Password minimal 8 karakter')
            e.preventDefault()
        }
    })

</script>
@endpush

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>📤 Import Transkrip Nilai</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('import.process') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="nim">Pilih Mahasiswa</label>
                            <select name="nim" id="nim" class="form-control" required>
                                <option value="">-- Pilih Mahasiswa --</option>
                                @foreach($mahasiswa as $mhs)
                                    <option value="{{ $mhs->nim }}">
                                        {{ $mhs->name }} - {{ $mhs->nim }} 
                                        @if($mhs->ipk > 0)
                                            (IPK: {{ number_format($mhs->ipk, 2) }})
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="alert alert-info">
                            <strong>Info:</strong> Data transkrip akan diimport otomatis dari sistem.
                            Pastikan mahasiswa yang dipilih sudah benar.
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                📤 Import Data Transkrip
                            </button>
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
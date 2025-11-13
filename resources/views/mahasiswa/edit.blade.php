<!-- resources/views/mahasiswa/edit.blade.php -->
<div class="form-group">
    <label>Nilai Matematika</label>
    <input type="number" step="0.01" name="nilai_matematika" class="form-control" 
           value="{{ $mahasiswa->nilai_matematika }}">
</div>

<div class="form-group">
    <label>Nilai Fisika</label>
    <input type="number" step="0.01" name="nilai_fisika" class="form-control"
           value="{{ $mahasiswa->nilai_fisika }}">
</div>

<!-- Tambahkan field lainnya... -->
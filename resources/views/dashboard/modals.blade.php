<!-- Modal Tambah Pelanggan -->
<div class="modal fade" id="createPelangganModal" tabindex="-1" aria-labelledby="createPelangganLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('pelanggan.store') }}" method="POST" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="createPelangganLabel">Tambah Pelanggan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Alamat</label>
          <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>No HP</label>
          <input type="text" name="no_hp" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Tambah Mekanik -->
<div class="modal fade" id="createMekanikModal" tabindex="-1" aria-labelledby="createMekanikLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('mekanik.store') }}" method="POST" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="createMekanikLabel">Tambah Mekanik</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label>Nama</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Keahlian</label>
          <input type="text" name="keahlian" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>No HP</label>
          <input type="text" name="no_hp" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Tambah Reservasi -->
<div class="modal fade" id="createReservasiModal" tabindex="-1" aria-labelledby="createReservasiLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('reservasi.store') }}" method="POST" class="modal-content">
      @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="createReservasiLabel">Tambah Reservasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <label>Pelanggan</label>
          <select name="pelanggan_id" class="form-select" required>
            <option value="">-- Pilih Pelanggan --</option>
            @foreach($pelanggan as $p)
              <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label>Mekanik</label>
          <select name="mekanik_id" class="form-select" required>
            <option value="">-- Pilih Mekanik --</option>
            @foreach($mekanik as $m)
              <option value="{{ $m->id }}">{{ $m->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label>Tanggal</label>
          <input type="date" name="tanggal" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Jam</label>
          <input type="time" name="jam" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>

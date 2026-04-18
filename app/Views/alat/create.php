<h2>Tambah Alat</h2>
<form action="/alat/store" method="post" enctype="multipart/form-data" class="w-75">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Nama Alat</label>
            <input type="text" name="nama_alat" class="form-control" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Kategori</label>
            <select name="id_kategori" class="form-select" required>
                <?php foreach($kategori as $k): ?>
                    <option value="<?= $k['id_kategori'] ?>"><?= $k['nama_kategori'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    
    <div class="mb-3">
        <label>Harga Sewa (Rp)</label>
        <input type="number" name="harga" class="form-control" placeholder="Contoh: 150000" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control summernote"></textarea>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Foto Utama</label>
            <input type="file" name="foto" class="form-control" required accept="image/*">
        </div>
        <div class="col-md-6 mb-3">
            <label>Foto Tambahan (Bisa pilih lebih dari satu)</label>
            <input type="file" name="foto_lainnya[]" class="form-control" multiple accept="image/*">
        </div>
    </div>

    <div class="mb-4">
        <label class="d-block mb-2">Tags (Opsional)</label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="featured" id="tagFeatured">
            <label class="form-check-label" for="tagFeatured">Featured (Tampil di Beranda)</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="hot" id="tagHot">
            <label class="form-check-label" for="tagHot">Hot</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="sale" id="tagSale">
            <label class="form-check-label" for="tagSale">Sale / Off %</label>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/alat" class="btn btn-secondary">Batal</a>
</form>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
  $(document).ready(function() {
      $('.summernote').summernote({
          height: 200,
          toolbar: [
              ['style', ['bold', 'italic', 'underline', 'clear']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['view', ['fullscreen', 'codeview']]
          ]
      });
  });
</script>
<h2>Edit Alat Multimedia</h2>

<?php if(session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<form action="/alat/update/<?= $alat['id_alat'] ?>" method="post" enctype="multipart/form-data" class="w-75">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Nama Alat</label>
            <input type="text" name="nama_alat" class="form-control" value="<?= esc($alat['nama_alat']) ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Kategori</label>
            <select name="id_kategori" class="form-select" required>
                <?php foreach($kategori as $k): ?>
                    <option value="<?= $k['id_kategori'] ?>" <?= $k['id_kategori'] == $alat['id_kategori'] ? 'selected' : '' ?>><?= esc($k['nama_kategori']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    
    <div class="mb-3">
        <label>Harga Sewa (Rp)</label>
        <input type="number" name="harga" class="form-control" value="<?= isset($alat['harga']) ? esc($alat['harga']) : '0' ?>" required>
    </div>

    <div class="mb-3">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control summernote" rows="4"><?= htmlspecialchars($alat['deskripsi']) ?></textarea>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Foto Saat Ini</label><br>
            <img src="/uploads/<?= esc($alat['foto']) ?>" width="150" class="mb-2 rounded shadow-sm"><br>
            <label>Ganti Foto Utama</label>
            <input type="file" name="foto" class="form-control" accept="image/*">
        </div>
        <div class="col-md-6 mb-3">
            <label>Foto Tambahan Saat Ini</label><br>
            <div class="d-flex flex-wrap gap-2 mb-2">
                <?php 
                $fotoLainnya = !empty($alat['foto_lainnya']) ? json_decode($alat['foto_lainnya'], true) : [];
                if(!empty($fotoLainnya)):
                    foreach($fotoLainnya as $index => $fl): ?>
                        <div class="position-relative d-inline-block">
                            <img src="/uploads/<?= esc($fl) ?>" width="80" class="rounded shadow-sm">
                            <button type="button" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border-0" onclick="deleteFoto(this, <?= $alat['id_alat'] ?>, <?= $index ?>)" style="cursor: pointer; padding: 0.35em 0.5em;">
                                <i class="bi bi-x"></i>
                            </button>
                        </div>
                    <?php endforeach; 
                else: ?>
                    <span class="text-muted small">Belum ada foto tambahan.</span>
                <?php endif; ?>
            </div>
            <label>Tambah Foto Tambahan (Akan ditambahkan ke yang sudah ada)</label>
            <input type="file" name="foto_lainnya[]" class="form-control" multiple accept="image/*">
        </div>
    </div>

    <div class="mb-4">
        <label class="d-block mb-2">Tags (Opsional)</label>
        <?php $currentTags = isset($alat['tags']) ? explode(',', $alat['tags']) : []; ?>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="featured" id="tagFeatured" <?= in_array('featured', $currentTags) ? 'checked' : '' ?>>
            <label class="form-check-label" for="tagFeatured">Featured (Tampil di Beranda)</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="hot" id="tagHot" <?= in_array('hot', $currentTags) ? 'checked' : '' ?>>
            <label class="form-check-label" for="tagHot">Hot</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="sale" id="tagSale" <?= in_array('sale', $currentTags) ? 'checked' : '' ?>>
            <label class="form-check-label" for="tagSale">Sale / Off %</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
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

  function deleteFoto(btn, idAlat, index) {
      fetch('/alat/deleteFotoLainnya/' + idAlat + '/' + index)
      .then(response => response.json())
      .then(res => {
          if(res.success) {
              let container = btn.closest('.position-relative');
              container.style.transition = 'opacity 0.3s ease';
              container.style.opacity = '0';
              setTimeout(() => container.remove(), 300);
          } else {
              alert('Gagal menghapus foto.');
          }
      })
      .catch(error => {
          console.error(error);
          alert('Terjadi kesalahan server.');
      });
  }
</script>

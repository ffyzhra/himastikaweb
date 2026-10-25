<div class="card">
  <div class="card-head">
    <div>
      <h2>Staff Intern</h2>
      <p><?= count($interns); ?> staff intern · tampil di halaman <a href="<?= base_url('staff-intern'); ?>" target="_blank" rel="noopener">/staff-intern</a></p>
    </div>
    <a href="<?= base_url('intern/create'); ?>" class="btn btn-primary"><?= icon('plus'); ?> Tambah Staff Intern</a>
  </div>
  <?php if (!empty($interns)): ?>
    <div class="table-wrap">
      <table class="table">
        <thead><tr><th>Nama</th><th>Divisi</th><th style="text-align:right">Aksi</th></tr></thead>
        <tbody>
          <?php foreach ($interns as $i): ?>
            <tr>
              <td>
                <div class="person">
                  <?php if (foto_url($i->foto)): ?><img class="thumb" src="<?= foto_url($i->foto); ?>" alt=""><?php else: ?><span class="avatar"><?= html_escape(initials($i->nama)); ?></span><?php endif; ?>
                  <b><?= html_escape($i->nama); ?></b>
                </div>
              </td>
              <td><span class="badge plain"><?= html_escape($i->divisi); ?></span></td>
              <td>
                <div class="actions">
                  <a href="<?= base_url('intern/edit/' . $i->id); ?>" class="icon-btn" title="Edit" aria-label="Edit <?= html_escape($i->nama); ?>"><?= icon('edit'); ?></a>
                  <a href="<?= base_url('intern/delete/' . $i->id); ?>" class="icon-btn danger" title="Hapus" aria-label="Hapus <?= html_escape($i->nama); ?>" data-confirm="Hapus <?= html_escape($i->nama); ?> dari daftar staff intern?"><?= icon('trash'); ?></a>
                </div>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="empty"><?= icon('user'); ?> Belum ada staff intern.</div>
  <?php endif; ?>
</div>

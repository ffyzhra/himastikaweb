<?php
$pending = array_values(array_filter($todos, function ($t) { return $t->status === 'pending'; }));
$done    = array_values(array_filter($todos, function ($t) { return $t->status !== 'pending'; }));
$now = time();
?>
<div class="card">
  <div class="card-head">
    <div>
      <h2>To-Do List Pengurus</h2>
      <p><?= count($pending); ?> tugas belum selesai · <?= count($done); ?> selesai</p>
    </div>
  </div>
  <div class="card-body" style="border-bottom:1px solid var(--line)">
    <form action="<?= base_url('todo/store'); ?>" method="post" class="quick-add">
      <input class="input" type="text" name="task" placeholder="Tulis tugas baru, mis. Siapkan proposal seminar" required aria-label="Tugas">
      <input class="input" type="datetime-local" name="deadline" required aria-label="Deadline">
      <button type="submit" class="btn btn-primary"><?= icon('plus'); ?> Tambah</button>
    </form>
  </div>

  <?php if (empty($todos)): ?>
    <div class="empty"><?= icon('check-sq'); ?> Belum ada tugas. Tambahkan tugas pertama di atas.</div>
  <?php else: ?>
    <ul class="list">
      <?php foreach (array_merge($pending, $done) as $t):
        $is_done = $t->status !== 'pending';
        $has_deadline = !empty($t->deadline) && strpos($t->deadline, '0000-00-00') !== 0;
        $late = !$is_done && $has_deadline && strtotime($t->deadline) < $now;
      ?>
        <li class="<?= $is_done ? 'done-row' : ''; ?>">
          <a href="<?= base_url('todo/toggle/' . $t->id); ?>" class="icon-btn <?= $is_done ? '' : 'success'; ?>" title="<?= $is_done ? 'Tandai belum selesai' : 'Tandai selesai'; ?>"
             aria-label="<?= $is_done ? 'Tandai belum selesai' : 'Tandai selesai'; ?>"
             style="border:1.5px solid <?= $is_done ? 'var(--green)' : '#cbd5e1'; ?>;<?= $is_done ? 'background:var(--green);color:#fff' : ''; ?>">
            <?= $is_done ? icon('check') : ''; ?>
          </a>
          <div style="min-width:0;flex:1">
            <div class="title title-cell"><?= html_escape($t->task); ?></div>
            <div class="meta" style="display:flex;align-items:center;gap:6px">
              <?= icon('clock', 'icon'); ?>
              <?= $has_deadline ? tgl($t->deadline, true) : 'Tanpa deadline'; ?>
              <?php if ($late): ?><span class="badge badge-ditolak">Terlambat</span><?php endif; ?>
            </div>
          </div>
          <div class="actions" style="display:flex;gap:4px">
            <a href="<?= base_url('todo/edit/' . $t->id); ?>" class="icon-btn" title="Edit" aria-label="Edit tugas"><?= icon('edit'); ?></a>
            <a href="<?= base_url('todo/delete/' . $t->id); ?>" class="icon-btn danger" title="Hapus" aria-label="Hapus tugas" data-confirm="Hapus tugas ini?"><?= icon('trash'); ?></a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</div>

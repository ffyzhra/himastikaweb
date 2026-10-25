<?php $has_deadline = !empty($todo->deadline) && strpos($todo->deadline, '0000-00-00') !== 0; ?>
<div class="card card-narrow">
  <div class="card-head">
    <div>
      <h2>Edit Tugas</h2>
      <p>Ubah nama tugas atau deadline-nya.</p>
    </div>
  </div>
  <div class="card-body">
    <form action="<?= base_url('todo/update/' . $todo->id); ?>" method="post" class="form-grid">
      <div class="field">
        <label for="task">Tugas</label>
        <input class="input" type="text" id="task" name="task" value="<?= html_escape($todo->task); ?>" required>
      </div>
      <div class="field" style="max-width:300px">
        <label for="deadline">Deadline</label>
        <input class="input" type="datetime-local" id="deadline" name="deadline"
               value="<?= $has_deadline ? date('Y-m-d\TH:i', strtotime($todo->deadline)) : ''; ?>">
        <span class="hint">Kosongkan jika tidak ada deadline.</span>
      </div>
      <div class="form-actions">
        <a href="<?= base_url('todo'); ?>" class="btn btn-ghost"><?= icon('arrow-left'); ?> Kembali</a>
        <button type="submit" class="btn btn-primary"><?= icon('check'); ?> Simpan Perubahan</button>
      </div>
    </form>
  </div>
</div>

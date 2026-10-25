<?php
// $p: row with nama, jabatan, divisi, foto. Optional: $d (reveal delay), $sub (extra line)
$src = foto_url($p->foto);
$lead = in_array(strtolower(trim($p->jabatan ?? '')), ['ketua', 'koordinator', 'pic'], true);
?>
<div class="person-card reveal zoom <?= $lead ? 'lead' : ''; ?>" style="--d:<?= isset($d) ? $d : 0; ?>s">
  <?php if ($src): ?>
    <img src="<?= $src; ?>" alt="Foto <?= html_escape($p->nama); ?>" loading="lazy">
  <?php else: ?>
    <div class="noimg"><?= html_escape(initials($p->nama)); ?></div>
  <?php endif; ?>
  <div class="info">
    <b><?= html_escape($p->nama); ?></b>
    <span><?= html_escape($p->jabatan ?? 'Staff Intern'); ?></span>
    <small><?= html_escape(isset($sub) ? $sub : $p->divisi); ?></small>
  </div>
</div>

<?php $session = \Config\Services::session(); ?>

<!-- Display success message -->

<?php if ($session->getFlashdata('success_message')) { ?>
<!-- Common Success Message -->
<div class="alert alert-success">
    <?= $session->getFlashdata('success_message') ?>
</div>
<?php } ?>

<!-- Edit Alert -->
<?php if ($session->getFlashdata('edit_success_message')) { ?>
    <div class="alert alert-primary">
        <?= $session->getFlashdata('edit_success_message') ?>
    </div>
<?php } ?>

<!-- Delete Alert -->
<?php if ($session->getFlashdata('delete_success_message')) { ?>
    <div class="alert alert-danger">
        <?= $session->getFlashdata('delete_success_message') ?>
    </div>
<?php } ?>
<?php if(session()->has('message')): ?>

<div class="message">
    <?php echo e(session('message')); ?>

</div>

<?php endif; ?>
<?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views/site/partials/flash-message.blade.php ENDPATH**/ ?>
<?php if(!empty($model)): ?>
    <a href="<?php echo e(route('users.details', $model->id)); ?>" class="hover:underline text-primary-600 text-sm">
        <p><?php echo e($value ?? ($model->name ?? ($model[$column->attribute] ?? ''))); ?></p>
        <?php if(app()->environment('production')): ?>
            <p class="text-xs text-gray-500 mt-1"><?php echo e($model->phone); ?></p>
        <?php endif; ?>
    </a>
<?php endif; ?>
<?php /**PATH /Users/ambrosetemidayobako/Desktop/Dev/web/fuodz-admin/resources/views/components/table/user.blade.php ENDPATH**/ ?>
<div <?php if($ignore ?? false): ?> wire:ignore <?php endif; ?>>
    <?php if(isset($title)): ?>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['title' => $title]]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($title)]); ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    <?php endif; ?>
    <div class="relative inline-block w-full">
        <select class="block w-full p-2 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter"  wire:change="<?php echo e($onchange ?? ''); ?>" name="<?php echo e($name ?? ''); ?>" <?php if($multiple ?? false): ?> multiple="multiple" <?php endif; ?> id="<?php echo e($id ?? ($name ?? '')); ?>" <?php if($defer ?? true): ?> wire:model.defer='<?php echo e($name ?? ''); ?>' <?php else: ?> wire:model='<?php echo e($name ?? ''); ?>' <?php endif; ?> <?php if($width ?? false): ?> style="width: <?php echo e($width); ?>%" <?php endif; ?>>

            <?php if($noPreSelect ?? false): ?>
            <option value=""> <?php echo e($hint ?? '-- Select --'); ?></option>
            <?php endif; ?>
            <?php $__currentLoopData = $options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $optionId = $option->id ?? ($option['id'] ?? $option);
            ?>
            <option value="<?php echo e($optionId); ?>" <?php echo e($selected ?? '' == $optionId ? 'selected' : ''); ?>>
                <?php echo e(Str::ucfirst(__($option->name ?? ($option['name'] ?? $option)))); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <?php $__errorArgs = [$name ?? ''];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
    <span class="mt-1 text-xs text-red-700"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
</div>
<?php /**PATH /Users/ambrosetemidayobako/Desktop/Dev/web/fuodz-admin/resources/views/components/select.blade.php ENDPATH**/ ?>
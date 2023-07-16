<div>
    <label class="block <?php echo e($title != null && !empty($title) ? 'mt-4' : ''); ?> text-sm">
        <?php if($title != null && !empty($title)): ?>
            <span class="text-gray-700"><?php echo e($title ?? ''); ?></span>
        <?php endif; ?>
        <input
            class='block w-full p-2 mt-1 text-sm border border-gray-300 rounded focus:border-primary-400 focus:outline-none focus:shadow-outline-primary'
            autocomplete="off" placeholder="<?php echo e($placeholder ?? ''); ?>" type="<?php echo e($type ?? 'text'); ?>"
            id='<?php echo e($elementId ?? ($name ?? '')); ?>' wire:model.debounce.700ms='<?php echo e($name ?? ''); ?>' />
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
    </label>

    
    <div class="p-2 text-sm text-gray-400" wire:loading wire:target="<?php echo e($name ?? ''); ?>">
        <?php if (isset($component)) { $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e = $component; } ?>
<?php $component = $__env->getContainer()->make(BladeUI\Icons\Components\Svg::class, []); ?>
<?php $component->withName('heroicon-o-refresh'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'w-4 h-5 animate-spin']); ?>
<?php if (isset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e)): ?>
<?php $component = $__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e; ?>
<?php unset($__componentOriginalcd9972c8156dfa6e5fd36675ca7bf5f21b506e2e); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
    </div>
    <div class="border rounded-sm shadow-sm bg-gray-50" wire:loading.remove wire:target="<?php echo e($name ?? ''); ?>">
        <?php $__currentLoopData = $addresses ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="px-4 py-2 text-sm text-gray-500 border-b cursor-pointer"
                x-on:click="livewire.emit('addressSelected',<?php echo e($key); ?>)">
                <?php echo e($address['name']); ?>

            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </div>

</div>
<?php /**PATH /Users/ambrosetemidayobako/Desktop/Dev/web/fuodz-admin/resources/views/livewire/component/autocomplete-address.blade.php ENDPATH**/ ?>
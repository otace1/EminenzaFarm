<div>

    <?php if(!empty($title ?? '')): ?>
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

    <div class="my-2" wire:ignore x-data x-init="() => {
        const post = FilePond.create($refs.<?php echo e($attributes->get('ref') ?? 'input'); ?>);
        post.setOptions({
            server: {
                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                    window.livewire.find('<?php echo e($_instance->id); ?>').upload('<?php echo e($attributes->whereStartsWith('wire:model')->first()); ?>', file, load, error, progress)
                },
                revert: (filename, load) => {
                    window.livewire.find('<?php echo e($_instance->id); ?>').removeUpload('<?php echo e($attributes->whereStartsWith('wire:model')->first()); ?>', filename, load)
                },
            },
            allowMultiple: <?php echo e($attributes->has('multiple') ? 'true' : 'false'); ?>,
            allowImagePreview: <?php echo e($attributes->has('allowImagePreview') ? 'true' : 'false'); ?>,
            imagePreviewMaxHeight: <?php echo e($attributes->has('imagePreviewMaxHeight') ? $attributes->get('imagePreviewMaxHeight') : '256'); ?>,
            allowFileTypeValidation: <?php echo e($attributes->has('allowFileTypeValidation') ? 'true' : 'false'); ?>,
            acceptedFileTypes: <?php echo $attributes->get('acceptedFileTypes') ?? 'null'; ?>,
            allowFileSizeValidation: <?php echo e($attributes->has('allowFileSizeValidation') ? 'true' : 'false'); ?>,
            maxFileSize: <?php echo $attributes->has('maxFileSize') ? "'" . $attributes->get('maxFileSize') . "'" : 'null'; ?>,
            oninit: () => {
                <?php if($attributes->has('allowAddFileEvent')): ?>
                livewire.emit('setFilePondState', post);
                <?php endif; ?>
            },
        });
    }">
        <input type="file" x-ref="<?php echo e($attributes->get('ref') ?? 'input'); ?>" />
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

<?php $__env->startPush('styles'); ?>
    <?php if($attributes->has('grid')): ?>
        <?php
            $grid = $attributes->get('grid');
            $widthPercentage = 100 / $grid - 1.0;
            $widhtEm = $widthPercentage / 100;
        ?>
        <style>
            .filepond--item {
                width: calc(<?php echo e($widthPercentage); ?>% - <?php echo e($widhtEm); ?>em);
            }
        </style>
    <?php endif; ?>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php if($attributes->has('allowAddFileEvent')): ?>
        <script>
            const editableId = '#<?php echo e($attributes->get('id') ?? 'input'); ?>';
            var thisFilePond;
            //jquery on ready
            $(function() {

                livewire.on('setFilePondState', (filePond) => {
                    thisFilePond = filePond;
                });


                livewire.on('filePondClear', (filePond) => {
                    thisFilePond.removeFiles();
                });

                livewire.on('filepond-add-file', (id, url, name) => {
                    if (editableId == id) {
                        fetch(url)
                            .then(response => {
                                const contentType = response.headers.get('content-type');
                                return response.blob().then(blob => {
                                    const file = new File([blob], name ?? 'photo', {
                                        type: contentType
                                    });

                                    thisFilePond.addFile(file);
                                });
                            });
                    }
                });
            });
        </script>
    <?php endif; ?>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/ambrosetemidayobako/Desktop/Dev/web/fuodz-admin/resources/views/components/input/filepond.blade.php ENDPATH**/ ?>
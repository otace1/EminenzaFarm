<?php $__env->startSection('title', __('Digital Product Pin Report')); ?>
<div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.baseview','data' => ['title' => ''.e(__('Digital Product Pin Report')).'']]); ?>
<?php $component->withName('baseview'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['title' => ''.e(__('Digital Product Pin Report')).'']); ?>
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('extensions.digital-product-pin.tables.digital-pin-report-table', [])->html();
} elseif ($_instance->childHasBeenRendered('l4133006095-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l4133006095-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l4133006095-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l4133006095-0');
} else {
    $response = \Livewire\Livewire::mount('extensions.digital-product-pin.tables.digital-pin-report-table', []);
    $html = $response->html();
    $_instance->logRenderedChild('l4133006095-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
     <?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>

</div>
<?php /**PATH /Users/ambrosetemidayobako/Desktop/Dev/web/fuodz-admin/resources/views/livewire/extensions/digital_product_pin/pin_report.blade.php ENDPATH**/ ?>
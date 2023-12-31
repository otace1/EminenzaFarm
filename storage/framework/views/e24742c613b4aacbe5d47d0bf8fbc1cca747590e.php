<input
    id="<?php echo e($name); ?>"
    name="<?php echo e($name); ?>"
    type="text"
    placeholder="<?php echo e($placeholder); ?>"
    class="<?php echo e($styles['searchInput']); ?>"

    wire:keydown.enter.prevent=""
    wire:model.debounce.300ms="searchTerm"

    x-on:click="isOpen = true"
    x-on:keydown="isOpen = true"

    x-on:keydown.arrow-up="selectUp(window.livewire.find('<?php echo e($_instance->id); ?>'))"
    x-on:keydown.arrow-down="selectDown(window.livewire.find('<?php echo e($_instance->id); ?>'))"
    x-on:keydown.enter.prevent="confirmSelection(window.livewire.find('<?php echo e($_instance->id); ?>'))"
/>
<?php /**PATH /Users/ambrosetemidayobako/Desktop/Dev/web/fuodz-admin/vendor/asantibanez/livewire-select/src/../resources/views/search-input.blade.php ENDPATH**/ ?>
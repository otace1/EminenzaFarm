<?php $__env->startSection('title', __('Wallet Topup Payment')); ?>
<?php $__env->startSection('content'); ?>
    <div class="w-10/12 mx-auto my-10">

        <form action="<?php echo e($apiEndPoint); ?>" method="post">
            <input type="hidden" name="Signature" value="<?php echo e($signature); ?>" />
            <input type="hidden" name="TransactionId" value="<?php echo e($transactionId); ?>" />
            <input type="hidden" name="CurrencyCode" value="<?php echo e($currencyCode); ?>" />
            <input type="hidden" name="Amount" value="<?php echo e($amount); ?>" />
            <input type="hidden" name="ClientId" value="<?php echo e($clientId); ?>" />
            <input type="hidden" name="ReturnToMerchant" value="Y" />
            <input type="hidden" name="AutoRedirect" value="Y" />
            <input type="hidden" name="CardTokenize" value="N" />
            <input type="hidden" name="CustomerInvoice" value="N" />
            <button type="submit">Pay</button>
        </form>

        <?php $__env->startPush('scripts'); ?>
            <script>
                window.addEventListener('load', function() {
                    document.querySelector('form').submit();
                });
            </script>
        <?php $__env->stopPush(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ambrosetemidayobako/Desktop/Dev/web/fuodz-admin/resources/views/livewire/extensions/amberpay/wallet.blade.php ENDPATH**/ ?>
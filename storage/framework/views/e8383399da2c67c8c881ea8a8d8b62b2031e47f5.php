<?php $__env->startSection('body'); ?>
    <div role="article" aria-roledescription="email" aria-label="Confirm your email address" lang="en">
        <div>
            <div style="background-color: #f3f4f6; padding-top: 40px; padding-bottom: 40px">
                <div style="margin-left: auto; margin-right: auto; width: 91.666667%">
                    <div style="display: flex; align-items: center; justify-content: space-between">

                        <img src="<?php echo e(url(setting('websiteLogo', asset('images/logo.png')))); ?>" alt="logo"
                            style="max-width: 100%; vertical-align: middle; line-height: 1; border: 0; height: 64px; width: 96px">

                        <p style="font-weight: 300; color: #9ca3af">
                            <?php echo e($order->updated_at->format('Y-m-d')); ?>

                            <?php echo e(__('at')); ?>

                            <?php echo e($order->updated_at->format('h:ia')); ?>

                        </p>
                    </div>

                    <p style="margin-top: 32px; font-size: 20px; font-weight: 700"><?php echo e(__('Hi')); ?>

                        <?php echo e($order->user->name); ?>, </p>
                    <p style="font-size: 14px; font-weight: 300"><?php echo e(__('This is your receipt.')); ?></p>
                </div>
            </div>
            
            <div style="margin-left: auto; margin-right: auto; width: 91.666667%; padding-top: 40px; padding-bottom: 40px;">
                
                <div>
                    <p style="color: #9ca3af;"><?php echo e(__('From')); ?></p>
                    <?php if(empty($order->vendor)): ?>
                        
                        <p style="font-size: 20px; font-weight: 700;"><?php echo e($order->taxi_order->vehicle_type->name); ?></p>
                        <p style="font-size: 14px; font-weight: 300;"><?php echo e($order->taxi_order->pickup_address); ?></p>
                    <?php else: ?>
                        
                        <?php if(empty($order->package_type)): ?>
                            <p style="font-size: 20px; font-weight: 700;"><?php echo e($order->vendor->name); ?></p>
                            <p style="font-size: 14px; font-weight: 300;"><?php echo e($order->vendor->address); ?></p>
                            
                        <?php else: ?>
                            <p style="font-size: 20px; font-weight: 700;"><?php echo e($order->stops->first()->name); ?> -
                                (<?php echo e($order->stops->first()->phone); ?>)
                            </p>
                            <p style="font-size: 14px; font-weight: 300;">
                                <?php echo e($order->stops->first()->delivery_address->address); ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div style="height: 24px"></div>
                
                <div>
                    <?php if(empty($order->package_type)): ?>
                        <p style="color: #9ca3af;"><?php echo e(__('To')); ?></p>
                        
                        <?php if(empty($order->vendor)): ?>
                            <p style="font-size: 14px; font-weight: 300;"><?php echo e($order->taxi_order->dropoff_address); ?></p>
                        <?php else: ?>
                            
                            <?php if(empty($orderStop->delivery_addres)): ?>
                                <p style="font-size: 20px; font-weight: 700;"><?php echo e(__('Customer Pickup')); ?></p>
                            <?php else: ?>
                                <p style="font-size: 20px; font-weight: 700;"><?php echo e($order->delivery_address->name ?? ''); ?></p>
                                <p style="font-size: 14px; font-weight: 300;"><?php echo e($order->delivery_address->address ?? ''); ?></p>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        
                        <?php $__currentLoopData = $order->stops; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderStop): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php if($loop->first): ?>
                                <?php continue; ?>
                            <?php endif; ?>
                            <div>
                                <p style="color: #9ca3af;"><?php echo e(__('Stop')); ?></p>
                                <p style="font-size: 20px; font-weight: 700;"><?php echo e($orderStop->name); ?> -
                                    (<?php echo e($orderStop->phone); ?>)
                                </p>
                                <p style="font-size: 14px; font-weight: 300;"><?php echo e($orderStop->delivery_address->address); ?>

                                </p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <div style="height: 24px;"></div>
                
                <?php if(empty($order->package_type)): ?>
                    
                    <?php if(empty($order->taxi_order)): ?>
                        <div>
                            
                            <p style="color: #9ca3af;"><?php echo e(__('Products')); ?></p>
                            <hr style="margin-top: 8px">
                            <?php $__currentLoopData = $order->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="space-x-2"
                                    style="display: flex; align-items: flex-start; justify-content: space-between; border-bottom-width: 1px; padding-top: 8px; padding-bottom: 8px">
                                    <p class="space-x-4" style="display: flex;">
                                        <span style="font-weight: 300;">
                                            <?php echo e($orderProduct->quantity); ?> x
                                        </span>
                                        <span
                                            style="--tw-space-x-reverse: 0; margin-right: calc(16px * var(--tw-space-x-reverse)); margin-left: calc(16px * calc(1 - var(--tw-space-x-reverse)));"><?php echo e($orderProduct->product->name); ?></span>
                                    </p>
                                    <span
                                        style="font-weight: 500; --tw-space-x-reverse: 0; margin-right: calc(8px * var(--tw-space-x-reverse)); margin-left: calc(8px * calc(1 - var(--tw-space-x-reverse)))"><?php echo e(currencyFormat($orderProduct->price)); ?></span>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                    <div>
                        <p><?php echo e(__('Package details')); ?></p>
                        <p style="font-size: 20px; font-weight: 700;"><?php echo e($order->package_type->name); ?></p>
                        
                        <p class="space-x-2"
                            style="display: flex; align-items: flex-start; justify-content: space-between; border-bottom-width: 1px; padding-top: 8px; padding-bottom: 8px;">
                            <span style="font-weight: 300;"><?php echo e(__('Weight')); ?></span>
                            <span
                                style="font-weight: 500; --tw-space-x-reverse: 0; margin-right: calc(8px * var(--tw-space-x-reverse)); margin-left: calc(8px * calc(1 - var(--tw-space-x-reverse)));"><?php echo e($order->weight); ?>kg</span>
                        </p>
                        <p class="space-x-2"
                            style="display: flex; align-items: flex-start; justify-content: space-between; border-bottom-width: 1px; padding-top: 8px; padding-bottom: 8px;">
                            <span style="font-weight: 300;"><?php echo e(__('Width')); ?></span>
                            <span
                                style="font-weight: 500; --tw-space-x-reverse: 0; margin-right: calc(8px * var(--tw-space-x-reverse)); margin-left: calc(8px * calc(1 - var(--tw-space-x-reverse)));"><?php echo e($order->width); ?>cm</span>
                        </p>
                        <p class="space-x-2"
                            style="display: flex; align-items: flex-start; justify-content: space-between; border-bottom-width: 1px; padding-top: 8px; padding-bottom: 8px;">
                            <span style="font-weight: 300;"><?php echo e(__('Length')); ?></span>
                            <span
                                style="font-weight: 500; --tw-space-x-reverse: 0; margin-right: calc(8px * var(--tw-space-x-reverse)); margin-left: calc(8px * calc(1 - var(--tw-space-x-reverse)));"><?php echo e($order->length); ?>cm</span>
                        </p>
                        <p class="space-x-2"
                            style="display: flex; align-items: flex-start; justify-content: space-between; border-bottom-width: 1px; padding-top: 8px; padding-bottom: 8px;">
                            <span style="font-weight: 300;"><?php echo e(__('Height')); ?></span>
                            <span
                                style="font-weight: 500; --tw-space-x-reverse: 0; margin-right: calc(8px * var(--tw-space-x-reverse)); margin-left: calc(8px * calc(1 - var(--tw-space-x-reverse)));"><?php echo e($order->height); ?>cm</span>
                        </p>
                    </div>
                <?php endif; ?>
                
                <div class="space-y-2" style="margin-top: 24px; margin-bottom: 24px">
                    
                    <div style="display: flex; justify-content: space-between;">
                        <p style="font-weight: 500;"><?php echo e(__('Subtotal')); ?></p>
                        <p style="font-size: 18px; font-weight: 600"><?php echo e(currencyFormat($order->sub_total)); ?></p>
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; --tw-space-y-reverse: 0; margin-top: calc(8px * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(8px * var(--tw-space-y-reverse));">
                        <p style="font-weight: 500;"><?php echo e(__('Discount')); ?></p>
                        <p style="font-size: 18px; font-weight: 600;"><?php echo e(currencyFormat($order->discount)); ?></p>
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; --tw-space-y-reverse: 0; margin-top: calc(8px * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(8px * var(--tw-space-y-reverse));">
                        <p style="font-weight: 500;"><?php echo e(__('Delivery fee')); ?></p>
                        <p style="font-size: 18px; font-weight: 600;"><?php echo e(currencyFormat($order->delivery_fee)); ?></p>
                    </div>
                    <div
                        style="display: flex; justify-content: space-between; --tw-space-y-reverse: 0; margin-top: calc(8px * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(8px * var(--tw-space-y-reverse));">
                        <p style="font-weight: 500;"><?php echo e(__('Tax')); ?></p>
                        <p style="font-size: 18px; font-weight: 600;"><?php echo e(currencyFormat($order->tax)); ?></p>
                    </div>
                    
                    <?php if(!empty($order->fees)): ?>
                        <?php $__currentLoopData = json_decode($order->fees ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderFee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div
                                style="display: flex; justify-content: space-between; --tw-space-y-reverse: 0; margin-top: calc(8px * calc(1 - var(--tw-space-y-reverse))); margin-bottom: calc(8px * var(--tw-space-y-reverse));">
                                <p style="font-weight: 500;"><?php echo e($orderFee->name); ?></p>
                                <p style="font-size: 18px; font-weight: 600;"><?php echo e(currencyFormat($orderFee->amount)); ?>

                                </p>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
                <hr>
                <div style="margin-top: 16px; margin-bottom: 16px; display: flex; justify-content: space-between">
                    <p style="font-size: 20px; font-weight: 600;"><?php echo e(__('Total')); ?></p>
                    <p style="font-size: 18px; font-weight: 700;"><?php echo e(currencyFormat($order->total)); ?></p>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <p style="font-weight: 500;"><?php echo e(__('Payment Method')); ?></p>
                    <p style="font-size: 18px; font-weight: 300;"><?php echo e($order->payment_method->name ?? ''); ?></p>
                </div>

            </div>
            <p
                style="margin-top: 16px; margin-bottom: 16px; text-align: center; font-size: 14px; font-weight: 300; color: #9ca3af">
                © <?php echo e(date('Y')); ?> <?php echo e(setting('websiteName', env('APP_NAME'))); ?>

            </p>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('style'); ?>
    <style>
        .space-x-2> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(8px * var(--tw-space-x-reverse));
            margin-left: calc(8px * calc(1 - var(--tw-space-x-reverse)))
        }

        .space-x-4> :not([hidden])~ :not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(16px * var(--tw-space-x-reverse));
            margin-left: calc(16px * calc(1 - var(--tw-space-x-reverse)))
        }

        .space-y-2> :not([hidden])~ :not([hidden]) {
            --tw-space-y-reverse: 0;
            margin-top: calc(8px * calc(1 - var(--tw-space-y-reverse)));
            margin-bottom: calc(8px * var(--tw-space-y-reverse))
        }

        html,
        body {
            color: #000000;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('view.emails.raw_plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ambrosetemidayobako/Desktop/Dev/web/fuodz-admin/resources/views/view/emails/order_update.blade.php ENDPATH**/ ?>
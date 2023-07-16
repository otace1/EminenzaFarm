<?php $__env->startSection('body'); ?>
    <div class="bg-gray-100">
        <div class="w-full p-12 md:w-10/12 lg:w-6/12 mx-auto">
            
            <img src="<?php echo e(url(setting('websiteLogo', asset('images/logo.png')))); ?>" alt="logo"
                class="w-24 h-24 mx-auto mt-10 mb-8" />
            
            <div>
                <p class="font-bold text-2xl mb-2"> <?php echo e(__('Welcome')); ?></p>
                <p>
                    <?php echo e(__('Hi')); ?>

                    <span class="font-bold"><?php echo e($user->name); ?>,</span>
                    <?php echo e(__('we’re glad you’re here! You have just created an account with')); ?>

                    <b><?php echo e(env('APP_NAME')); ?>. </b>
                </p>
            </div>

            
            <div class="bg-white p-8 text-center my-6 border border-gray-200">

                <p class="mb-3"> <?php echo e(__('Your account information:')); ?></p>
                <p><span class="font-bold"><?php echo e(__('Name:')); ?></span> <?php echo e($user->name); ?></p>
                <p><span class="font-bold"><?php echo e(__('Email:')); ?></span> <?php echo e($user->email); ?></p>
                <?php if($password): ?>
                    <div class="my-1">
                        <p class="text-sm italic">
                            <?php echo e(__('Your generated account password below, feel free to change it from the system')); ?></p>
                        <p><span class="font-bold"><?php echo e(__('Password:')); ?></span> <?php echo e($password ?? ''); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            
            <div class="flex justify-between items-center">
                <?php if(!empty(setting('androidDownloadLink', '')) || !empty(setting('iosDownloadLink', ''))): ?>
                    <p><?php echo e(__('Download the app and enjoy purchases')); ?></p>
                <?php endif; ?>
                <div class="flex items-end space-x-2">
                    
                    <?php if(!empty(setting('androidDownloadLink', ''))): ?>
                        <a target="_blank" href="<?php echo e(setting('androidDownloadLink', '')); ?>"
                            style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:<?php echo e(setting('websiteColor', '#21a179')); ?>;font-size:14px"><img
                                class="adapt-img"
                                src="https://icfcn.stripocdn.email/content/guids/CABINET_e48ed8a1cdc6a86a71047ec89b3eabf6/images/82871534250557673.png"
                                alt="Google Play"
                                style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                title="Google Play" width="133"></a>
                    <?php endif; ?>
                    
                    <?php if(!empty(setting('iosDownloadLink', ''))): ?>
                        <a target="_blank" href="<?php echo e(setting('iosDownloadLink', '')); ?>"
                            style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;text-decoration:none;color:<?php echo e(setting('websiteColor', '#21a179')); ?>;font-size:14px"><img
                                class="adapt-img"
                                src="https://icfcn.stripocdn.email/content/guids/CABINET_e48ed8a1cdc6a86a71047ec89b3eabf6/images/92051534250512328.png"
                                alt="Apple App Store"
                                style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic"
                                title="Apple App Store" width="133"></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('view.emails.raw_plain', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/ambrosetemidayobako/Desktop/Dev/web/fuodz-admin/resources/views/view/emails/new_account.blade.php ENDPATH**/ ?>
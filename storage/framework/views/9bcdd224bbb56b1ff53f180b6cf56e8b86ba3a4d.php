<div class="block w-auto bg-darkbackground rounded-lg overflow-hidden">
<?php $__currentLoopData = $films; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $film): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="/film_serie/<?php echo e($film->id); ?>">
    <li class="px-2 py-2 hover:bg-secondary">
        <img class="w-16 h-full rounded-md inline-block" src="<?php echo e(URL('/storage/'.$film->affiche)); ?>" alt="Affiche <?php echo e($film->titre); ?>"/>
        <div class="inline-block align-middle px-4">
            <span class="block text-lg text-semibold text-gray-200">
                <?php echo e($film->titre); ?>

            </span>
            <span class="block text-xs text-hairline text-gray-200">
                <?php echo e(date('d/m/Y', strtotime($film->date_sortie))); ?>

            </span>
            <?php if($film->notes): ?>
                <div class="text-button">
                    <svg class="inline align-baseline fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 .288l2.833 8.718h9.167l-7.417 5.389 2.833 8.718-7.416-5.388-7.417 5.388 2.833-8.718-7.416-5.389h9.167z"/>
                    </svg>
                    <span class="text-sm text-thin text-gray-200">
                        <?php echo e($film->notes); ?>/5
                    </span>
                </div>
            <?php endif; ?>
        </div>
    </li>
</a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH C:\Nouveau dossier\filmdiscussion\resources\views/searchResult.blade.php ENDPATH**/ ?>
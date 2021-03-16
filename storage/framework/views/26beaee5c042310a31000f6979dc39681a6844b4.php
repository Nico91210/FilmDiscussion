<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

<body class="bg-background">
  <?php if(Auth::user()->notifications->count() == 0): ?>
    <span class="flex justify-center py-10 text-2xl text-gray-200">Vous n'avez pas encore de notifications</span>
  <?php else: ?>
    <?php $__currentLoopData = Auth::user()->notifications->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($notification->lu == 1): ?>
        <form action="notifications/" method="POST">
          <?php echo csrf_field(); ?>
          <input hidden name="id" value="<?php echo e($notification->id); ?>"/>
          <button class="inline-block opacity-75 focus:outline-none focus:shadow-outline shadow-md bg-darkbackground hover:bg-background w-auto rounded mt-5 ml-3 px-4 py-4">
            <input type="submit" hidden/>
            <h2 class="text-lg text-gray-200 opacity-50">
              <?php echo e($notification->titre); ?>

            </h2>
            <?php if($notification->contenu != null || $notification->contenu != ""): ?>
              <div class="bg-secondary rounded mt-1 px-2 py-2 text-gray-200 opacity-50 flex justif-left">
                <?php echo e($notification->contenu); ?>

              </div>
            <?php endif; ?>
          </button>
      <?php else: ?>
        <form action="notifications/" method="POST">
          <?php echo csrf_field(); ?>
          <input hidden name="id" value="<?php echo e($notification->id); ?>"/>
          <button class="inline-block focus:outline-none focus:shadow-outline shadow-md bg-darkbackground hover:bg-background w-auto rounded mt-5 ml-3 px-4 py-4">
            <input type="submit" hidden>
            <h2 class="text-lg text-gray-200">
              <?php echo e($notification->titre); ?>

              <div class="float-left pointer-events-none inset-y-0 mt-3 mr-2 px-1 text-button">
                <svg class="fill-current" width="5" height="5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                  <circle cx="12" cy="12" r="12"/>
                </svg>
              </div>
            </h2>
            <?php if($notification->contenu != null || $notification->contenu != ""): ?>
              <div class="bg-secondary rounded mt-1 px-2 py-2 text-gray-200 opacity-50 flex justif-left">
                <?php echo e($notification->contenu); ?>

              </div>
            <?php endif; ?>
          </button>
        </form>
      <?php endif; ?>
      <br>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  <?php endif; ?>
</body><?php /**PATH C:\Nouveau dossier\filmdiscussion\resources\views/notifications.blade.php ENDPATH**/ ?>
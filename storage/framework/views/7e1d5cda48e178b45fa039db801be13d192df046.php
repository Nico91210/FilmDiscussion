<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="bg-background">
<div class="bg-background justify-center flex py-20">    
  <div class="flex items-center">
    <form method="post" action= /processCredentials class="bg-secondary shadow-md rounded px-8 py-8 mb-4">
    <?php echo csrf_field(); ?>
      <div class="mb-4">
        <label class="text-gray-200 block mb-2" for="username" >
          Nom d'utilisateur
        </label>
        <input name="username" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Nom d'utilisateur">
        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="text-red-500 text-xs italic">
            <?php echo e($message); ?>

          </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
      <div class="mb-6">
        <label class="text-gray-200 block mb-2" for="password" >
          Mot de passe
        </label>
        <input name="password" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
          <span class="text-red-500 text-xs italic">
            <?php echo e($message); ?>

          </span>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
      </div>
      <input type="submit" value="Se connecter" class="mb-4 cursor-pointer bg-button hover:bg-red-500 shadow-md text-red-100 py-2 px-4 rounded focus:outline-none focus:shadow-outline"/>
      <?php if(session('error')): ?>
        <span class="block text-red-500 text-xs italic">
          <?php echo e(session('error')); ?>

        </span>
      <?php endif; ?>
    </form>
  </div>
</div>  
</body>

<?php /**PATH C:\Nouveau dossier\filmdiscussion\resources\views/login.blade.php ENDPATH**/ ?>
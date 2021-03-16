<?php echo $__env->make('navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<body class="bg-background">
<div class="flex justify-center py-20">    
    <div class="flex items-center">
        <form method="POST" action=/users/<?php echo e(Auth::id()); ?> class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" style="background-color: #333f52;">
            <?php echo csrf_field(); ?>
            <?php echo method_field("put"); ?>
            
            <div class="mb-4">
                <label class="text-gray-200 block mb-2" for="username" >
                    Nom d'utilisateur
                </label>
                <input value="<?php echo e(Auth::user()->username); ?>" name="username" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Nom d'utilisateur">
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

            <div class="mb-4">
                <label class="text-gray-200 block mb-2" for="email" >
                    E-mail
                </label>
                <input value="<?php echo e(Auth::user()->email); ?>" value="<?php echo e(Auth::user()->username); ?>" name="email" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="ex: abc@def.xyz">
                <?php $__errorArgs = ['email'];
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
                    Nouveau mot de passe
                </label>
                <input name="password" class="bg-darkbackground rounded w-full py-2 px-3 text-gray-400 focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************">
            </div>

            <input type="submit" value="Valider les changements" class="cursor-pointer bg-button hover:bg-red-500 shadow-md text-red-100 py-2 px-4 rounded focus:outline-none focus:shadow-outline"/>
        </form>
    </div>
</div>  
<div class="flex justify-center bg-background">
    <form method="POST" action=/users/<?php echo e(Auth::id()); ?>>
        <?php echo csrf_field(); ?>
        <?php echo method_field("delete"); ?>
        <input type="submit" value="Supprimer le compte" class="cursor-pointer bg-button hover:bg-red-500 shadow-md text-red-100 py-2 px-4 rounded focus:outline-none focus:shadow-outline"/>
    </form>
</div>
</body>
<?php /**PATH C:\Nouveau dossier\filmdiscussion\resources\views/profile.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', 'Blog create'); ?>

<?php $__env->startSection('main'); ?>

<div class="bg-white">

<form action="/admin/blog_create" method="POST" autocomplete="off" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <!-- Panel body -->
    <div class="p-6 space-y-6">
        <h2 class="text-2xl text-gray-800 font-bold mb-5"><?php echo e(__('admin.add_blog')); ?></h2>

            <!-- Business Profile -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1"><?php echo e(__('admin.content')); ?></h3>

                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="name"><?php echo e(__('admin.name')); ?></label>
                        <input id="name" class="form-input w-full" name="name" type="text" placeholder="<?php echo e(__('admin.name')); ?>" value="<?php echo e(old('name')); ?>" />
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <div class="mt-3">
                            <label class="block text-sm font-medium mb-1" for="url">Url</label>
                            <input id="url" class="form-input w-full" name="url" type="text" placeholder="Url" value="<?php echo e(old('url')); ?>" />
                            <?php $__errorArgs = ['url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="short_text"><?php echo e(__('admin.short_text')); ?></label>
                        <textarea class="form-input w-full" name="short_text" cols="30" rows="5"><?php echo e(old('short_text')); ?></textarea>
                        <?php $__errorArgs = ['short_text'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="image"><?php echo e(__('admin.image')); ?></label>
                        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image"/>
                        <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="mt-5">
                    <textarea name="content" id="summernote" cols="30" rows="20" class="form-input w-full"><?php echo e(old('content')); ?></textarea>
                    <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

            </section>

            <!-- Email -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1">SEO</h3>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="meta_title">Meta title</label>
                        <input id="meta_title" class="form-input w-full" name="meta_title" type="text" placeholder="Meta title" value="<?php echo e(old('meta_title')); ?>" />
                        <?php $__errorArgs = ['meta_title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="meta_description">Meta description</label>
                        <textarea class="form-input w-full" name="meta_description" cols="30" rows="2"><?php echo e(old('meta_description')); ?></textarea>
                        <?php $__errorArgs = ['meta_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="meta_keywords">Meta keywords</label>
                        <textarea class="form-input w-full" name="meta_keywords" cols="30" rows="2"><?php echo e(old('meta_description')); ?></textarea>
                        <?php $__errorArgs = ['meta_keywords'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </section>
            <!-- Email -->
            <section>
                <h3 class="text-xl leading-snug text-gray-800 font-bold mb-1"><?php echo e(__('admin.settings')); ?></h3>
                <div class="sm:flex sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 mt-5">
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="country_id"><?php echo e(__('admin.country')); ?></label>
                        <select id="country_id" class="form-select w-full" name="country_id">
                            <?php $__currentLoopData = $country_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['country_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="category_id"><?php echo e(__('admin.parent_category')); ?></label>
                        <select id="category_id" class="form-select w-full" name="category_id">
                            <option value=""><?php echo e(__('admin.select_category')); ?></option>
                            <?php $__currentLoopData = $category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <optgroup label="<?php echo e($item->name); ?>">
                                <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($child->id); ?>"><?php echo e($child->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </optgroup>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="is_active"><?php echo e(__('admin.display')); ?></label>
                        <select id="is_active" class="form-select w-full" name="is_active">
                            <option value="1"><?php echo e(__('admin.show')); ?></option>
                            <option value="0"><?php echo e(__('admin.not_show')); ?></option>
                        </select>
                        <?php $__errorArgs = ['is_active'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="sm:w-1/3">
                        <label class="block text-sm font-medium mb-1" for="psych_id"><?php echo e(__('admin.author')); ?></label>
                        <select id="psych_id" class="form-select w-full" name="psych_id">
                            <option value=""><?php echo e(__('admin.without_author')); ?></option>
                            <?php $__currentLoopData = $author_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($author->id); ?>"><?php echo e($author->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['psych_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <p class="text-red-500 text-xs mt-1"><?php echo e($message); ?></p>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </section>
    </div>

    <!-- Panel footer -->
    <footer>
        <div class="flex flex-col px-6 py-5 border-t border-gray-200">
            <div class="flex self-end">
                
                <button class="btn bg-indigo-500 hover:bg-indigo-600 text-white ml-3"><?php echo e(__('admin.create')); ?></button>
            </div>
        </div>
    </footer>
</form>

</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\OpenServer\domains\localhost\pavetra.loc\resources\views\admin\blog\create.blade.php ENDPATH**/ ?>
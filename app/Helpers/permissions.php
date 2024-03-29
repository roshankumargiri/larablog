<?php
function check_user_permissions($request, $actionName = NULL, $id = NULL)
{
    // Get Current User
    $currentUser = $request->user();

    // Get Current Action Name
    if ($actionName) {
        $currentActionName = $actionName;
    } else {
        $currentActionName = $request->route()->getActionName();
    }
    list($controller, $method) = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);
    //dd($controller, $method);
    $crudPermissionsMap = [
        // 'create' => ['create', 'store'],
        // 'update' => ['edit', 'update'],
        // 'delete' => ['destroy', 'store', 'forceDestroy'],
        // 'read'   => ['index', 'view']
        'crud' => ['create', 'store', 'edit', 'update', 'confirmdelete', 'destroy', 'restore', 'show', 'forceDestroy', 'index', 'view']
    ];

    $classesMap = [
        'Blog' => 'post',
        'Category' => 'category',
        'User' => 'user'
    ];


    foreach ($crudPermissionsMap as $permission => $methods) {
        // If the current method exits in methods list,
        // We'll check the permission

        if (in_array($method, $methods) && isset($classesMap[$controller])) {
            $className = $classesMap[$controller];


            if ($className == 'post' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'forceDestroy'])) {
                $id = !is_null($id) ? $id : $request->route('blog');



                if ($id && (!$currentUser->can('update-others-post') || $currentUser->can("delete-others-post"))) {
                    $post = \App\Post::withTrashed()->find($id);
                    //dd($post);
                    //dd($post->user_id, $currentUser->id);
                    if ($post->user_id !== $currentUser->id) {
                        return false;
                    }
                }
            }
            // If the user has not permission don't allow next request
            elseif (!$currentUser->can("{$permission}-{$className}")) {
                return false;
            }
            break;
        }
    }

    return true;
}

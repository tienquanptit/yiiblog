<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 4/26/2017
 * Time: 10:03 AM
 */
    namespace console\controllers;

    use Yii;
    use yii\console\Controller;

    use \rmrevin\yii\module\Comments\Permission;
    use \rmrevin\yii\module\Comments\rbac\ItsMyComment;

    class RbacController extends Controller
    {
        public function actionInit()
        {
//            $auth = Yii::$app->authManager;
//
//            // add "indexPost" permission
//            $indexPost = $auth->createPermission('index-post');
//            $indexPost->description = 'Xem danh sach bai viet';
//            $auth->add($indexPost);
//
//            // add "createPost" permission
//            $createPost = $auth->createPermission('create-post');
//            $createPost->description = 'Tao bai viet';
//            $auth->add($createPost);
//
//            // add "updatePost" permission
//            $updatePost = $auth->createPermission('update-post');
//            $updatePost->description = 'Chinh sua bai viet';
//            $auth->add($updatePost);
//
//            // add "viewPost" permission
//            $viewPost = $auth->createPermission('view-post');
//            $viewPost->description = 'Xem chi tiet bai viet';
//            $auth->add($viewPost);
//
//            // add "deletePost" permission
//            $deletePost = $auth->createPermission('delete-post');
//            $deletePost->description = 'Xoa bai viet';
//            $auth->add($deletePost);
//
//            // add "author" role and give this role the "createPost, updatePost, viewPost" permission
//            $postManager = $auth->createRole('manager-post');
//            $auth->add($postManager);
//
//            $auth->addChild($postManager, $indexPost);
//            $auth->addChild($postManager, $createPost);
//            $auth->addChild($postManager, $updatePost);
//            $auth->addChild($postManager, $viewPost);
//            $auth->addChild($postManager, $deletePost);
//
//
//            // add "indexCategory" permission
//            $indexCategory = $auth->createPermission('index-category');
//            $indexCategory->description = 'Xem danh sach thu muc';
//            $auth->add($indexCategory);
//
//            // add "indexCategory" permission
//            $createCategory = $auth->createPermission('create-category');
//            $createCategory->description = 'Tao thu muc';
//            $auth->add($createCategory);
//
//            // add "indexCategory" permission
//            $updateCategory = $auth->createPermission('update-category');
//            $updateCategory->description = 'Chinh sua thu muc';
//            $auth->add($updateCategory);
//
//            // add "indexCategory" permission
//            $viewCategory = $auth->createPermission('view-category');
//            $viewCategory->description = 'Xem chi tiet thu muc';
//            $auth->add($viewCategory);
//
//            // add "indexCategory" permission
//            $deleteCategory = $auth->createPermission('delete-category');
//            $deleteCategory->description = 'Xoa thu muc';
//            $auth->add($deleteCategory);
//
//            // add "author" role and give this role the "createPost, updatePost, viewPost" permission
//            $categoryManager = $auth->createRole('manager-category');
//            $auth->add($categoryManager);
//
//            $auth->addChild($categoryManager, $indexCategory);
//            $auth->addChild($categoryManager, $createCategory);
//            $auth->addChild($categoryManager, $viewCategory);
//            $auth->addChild($categoryManager, $updateCategory);
//            $auth->addChild($categoryManager, $deleteCategory);
//
//            // add "admin" role and give this role the "deletePost" permission
//            // as well as the permissions of the "author" role
//            $admin = $auth->createRole('admin');
//            $auth->add($admin);
//            $auth->addChild($admin, $postManager);
//            $auth->addChild($admin, $categoryManager);
//
//            // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
//            // usually implemented in your User model.
//            $auth->assign($postManager, 2);
//            $auth->assign($categoryManager, 3);
//            $auth->assign($admin, 1);

            $AuthManager = \Yii::$app->getAuthManager();
            $ItsMyCommentRule = new ItsMyComment();

            $AuthManager->add($ItsMyCommentRule);

            $AuthManager->add(new \yii\rbac\Permission([
                'name' => Permission::CREATE,
                'description' => 'Can create own comments',
            ]));
            $AuthManager->add(new \yii\rbac\Permission([
                'name' => Permission::UPDATE,
                'description' => 'Can update all comments',
            ]));
            $AuthManager->add(new \yii\rbac\Permission([
                'name' => Permission::UPDATE_OWN,
                'ruleName' => $ItsMyCommentRule->name,
                'description' => 'Can update own comments',
            ]));
            $AuthManager->add(new \yii\rbac\Permission([
                'name' => Permission::DELETE,
                'description' => 'Can delete all comments',
            ]));
            $AuthManager->add(new \yii\rbac\Permission([
                'name' => Permission::DELETE_OWN,
                'ruleName' => $ItsMyCommentRule->name,
                'description' => 'Can delete own comments',
            ]));
        }
    }
?>
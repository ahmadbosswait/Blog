<?php

class Admin extends Controller
{
    public function __construct()
    {
        global $blog;
        $blog = $this->loadModel('blog_model');
        $this->loadPlugin('auth');
        $isAdmin = isLoggedIn();
        if (!$isAdmin) {
            echo 'Access denied !';
            // log
            exit;
        }
    }

    function likes()
    {
        echo 'Likes Management Page';
    }

    function options()
    {
        global $blog;
        //     $blog = $this->loadModel('blog_model');
        $template = $this->loadView('admin-options');
        if (isset($_POST['submit'])) {
            foreach ($_POST['options'] as $name => $val) {
                $blog->updateOption($name, $val);
            }
        }
        $options = $blog->getOptions();
        $template->set('options', $options);
        $template->set('bgColor', $blog->getOption('bg_color'));
        $template->render();
    }

    function cats($op = null, $val = null)
    {
        //   $blog = $this->loadModel('blog_model');
        // get data from a form
        global $blog;
        if (isset($_POST['catName']) and strlen($_POST['catName']) > 2) {
            $blog->addCategory($_POST['catName']);
        }
        // get data from url (parameters in url)
        if ($op == 'del' and is_numeric($val)) {
            $blog->deleteCategory($val);
        }

        $cats = $blog->getCategories();
        $template = $this->loadView('admin-cats');
        $template->set('cats', $cats);
        $template->render();
    }

    function index($op = null, $val = null)
    {
        global $blog;
        $template = $this->loadView('admin-send');
        //  $blog = $this->loadModel('blog_model');
        if (isset($_POST['submit'])) {   // do validation here
            if ($op == 'edit' and is_numeric($val)) {  // edit post
                $blog->updatePost($val, $_POST['catID'], $_POST['title'], $_POST['abstract'], $_POST['content'], $_FILES['image'], $_POST['tags']);
                $template->set('msg', 'Post edited successfully');
            } else { // add new post
                $blog->addPost($_POST['catID'], $_POST['title'], $_POST['abstract'], $_FILES['image'], $_POST['content'], $_POST['tags']);
                $template->set('msg', 'Post Added successfully');
            }
        }

        $isEdit = false;

        if ($op == 'edit' and is_numeric($val)) {   // do validation here
            if ($blog->isNotExistPost($val)) {
                $this->redirect('admin');
                exit();
            }
            $isEdit = true;
            $post = $blog->getPost($val);
            $template->set('post', $post);
            $template->set('msg', "You are editing post");
        }
        $template->set('isEdit', $isEdit);
        $cats = $blog->getCategories();
        $template->set('cats', $cats);
        $template->render();
    }

    function send($op = null, $val = null)
    {
        $this->index($op, $val);
    }

    function posts($op = '', $val = '', $page = 1)
    {
        global $blog;
        //  $blog = $this->loadModel('blog_model');

        if (!is_numeric($page)) {
            $this->redirect('');
        }
        $template = $this->loadView('admin-posts');
        $numPosts = 0;
        if ($op == 'del' and is_numeric($val)) {
            $blog->deletePost($val);
        }

        // $template->set('posts', $blog->getPosts($type, $val, $page, $numPosts));
        $posts = $blog->getPosts('', '', $page, $numPosts);


        $template->set('posts', $posts);
        $template->set('numPosts', $numPosts);
        $template->set('page', $page);
        $template->set('postPerPage', $blog->getOption('post_per_page'));

        $template->render();
    }

    function comments($op = null, $val = null)
    {
        global $blog;
        //    $blog = $this->loadModel('blog_model');

        if ($op == 'del' and is_numeric($val)) {
            $blog->deleteComment($val);
        } elseif ($op == 'approve' and is_numeric($val)) {
            $blog->approveComment($val);
        } elseif ($op == 'unapprove' and is_numeric($val)) {
            $blog->unapproveComment($val);
        }

        $comments = $blog->getComments();
        $template = $this->loadView('admin-comments');
        $template->set('comments', $comments);
        $template->render();
    }

    function widgets($op = null, $val = null)
    {
        global $blog;
        //  $blog = $this->loadModel('blog_model');
        $template = $this->loadView('admin-widgets');
        if ($op == 'del' and is_numeric($val)) {
            $blog->deleteWidget($val);
        }

        if (isset($_POST['submit'])) {   // do validation here
            if ($op == 'edit' and is_numeric($val)) {  // edit Widget
                $blog->updateWidget($val, $_POST['wTitle'], $_POST['wContent'], $_POST['wOrder']);
                $template->set('msg', 'Menu edited successfully');
            } else { // add new Widget
                $blog->addWidget($_POST['wTitle'], $_POST['wContent'], $_POST['wOrder']);
                $template->set('msg', 'Menu Added successfully');
            }
        }

        $isEdit = false;
        if ($op == 'edit' and is_numeric($val)) {
            $isEdit = true;
            $wg = $blog->getWidget($val);
            $template->set('widget', $wg);
            $template->set('msg', "You are editing menu");
        }
        $template->set('isEdit', $isEdit);
        $template->set('widgets', $blog->getWidgets());
        $template->render();
    }

    function gallery($op = null, $val = null)
    {
        global $blog;
        $template = $this->loadView('admin-gallery');
        if (isset($_POST['submit'])) {   // do validation here
            $blog->addImage($_POST['title'], $_FILES['image']);
            $template->set('msg', 'Image Added successfully');
        }

        if ($op == 'del' and is_numeric($val)) {
            $path = $blog->getImage($val);
            $array = json_decode(json_encode($path), true);
            unlink($array['c']);
            $blog->deleteImages($val);
        }

        $images = $blog->getImages();
        $template = $this->loadView('admin-gallery');
        $template->set('images', $images);
        $template->render();
    }

}
<?php
class Show extends Controller
{
    public function __construct()
    {
        $this->loadPlugin('auth');
    }

    function index($type = 'last', $val = 'posts', $page = 1)
    {
        $this->loadPlugin('jdf');
        $blog = $this->loadModel('blog_model');
        $template = $this->loadView('index');
        $numPosts = 0;
        // $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
        if (!is_numeric($page)) {
            $this->redirect('');
        }
        if (($type == 'cat' and is_numeric($val)) or ($type == 'search' and strlen($val) > 1)) {
            // $template->set('posts', $blog->getPosts($type, $val, $page, $numPosts));
            $posts = $blog->getPosts($type, $val, $page, $numPosts);
        } else {
            // $template->set('posts', $blog->getPosts('last', 'posts', $page, $numPosts));
            $posts = $blog->getPosts('last', 'posts', $page, $numPosts);
        }
        foreach ($posts as $post) {
            //$post->post_date = jdate($blog->getOption('date_format'), strtotime($post->post_date));
            $post->post_date = date(('d-M-y'), strtotime($post->post_date));
            $post->views = number_format($post->views);
        }
        $template->set('posts', $posts);
        $template->set('title', $blog->getOption('site_title'));
        $template->set('numPosts', $numPosts);
        $template->set('page', $page);
        $template->set('postPerPage', $blog->getOption('post_per_page'));
        $template->set('isLoggedIn', isLoggedIn());
        $template->set('widgets', $blog->getWidgets());
        $template->set('cats', $blog->getCategories());
        $template->render();

    }

    function cat($catID, $page = 1)
    {
        $this->index('cat', $catID, $page);
    }

    function search()
    {
        if (isset($_GET['s'])) {
            $keyword = $_GET['s'];
            $this->index('search', $keyword, 1);
        } else {
            $this->index();
        }
    }

    function post($pid)
    {
        $this->loadPlugin('jdf');
        $blog = $this->loadModel('blog_model');
        $template = $this->loadView('single');
        if ($pid == '' or !is_numeric($pid) or $blog->isNotExistPost($pid)) {
            $this->redirect('');
            exit();
        } else {
            $post = $blog->getPost($pid);
            $blog->incVisit($pid);
        }
        $post->post_date = jdate($blog->getOption('date_format'), strtotime($post->post_date));
        $template->set('post', $post);
        $comments = $blog->getComments($pid);
        foreach ($comments as $comment) {
            $comment->comment_date = jdate($blog->getOption('date_format'), strtotime($comment->comment_date));
        }
        $template->set('comments', $comments);

        if (isset($_POST['submitComment'])) {
            // Tamrin : Validation monaseb ra dar if zi anjam dahid
            if (strlen($_POST['name']) > 1 and strlen($_POST['email']) > 10 and strlen($_POST['comment']) > 3) {
                $blog->addComment($pid, $_POST['name'], $_POST['email'], $_POST['website'], $_POST['comment']);
                $template->set('style', 'success');
                $template->set('msg', 'دیدگاه شما ثبت شد و منتظر تائید مدیر است . با تشکر ...');
            } else {
                $template->set('style', 'warning');
                $template->set('msg', 'نام، ایمیل و متن دیدگاه را باید حتما وارد کنید.');
            }
        }

        $template->set('isLoggedIn', isLoggedIn());
        $template->set('likeEnable', $blog->getOption('comment_like'));
        $template->set('title', /*$blog->getOption('site_title') . ' - ' .*/
            $post->title);
        $template->set('keywords', /*$blog->getOption('site_title') . ' - ' .*/
            $post->tags);
        $template->set('widgets', $blog->getWidgets());
        $template->set('cats', $blog->getCategories());
        $template->render();
    }

    function contactus()
    {
        $template = $this->loadView('contactus');
        if (isset($_POST['sendMail'])) {
            // validation monaseb ra dar inja anjam dahid
            if (strlen($_POST['message']) > 10 and strlen($_POST['mail']) > 10) {  // send mail
                $to = "admin@localhost";
                $from = $_POST['mail'];
                $subject = "ContactUS : " . $_POST['title'];
                $headers = "From: " . strip_tags($from) . "\r\n";
                $headers .= "Reply-To: " . strip_tags($to) . "\r\n";
                $headers .= "MIME-Version: 1.0\r\n";
                $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                $message = "
                    <html>
                    <body>
                    یک پیام جدید از طریق فرم تماس با ما در وبلاگ شما ارسال شده است :<br>
                    <b>{$_POST['name']} : {$_POST['mail']} </b> <br>
                    <b>{$_POST['title']}</b><br>
                    {$_POST['message']}
                    </body>
                    </html>";
                @mail($to, $subject, $message, $headers);
                $template->set('msg', 'thanks for your message we call you soon !');
                $template->set('style', 'success');
            } else {
                $template->set('msg', 'put your details correctly !');
                $template->set('style', 'warning');
            }
        }
        $template->set('title', "Contact us");
        $template->set('isLoggedIn', isLoggedIn());
        $template->render();
    }

    function gallery()
    {
        $blog = $this->loadModel('blog_model');

        $images = $blog->getImages();
        $template = $this->loadView('gallery');
        $template->set('images', $images);
        $template->set('title', "Gallery");
        $template->render();
    }
}
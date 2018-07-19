<?php

class Blog_model extends Model
{

    private $postsTable = 'posts';
    private $galleryTable = 'gallery';
    private $catsTable = 'categories';
    private $commentsTable = 'comments';
    private $optionsTable = 'options';
    private $widgetsTable = 'widgets';
    private $rateLogsTable = 'rate_logs';

    // Posts
    public function addPost($cat_id, $title, $abstract, $image, $body, $tags, $views = 0)
    {
        $image_url = $this->uploadImage($image);
        $tags = str_replace('،', ',', $tags);
        $tags = str_replace('-', ',', $tags);
        $q = "INSERT INTO $this->postsTable (`cat_id`, `title`,`abstract`, `body`, `image_url` , `views`, `tags`) VALUES ('$cat_id', '$title','$abstract', '$body', '$image_url', '$views', '$tags')";
        $result = $this->execute($q);
        return $result;

    }

    public function updatePost($pid, $cat_id, $title, $abstract, $body, $image, $tags = "")
    {
        $image_url = $this->uploadImage($image);
        $tags = str_replace('،', ',', $tags);
        $tags = str_replace('-', ',', $tags);
        $q = "UPDATE $this->postsTable SET cat_id='$cat_id', title='$title' ,abstract='$abstract', body='$body', image_url='$image_url', tags='$tags' WHERE id = $pid";
        $result = $this->execute($q);
        return $result;
    }

    public function uploadImage($image)
    {
        $uploadDir = BASE_DIR . 'static/images/';
        $fileName = rand(1000, 9999) . '-' . $image['name'];
        $filePath = $uploadDir . $fileName;
        $allowedTypes = array('image/png', 'image/jpg', 'image/jpeg');
        if (in_array($image['type'], $allowedTypes)) {
            if (move_uploaded_file($image['tmp_name'], $filePath)) {
                //$filePath = str_replace("\\", "/", $filePath); // replace \ with / in file path
                $image_url = BASE_URL . 'static/images/' . $fileName;
            }
        }
        return $image_url;
    }

    public function addImage($title, $image)
    {
        $uploadDir = BASE_DIR . 'static/image/';
        $fileName = rand(1000, 9999) . '-' . $image['name'];
        $filePath = $uploadDir . $fileName;
        $allowedTypes = array('image/png', 'image/jpg', 'image/jpeg');
        if (in_array($image['type'], $allowedTypes)) {
            if (move_uploaded_file($image['tmp_name'], $filePath)) {
                //$filePath = str_replace("\\", "/", $filePath); // replace \ with / in file path
                $image_url = BASE_URL . 'static/image/' . $fileName;
            }
        }
        $q = "INSERT INTO $this->galleryTable (`title`, `image_url`,`path`) VALUES ('$title', '$image_url', '$filePath')";
        $result = $this->execute($q);
        return $result;

    }

    public function getImages()
    {
        $q = "SELECT * FROM $this->galleryTable";
        $result = $this->query($q);
        return $result;
    }

    public function getImage($id)
    {
        $q = "SELECT path as c FROM $this->galleryTable where id='$id'";
        $result = $this->query($q);
        return $result[0];
    }

    public function deleteImages($id)
    {
        $q = "DELETE FROM $this->galleryTable where id='$id'";
        $result = $this->execute($q);
        return $result;
    }


    public function deletePost($id)
    {
        $q = "DELETE FROM $this->postsTable where id='$id'";
        $result = $this->execute($q);
        return $result;
    }


    function isNotExistPost($id)
    {
        $q = "SELECT * FROM $this->postsTable where id='$id'";
        $v = $this->query($q);
        if ($v)
            return false;
        return true;
    }

    public function getPost($pid)
    {
        $q = "SELECT * FROM $this->postsTable where id='$pid'";
        $result = $this->query($q);
        return $result[0];
    }

    function incVisit($pid)
    {
        $q = "UPDATE $this->postsTable SET views=views+1 where id='$pid'";
        $result = $this->execute($q);
        return $result;
    }


    private function getDBVar($query)
    {
        $query = str_ireplace('from', 'as xcv from', $query);
        $v = $this->query($query);
        if ($v !== false) {
            $v = $v[0];
            return $v->xcv;
        } else {
            return false;
        }
    }

    public function getPosts($type = 'last', $val = 'posts', $page = 1, &$qCount = 0)
    {
        $numPosts = $this->getOption('post_per_page');
        $start = ($page - 1) * $numPosts;
        if ($type == 'cat' and is_numeric($val)) {
            $q = "SELECT * FROM $this->postsTable where cat_id='$val' order by post_date desc LIMIT $start,$numPosts";
            $qCount = $this->getDBVar("SELECT count(*) FROM $this->postsTable where cat_id='$val'");
        } elseif ($type == 'search' and strlen($val) > 1) {
            $q = "SELECT * FROM $this->postsTable where title LIKE '%$val%' or body or abstract LIKE '%$val%' order by post_date desc LIMIT $start,$numPosts";
            $qCount = $this->getDBVar("SELECT count(*) FROM $this->postsTable where title LIKE '%$val%'");
        } else {
            $q = "SELECT * FROM $this->postsTable order by post_date desc LIMIT $start, $numPosts";
            $qCount = $this->getDBVar("SELECT count(*) FROM $this->postsTable");
        }

        $result = $this->query($q);
        return $result;
    }


    // Comments
    public function addComment($post_id, $author, $mail, $site, $body)
    {
        $this->escapeString($author);
        $this->escapeString($mail);
        $this->escapeString($site);
        $this->escapeString($body);
        $q = "INSERT INTO $this->commentsTable (`post_id`, `author`, `mail`, `site`, `body`) VALUES ('$post_id', '$author', '$mail', '$site', '$body')";
        $result = $this->execute($q);
        return $result;
    }

    public function deleteComment($id)
    {
        $q = "DELETE FROM $this->commentsTable where id='$id'";
        $result = $this->execute($q);
        return $result;
    }

    public function approveComment($id)
    {
        $q = "UPDATE $this->commentsTable SET status='publish' where id='$id'";
        $result = $this->execute($q);
        return $result;
    }

    public function unapproveComment($id)
    {
        $q = "UPDATE $this->commentsTable SET status='pending' where id='$id'";
        $result = $this->execute($q);
        return $result;
    }

    public function rateComment($cid, $rate, $isAdmin = false)
    {
        if ($rate == 'up') {
            $rate = 1;
        } elseif ($rate == 'down') {
            $rate = -1;
        } else {
            $rate = 0;
        }
        if ($this->alreadyRated($cid) and !$isAdmin) { // allow admin to rate more than once !!!
            return false;
        } else {
            $q = "UPDATE $this->commentsTable SET rate=rate+$rate where id='$cid'";
            $result = $this->execute($q);
            $this->addRateLog($cid, $_SERVER['REMOTE_ADDR']);
            return $result;
        }
    }

    function alreadyRated($cid)
    {
        $userIP = $_SERVER['REMOTE_ADDR'];
        return $this->getDBVar("select count(*) from $this->rateLogsTable where item_id='$cid' and user_ip='$userIP'");
    }

    function getCommentRate($cid)
    {
        return $this->getDBVar("select rate from $this->commentsTable where id='$cid'");
    }

    public function getComments($postID = null)
    {
        if ($postID == null or !is_numeric($postID)) {
            $q = "SELECT * FROM $this->commentsTable order by comment_date desc";
        } else {
            $q = "SELECT * FROM $this->commentsTable where post_id='$postID' and status='publish' order by comment_date desc";
        }
        $result = $this->query($q);
        return $result;
    }

    // Categories
    public function addCategory($name)
    {
        $q = "INSERT INTO $this->catsTable (`name`) VALUES ('$name')";
        $result = $this->execute($q);
        return $result;
    }

    public function deleteCategory($id)
    {
        $q = "DELETE FROM $this->catsTable where id='$id'";
        $result = $this->execute($q);
        return $result;
    }

    public function getCategories()
    {
        $q = "SELECT * FROM $this->catsTable";
        $result = $this->query($q);
        return $result;
    }

    // Widgets
    public function addWidget($title, $body, $order)
    {
        $q = "INSERT INTO $this->widgetsTable (`title`, `body`, `ord`) VALUES ('$title', '$body','$order');";
        $result = $this->execute($q);
        return $result;
    }

    public function updateWidget($wid, $title, $body, $order)
    {
        $q = "UPDATE $this->widgetsTable SET title='$title', body='$body', ord='$order' WHERE id=$wid;";
        $result = $this->execute($q);
        return $result;
    }

    public function deleteWidget($wid)
    {
        $q = "DELETE FROM $this->widgetsTable where id='$wid'";
        $result = $this->execute($q);
        return $result;
    }

    public function getWidget($wid)
    {
        $q = "SELECT * FROM $this->widgetsTable where id='$wid'";
        $result = $this->query($q);
        return $result[0];
    }

    public function getWidgets()
    {
        $q = "SELECT * FROM $this->widgetsTable order by ord";
        $result = $this->query($q);
        return $result;
    }

    // Options
    public function optionExists($name)
    {
        $count = $this->query("SELECT count(*) as c FROM $this->optionsTable where name='$name'");
        $count = $count[0];
        return ($count->c) ? true : false;
    }

    public function getOption($name)
    {
        $v = $this->query("SELECT value FROM $this->optionsTable where name='$name'");
        if ($v) {
            $v = $v[0];
            return $v->value;
        } else {
            return false;
        }
    }

    public function addOption($name, $value, $desc)
    {
        $q = "INSERT INTO $this->optionsTable (`name`, `value`, `desc`) VALUES ('$name', '$value','$desc')";
        $result = $this->execute($q);
        return $result;
    }

    public function updateOption($name, $value, $desc = null)
    {
        if ($this->optionExists($name)) {
            if ($desc == null) {
                $q = "UPDATE $this->optionsTable SET value='$value' where name='$name';";
            } else {
                $q = "UPDATE $this->optionsTable SET value='$value', desc='$desc' where name='$name';";
            }
            $result = $this->execute($q);
        } else {
            $result = $this->addOption($name, $value, $desc);
        }
        return $result;
    }

    public function getOptions()
    {
        $q = "SELECT * FROM $this->optionsTable";
        $result = $this->query($q);
        $arr = array();
        foreach ($result as $r) { // convert to associative array
            $arr[$r->name] = array($r->value, $r->desc);
        }
        return $arr;
    }


    // RateLogs
    public function addRateLog($itemID, $userIP)
    {
        $q = "INSERT INTO $this->rateLogsTable (`item_id`, `user_ip`) VALUES ('$itemID', '$userIP');";
        $result = $this->execute($q);
        return $result;
    }


}

?>

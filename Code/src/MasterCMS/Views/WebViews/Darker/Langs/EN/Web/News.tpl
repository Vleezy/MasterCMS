<main id="lg">
    <div class="container">
        <div class="row">

            <?php 

                if ($this->con->num_rows($this->con->query("SELECT * FROM news")) == 0) {

            ?>

            <div class="col-lg-12">
                <div class="Box">
                    <div class="boxTitle">¡Oh, bobba! There is no news</div>
                    <div class="boxContent">
                        <div class="container">
                            <center>
                                <img src="{@cdn}/Images/404.png" alt="Error 404">
                                <p><div style="text-transform: uppercase;">Come back another time, there's probably news.</div></p>
                            </center>
                        </div>
                    </div>
                </div>
            </div>

            <?php } else { if (!$new_active) { ?>
        
                <div class="col-lg-4">
                    <h3>Last News</h3>
                    <ul id="newsMenu">
                        <?php

                            $last_query = $this->con->query("SELECT * FROM news WHERE id ORDER BY id DESC LIMIT 1");
                            $last = mysqli_fetch_assoc($last_query);

                            $news_query = $this->con->query("SELECT * FROM news WHERE id ORDER BY id DESC LIMIT 12");
                            $news_num = $this->con->num_rows($news_query);

                            while ($news_select = mysqli_fetch_assoc($news_query)) {

                            ?>
                    
                            <li><a href="{@url}/web/news/<?php echo $news_select['id']; ?>" <?php if ($news_select['id'] == $last['id']) { echo 'id="selected"'; } ?>><?php echo substr($news_select['title'], 0, 39); ?>  <div class="float-right"> »</div></a></li>

                        <?php } ?>

                    </ul>
                </div>

            <?php 

                    $news_query = $this->con->query("SELECT * FROM news WHERE id ORDER BY id DESC LIMIT 1");
                    $news_num = $this->con->num_rows($news_query);

                    $news_select = mysqli_fetch_assoc($news_query);

                    $queryUser = $this->con->query('SELECT * FROM users WHERE id = "'  . $news_select['author'] . '" ');

                    if ($this->con->num_rows($queryUser) == 0) {

                        $selectUser['username'] = 'Not found';

                    } else {
                        $selectUser = mysqli_fetch_assoc($queryUser);

                        if (date('H', $news_select['published']) >= 12) {
                            $hour = date('H:i', $news_select['published']) . ' PM';
                        } else {
                            $hour = date('H:i', $news_select['published']) . ' AM';
                        }

                        $this->sessions->set('session', 'new_id', $news_select['id']);
                    }

            ?>

            <div class="col-lg-8">
                <div class="Box">
                    <div class="boxTitle"><?php echo substr($news_select['title'], 0, 39); ?> <div class="float-right hidden-sm-down"><?php echo date('d/m/Y', $news_select['published']); ?> at <?php echo $hour; ?></div></div>
                    <div class="boxContent boxNews">
                        <div id="mainImage" style="background: url('<?php echo $news_select['image']; ?>');"> </div><br>
                        <?php echo $news_select['longstory']; ?>
                    </div>
                    <div class="boxFooter">
                        <a href="{@url}/web/profile/<?php echo $selectUser['id']; ?>">
                            <div id="avatarHead" style="background: url('http://www.habbo.es/habbo-imaging/avatarimage?figure=sh-305-110.he-987462840-62.lg-275-63.hd-205-22.hr-3163-42.ch-3050-110-110&headonly=1') no-repeat;"> </div>
                            <span>
                                <p>Published by</p>
                                <p><?php echo $selectUser['username']; ?></p>
                            </span>                         
                        </a>
                    </div>
                </div>
                <?php if (!$news_select['comments']) { ?>

                    <div class="alert alert-danger" role="alert">
                      Comments are disabled for this news.
                    </div>

                <?php } elseif($this->users->getSession()) { ?>

                    <div id="num_comments"></div>

                    <h3>Comments (<?php $comments_num = $this->con->num_rows("SELECT * FROM news_comments WHERE new_id = '{$news_select['id']}'"); echo $comments_num; ?>)</h3> 

                    <div class="form-group">
                        <form action="" method="POST" id="commentFormulary">
                            <textarea name="comment" placeholder="Escribir un comentario público..."></textarea>
                            <button type="submit" class="btn btn-success btn-lg btn-radius">Comment</button>
                        </form>
                    </div>
                    
                    <div id="loader_live1"></div>
                    <div id="commentsContainer"></div>

                
                    <script type="text/javascript">
                        var comment_id = "/ajax/comments/<?php echo $news_select['id']; ?>";
                    </script>

                <?php } else { ?>  

                    <div class="alert alert-danger" role="alert">
                       You must be logged in to comment and view the comments, <a href="/">Login here</a>
                    </div>

                <?php } ?>

            </div>

                <?php } else { ?>


                <div class="col-lg-4">
                    <h3>Last News</h3>
                    <ul id="newsMenu">
                        <?php

                            $last_query = $this->con->query("SELECT * FROM news WHERE id ORDER BY id DESC LIMIT 1");
                            $last = mysqli_fetch_assoc($last_query);

                            $news_query = $this->con->query("SELECT * FROM news WHERE id ORDER BY id DESC LIMIT 12");
                            $news_num = $this->con->num_rows($news_query);

                            while ($news_select = mysqli_fetch_assoc($news_query)) {

                            ?>
                    
                            <li><a href="{@url}/web/news/<?php echo $news_select['id']; ?>" <?php if ($news_select['id'] == $this->vars['new_id']) { echo 'id="selected"'; } ?>><?php echo substr($news_select['title'], 0, 39); ?>  <div class="float-right"> »</div></a></li>

                        <?php } ?>

                    </ul>
                </div>

        <?php 

            $news_query = $this->con->query("SELECT * FROM news WHERE id = '{$this->vars['new_id']}' LIMIT 1");
            $news_num = $this->con->num_rows($news_query);

            $news_select = mysqli_fetch_assoc($news_query);

            $queryUser = $this->con->query("SELECT * FROM users WHERE id = '{$news_select['author']}'");

            $this->sessions->set('session', 'new_id', $news_select['id']);

            if ($this->con->num_rows($queryUser) == 0) {
                $selectUser['username'] = 'Not found';
            } else {
                $selectUser = mysqli_fetch_assoc($queryUser);
            }

            if (date('H', $news_select['published']) >= 12) {
                $hour = date('H:i', $news_select['published']) . ' PM';
            } else {
                $hour = date('H:i', $news_select['published']) . ' AM';
            }

        ?>

            <div class="col-lg-8">
                <div class="Box">
                    <div class="boxTitle"><?php echo substr($news_select['title'], 0, 39); ?> <div class="float-right hidden-sm-down"><?php echo date('d/m/Y', $news_select['published']); ?> at <?php echo $hour; ?></div></div>
                    <div class="boxContent boxNews">
                        <div id="mainImage" style="background: url('<?php echo $news_select['image']; ?>');"> </div><br>
                        <?php echo $news_select['longstory']; ?>
                    </div>
                    <div class="boxFooter">
                        <a href="{@url}/web/profile/<?php echo $selectUser['id']; ?>">
                            <div id="avatarHead" style="background: url('http://www.habbo.es/habbo-imaging/avatarimage?figure=sh-305-110.he-987462840-62.lg-275-63.hd-205-22.hr-3163-42.ch-3050-110-110&headonly=1') no-repeat;"> </div>
                            <span>
                                <p>Published by</p>
                                <p><?php echo $selectUser['username']; ?></p>
                            </span>                         
                        </a>
                    </div>
                </div>
                <?php if (!$news_select['comments']) { ?>

                    <div class="alert alert-danger" role="alert">
                        Comments are disabled for this news.
                    </div>

                <?php } elseif($this->users->getSession()) { ?>

                    <div id="num_comments"></div>

                    <h3>Comments (<?php $comments_num = $this->con->num_rows("SELECT * FROM news_comments WHERE new_id = '{$news_select['id']}'"); echo $comments_num; ?>)</h3> 

                    <div class="form-group">
                        <form action="" method="POST" id="commentFormulary">
                            <textarea name="comment" placeholder="Escribir un comentario público..."></textarea>
                            <button type="submit" class="btn btn-success btn-lg btn-radius">Comment</button>
                        </form>
                    </div>
                    
                    <div id="loader_live1"></div>
                    <div id="commentsContainer"></div>

                
                    <script type="text/javascript">
                        var comment_id = "/ajax/comments/<?php echo $news_select['id']; ?>";
                    </script>

                <?php } else { ?>  

                    <div class="alert alert-danger" role="alert">
                        You must be logged in to comment and view the comments, <a href="/">Login here</a>
                    </div>

                <?php } ?>

            </div>

            <?php } } ?>
        </div>
    </div>
</main>
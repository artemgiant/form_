
<?php if (!empty($data)): ?>
    <!-- start comment -->
    <div id="comments">
        <ol class="comment-list">

            <?php  foreach ($data as $comment):
                $icon_d = '';
                if(isset($_SESSION['user']) && $comment['user_id']==$_SESSION['user']['id']):

                        $icon_d = '<span class="right_close del-item "  data-id="'.$comment['id'].'?>"><i class="fa fa-fw fa-close text-danger"></i></span>'; endif;

  $icon = '<span class="right_close "><i class="fa fa-fw fa-close "></i></span>';
                ?>
                <li class="item-p comment even thread-even depth-1" id="li-comment-6">
                    <div class="comment-block">
                        <?=($icon_d)?:$icon?>
                        <div class="comment-autor">
                            <div height="75" width="132"> <img alt="" src="/upload/images/<?= (!empty($comment['photo']))? $comment['photo']:'no_image.jpg'?>"
                                                               class="avatar avatar-75 photo"
                                                               style="    height: 75px;
    display: block;
    margin: auto; background-size: cover;
    background-clip: content-box;"></div> <cite class="fn"><?=$comment['name']?></cite>
                        </div>
                        <br>
                        <div class="comment-content ">
                            <p><?=$comment['comment']?></p>

                            <div class="comment-meta commentmetadata"><span
                                        class="date"> <?=(!empty($comment['update_at'])?$comment['update_at']:$comment['created_at'])?></span>
                            </div>

                        </div>
                    </div>
                </li>
            <?php endforeach; ?>

        </ol>
    </div>
    <!--  end comment -->
<?php else: ?>
<?php endif; ?>



















<?php
/**
 * List with comment, list style, Html
 *
 * @var $sRows         : the list of radio, generated with the view answer_row.php
 *
 * @var $id
 * @var $hint_comment
 * @var $kpclass
 * @var $name
 * @var $tarows
 * @var $has_comment_saved
 * @var $comment_saved
 * @var $java_name
 * @var $java_id
 * @var $java_value
 */
?>
<!-- List with comment, list style, -->

<!-- answer -->
<div class="<?php echo $coreClass; ?> row">
    <div class="answers-list radio-list col-sm-6 col-xs-12">
        <ul class="list-unstyled">
            <?php
                // rows/row.php
                echo $sRows;
            ?>

        </ul>
    </div>

    <div class="form-group answer-item text-item col-sm-6 col-xs-12">
        <label class="control-label" for="<?php echo $id; ?>">
            <?php echo $hint_comment;?>:
        </label>

        <textarea
                class="form-control <?php echo $kpclass; ?>"
                name="<?php echo $name; ?>"
                id="<?php echo $id; ?>"
                rows="<?php echo $tarows;?>"
                ><?php if($has_comment_saved):?><?php echo $comment_saved;?><?php endif;?></textarea>
    </div>
</div>

<input
        class="radio"
        type="hidden"
        name="<?php echo $java_name;?>"
        id="<?php echo $java_id;?>"
        value="<?php echo $java_value;?>"
      />
<!-- end of answer -->
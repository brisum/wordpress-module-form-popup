<div class="modal fade" id="popup-<?php echo $name; ?>"
     tabindex="-1" role="dialog"
     aria-labelledby="popup-<?php echo $name; ?>-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="popup-<?php echo $name; ?>-label">
                    <?php if ($title) : ?>
                        <div class="title">
                            <?php echo $title; ?>
                        </div>
                    <?php endif; ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php echo $form->content(); ?>
            </div>
        </div>
    </div>
</div>

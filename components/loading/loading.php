<?php $logoString = get_field('logo', 'option'); ?>

<div class="modal" id="loadingModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row align-items-center vh-100">
                    <div class="col-12">
                        <div class="flex-fix">
                            <div class="flex-parent">
                                <div class="flex-child">
                                    <div class="loading-spinner"></div>
                                    <div class="loading-logo">
                                        <?php echo wp_get_attachment_image($logoString, 'full') ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
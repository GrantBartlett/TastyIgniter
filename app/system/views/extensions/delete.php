<div class="row content">
    <?= form_open(current_url(),
        [
            'id'     => 'edit-form',
            'role'   => 'form',
            'method' => 'DELETE',
        ]
    ); ?>

    <input type="hidden" name="_handler" value="onDelete">
    <div class="toolbar">
        <div class="toolbar-action">
            <button
                type="submit"
                class="btn btn-danger"
                data-request="onDelete"
            ><?= lang('system::extensions.button_yes_delete'); ?></button>
            <a class="btn btn-default" href="<?= admin_url('extensions'); ?>">
                <?= lang('system::extensions.button_return_to_list'); ?>
            </a>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <?php $deleteAction = !empty($extensionData)
                ? lang('system::extensions.text_files_data')
                : lang('system::extensions.text_files'); ?>
            <p><?= sprintf(lang('system::extensions.alert_delete_warning'), $deleteAction, $extensionName); ?></p>
            <p><?= sprintf(lang('system::extensions.alert_delete_confirm'), $deleteAction); ?></p>
            <div id="deletedFiles">
                    <textarea
                        class="form-control"
                        rows="10"
                        readonly><?= implode(PHP_EOL, $filesToDelete); ?></textarea>
            </div>
            <?php if ($extensionData) { ?>
                <div class="form-group wrap-top">
                    <label for="input-delete-data"
                           class="col-sm-2 control-label"><?= lang('system::extensions.label_delete_data'); ?></label>
                    <div class="col-sm-5">
                        <div id="input-delete-data" class="btn-group btn-group-switch" data-toggle="buttons">
                            <label class="btn btn-default">
                                <input
                                    type="radio"
                                    name="delete_data"
                                    value="0" <?= set_radio('delete_data', '0'); ?>
                                ><?= lang('system::extensions.admin::default.text_no'); ?>
                            </label>
                            <label class="btn btn-default active">
                                <input
                                    type="radio"
                                    name="delete_data"
                                    value="1" <?= set_radio('delete_data', '1', TRUE); ?>
                                ><?= lang('system::extensions.admin::default.text_yes'); ?>
                            </label>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?= form_close(); ?>
</div>
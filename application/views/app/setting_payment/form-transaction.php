<!-- Modal -->
<form action="<?php echo base_url('app/setting_payment/create') ?>" id="transform" method="POST">
    <div class="c-modal c-modal--medium modal fade" id="form-transaction" tabindex="-1">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="c-modal__header">
                    <h3 class="c-modal__title">
                        Transaction
                    </h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>
                <div class="c-modal__body row">
                    <input type='hidden' name="id" id="id" value="<?= $this->session->userdata('id') ?>">
                    <div class="form-group col-6">
                        <label class="c-field__label">type : </label>
                        <select required="" id="type" name="type" class="form-control" data-placeholder='select'>
                            <option value=""></option>
                            <option value="bni">BNI</option>
                            <option value="bca">BCA</option>
                            <option value="bri">BRI</option>
                            <option value="mandiri">Mandiri</option>
                        </select>
                    </div>

                    <div class="form-group col-6">
                        <label class="c-field__label">account_number : </label>
                        <input autocomplete="off" id="account_number" required class="form-control" name="account_number" type="text" placeholder="account_number">
                    </div>

                    <div class="form-group col-12">
                        <label class="c-field__label">receiver : </label>
                        <input autocomplete="off" id="receiver" required class="form-control" name="receiver" type="text" placeholder="receiver">
                    </div>

                </div>

                <div class="c-modal__footer">
                   <button class="c-btn c-btn--info c-btn--custom" name="submit" type="submit">
                    <i class="fa fa-save"></i>
                </button>
            </div>

        </div><!-- // .c-modal__content -->

    </div><!-- // .c-modal__dialog -->
</div><!-- // .c-modal -->
</form>

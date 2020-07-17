<!-- Modal -->
<form id="conform" action="<?php echo base_url('app/setting_payment/confirmation_create') ?>" method="POST">
    <div class="c-modal c-modal--medium modal fade" id="form-confirmation" tabindex="-1">
        <div class="c-modal__dialog modal-dialog" role="document">
            <div class="modal-content">
                <div class="c-modal__header">
                    <h3 class="c-modal__title">
                        Confirmation
                    </h3>
                    <span class="c-modal__close" data-dismiss="modal" aria-label="Close">
                        <i class="fa fa-close"></i>
                    </span>
                </div>
                <div class="c-modal__body row">
                    <div class="form-group col-6">
                        <label class="c-field__label">type : </label>
                        <select required="" id="medium" name="medium" class="form-control">
                            <option value=""></option>
                            <option value="Whatapps">whatsapp</option>
                            <option value="Facebook">facebook</option>
                            <option value="mobile phone">mobile phone</option>
                        </select>
                    </div>                    

                    <div class="form-group col-12">
                        <label class="c-field__label">description : </label>
                        <input autocomplete="off" id="description" required class="form-control" name="description" type="text" placeholder="data">
                    </div>

                </div>

                <div class="c-modal__footer">
                    <input type="hidden" name="confirm" value="ok">
                    <input class="input-confirmation-identity" type="hidden" name="identity">
                    <button class="c-btn c-btn--info c-btn--custom" name="submit" type="submit">
                        <i class="fa fa-save"></i>
                    </button>
                </div>

            </div><!-- // .c-modal__content -->

        </div><!-- // .c-modal__dialog -->
    </div><!-- // .c-modal -->
</form>

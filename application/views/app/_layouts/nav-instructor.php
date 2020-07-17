<li class="c-sidebar__item">
    <a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'lms_courses' or $this->uri->segment(2) == 'lms_courses' and $this->uri->segment(3) == 'create') {
                                    echo "is-active";
                                } ?>" href="<?php echo base_url('app/lms_courses') ?>">
        <span class="c-sidebar__icon">
            <i class="fa fa-book"></i>
        </span>Kelas Saya
    </a>
</li>

<?php if ($this->site['payment_method'] == 'Manual') : ?>

    <li class="c-sidebar__item">
        <a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'user_invoice_history' and $this->uri->segment(3) == 'form') {
                                        echo "is-active";
                                    } ?>" href="<?php echo base_url('app/user_invoice_history/form') ?>">
            <span class="c-sidebar__icon">
                <i class="fa fa-credit-card"></i>
            </span>Permintaan Tarik
        </a>
    </li>

    <li class="c-sidebar__item">
        <a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'user_invoice_history' and $this->uri->segment(3) == 'form') {
                                        echo "";
                                    } elseif ($this->uri->segment(2) == 'user_invoice_history' or $this->uri->segment(2) == 'user_invoice_history' and $this->uri->segment(3) == 'create') {
                                        echo "is-active";
                                    } ?>" href="<?php echo base_url('app/user_invoice_history') ?>">
            <span class="c-sidebar__icon">
                <i class="fa fa-history"></i>
            </span>History Bayar
        </a>
    </li>

    <li class="c-sidebar__item">
        <a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'setting_payment' or $this->uri->segment(2) == 'setting_payment' and $this->uri->segment(3) == 'create') {
                                        echo "is-active";
                                    } ?>" href="<?php echo base_url('app/setting_payment') ?>">
            <span class="c-sidebar__icon">
                <i class="fa fa-credit-card"></i>
            </span>Payment
        </a>
    </li>
    <li class="c-sidebar__item">
        <a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'user_forum' or $this->uri->segment(2) == 'user_forum' and $this->uri->segment(3) == 'create') {
                                        echo "is-active";
                                    } ?>" href="<?php echo base_url('app/user_forum') ?>">
            <span class="c-sidebar__icon">
                <i class="fa fa-question"></i>
            </span>Forum
        </a>
    </li>

    <li class="c-sidebar__item">
        <a class="c-sidebar__link <?php if ($this->uri->segment(2) == 'user_submisi' or $this->uri->segment(2) == 'user_submisi' and $this->uri->segment(3) == 'create') {
                                        echo "is-active";
                                    } ?>" href="<?php echo base_url('app/user_submisi') ?>">
            <span class="c-sidebar__icon">
                <i class="fa fa-paper-plane"></i>
            </span>Submisi
        </a>
    </li>
<?php endif ?>
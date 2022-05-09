            <div class="col-md-12 page-sidebar none-padding">
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" <?php if($view == 'Dashboard'){ ?>class="active"<?php } ?>><a href="/Candidate/Dashboard" title=""><i class="fa fa-dashboard"></i> Dashboard</a></li>
                    <li role="presentation" <?php if($view == 'Profile'){ ?>class="active"<?php } ?>><a href="/Candidate/Profile" title=""><i class="fa fa-bars"></i> Profil</a></li>
                    <li role="presentation" <?php if($view == 'Payroll'){ ?>class="active"<?php } ?>><a href="/Candidate/Payroll" title=""><i class="fa fa-money"></i> Lohnabrechnungen</a></li>
                    <li role="presentation" <?php if($view == 'ChangePassword'){ ?>class="active"<?php } ?>><a href="/Candidate/ChangePassword" title=""><i class="fa fa-key"></i> Passwort ändern</a></li>
                </ul>
            </div>
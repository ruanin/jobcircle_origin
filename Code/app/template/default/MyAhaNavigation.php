<nav class="navbar navbar-profile">
    <ul class="nav navbar-nav">
        <li><a href="/Candidate/Dashboard" id="dashboard" title=""
               <?php if ($view == 'Dashboard') { ?>class="active"<?php } ?>><i class="fa fa-dashboard"></i>
                Dashboard</a></li>
        <li><a href="/Candidate/Profile" id="profile" title=""
               <?php if ($view == 'Profile') { ?>class="active"<?php } ?>><i class="fa fa-bars"></i> Persönliche Angaben</a>
        </li>
        <li><a href="/Candidate/Profile" id="affiliate" title=""
               <?php if ($view == 'Affiliate') { ?>class="active"<?php } ?>><i class="fa fa-bars"></i> Weiterempfehlungen</a>
        </li>
        <li><a href="/Candidate/Payroll" id="payroll" title=""
               <?php if ($view == 'Payroll') { ?>class="active"<?php } ?>><i class="fa fa-money"></i>
                Lohnabrechnungen</a></li>
        <li><a href="/Candidate/ChangePassword" id="changepassword" title=""
               <?php if ($view == 'ChangePassword') { ?>class="active"<?php } ?>><i class="fa fa-key"></i> Passwort
                ändern</a></li>
    </ul>
</nav>
<?php
include 'header.php';
$data['title'] = 'Jobmail abonnieren';
$classContact = 'active';
$breadcrumb[] = array('title' => 'Jobmail',
    'url' => '/Newsletter',
    'active' => true);

include 'navigation.php';
?>
<style type="text/css">
    .social-icon i.fa
    {
        display             : inline-block;      
        cursor              : pointer;
        margin              : 0px;
        text-align          : center;
        position            : relative;
        z-index             : 1;
        color               : #000000;
        overflow            : hidden;
        border-radius       : 1px;
        -webkit-transition  : all 0.5s;
        -moz-transition     : all 0.5s;
        transition          : all 0.5s;
        -webkit-transform: translateZ(0);
    }

    .social-icon i.fa::before
    {
        border-radius            : 2px;
        speak                    : none;
        display                  : block;
        -webkit-font-smoothing   : antialiased;
    }

    .social-icon i.fa::after
    {
        pointer-events  : none;
        position        : absolute;
        width           : 100%;
        height          : 100%;
        content         : '';
        display         : none;
        box-sizing      : content-box;
    }


    .social-icon i.fa:hover
    {
        background : #F60A0D;
        color      : #ffffff !important;
    }

    .social-icon i.fa:hover::before
    {
        -webkit-animation: toRightFromLeft 0.3s forwards;
        -moz-animation: toRightFromLeft 0.3s forwards;
        animation: toRightFromLeft 0.3s forwards;
    }    
</style>


<div class="container mt-15">
    <div class="row">
        <div class="col-md-12">
            <div class="contact-input-form box-wrapper mt-15 sm-mrgright-15 xs-mrgright-15">

                <div class="contact">
                    <dl class="contact-address dl-horizontal"></dl>

                    <h2>Jobmail Auswahlkriterien</h2>

                    <div class="contact-form">
                        <form id="contactForm" action="/Department/Detail/<?= $data['department']['customer_department_id'] ?>" class="form-validate" method="post">
                            <input type="hidden" name="task" value="sendcontact">
                            <fieldset>
                                <?php if (!empty($data['error'])) {
                                    ?>  
                                    <div class="alert alert-danger" id="contactError">
                                        <strong>Error!</strong> <?= $data['error'] ?>
                                    </div>                 
                                    <?php
                                }
                                ?>  

                                <?php if (!empty($data['success'])) {
                                    ?>  

                                    <div class="alert alert-success" id="contactSuccess">
    <?= $data['success'] ?>
                                        <p>Wir werden uns so schnell wie möglich mit Ihnen in Verbindung setzen und Ihre Anfrage beantworten.</p>
                                    </div>                
                                    <?php
                                } else {
                                    ?>  
                                    <p class="required-field">Alle Felder werden benötigt.</p>




                                    <div class="control-group col-md-12">
                                        <div class="row">
                                            <div class="control-contact col-md-6 col-xs-12">
                                                <div class="contact-label">
                                                    <label class="required">
                                                        Name<span class="star">&nbsp;*</span>
                                                    </label>

                                                    <input id="name" name="name" value="<?= $data['input']['name'] ?>" required="" size="30" type="text" value="" />
                                                </div>
                                            </div>

                                            <div class="control-contact col-md-6 col-xs-12">
                                                <div class="contact-label">
                                                    <label class="required" >
                                                        E-Mail<span class="star">&nbsp;*</span>
                                                    </label>

                                                    <input id="email" name="email" value="<?= $data['input']['email'] ?>" size="30" required="Email" type="email" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="contact-label">
                                            <label class="required">
                                                Betreff<span class="star">&nbsp;*</span>
                                            </label> 

                                            <input id="subject" size="60" name="subject" value="<?= $data['input']['subject'] ?>" required="Subject" type="text">
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <div class="contact-message">
                                            <label class="required">
                                                Nachricht<span class="star">&nbsp;*</span>
                                            </label> 

                                            <textarea id="message" cols="50" name="message" required="" rows="10"><?= $data['input']['message'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="contact-form-submit">
                                        <button class="btn btn-primary validate subbtn" type="submit">E-Mail senden</button>
                                    </div>
                                    <?php
                                }
                                ?>  
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>                          
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
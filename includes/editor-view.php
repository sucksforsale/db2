<!-- Editor output -->
	<section class="auth-info">Logged in as <?php echo $config['editor_login_email']; ?></section>

    <section class="settings" id="settings">
        <ul class="tab-nav" id="tab-nav">
            <li><span aria-hidden="true" class="li_world"></span> &nbsp; Domains</li>
            <li><span aria-hidden="true" class="li_mail"></span> &nbsp; Email</li>
            <li><span aria-hidden="true" class="li_bubble"></span> &nbsp; Footer</li>
            <li><span aria-hidden="true" class="li_photo"></span> &nbsp; Background</li>
        </ul>
        <form action="?" method="post" id="editor-form">
            <ul class="tab-content" id="tab-content">
                <!-- Domains -->
                <li>
                    <div class="fields">
                        <div class="fields-column fields-column-70">
                            <div class="field-wrapper">
                                <div id="domain_portfolio">
                                    <table class="domain-portfolio-table">
                                        <thead>
                                            <tr>
                                                <th>Domain</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach( $domains as $domain => $arr ): ?>
                                                <tr>
                                                    <td><input type="text" name="portfolio_domain[]" class="text-field" value="<?php echo $domain; ?>"></td>
                                                    <td><input type="text" name="portfolio_price[]" class="text-field" value="<?php echo $arr['price']; ?>"></td>
                                                    <td><input type="text" name="portfolio_description[]" class="text-field" value="<?php echo $arr['description']; ?>"></td>
                                                    <td><button class="editor-btn small-btn delete-btn">&times;</button></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                    <button class="editor-btn small-btn add-domain-btn">+ &nbsp; Add Domain</button>
                                </div>
                            </div>
                        </div>
                        <div class="fields-column fields-column-30">
                            <p><strong>Notes:</strong> when entering the domain, leave out the "http://". Price and Description fields are optional.</p>
                            <div class="field-wrapper long">
                                <input 
                                    type="checkbox" 
                                    name="enable_domain_portfolio"
                                    id="enable_domain_portfolio" 
                                    class="checkbox-field"
                                    <?php if ($config['enable_domain_portfolio']): ?>
                                        checked="checked"
                                    <?php endif; ?>
                                >
                                <label for="enable_domain_portfolio">Domain Portfolio</label>
                            </div>
                            <p style="display:none" class="domain-portfolio-note">
                                <strong>Note:</strong> enabling/disabling the domain portfolio requires you to refresh the page before seeing the change. Save first, though!
                            </p>
                        </div>
                    </div>
                </li>
                <!-- Email -->
                <li>
                    <div class="fields">
                        <div class="fields-column">
                            <div class="field-wrapper">
                                <label for="recipient_name">Recipient Name</label>
                                <input 
                                    type="text" 
                                    name="recipient_name"
                                    id="recipient_name" 
                                    class="text-field"

                                    value="<?php echo $config['recipient_name']; ?>"
                                >
                            </div>
                            <div class="field-wrapper">
                                <label for="recipient_email">Recipient Email</label>
                                <input 
                                    type="email" 
                                    name="recipient_email"
                                    id="recipient_email" 
                                    class="email-field"

                                    value="<?php echo $config['recipient_email']; ?>"
                                >
                            </div>
                            <p><strong>Note:</strong> to help make sure emails sent from the contact form don't arrive in your spam folder, edit the SMTP settings in the includes/config.php file directly.</p>
                        </div>
                        <div class="fields-column">
                            <div class="field-wrapper long">
                                <input 
                                    type="checkbox" 
                                    name="enable_recaptcha"
                                    id="enable_recaptcha" 
                                    class="checkbox-field"
                                    <?php if ($config['enable_recaptcha']): ?>
                                        checked="checked"
                                    <?php endif; ?>
                                >
                                <label for="enable_recaptcha">reCAPTCHA spam protection</label>
                            </div>
                            <p style="display:none" class="recaptcha-note">
                                <strong>Note:</strong> enabling/disabling reCAPTCHA requires you to refresh the page before seeing the change. Save first, though!
                            </p>
                            <div class="field-wrapper">
                                <label for="recaptcha_public_key">reCAPTCHA Public Key</label>
                                <input 
                                    type="text" 
                                    name="recaptcha_public_key"
                                    id="recaptcha_public_key" 
                                    class="text-field"

                                    value="<?php echo $config['recaptcha_public_key']; ?>"
                                >
                            </div>
                            <div class="field-wrapper">
                                <label for="recaptcha_private_key">reCAPTCHA Private Key</label>
                                <input 
                                    type="text" 
                                    name="recaptcha_private_key"
                                    id="recaptcha_private_key" 
                                    class="text-field"

                                    value="<?php echo $config['recaptcha_private_key']; ?>"
                                >
                            </div>
                        </div><!-- /fields-column -->
                    </div><!-- /fields -->
                </li>
                <!-- Footer -->
                <li>
                    <div class="fields">
                        <div class="field-wrapper">
                            <label for="email">Email</label>
                            <input 
                                type="email" 
                                name="email"
                                id="email_address" 
                                class="email-field"
                                value="<?php 
                                    if( $config['email'] == 'false' ) {
                                        $config['email'] = '';
                                    }
                                    echo $config['email']; 
                                ?>"
                            >
                        </div>
                        <div class="field-wrapper">
                            <label for="phone">Phone</label>
                            <input 
                                type="text" 
                                name="phone"
                                id="phone" 
                                class="text-field"
                                value="<?php echo $config['phone']; ?>"
                            >
                        </div>
                        <div class="field-wrapper">
                            <label for="twitter_handle">Twitter Handle</label>
                            <input 
                                type="text" 
                                name="twitter_handle"
                                id="twitter_handle" 
                                class="text-field"
                                value="<?php echo $config['twitter_handle']; ?>"
                            >
                        </div>
                    </div>
                </li>
                <!-- Background -->
                <li>
                    <div class="fields">
                        <div class="field-wrapper long">
                            <label for="tint">Tint</label>
                            <input 
                                type="color" 
                                name="tint"
                                id="tint" 
                                class="color-field"
                                value="<?php echo $config['tint']; ?>"
                            >
                        </div>
                        <div class="field-wrapper long">
                            <label>Image</label>
                            <br>
                            <label>
                                <input 
                                    type="radio"
                                    name="image"
                                    value=""
                                    class="radio-input"
                                    <?php if( $config['image'] == ''): ?>
                                        checked="checked"
                                    <?php endif; ?>
                                >
                                <div class="thumb-wrapper scale">
                                    <img src="http://placehold.it/100/333333/cccccc?text=None" alt="">
                                </div>
                            </label>
                            <?php foreach( $backgrounds as $bg ) : ?>
                                <label>
                                    <input 
                                        type="radio"
                                        name="image"
                                        value="<?php echo $bg; ?>"
                                        class="radio-input"
                                        <?php if( $config['image'] == $bg): ?>
                                            checked="checked"
                                        <?php endif; ?>   
                                    >
                                    <div class="thumb-wrapper scale">
                                        <img src="assets/images/bg-<?php echo $bg; ?>.jpg" alt="">
                                    </div>
                                </label>
                            <?php endforeach; ?>
                        </div>
                        <div class="field-wrapper long">
                            <label>Texture</label>
                            <br>
                            <label>
                                <input 
                                    type="radio"
                                    name="texture"
                                    value=""
                                    class="radio-input"
                                    <?php if( $config['texture'] == ''): ?>
                                        checked="checked"
                                    <?php endif; ?>
                                >
                                <div class="thumb-wrapper scale">
                                    <img src="http://placehold.it/100/333333/cccccc?text=None" alt="">
                                </div>
                            </label>
                            <?php foreach( $textures as $tex ) : ?>
                                <label>
                                    <input 
                                        type="radio"
                                        name="texture"
                                        value="<?php echo $tex; ?>"
                                        class="radio-input"
                                        <?php if( $config['texture'] == $tex): ?>
                                            checked="checked"
                                        <?php endif; ?>                                        
                                    >
                                    <div class="thumb-wrapper">
                                        <img src="assets/images/texture-<?php echo $tex; ?>.png" alt="">
                                    </div>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div><!-- /fields -->
                </li>
            </ul>
        </form>
        <div class="settings-btn-wrap">
            <button id="settings-btn" class="editor-btn settings-btn">
                <span aria-hidden="true" class="li_settings"></span> &nbsp; settings
            </button>
            <button id="save-btn" class="editor-btn save-btn">
                <span class="regular">save</span>
                <span style="display:none" class="saving">saving &nbsp; &nbsp; &nbsp; </span>
                <span class="error"><ul></ul></span>
            </button>
        </div>
    </section>
    <!-- Templates -->
    <table id="domain_portfolio_row_template" style="display:none">
        <tr>
            <td><input type="text" name="portfolio_domain[]" class="text-field"></td>
            <td><input type="text" name="portfolio_price[]" class="text-field"></td>
            <td><input type="text" name="portfolio_description[]" class="text-field"></td>
            <td><button class="editor-btn small-btn delete-btn">&times;</button></td>
        </tr>
    </table>
    <!-- End Templates -->
    <script src="assets/js/editor.js"></script>
<!-- end Editor output -->
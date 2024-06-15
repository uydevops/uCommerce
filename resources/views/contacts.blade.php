@include('layouts.header')
<div class="contact-main-page">
    <div class="container">
        <div id="google-map"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                <div class="contact-page-side-content">
                    <h3 class="contact-page-title">İletişim</h3>
                    <p class="contact-page-message">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human.</p>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-fax"></i> Adres</h4>
                        <p>123 Ana Cadde, Herhangi Şehir, CA 12345 – ABD</p>
                    </div>
                    <div class="single-contact-block">
                        <h4><i class="fa fa-phone"></i> Telefon</h4>
                        <p>Mobil: (08) 123 456 789</p>
                        <p>Çağrı Merkezi: 1009 678 456</p>
                    </div>
                    <div class="single-contact-block last-child">
                        <h4><i class="fa fa-envelope-o"></i> E-posta</h4>
                        <p>yourmail@domain.com</p>
                        <p>destek@hastech.company</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                <div class="contact-form-content">
                    <h3 class="contact-page-title">Mesajınızı İletin</h3>
                    <div class="contact-form">
                        <form id="contact-form" action="https://whizthemes.com/mail-php/mamunur/hiraola/hiraola.php">
                            <div class="form-group">
                                <label>Adınız <span class="required">*</span></label>
                                <input type="text" name="con_name" required>
                            </div>
                            <div class="form-group">
                                <label>E-posta Adresiniz <span class="required">*</span></label>
                                <input type="email" name="con_email" required>
                            </div>
                            <div class="form-group">
                                <label>Konu</label>
                                <input type="text" name="con_subject">
                            </div>
                            <div class="form-group form-group-2">
                                <label>Mesajınız</label>
                                <textarea name="con_message"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" value="submit" id="submit" class="hiraola-contact-form_btn" name="submit">Gönder</button>
                            </div>
                        </form>
                        <p class="form-message mt-3 mb-0"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footer')

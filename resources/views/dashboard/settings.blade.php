@include('dashboard.partials.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Sistem Ayarları</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Analiz</a></li>
                                <li class="breadcrumb-item active">Sistem Ayarları</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sistem Ayarları</h5>
                            <p class="card-title-desc">Sistem ayarlarını buradan düzenleyebilirsiniz.</p>

                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <form action="{{ route('general-settings.update') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="site_name">Site Adı</label>
                                    <input type="text" class="form-control" id="site_name" name="site_name"
                                        value="{{ $settings->site_name }}">
                                </div>
                                <div class="form-group">
                                    <label for="address">Adres</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="{{ $settings->address }}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Telefon</label>
                                    <input type="text" class="form-control" id="phone" name="phone"
                                        value="{{ $settings->phone }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ $settings->email }}">
                                </div>

                                <div class="form-group">
                                    <label for="logo">Logo <i class="mdi mdi-information text-primary"
                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                            title="Önerilen boyut: 200x50"></i></label>
                                    <input type="file" class="form-control" id="logo" name="logo"
                                        onchange="previewImage('logo')">
                                    <img id="logo-preview" src="{{ asset('images/' . $settings->logo) }}" alt="Logo"
                                        class="img-thumbnail mt-2" style="max-width: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="footer_logo">Footer Logosu</label>
                                    <input type="file" class="form-control" id="footer_logo" name="footer_logo"
                                        onchange="previewImage('footer_logo')">
                                    <img id="footer_logo-preview" src="{{ asset('images/' . $settings->footer_logo) }}"
                                        alt="Footer Logosu" class="img-thumbnail mt-2" style="max-width: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="about_image">Hakkımızda Fotoğrafı</label>
                                    <input type="file" class="form-control" id="about_image" name="about_image"
                                        onchange="previewImage('about_image')">
                                    <img id="about_image-preview" src="{{ asset('images/' . $settings->about_image) }}"
                                        alt="Hakkımızda Fotoğrafı" class="img-thumbnail mt-2" style="max-width: 200px;">
                                </div>
                                <div class="form-group">
                                    <label for="footer_about">Footer Hakkında</label>
                                    <textarea class="form-control" id="footer_about" name="footer_about" rows="3">{{ $settings->footer_about }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="about_text">Hakkımızda</label>
                                    <textarea class="form-control" id="about_text" name="about_text" rows="3">{{ $settings->about_text }}</textarea>
                                </div>
                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-primary">Güncelle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- right column for social media settings -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sosyal Medya Ayarları</h5>
                            <p class="card-title-desc">Sosyal medya hesaplarınızı buradan yönetebilirsiniz.</p>

                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook"
                                    value="{{ $settings->facebook }}">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter"
                                    value="{{ $settings->twitter }}">
                            </div>
                            <div class="form-group">
                                <label for="instagram">Instagram</label>
                                <input type="text" class="form-control" id="instagram" name="instagram"
                                    value="{{ $settings->instagram }}">
                            </div>
                            <div class="form-group">
                                <label for="linkedin">LinkedIn</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin"
                                    value="{{ $settings->linkedin }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

<style>
    .card-title {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .card-title-desc {
        font-size: 1rem;
        color: #6c757d;
    }
</style>
@include('dashboard.partials.footer')

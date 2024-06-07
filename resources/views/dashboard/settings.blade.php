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

            <!-- start row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Sistem Ayarları</h5>
                            <p class="card-title-desc">Sistem ayarlarını buradan düzenleyebilirsiniz.</p>

                            @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            <form action="{{ route('general-settings.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @foreach ([
                                    ['name' => 'site_name', 'label' => 'Site Adı'],
                                    ['name' => 'address', 'label' => 'Adres'],
                                    ['name' => 'phone', 'label' => 'Telefon'],
                                    ['name' => 'email', 'label' => 'Email'],
                                    ['name' => 'facebook', 'label' => 'Facebook'],
                                    ['name' => 'twitter', 'label' => 'Twitter'],
                                    ['name' => 'instagram', 'label' => 'Instagram'],
                                    ['name' => 'linkedin', 'label' => 'LinkedIn']
                                ] as $field)
                                    <div class="form-group">
                                        <label for="{{ $field['name'] }}">{{ $field['label'] }}</label>
                                        <input type="text" class="form-control" id="{{ $field['name'] }}" name="{{ $field['name'] }}" value="{{ $settings->{$field['name']} }}">
                                    </div>
                                @endforeach

                                @foreach ([
                                    ['name' => 'logo', 'label' => 'Logo', 'tooltip' => 'Önerilen boyut: 200x50'],
                                    ['name' => 'footer_logo', 'label' => 'Footer Logosu']
                                ] as $image)
                                    <div class="form-group">
                                        <label for="{{ $image['name'] }}">{{ $image['label'] }} <i class="mdi mdi-information text-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ $image['tooltip'] ?? '' }}"></i></label>
                                        <input type="file" class="form-control" id="{{ $image['name'] }}" name="{{ $image['name'] }}" onchange="previewImage('{{ $image['name'] }}')">
                                        <img id="{{ $image['name'] }}-preview" src="{{ asset('images/' . $settings->{$image['name']} ) }}" alt="{{ $image['label'] }}" class="img-thumbnail mt-2" style="max-width: 200px;">
                                    </div>
                                @endforeach

                                <div class="form-group">
                                    <label for="footer_about">Footer Hakkında</label>
                                    <textarea class="form-control" id="footer_about" name="footer_about" rows="3">{{ $settings->footer_about }}</textarea>
                                </div>

                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">Güncelle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

<style>
    .card-title { font-size: 1.25rem; font-weight: 600; }
    .card-title-desc { font-size: 1rem; color: #6c757d; }
</style>
@include('dashboard.partials.footer')

<script>
    function previewImage(inputId) {
        var input = document.getElementById(inputId);
        var preview = document.getElementById(inputId + '-preview');
        var reader = new FileReader();

        reader.onload = function (e) {
            preview.src = e.target.result;
        };

        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

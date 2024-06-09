@include('dashboard.partials.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <h4 class="mb-0 font-size-18">Reklam Ayarları</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Analiz</a></li>
                                <li class="breadcrumb-item active">Reklam Ayarları</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- start row -->
            <div class="row">
                <!-- Reklam Ekleme Formu -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Reklam Ayarları</h5>
                            <p class="card-title-desc">Reklam ayarlarını buradan düzenleyebilirsiniz.</p>
                            <form action="{{ route('ads.add') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <h6>Slider Reklam Ayarları</h6>
                                <div class="form-group mb-3">
                                    <label for="slider_title">Başlık</label>
                                    <input type="text" class="form-control" id="slider_title" name="slider_title" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="slider_description">Açıklama</label>
                                    <textarea class="form-control" id="slider_description" name="slider_description" rows="4" required></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="slider_image">Slider Resmi(1110x520)</label>
                                    <input type="file" class="form-control" id="slider_image" name="slider_image" onchange="previewImage('slider_image')">
                                    <img id="slider_image-preview" src="" alt="Slider Resmi" class="img-thumbnail mt-2" style="max-width: 200px;">
                                </div>
                                <hr>
                                <!-- Küçük Banner Reklam Ayarları -->
                                <h6>Kategori Banner Reklam Ayarları</h6>
                                <div class="form-group mb-3">
                                    <label for="small_banner_title">Başlık</label>
                                    <input type="text" class="form-control" id="small_banner_title" name="small_banner_title" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="small_banner_description">Açıklama</label>
                                    <textarea class="form-control" id="small_banner_description" name="small_banner_description" rows="4" required></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="small_banner_image">Küçük Banner Resmi(575x200)</label>
                                    <input type="file" class="form-control" id="small_banner_image" name="small_banner_image" onchange="previewImage('small_banner_image')">
                                    <img id="small_banner_image-preview" src="" alt="Küçük Banner Resmi" class="img-thumbnail mt-2" style="max-width: 200px;">
                                </div>
                                <hr>
                                <!-- Orta Banner Reklam Ayarları -->
                                <h6>Orta Banner Reklam Ayarları</h6>
                                <div class="form-group mb-3">
                                    <label for="medium_banner_title">Başlık</label>
                                    <input type="text" class="form-control" id="medium_banner_title" name="medium_banner_title" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="medium_banner_description">Açıklama</label>
                                    <textarea class="form-control" id="medium_banner_description" name="medium_banner_description" rows="4" required></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="medium_banner_image">Orta Banner Resmi(1110x345)</label>
                                    <input type="file" class="form-control" id="medium_banner_image" name="medium_banner_image" onchange="previewImage('medium_banner_image')">
                                    <img id="medium_banner_image-preview" src="" alt="Orta Banner Resmi" class="img-thumbnail mt-2" style="max-width: 200px;">
                                </div>
                                <div class="form-group mb-0">
                                    <button type="submit" class="btn btn-primary">Kaydet</button>
                                </div>
                            </form>
                            <!-- Reklam Ayarları Formu Sonu -->
                        </div>
                    </div>
                </div>
                <!-- Reklam Listeleme -->
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Mevcut Reklamlar</h5>
                            <p class="card-title-desc">Mevcut reklamları burada görebilirsiniz.</p>
                            <!-- Reklamları Listeleme -->
                            @if($ads->isEmpty())
                                <p>Henüz reklam eklenmemiş.</p>
                            @else
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Başlık</th>
                                            <th>Açıklama</th>
                                            <th>Resim</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ads as $ad)
                                            <tr>
                                                <td>{{ $ad->id }}</td>
                                                <td>{{ $ad->slider_title }}</td>
                                                <td>{{ $ad->slider_description }}</td>
                                                <td>
                                                    <img src="{{ asset('images/' . $ad->slider_image) }}" alt="{{ $ad->slider_title }}" class="img-thumbnail" style="max-width: 100px;">
                                                </td>
                                                <td>
                                                    <a href="{{ route('ads.delete', $ad->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Reklamı silmek istediğinize emin misiniz?')">Sil</a>
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editAdModal{{ $ad->id }}">Düzenle</button>
                                                </td>
                                            </tr>
                                            @include('dashboard.partials.module.ad_settings_edit' , ['ads' => $ads])
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div> <!-- container-fluid -->
    </div> <!-- page-content -->
</div> <!-- main-content -->

@include('dashboard.partials.footer')

<script>
function previewImage(inputId) {
    const input = document.getElementById(inputId);
    const preview = document.getElementById(inputId + '-preview');
    const file = input.files[0];
    const reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
    };

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = "";
    }
}
</script>
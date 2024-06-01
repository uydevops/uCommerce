@include('dashboard.partials.header')
@include('dashboard.partials.module.categories_add_modal')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href={{route('categories')}}>Ürün Kategorileri</a></li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Ürün Kategorileri</h5>
                            <p class="card-title-desc">
                                Sistemde kayıtlı olan ürün kategorilerinin listesi aşağıda yer almaktadır.
                            </p>
                            <div class="row mb-4 justify-content-end">
                                <div class="col-sm-4 text-end">
                                    <button class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="fas fa-plus"></i> Yeni Ürün Kategorisi Ekle</button>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-striped table-bordered w-100">
                                    <thead>
                                        <tr>
                                            <th>Resim</th>
                                            <th>Kategori Adı</th>
                                            <th>Kategori Açıklaması</th>
                                            <th>Kategori Durumu</th>
                                            <th>İşlemler</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($categories as $category)
                                        <tr>
                                            <td><img src="{{asset('images/'.$category->image)}}" alt="" width="50"></td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>
                                                @if($category->visible == 1)
                                                <span class="badge bg-success">Aktif</span>
                                                @else
                                                <span class="badge bg-danger">Pasif</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editCategoryModal{{ $category->id }}"><i class="fas fa-edit"></i> </a>
                                                <a href="{{ route('categories.delete', $category->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> </a>
                                                @include('dashboard.partials.module.categories_edit_modal', ['category' => $category])
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
            @include('dashboard.partials.footer')
            @include('dashboard.partials.datatable')
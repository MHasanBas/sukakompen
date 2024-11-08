@extends('layouts.template')

@section('content')

<!-- Hero Section -->
<div class="hero">
    <h1>Tugas</h1>
</div>

<!-- Search Bar -->
<div class="search-bars">
    <div class="filter">
        <i class="fas fa-filter"></i>
        <select>
            <option>Search by Level</option>
        </select>
    </div>
    <div class="search-input">
        <input type="text" placeholder="Search by Name" />
    </div>
</div>

<!-- Tabs and Add Task Button -->
<div class="content">
    <div class="tabs">
        <button class="tab active" onclick="showTab('admin')">Admin</button>
        <button class="tab" onclick="showTab('dosen')">Dosen/Tendik</button>
    </div>
    
    <!-- Tombol "Tambah Tugas" -->
    <button onclick="modalAction('{{ url('/tugas/create_ajax') }}')" class="add-task">Tambah Tugas</button>

    <!-- Recommended Tasks Section -->
    <section class="recommended-tasks">
        <h2>Tugas Kompen</h2>

        <!-- Admin Tab Content -->
        <div id="admin" class="tab-content active">
            <div class="task-grid">
                @for ($i = 0; $i < 8; $i++)
                    <div class="task-card">
                        <div class="card-header">
                            <span class="task-category">Admin Task</span>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('img/card.png') }}" alt="Tugas" class="task-image">
                            <h3>Arsip Absensi</h3>
                            <p>Mengarsip ketidakhadiran dalam satu jam untuk menghindari denda di satu jurusan.</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn">Kerjakan</a>
                        </div>
                    </div>
                @endfor
            </div>
        </div>

        <!-- Dosen/Tendik Tab Content -->
        <div id="dosen" class="tab-content">
            <div class="task-grid">
                @for ($i = 0; $i < 8; $i++)
                    <div class="task-card">
                        <div class="card-header">
                            <span class="task-category">Dosen/Tendik Task</span>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('img/card.png') }}" alt="Tugas" class="task-image">
                            <h3>Review Absensi</h3>
                            <p>Memeriksa dan mengkonfirmasi absensi mahasiswa untuk menghindari denda.</p>
                        </div>
                        <div class="card-footer">
                            <a class="btn">Kerjakan</a>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
</div>

<div id="myModal" class="modal fade animate shake" tabindex="-1" data-backdrop="static" data-keyboard="false" data-width="75%"></div>

@endsection

@push('js')
    <script>
        function modalAction(url = '') {
            $('#myModal').load(url, function() {
                $('#myModal').modal('show');
            });
        }
    </script>
@endpush

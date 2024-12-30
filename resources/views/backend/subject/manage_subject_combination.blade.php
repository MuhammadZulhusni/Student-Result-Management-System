@extends('admin.admin_dashboard')
@section('admin')

<!-- Start Page Title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Manage Subjects Combination</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Manage</a></li>
                    <li class="breadcrumb-item active">Combination</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title -->

<div class="card shadow-lg rounded">
    <div class="card-body">
        <h4 class="card-title mb-3">View Subjects Combination Info</h4>

        <!-- Subjects Table -->
        <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped rounded overflow-hidden" style="width: 100%;">
            <thead class="bg-light">
                <tr>
                    <!-- Table Headers -->
                    <th class="px-3 py-2 text-left text-sm font-medium text-gray-700">#</th>
                    <th class="px-3 py-2 text-left text-sm font-medium text-gray-700">Class & Section</th>
                    <th class="px-3 py-2 text-left text-sm font-medium text-gray-700">Subject</th>
                    <th class="px-3 py-2 text-left text-sm font-medium text-gray-700">Status</th>
                    <th class="px-3 py-2 text-center text-sm font-medium text-gray-700">Action</th>
                </tr>
            </thead>

            <tbody>
            @foreach($results as $key => $result)  <!-- Loop through each subject combination -->
            <tr class="border-b">
                <td class="px-3 py-2 text-sm font-medium text-gray-900">{{ $key + 1 }}</td>  
                <td class="px-3 py-2 text-sm text-gray-700">
                    {{ $result->class_name }} | Section {{ $result->section }}  <!-- Displays the class name and section dynamically from the database -->
                </td>
                <td class="px-3 py-2 text-sm text-gray-700">
                    {{ $result->subject_name }}  <!-- Displays the subject name dynamically from the database -->
                </td>
                <td class="px-3 py-2 text-sm text-gray-700">
                    @if($result->status == 1) 
                        <span class="badge bg-success text-white">Active</span>  <!-- Displays 'Active' with a green badge if status is 1 -->
                    @else
                        <span class="badge bg-danger text-white">Inactive</span> <!-- Displays 'Inactive' with a red badge if status is not 1 -->
                    @endif
                </td>

                <td class="px-3 py-2 text-center">
                    <!-- Edit button with icon -->
                    <a href="{{ route('edit.subject', $result->id) }}" 
                        class="btn btn-sm btn-primary transform transition-all duration-300 hover:scale-110 flex items-center justify-center p-2 rounded-full shadow-lg hover:bg-blue-600">
                        <img src="https://cdn-icons-png.flaticon.com/128/18606/18606173.png" alt="Check" style="width: 22px; height: 22px;" /> 
                    </a>
                </td>
            </tr>

            @endforeach
            </tbody>
        </table>
        <!-- End Subjects Table -->
    </div>
</div>

@endsection

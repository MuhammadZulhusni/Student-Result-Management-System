@extends('admin.admin_dashboard')
@section('admin')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Manage Results</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Manage</a></li>
                    <li class="breadcrumb-item active">Results</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">View Results Info</h4>

        <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped shadow-md rounded-lg overflow-hidden" style="width: 100%;">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Photo</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Student Name</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Roll ID</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Class</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Declared Date</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-700">Action</th>
            </tr>
            </thead>

            <tbody>
                @foreach($results as $key => $result)  <!-- Loop through each result in the 'results' collection -->
                    <tr class="border-b">
                        <td class="px-6 py-4 text-sm font-medium text-gray-900 text-center">
                            <img class="rounded-circle header-profile-user" src="{{ empty($result->student->photo)? asset('uploads/no_image.png') : asset('uploads/student_photos/' .$result->student->photo) }}" alt="Header Avatar" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $result->student->name ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $result->student->roll_id ?? 'N/A' }}</td>
                        <td class="px-6 py-4 text-sm text-gray-700">{{ $result->student->class->class_name ?? 'N/A' }}</td> 
                        <td class="px-6 py-4 text-sm text-gray-700">{{ \Carbon\Carbon::parse($result->created_at)->format('F j, Y') }}</td>  <!-- Formats the created_at timestamp using Carbon to display it as "Month Day, Year" (e.g., March 12, 2025) -->
                        <!-- Action buttons -->
                        <td class="px-6 py-4 text-center">
                        @if ($result->student)
                            <a href="{{ route('edit.result', $result->student->id) }}" class="btn btn-sm btn-primary me-2 transform transition-all duration-300 hover:scale-110"> 
                                <img src="https://cdn-icons-png.flaticon.com/128/2040/2040995.png" alt="Edit" style="width: 20px; height: 20px;"/>
                            </a>
                            <a href="{{ route('delete.result', $result->student->id) }}" id="delete" class="btn btn-sm btn-danger transform transition-all duration-300 hover:scale-110">
                                <img src="https://cdn-icons-png.flaticon.com/128/8134/8134408.png" alt="Trash" style="width: 20px; height: 20px;"/>
                            </a>
                            @else
                                <span class="text-red-500">No student data</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

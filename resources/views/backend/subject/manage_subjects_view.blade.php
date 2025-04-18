@extends('admin.admin_dashboard')
@section('admin')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Manage Subjects</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Manage</a></li>
                    <li class="breadcrumb-item active">Subjects</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-body">
        <h4 class="card-title mb-3">View Subjects Info</h4>

        <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped shadow-md rounded-lg overflow-hidden" style="width: 100%;">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">#</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Subject Name</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Subject Code</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Creation Date</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Updated Date</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-700">Action</th>
            </tr>
            </thead>

            <tbody>
            @foreach($subjects as $key => $subject)  <!-- Loop through each class in the 'subjects' collection -->
                <tr class="border-b">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $key+1 }}</td>       <!-- Display the row index (key + 1) -->
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $subject->subject_name }}</td>   <!-- Display the subject name -->
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $subject->subject_code }}</td>   <!-- Display the subject code -->
                    <td class="px-6 py-4 text-sm text-gray-700">{{ \Carbon\Carbon::parse($subject->created_at)->format('F j, Y') }}</td> <!-- Format and display the creation date of the subject -->
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $subject->updated_at->diffForHumans() }}</td>    <!-- Display the subject updated -->
                    <td class="px-6 py-4 text-center">
                        <!-- 
                        Edit button with an icon,
                        -->
                        <a href="{{route('edit.subject', $subject->id)}}" class="btn btn-sm btn-primary me-2 transform transition-all duration-300 hover:scale-110"> 
                            <img src="https://cdn-icons-png.flaticon.com/128/2040/2040995.png" alt="Edit" style="width: 20px; height: 20px;"/>
                        </a>
                        <!-- Delete button -->
                        <a href="{{route('delete.subject', $subject->id)}}" id="delete" class="btn btn-sm btn-danger transform transition-all duration-300 hover:scale-110">
                            <img src="https://cdn-icons-png.flaticon.com/128/8134/8134408.png" alt="Trash" style="width: 20px; height: 20px;"/>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

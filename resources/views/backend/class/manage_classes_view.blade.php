@extends('admin.admin_dashboard')
@section('admin')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Manage Student Classes</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Manage</a></li>
                    <li class="breadcrumb-item active">Classes</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Default Datatable</h4>
        <p class="card-title-desc">DataTables has most features enabled by
            default, so all you need to do to use it with your own tables is to call
            the construction function: <code>$().DataTable();</code>.
        </p>

        <table id="datatable" class="table table-bordered dt-responsive nowrap table-striped shadow-md rounded-lg overflow-hidden" style="width: 100%;">
            <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Name</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Position</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Office</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Age</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Start date</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Salary</th>
            </tr>
            </thead>

            <tbody>
            <tr class="border-b">
                <td class="px-6 py-4 text-sm font-medium text-gray-900">Tiger Nixon</td>
                <td class="px-6 py-4 text-sm text-gray-700">System Architect</td>
                <td class="px-6 py-4 text-sm text-gray-700">Edinburgh</td>
                <td class="px-6 py-4 text-sm text-gray-700">61</td>
                <td class="px-6 py-4 text-sm text-gray-700">2011/04/25</td>
                <td class="px-6 py-4 text-sm text-gray-700">$320,800</td>
            </tr>
            <tr class="border-b">
                <td class="px-6 py-4 text-sm font-medium text-gray-900">Garrett Winters</td>
                <td class="px-6 py-4 text-sm text-gray-700">Accountant</td>
                <td class="px-6 py-4 text-sm text-gray-700">Tokyo</td>
                <td class="px-6 py-4 text-sm text-gray-700">63</td>
                <td class="px-6 py-4 text-sm text-gray-700">2011/07/25</td>
                <td class="px-6 py-4 text-sm text-gray-700">$170,750</td>
            </tr>
            <tr class="border-b">
                <td class="px-6 py-4 text-sm font-medium text-gray-900">Ashton Cox</td>
                <td class="px-6 py-4 text-sm text-gray-700">Junior Technical Author</td>
                <td class="px-6 py-4 text-sm text-gray-700">San Francisco</td>
                <td class="px-6 py-4 text-sm text-gray-700">66</td>
                <td class="px-6 py-4 text-sm text-gray-700">2009/01/12</td>
                <td class="px-6 py-4 text-sm text-gray-700">$86,000</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection

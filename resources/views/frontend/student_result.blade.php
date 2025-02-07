<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
    <link rel="shortcut icon" href="{{asset('https://cdn-icons-png.flaticon.com/128/18416/18416361.png')}}">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-3xl">
        <!-- Header -->
        <div class="text-center mb-6">
            <!-- Icon centered above the title and made larger -->
            <img src="https://cdn-icons-png.flaticon.com/128/2641/2641333.png" alt="Man Icon" class="w-24 h-24 mx-auto mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Student's Result</h1>
        </div>

        <!-- Student Information -->
        <!-- Displays student details including name, roll ID, and class information -->
        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <p class="text-gray-700"><strong>Student Name:</strong> {{ $result[0]->student->name }}</p>
            <p class="text-gray-700"><strong>Roll ID:</strong> {{ $result[0]->student->roll_id }}</p>
            <p class="text-gray-700"><strong>Class:</strong> {{ $result[0]->student->class->class_name }} (Section - {{ $result[0]->student->class->section }})</p>
        </div>

        <!-- Result Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="py-2 px-4 text-left">#</th>
                        <th class="py-2 px-4 text-left">Subjects</th>
                        <th class="py-2 px-4 text-center">Marks</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                <!-- Iterates through the result set and displays each subject's name and marks in a table row -->
                    @foreach ($result as $key => $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-2 px-4">{{ $key+1 }}</td>
                        <td class="py-2 px-4">{{ $item->subject->subject_name }}</td>
                        <td class="py-2 px-4 text-center">{{ $item->marks }}</td>
                    </tr>
                    @endforeach

                    @php
                        $total_mark_obtain = App\Models\Result::where('student_id', $result[0]->student->id)->sum("marks");
                        $overall_marks = (100 * count($result));
                    @endphp

                    <tr class="bg-gray-50">
                        <td colspan="2" class="py-1 px-4 text-right font-semibold">Total Marks</td>
                        <td class="py-1 px-2 text-center font-semibold">{{ $total_mark_obtain }} Out of {{ $overall_marks }}</td>
                    </tr>

                    <tr class="bg-gray-50">
                        <td colspan="2" class="py-1 px-4 text-right font-semibold">Percentage</td>
                        <td class="py-1 px-2 text-center font-semibold">{{ ($total_mark_obtain/$overall_marks) * 100 }}%</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Buttons -->
        <div class="mt-6 flex justify-center space-x-4">
            <button onclick="window.print()" class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300">
                Print Result
            </button>
            <a href="/" class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition duration-300">
                Back to Home
            </a>
        </div>
    </div>

</body>
</html>
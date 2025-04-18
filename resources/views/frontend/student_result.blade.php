<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
    <link rel="shortcut icon" href="{{ asset('https://cdn-icons-png.flaticon.com/128/18416/18416361.png') }}">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-50 flex items-center justify-center min-h-screen p-4">

    <div class="bg-white shadow-2xl rounded-xl p-8 w-full max-w-4xl transform transition-all duration-300 hover:shadow-3xl">
        <!-- Header Section -->
        <div class="text-center mb-8">
            <div class="flex justify-center mb-5">
                <div class="relative">
                    <div class="absolute inset-0 bg-gradient-to-tr from-blue-400 to-purple-500 rounded-full blur-lg opacity-30"></div>
                    <img class="w-36 h-36 rounded-full shadow-xl object-cover border-4 border-white ring-2 ring-blue-100" 
                        src="{{ empty($result[0]->student->photo) ? asset('uploads/no_image.png') : asset('uploads/student_photos/' . $result[0]->student->photo) }}" 
                        alt="Student Photo">
                </div>
            </div>

            <h1 class="text-4xl font-extrabold text-gray-800 mb-2 font-serif">Academic Transcript</h1>
            <div class="flex justify-center items-center space-x-2 text-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                </svg>
                <span class="text-sm font-medium">{{ $result[0]->student->class->class_name }} • Section {{ $result[0]->student->class->section }}</span>
            </div>
        </div>

        <!-- Student Information Card -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-xl mb-8 border border-blue-100">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Student Name</p>
                        <p class="font-semibold">{{ $result[0]->student->name }}</p>
                    </div>
                </div>
                
                <div class="flex items-center space-x-3">
                    <div class="p-2 bg-blue-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Roll Number</p>
                        <p class="font-semibold">{{ $result[0]->student->roll_id }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Result Table -->
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white">
                    <tr>
                        <th class="py-4 px-6 text-left rounded-tl-lg">Subject</th>
                        <th class="py-4 px-6 text-center">Marks</th>
                        <th class="py-4 px-6 text-center">Grade</th>
                        <th class="py-4 px-6 text-center">Grade Value</th>
                        <th class="py-4 px-6 text-center rounded-tr-lg">Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 divide-y divide-gray-200">
                    @php
                        function getGradeDetails($marks) {
                            if ($marks >= 80) return ['A', 4.00, 'Excellent'];
                            if ($marks >= 75) return ['A-', 3.67, 'Excellent'];
                            if ($marks >= 70) return ['B+', 3.33, 'Good'];
                            if ($marks >= 65) return ['B', 3.00, 'Good'];
                            if ($marks >= 60) return ['B-', 2.67, 'Pass'];
                            if ($marks >= 55) return ['C+', 2.33, 'Pass'];
                            if ($marks >= 50) return ['C', 2.00, 'Pass'];
                            if ($marks >= 45) return ['C-', 1.67, 'Fail'];
                            if ($marks >= 40) return ['D', 1.00, 'Fail'];
                            if ($marks >= 35) return ['E', 0.67, 'Fail'];
                            return ['F', 0.00, 'Fail'];
                        }

                        $total_grade_value = 0;
                        $total_subjects = count($result);
                    @endphp

                    @foreach ($result as $key => $item)
                        @php
                            list($grade, $grade_value, $status) = getGradeDetails($item->marks);
                            $total_grade_value += $grade_value;
                            $rowColor = match($status) {
                                'Excellent' => 'bg-green-50',
                                'Good' => 'bg-blue-50',
                                'Pass' => 'bg-yellow-50',
                                default => 'bg-red-50'
                            };
                        @endphp
                        <tr class="{{ $rowColor }} hover:bg-gray-50 transition-colors">
                            <td class="py-3 px-6 font-medium">{{ $item->subject->subject_name }}</td>
                            <td class="py-3 px-6 text-center">{{ $item->marks }}</td>
                            <td class="py-3 px-6 text-center font-semibold">{{ $grade }}</td>
                            <td class="py-3 px-6 text-center">{{ $grade_value }}</td>
                            <td class="py-3 px-6 text-center">
                                <span class="px-3 py-1 rounded-full text-sm 
                                    {{ match($status) {
                                        'Excellent' => 'bg-green-100 text-green-800',
                                        'Good' => 'bg-blue-100 text-blue-800',
                                        'Pass' => 'bg-yellow-100 text-yellow-800',
                                        default => 'bg-red-100 text-red-800'
                                    } }}">
                                    {{ $status }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="bg-gray-50">
                    <tr>
                        <td colspan="3" class="py-4 px-6 font-semibold text-right text-gray-700">CGPA</td>
                        <td colspan="2" class="py-4 px-6 text-center font-bold text-blue-600">
                            {{ number_format($total_grade_value / $total_subjects, 2) }} / 4.00
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Action Buttons -->
        <div class="mt-8 flex flex-col sm:flex-row justify-center gap-4 no-print">
            <button onclick="window.print()" class="px-8 py-3 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white font-semibold rounded-lg shadow-md transition-all transform hover:scale-105 flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M5 4v3H4a2 2 0 00-2 2v3a2 2 0 002 2h1v2a2 2 0 002 2h6a2 2 0 002-2v-2h1a2 2 0 002-2V9a2 2 0 00-2-2h-1V4a2 2 0 00-2-2H7a2 2 0 00-2 2zm8 0H7v3h6V4zm0 8H7v4h6v-4z" clip-rule="evenodd" />
                </svg>
                Print Result
            </button>
            <a href="/" class="px-8 py-3 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white font-semibold rounded-lg shadow-md transition-all transform hover:scale-105 flex items-center justify-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
                </svg>
                Back to Home
            </a>
        </div>
    </div>

</body>
</html>
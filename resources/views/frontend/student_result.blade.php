<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
    <link rel="shortcut icon" href="{{ asset('https://cdn-icons-png.flaticon.com/128/18416/18416361.png') }}">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-3xl">
        <!-- Header -->
        <div class="text-center mb-6">
            <img src="https://cdn-icons-png.flaticon.com/128/2641/2641333.png" alt="Man Icon" class="w-24 h-24 mx-auto mb-4">
            <h1 class="text-3xl font-bold text-gray-800">Student's Result</h1>
        </div>

        <!-- Student Information -->
        <div class="bg-gray-50 p-4 rounded-lg mb-6">
            <p class="text-gray-700"><strong>Student Name:</strong> {{ $result[0]->student->name }}</p>
            <p class="text-gray-700"><strong>Roll ID:</strong> {{ $result[0]->student->roll_id }}</p>
            <p class="text-gray-700"><strong>Program:</strong> {{ $result[0]->student->class->class_name }} (Section - {{ $result[0]->student->class->section }})</p>
        </div>

        <!-- Result Table -->
        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-blue-600 text-white">
                        <th class="py-2 px-4 text-left">#</th>
                        <th class="py-2 px-4 text-left">Subjects</th>
                        <th class="py-2 px-4 text-center">Marks</th>
                        <th class="py-2 px-4 text-center">Grade</th>
                        <th class="py-2 px-4 text-center">Grade Value</th>
                        <th class="py-2 px-4 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
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
                        @endphp
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-2 px-4">{{ $key+1 }}</td>
                            <td class="py-2 px-4">{{ $item->subject->subject_name }}</td>
                            <td class="py-2 px-4 text-center">{{ $item->marks }}</td>
                            <td class="py-2 px-4 text-center">{{ $grade }}</td>
                            <td class="py-2 px-4 text-center">{{ $grade_value }}</td>
                            <td class="py-2 px-4 text-center">{{ $status }}</td>
                        </tr>
                    @endforeach

                    @php
                        $cgpa = $total_grade_value / $total_subjects;
                    @endphp

                    <tr class="bg-gray-50">
                        <td colspan="4" class="py-1 px-4 text-right font-semibold">CGPA</td>
                        <td colspan="2" class="py-1 px-2 text-center font-semibold">{{ number_format($cgpa, 2) }} / 4.00</td>
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

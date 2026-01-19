<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Certificate - Quiz Master</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Outfit', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                }
            }
        }
    </script>
    
    <!-- html2pdf.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <style>
        .certificate-border {
            background-image: url("data:image/svg+xml,%3csvg width='100%25' height='100%25' xmlns='http://www.w3.org/2000/svg'%3e%3crect width='100%25' height='100%25' fill='none' rx='24' ry='24' stroke='%23E5E7EB' stroke-width='4' stroke-dasharray='16%2c 16' stroke-dashoffset='0' stroke-linecap='square'/%3e%3c/svg%3e");
        }
    </style>
</head>

<body class="bg-gray-100 font-sans min-h-screen flex items-center justify-center p-4">

    <!-- Certificate Container -->
    <div id="certificate-content" class="bg-white p-2 shadow-2xl rounded-3xl w-full max-w-4xl relative overflow-hidden">
        
        <!-- Decorative Background (Visible only on screen or if background graphics enabled) -->
        <div class="absolute top-0 left-0 w-32 h-32 bg-blue-100 rounded-br-full opacity-50"></div>
        <div class="absolute bottom-0 right-0 w-32 h-32 bg-yellow-100 rounded-tl-full opacity-50"></div>

        <div class="border-8 border-double border-gray-100 p-8 md:p-12 rounded-2xl relative z-10 text-center certificate-border">
            
            <!-- Logo / Seal -->
            <div class="mb-8">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gradient-to-tr from-blue-600 to-indigo-700 text-white shadow-lg mx-auto mb-4">
                    <i class="fa-solid fa-graduation-cap text-3xl"></i>
                </div>
                <h2 class="text-sm font-bold tracking-[0.2em] text-gray-500 uppercase">Quiz Master Certification</h2>
            </div>

            <!-- Title -->
            <h1 class="font-serif text-4xl md:text-5xl lg:text-6xl text-gray-900 font-bold mb-4 italic text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-indigo-900">
                Certificate of Completion
            </h1>
            
            <p class="text-lg text-gray-500 mb-8 font-light">This is to verify that</p>

            <!-- Name -->
            <div class="mb-8 relative inline-block">
                <h2 class="text-3xl md:text-5xl font-bold text-gray-800 px-8 py-2 border-b-2 border-blue-500 font-serif">
                    {{$data['name']}}
                </h2>
            </div>

            <!-- Achievement -->
            <p class="text-lg text-gray-500 mb-2">has successfully completed the quiz</p>
            <h3 class="text-2xl md:text-3xl font-bold text-blue-700 mb-8">{{$data['quiz']}}</h3>

            <!-- Footer -->
            <div class="flex flex-col md:flex-row justify-between items-center max-w-2xl mx-auto mt-12 gap-8">
                <div class="text-center">
                    <div class="text-lg font-bold text-gray-800 border-t border-gray-300 pt-2 px-8">
                        {{ date('Y-m-d') }}
                    </div>
                    <div class="text-xs text-gray-400 uppercase tracking-wider mt-1">Date Awarded</div>
                </div>

                <div class="text-center">
                     <div class="text-lg font-bold text-gray-800 border-t border-gray-300 pt-2 px-8 font-serif italic">
                        QuizMaster Team
                    </div>
                    <div class="text-xs text-gray-400 uppercase tracking-wider mt-1">Authorized Signature</div>
                </div>
            </div>

        </div>
    </div>

    <!-- Controls (No Print) -->
    <div class="fixed bottom-8 left-0 right-0 flex justify-center gap-4 pointer-events-none" data-html2canvas-ignore>
        <button onclick="downloadPDF()" class="pointer-events-auto bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-full shadow-lg transition-all transform hover:-translate-y-1 flex items-center gap-2">
            <i class="fa-solid fa-download"></i> Download as PDF
        </button>
        <a href="/" class="pointer-events-auto bg-white hover:bg-gray-50 text-gray-700 font-bold py-3 px-6 rounded-full shadow-lg transition-all transform hover:-translate-y-1 flex items-center gap-2">
            <i class="fa-solid fa-home"></i> Home
        </a>
    </div>

    <script>
        function downloadPDF() {
            const element = document.getElementById('certificate-content');
            const opt = {
                margin:       [10, 10], // top, left, bottom, right
                filename:     '{{$data["name"]}}_certificate.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2, useCORS: true },
                jsPDF:        { unit: 'mm', format: 'a4', orientation: 'landscape' }
            };
            
            // New Promise-based usage:
            html2pdf().set(opt).from(element).save();
        }
    </script>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Certificate</title>
    <style>
        body {
            font-family: 'Helvetica', sans-serif;
            text-align: center;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 40px;
            border: 10px solid #ddd;
            border-radius: 20px;
            position: relative;
        }
        .header-icon {
            font-size: 50px;
            color: #4f46e5;
            margin-bottom: 20px;
        }
        .title {
            font-size: 40px;
            font-weight: bold;
            color: #1e3a8a;
            margin-bottom: 10px;
            font-style: italic;
        }
        .subtitle {
            font-size: 18px;
            color: #6b7280;
            margin-bottom: 30px;
        }
        .name {
            font-size: 36px;
            font-weight: bold;
            color: #1f2937;
            border-bottom: 2px solid #3b82f6;
            display: inline-block;
            padding-bottom: 5px;
            margin-bottom: 30px;
        }
        .quiz-title {
            font-size: 28px;
            font-weight: bold;
            color: #4338ca;
            margin-bottom: 40px;
        }
        .footer {
            display: table;
            width: 100%;
            margin-top: 40px;
        }
        .col {
            display: table-cell;
            width: 50%;
            vertical-align: middle;
        }
        .signature {
            border-top: 1px solid #d1d5db;
            width: 80%;
            margin: 0 auto;
            padding-top: 10px;
            font-weight: bold;
            color: #374151;
        }
        .label {
            font-size: 12px;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header-icon">
            <!-- Simple PNG icon could be used here instead of FontAwesome if FA fails -->
            <img src="https://img.icons8.com/color/96/exam.png" alt="Quiz Icon" width="80" height="80">
        </div>
        
        <div class="subtitle">Quiz Master Certification</div>
        
        <div class="title">Certificate of Completion</div>
        
        <div class="subtitle">This is to verify that</div>
        
        <div class="name">{{ $data['name'] }}</div>
        
        <div class="subtitle">has successfully completed the quiz</div>
        
        <div class="quiz-title">{{ $data['quiz'] }}</div>
        
        <div class="footer">
            <div class="col">
                <div class="signature">{{ date('Y-m-d') }}</div>
                <div class="label">Date Awarded</div>
            </div>
            <div class="col">
                <div class="signature">QuizMaster Team</div>
                <div class="label">Authorized Signature</div>
            </div>
        </div>
    </div>
</body>
</html>

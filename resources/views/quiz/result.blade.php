<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ecf0f1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 50px;
        }
        .result-box {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .score {
            font-size: 2em;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .summary {
            font-size: 1.2em;
            color: #7f8c8d;
        }
        .back-btn {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: background 0.3s ease;
        }
        .back-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="result-box">
        <div class="score">🎉 Your Score: {{ $score }} / {{ $total }}</div>
        <div class="summary">
            @if($score == $total)
                Perfect!
            @elseif($score >= $total / 2)
                Good Job! 
            @else
                Keep Practicing! 
            @endif
        </div>
        <a href="{{ route('take-quiz') }}" class="back-btn">Try Again</a>
    </div>
</body>
</html>

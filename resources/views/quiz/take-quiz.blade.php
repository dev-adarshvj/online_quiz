<!DOCTYPE html>
<html>
<head>
    <title>Take Quiz</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            padding: 40px;
            max-width: 800px;
            margin: auto;
            color: #333;
        }
        h2 {
            text-align: center;
            color: #2c3e50;
        }
        .question-block {
            background: #fff;
            padding: 20px 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
        }
        .question-block p {
            font-weight: bold;
            margin-bottom: 10px;
            font-size: 1.1em;
        }
        .option-label {
            display: block;
            margin-bottom: 8px;
            cursor: pointer;
            font-size: 0.95em;
        }
        .submit-btn {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1.1em;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .submit-btn:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h2>Take Quiz</h2>

    <form action="{{ route('quiz.submit') }}" method="POST">
        @csrf

        @foreach ($questions as $index => $question)
            <div class="question-block">
                <p>Q{{ $index + 1 }}: {{ $question->question }}</p>

                @foreach($question->options as $option)
                    <label class="option-label" for="option-{{ $option->id }}">
                        <input type="radio" 
                               name="answers[{{ $question->id }}]" 
                               id="option-{{ $option->id }}" 
                               value="{{ $option->id }}" 
                               required>
                        {{ $option->option_text }}
                    </label>
                @endforeach
            </div>
        @endforeach

        <button type="submit" class="submit-btn">Submit Quiz</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Add Quiz Question</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f8;
            padding: 40px;
            max-width: 700px;
            margin: auto;
            color: #333;
        }

        h2 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        form {
            background: #fff;
            padding: 25px 30px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
        }

        textarea, input[type="text"] {
            width: 100%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            font-size: 1em;
        }

        .option-group {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .option-group input[type="text"] {
            flex: 1;
        }

        .option-group input[type="radio"] {
            margin-left: 15px;
        }

        .note {
            font-size: 0.9em;
            color: #777;
            margin-bottom: 15px;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 10px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: #2980b9;
        }

        .success {
            background: #e8f8ec;
            color: #2e7d32;
            padding: 10px 15px;
            border-left: 5px solid #2e7d32;
            margin-bottom: 20px;
            border-radius: 5px;
        }

        .link {
            display: block;
            text-align: center;
            margin-top: 30px;
        }

        .link a {
            color: #3498db;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h2>Add a Quiz Question</h2>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('save-question') }}">
        @csrf

        <label for="question">Question:</label>
        <textarea name="question" id="question" rows="3" required></textarea>

        <label>Options <span class="note">(Select the correct one)</span>:</label>
        @for($i = 0; $i < 4; $i++)
            <div class="option-group">
                <input type="text" name="option[]" placeholder="Option {{ $i + 1 }}" required>
                <input type="radio" name="correct" value="{{ $i }}" required title="Mark as correct answer">
            </div>
        @endfor

        <button type="submit">Add Question</button>
    </form>

    <div class="link">
        <a href="{{ route('take-quiz') }}">Take the Quiz</a>
    </div>

</body>
</html>

<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login.html");
}
$_SESSION['level4']=100;
?>
<html>
    <head>
    <title>Quiz</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body {
	font-family: Arial, sans-serif;
}
body{
    background-image:url(5JECWk.jpg);
    background-size: cover;
    background-repeat: no-repeat;
}
#quiz-container {
	margin: 20px auto;
	padding: 20px;
	border: 1px solid #ccc;
	border-radius: 10px;
	max-width: 600px;
}

#question-container {
	margin-bottom: 20px;
    background-attachment: fixed;
}

#choices {
	list-style: none;
	padding: 0;
}

#button-container {
	display: flex;
	justify-content: space-between;
	align-items: center;
	margin-top: 20px;
}

button {
	font-size: 16px;
	padding: 10px 20px;
	border: none;
	border-radius: 5px;
	background-color: #3498db;
	color: #fff;
	cursor: pointer;
}

button:disabled {
	opacity: 0.5;
	cursor: default;
}

.hidden {
	display: none;
}
#pic{
    width: 300px;
    height: 200px;
}
#results-container{
    width:1000px;
    height:700px;
    margin-left: 550px;
    margin-top: 300px;
}
nav {
                background-color: #333; /* Set background color */
                color: #fff; /* Set text color */
                display: flex; /* Use flexbox for layout */
                justify-content: space-between; /* Align items to left and right */
                padding:10px; /* Add padding */
            }

            ul {
            list-style: none; /* Remove bullets from list */
            margin: 0; /* Remove default margin */
            padding: 0; /* Remove default padding */
            }

            li {
            display: inline-block; /* Display items horizontally */
            margin-right: 20px; /* Add spacing between items */
            }

            span {
            font-weight: bold; /* Make text bold */
            }

            #time {
            font-size: 1.5em; /* Increase font size for time */
            }

            #current-score {
            color: yellow; /* Change text color for score */
            }

            #hint {
            color: #ccc; /* Change text color for hint */
            }
            #submit-button,#next-button{
                background-color: brown;
            }

        </style>
    </head>
    <body>
    <nav>
        <ul>
            <li id="timer">Time Left: <span id="time">100</span> seconds</li>
            <li id="score">Score: <span id="current-score">0</span></li>
        </ul>
    </nav>
	<h1>Quiz</h1>
	<p>Answer the following questions:</p>
	<div id="quiz-container">
		<div id="question-container">
			<h2 id="question"></h2>
			<ul id="choices"></ul>
		</div>
		<div id="button-container">
			<button id="next-button">Next</button>
			<button id="submit-button" disabled>Submit</button>
		</div>
	</div>
	<div id="results-container" class="hidden">
		<h2>Results</h2>
		<p id="score"></p>
        <img id="pic">
	</div>
    <script>
        var questions = [
    {
        question:'Which European country calls Santa as Pai Natal?',
        choices: ['Spain','Portugal','Brazil','Indonesia'],
        answer: 'Portugal'
    },
    {
        question: 'Where was Jesus born?',
        choices: ['Jerusalem','Nazareth','Bethlehem','Croatia'],
        answer: 'Bethlehem'
    },
    {
        question: 'Where is Santa’s Lapland home?',
        choices: ['Greenland','Antarctica','The North Pole','Norway'],
        answer: 'The North Pole'
    },
    {
        question: 'In which country would you NOT find Reindeer?',
        choices: ['Russia','Finland','Cuba','Sweden'],
        answer: 'Cuba'
    },
    {
        question: 'Which is colder - The North or South Pole?',
        choices: ['North Pole','South Pole','Both are the same','None of the above'],
        answer: 'South Pole'
    }
];

var currentQuestion = 0;
var score = 0;

var quizContainer = document.getElementById('quiz-container');
var questionContainer = document.getElementById('question-container');
var questionElement = document.getElementById('question');
var choicesElement = document.getElementById('choices');
var nextButton = document.getElementById('next-button');
var submitButton = document.getElementById('submit-button');
var resultsContainer = document.getElementById('results-container');
var scoreElement = document.getElementById('score');
var pic=document.getElementById('pic');
var timeLeft = 100;
            var score=0;
            startTimer();
            function startTimer() {
                let timer = setInterval(() => {
                timeLeft--;
                <?php $_SESSION['level4']=$_SESSION['level4']-1;?>
                document.getElementById('time').innerHTML = timeLeft;
                if (timeLeft === 0) {
                    clearInterval(timer);
                    endGame();
                }
                },1000);
            }
function showQuestion() {
    var q = questions[currentQuestion];
    questionElement.textContent = q.question;

    while (choicesElement.firstChild) {
        choicesElement.removeChild(choicesElement.firstChild);
    }

    for (var i = 0; i < q.choices.length; i++) {
        var li = document.createElement('li');
        var input = document.createElement('input');
        var label = document.createElement('label');

        input.type = 'radio';
        input.name = 'answer';
        input.value = q.choices[i];
        input.id = 'choice' + i;
        input.addEventListener('change', enableButtons);

        label.textContent = q.choices[i];
        label.setAttribute('for', 'choice' + i);

        li.appendChild(input);
        li.appendChild(label);
        choicesElement.appendChild(li);
    }

    if (currentQuestion === questions.length - 1) {
        nextButton.disabled = true;
        submitButton.disabled = false;
    } else {
        nextButton.disabled = false;
        submitButton.disabled = true;
    }
}

function enableButtons() {
    nextButton.disabled = false;
}

function showResults() {
    quizContainer.classList.add('hidden');
    resultsContainer.classList.remove('hidden');
    scoreElement.textContent = 'You scored ' + score + ' out of ' + questions.length + ' correct answers!';
    if(score>=3){
        window.location.href="clue4.php";
    }
    else{
        alert("You are not eligible for the next stage. Try again")
        windows.location.href="stage4.php";
    }
}

function checkAnswer() {
    var selected = choicesElement.querySelector('input[name="answer"]:checked');

    if (!selected) {
        return;
    }

    if (selected.value === questions[currentQuestion].answer) {
        score++;
    }

    currentQuestion++;

    if (currentQuestion === questions.length) {
        showResults();
    } else {
        showQuestion();
    }
}

showQuestion();
nextButton.addEventListener('click', checkAnswer);
submitButton.addEventListener('click', showResults);

    </script>
</body>
</html>
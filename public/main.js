//
// main.js
//

// variables initialization

let score = 0,
answeredQuestions = 0;
let appContainer = document.getElementById("questions-container");
let startBtn = document.getElementById("start-btn");
let scoreContainer = document.getElementById("score-container");
scoreContainer.innerHTML = `Score: ${score}/${questionsData.length}`;


function insertQuestionInDom(question) {
    
    console.log(question);
    const questionList = appContainer;

    const questionElement = document.createElement('li');

    questionElement.dataset.id = question.id;

    const titleElement = document.createElement('p');
    titleElement.textContent = question.title;
    questionElement.append(titleElement);

    questionList.append(questionElement);
}

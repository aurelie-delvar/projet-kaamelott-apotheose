//
// main.js
//

// variables initialization

let score = 0;
answeredQuestions = 0;
let appContainer = document.getElementById("questions-container");
let startBtn = document.getElementById("start-btn");


function showQuestion(question){

    const questionList = appContainer;

    const popup = document.createElement('div');
    popup.classList.add('question');

    const questionElement = document.createElement('div');
    
    const titleElement = document.createElement('h4');
    titleElement.textContent = question.title;

    const answersElement = document.createElement('div');
    answersElement.id = 'answers';
    answersElement.classList.add('answers');

    const answer1Element = document.createElement('button');
    answer1Element.classList.add('answer');
    answer1Element.textContent = question.answer1;

    const answer2Element = document.createElement('button');
    answer2Element.classList.add('answer');
    answer2Element.textContent = question.answer2;

    const answer3Element = document.createElement('button');
    answer3Element.classList.add('answer');
    answer3Element.textContent = question.answer3;

    const answer4Element = document.createElement('button');
    answer4Element.classList.add('answer');    
    answer4Element.textContent = question.answer4;
    
    popup.append(questionElement, answersElement);
    questionElement.append(titleElement);
    answersElement.append(answer1Element, answer2Element, answer3Element, answer4Element);

    questionList.append(popup);
    
    answer1Element.addEventListener("click", function(){
        if(question.answer1 == question.goodAnswer){
            score += 1;
            console.log('bonne réponse'+ score);
        }
        answeredQuestions += 1;
        console.log(answeredQuestions);
    }); 
    
    answer2Element.addEventListener("click", function(){
        if(question.goodAnswer === question.answer2){
            score += 1;
            console.log('bonne réponse'+ score);
        }
        answeredQuestions += 1;
        console.log(answeredQuestions);
    }); 

    answer3Element.addEventListener("click", function(){
        if(question.goodAnswer === question.answer3){
            score += 1;
            console.log('bonne réponse'+ score);
        }
        answeredQuestions += 1;
        console.log(answeredQuestions);
    }); 
    answer4Element.addEventListener("click", function(){
        if(question.goodAnswer === question.answer4){
            score += 1;
            console.log('bonne réponse'+ score);
        }
        answeredQuestions += 1;
        console.log(answeredQuestions);
    }); 

    
}


// TODO: fonctionne pour le bouton start
function handleClick() {
    console.log("le joueur a cliqué sur le bouton start");

}

startBtn.addEventListener('click', handleClick);




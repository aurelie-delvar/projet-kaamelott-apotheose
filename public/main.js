//
// main.js
//

// variables initialization
var current_index = 0 ;
let score = 0;
answeredQuestions = 0;
let appContainer = document.getElementById("questions-container");
let startBtn = document.getElementById("start-btn");
let resultatContainer = document.getElementById("resultat-container");
let resultat = document.getElementById("resultat");
let scoreContainer = document.getElementById("score-container");

// var questions = new Array();

var questions = {};


async function getQuestions() {

    const req = await fetch(`${urlQuizz}`);
    
    const quizz = await req.json();
    const questions = quizz.questions;
  
   return questions;

}

async function next(){
	let questions = await this.getQuestions();

    if (current_index+1 == questions.length){
		
        if(score <=1){
            score++; 	
        }
		resultats();
        
    }else{
		scoreContainer.innerHTML = "Score: " + score + " / " + questions.length;
        showQuestion((current_index+1));
    }
}

async function resultats(){
	let questions = await this.getQuestions();
	quizElement = document.getElementById("questions-container");
	resultat = document.getElementById("resultat");
	scoreDiv = document.getElementById("score");
	scoreDiv.innerHTML = "";
	againButton = document.getElementById("againButton");
	quizElement.style.visibility = 'hidden';
	resultatContainer.style.visibility = 'visible';
    resultat.style.visibility = 'visible';
	
	scoreContainer.innerHTML = "Score: " + score + " / " + questions.length;
	scoreDiv.innerHTML = `Vous avez ${score} bonnes réponses sur ${questions.length}`;

	againButton = document.createElement("button");
	againButton.id = "againButton";
	againButton.innerHTML = "<input type='button' value='again' id='inputAgain' onclick=\"startAgainQuiz()\";/>";
	scoreDiv.append(againButton);
}

function compare  (a,b){
	if (a.includes(b)){
		score +=1;
	}
 next();
}

async function showQuestion(index){

	current_index = index;
    let questions = await this.getQuestions();

	startElement = document.getElementById("start-btn");
	quizElement = document.getElementById("questions-container");
	startElement.style.visibility = 'hidden';
	resultatContainer.style.visibility = 'hidden';
	quizElement.style.visibility = 'visible';
	

	document.getElementById("title").innerHTML = questions[index].title;
	answers = document.getElementById("answers");
	answers.innerHTML = "";
	answers.innerHTML += "<input type='button' class='answer' value='"+questions[index].answer1+"' onclick=\"compare(\'"+questions[index].answer1+"\',\'"+questions[index].goodAnswer+"\');\" />"; 
    answers.innerHTML += "<input type='button' class='answer' value='"+questions[index].answer2+"' onclick=\"compare(\'"+questions[index].answer2+"\',\'"+questions[index].goodAnswer+"\');\" />"; 
    answers.innerHTML += "<input type='button' class='answer' value='"+questions[index].answer3+"' onclick=\"compare(\'"+questions[index].answer3+"\',\'"+questions[index].goodAnswer+"\');\" />"; 
    answers.innerHTML += "<input type='button' class='answer' value='"+questions[index].answer4+"' onclick=\"compare(\'"+questions[index].answer4+"\',\'"+questions[index].goodAnswer+"\');\" />";
    
}
 
function startAgainQuiz(){
	startElement = document.getElementById("start-btn");
	resultat = document.getElementById("resultat");
	startBtn = document.getElementById("start-btn");
	startElement.style.visibility = 'visible';
	resultatContainer.style.visibility = 'hidden';
    resultat.style.visibility = 'hidden';
	
	startBtn.innerHTML = "<input type='button' value='start' onclick=\"showQuizz(0)\";/>";
	score=0;

}




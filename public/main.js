//
// main.js
//

// variables initialization
var current_index = 0 ;
let score = 0;

let start = document.getElementById("start");
let scoreContainer = document.getElementById("score-container");

let quizElement = document.getElementById("questions-container");
let answers = document.getElementById("answers");
let resultatContainer = document.getElementById("resultat-container");
let resultat = document.getElementById("resultat");
let scoreDiv = document.getElementById("score");
let	againDiv = document.getElementById("again");


// var questions = Object;
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
	
	scoreDiv.innerHTML = "";

	quizElement.style.visibility = 'hidden';

	resultatContainer.style.visibility = 'visible';
	scoreDiv.style.visibility = 'visible';
    resultat.style.visibility = 'visible';
	
	// display button score (top)
	scoreContainer.innerHTML = "Score: " + score + " / " + questions.length;
	// display score (bottom)
	scoreDiv.innerHTML = `Vous avez ${score} bonnes réponses sur ${questions.length}`;
	
	againDiv.innerHTML = "<button type='submit' id='againButton' onclick=\"startAgainQuiz()\";>Recommencer</button>";

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
	
	start.style.visibility = 'hidden';
	resultatContainer.style.visibility = 'hidden';
	quizElement.style.visibility = 'visible';
	
	document.getElementById("title").innerHTML = questions[index].title;

	answers.innerHTML = "";
	answers.innerHTML += "<input type='button' class='answer' value='"+questions[index].answer1+"' onclick=\"compare(\'"+questions[index].answer1+"\',\'"+questions[index].goodAnswer+"\');\" />"; 
    answers.innerHTML += "<input type='button' class='answer' value='"+questions[index].answer2+"' onclick=\"compare(\'"+questions[index].answer2+"\',\'"+questions[index].goodAnswer+"\');\" />"; 
    answers.innerHTML += "<input type='button' class='answer' value='"+questions[index].answer3+"' onclick=\"compare(\'"+questions[index].answer3+"\',\'"+questions[index].goodAnswer+"\');\" />"; 
    answers.innerHTML += "<input type='button' class='answer' value='"+questions[index].answer4+"' onclick=\"compare(\'"+questions[index].answer4+"\',\'"+questions[index].goodAnswer+"\');\" />";
    
}
 
function startAgainQuiz(){
	
	//start.style.visibility = 'visible';
	resultatContainer.style.visibility = 'hidden';
    resultat.style.visibility = 'hidden';
	scoreDiv.style.visibility = 'hidden';
	
	scoreContainer.innerHTML = "Score: 0";
	score =0;
	showQuestion(0);	
}




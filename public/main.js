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
let profilDiv = document.getElementById("profil");
let	againDiv = document.getElementById("again");
let titleElement = document.getElementById("title");
let userInput = document.getElementById("userId");

// var questions = Object;
var questions = {};

// the getQuestions function is used to retrieve information from the API
async function getQuestions() {

    const req = await fetch(`${urlQuizz}`); 
    const quizz = await req.json();
    const questions = quizz.questions;
  
	return questions;

}

// the getQuizz function is used to retrieve information from the API
async function getQuizz() {

    const req = await fetch(`${urlQuizz}`); 
    const quizz = await req.json();
	const quizzId = quizz.id;
	return quizzId;

}

// The next function allows you to move on to the next question. At the last question answered, the score is displayed with the resultats function
async function next(){
	let questions = await this.getQuestions();
	
    if (current_index+1 == questions.length){
		
		resultats();
        
    }else{
		scoreContainer.innerHTML = "Score: " + score + " / " + questions.length;
        showQuestion((current_index+1));
    }
}

// the resultats function allows the display of the score and the button to start again and to register the score in db
async function resultats(){
	let quizzId = await this.getQuizz();
	let questions = await this.getQuestions();
	let userId = userInput.value;
	console.log(userId);
	scoreDiv.innerHTML = "";
	titleElement.innerHTML="";
	answers.innerHTML="";
	quizElement.style.visibility = 'hidden';

	resultatContainer.style.visibility = 'visible';
	scoreDiv.style.visibility = 'visible';
    resultat.style.visibility = 'visible';
	
	// display button score (top)
	scoreContainer.innerHTML = "Score: " + score + " / " + questions.length;
	// display score (bottom)
	scoreDiv.innerHTML = `Vous avez ${score} bonnes réponses sur ${questions.length}`;
	
	// Send score to profil user (->backoffice -> BDD)
	fetch(`${newUrl}api/play/quizz/add`, {
	method: 'POST',
	body: JSON.stringify({
		"quizz":quizzId,
		"score":score,
		"user": userId
	  })
	})
	.then(response => {
		profilDiv.innerHTML = "Votre score a été ajouté dans votre profil";
	})
	.catch(error => console.error(error));

	againDiv.innerHTML = "<button  type='submit'  id='againButton' onclick=\"startAgainQuiz()\";>Recommencer</button>";
	
}

// the compare function compares the player's answer with the correct answer
function compare  (a,b){
	if (b.includes(a)){
		score +=1;
	}
 	next();
}

// the showQuestion function displays the question
async function showQuestion(index){
	
	current_index = index;
    let questions = await this.getQuestions();
	
	start.style.visibility = 'hidden';
	resultatContainer.style.visibility = 'hidden';
	quizElement.style.visibility = 'visible';
	
	titleElement.innerHTML = questions[index].title;

	answers.innerHTML = "";
	answers.innerHTML += "<button type='submit' class='answer' value='"+questions[index].answer1+"' onclick=\"compare(\'"+questions[index].answer1+"\',\'"+questions[index].goodAnswer+"\');\" > "+questions[index].answer1+"</button>"; 
    answers.innerHTML += "<button type='submit' class='answer' value='"+questions[index].answer2+"' onclick=\"compare(\'"+questions[index].answer2+"\',\'"+questions[index].goodAnswer+"\');\" > "+questions[index].answer2+" </button>"; 
    answers.innerHTML += "<button type='submit' class='answer' value='"+questions[index].answer3+"' onclick=\"compare(\'"+questions[index].answer3+"\',\'"+questions[index].goodAnswer+"\');\" > "+questions[index].answer3+"</button>"; 
    answers.innerHTML += "<button type='submit' class='answer' value='"+questions[index].answer4+"' onclick=\"compare(\'"+questions[index].answer4+"\',\'"+questions[index].goodAnswer+"\');\" > "+questions[index].answer4+"</button>";
    
}

// the startAgainQuiz function allows you to restart the quiz
function startAgainQuiz(){
	
	resultatContainer.style.visibility = 'hidden';
    resultat.style.visibility = 'hidden';
	scoreDiv.style.visibility = 'hidden';
	
	scoreContainer.innerHTML = "Score: 0";
	score =0;
	showQuestion(0);	
}


  




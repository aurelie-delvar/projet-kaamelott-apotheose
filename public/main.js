//
// main.js
//

// variables initialization
var current_index = 0 ;
let score = 0;
answeredQuestions = 0;
let appContainer = document.getElementById("questions-container");
let startBtn = document.getElementById("start-btn");
let resultat = document.getElementById("resultat");

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
    if ( current_index+1 == questions.length){
        if( score <=1){
            alert(`Vous avez ${score} bonne réponse sur ${questions.length}`);
            
        }else{
          alert(`Vous avez ${score} bonnes réponses sur ${questions.length}`);
          
        }
        resultats();
        
    }else{
        showQuestion((current_index+1));
    }
}

function resultats(){
	quizElement = document.getElementById("questions-container");
	resultat = document.getElementById("resultat");
	score = document.getElementById("score");
	score.innerHTML = "";
	againButton = document.getElementById("againButton");
	quizElement.style.visibility = 'hidden';
    resultat.style.visibility = 'visible';
	
	
	score.innerHTML = `Vous avez ${score} bonnes réponses sur ${questions.length}`;
	againButton.innerHTML = "<input type='button' value='again' onclick=\"startAgainQuiz()\";/>";
	
}

function compare  (a,b){
	if (a.includes(b)){
		alert("bonne réponse");
		score +=1;
		
	}else{
		alert("mauvaise réponse");
	}
 next();
}

async function showQuestion(index){

	current_index = index;
    let questions = await this.getQuestions();
    console.log (questions);
    
    console.log(questions[index].title);
	startElement = document.getElementById("start-btn");
	quizElement = document.getElementById("questions-container");
	startElement.style.visibility = 'hidden';
	quizElement.style.visibility = 'visible';
	

	document.getElementById("title").innerHTML = questions[index].title;
	answers = document.getElementById("answers");
	answers.innerHTML = "";
	answers.innerHTML += "<button type='submit' class='answer' value='"+questions[index].answer1+"' onclick=\"compare(\'"+questions[index].answer1+"\',\'"+questions[index].goodAnswer+"\');\" > "+questions[index].answer1+"</button>"; 
    answers.innerHTML += "<button type='submit' class='answer' value='"+questions[index].answer2+"' onclick=\"compare(\'"+questions[index].answer2+"\',\'"+questions[index].goodAnswer+"\');\" > "+questions[index].answer2+" </button>"; 
    answers.innerHTML += "<button type='submit' class='answer' value='"+questions[index].answer3+"' onclick=\"compare(\'"+questions[index].answer3+"\',\'"+questions[index].goodAnswer+"\');\" > "+questions[index].answer3+"</button>"; 
    answers.innerHTML += "<button type='submit' class='answer' value='"+questions[index].answer4+"' onclick=\"compare(\'"+questions[index].answer4+"\',\'"+questions[index].goodAnswer+"\');\" > "+questions[index].answer4+"</button>";
    
}
 
function startAgainQuiz(){
	startElement = document.getElementById("start-btn");
	resultat = document.getElementById("resultat");
	startBtn = document.getElementById("start-btn");
	startElement.style.visibility = 'visible';
    resultat.style.visibility = 'hidden';
	
	startBtn.innerHTML = "<input type='button' value='start' onclick=\"showQuizz(0)\";/>";
	score=0;

}




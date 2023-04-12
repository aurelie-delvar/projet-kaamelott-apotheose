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

/*function showQuestion(index){

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


    
}*/

function next(){
	
    if ( current_index+1 == questions.length){
        if( score <=1){
            alert(`Vous avez ${score} bonne réponse sur ${questions.length}`);
            
        }else{
          alert(`Vous avez ${score} bonnes réponses sur ${questions.length}`);
          
        }
        resultats();
        
    }else{
        show_quizz((current_index+1));
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

function showQuestion(questions, index){
	/*nbBonnereponse=0;*/
	current_index = index;
    
    console.log(questions.title);
	startElement = document.getElementById("start-btn");
	quizElement = document.getElementById("questions-container");
	startElement.style.visibility = 'hidden';
	quizElement.style.visibility = 'visible';
	

	document.getElementById("title").innerHTML = questions.title;
	answers = document.getElementById("answers");
	answers.innerHTML = "";
	answers.innerHTML += "<input type='button' value='"+questions.answer1+"' onclick=\"compare(\'"+questions.answer1+"\',\'"+questions.goodAnswer+"\');\" />"; 
    answers.innerHTML += "<input type='button' value='"+questions.answer2+"' onclick=\"compare(\'"+questions.answer2+"\',\'"+questions.goodAnswer+"\');\" />"; 
    answers.innerHTML += "<input type='button' value='"+questions.answer3+"' onclick=\"compare(\'"+questions.answer3+"\',\'"+questions.goodAnswer+"\');\" />"; 
    answers.innerHTML += "<input type='button' value='"+questions.answer4+"' onclick=\"compare(\'"+questions.answer4+"\',\'"+questions.goodAnswer+"\');\" />";
    
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




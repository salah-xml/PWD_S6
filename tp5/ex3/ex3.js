 
 const QUESTIONS = [
    ["Quelle est la capitale de la France ?", "Paris"],
    ["Combien de planètes y a-t-il dans le système solaire ?", "8"],
    ["Qui a écrit 'Les Misérables' ?", "Victor Hugo"],
    ["Quel est le plus grand océan du monde ?", "Pacifique"],
    ["En quelle année l'homme a-t-il marché sur la Lune pour la première fois ?", "1969"]
];


function lancerQuiz() {
    let score = 0;

    for (let i = 0; i < QUESTIONS.length; i++) {
        let question = QUESTIONS[i][0];
        let reponseCorrecte = QUESTIONS[i][1];
        let reponseUtilisateur = prompt(question);

        
        if (reponseUtilisateur === null) {
            alert("Quiz interrompu.");
            return;
        }

        if (reponseUtilisateur.trim().toLowerCase() === reponseCorrecte.trim().toLowerCase()) {
            score++;
            alert(" Réponse juste !");
        } else {
            alert(` Réponse fausse. La bonne réponse était : ${reponseCorrecte}`);
        }
    }

    
    document.getElementById("resultat").innerHTML = 
        `<p> Vous avez répondu correctement à <strong>${score}</strong> question(s) sur <strong>${QUESTIONS.length}</strong>.</p>`;
}
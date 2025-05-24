   
   const maDiv = document.getElementById('maDiv');
   const paragraphe = document.getElementById('p');

  
   maDiv.onclick= function ()
   {
           
       paragraphe.textContent = "Le texte a été modifié.";
       alert("Un clic a été détecté.") ;
       
   };
   maDiv.onclick= function ()
   {
      
     
       paragraphe.style.backgroundColor = "lightblue";
       paragraphe.style.textAlign = "center";

   };
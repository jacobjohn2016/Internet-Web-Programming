$(document).ready(function(){
	$('#formTitle').addClass('shake-rotate');
	setTimeout(function(){
		$('#formTitle').removeClass('shake-rotate')
	}, 800)
});

function main(){

	//Create API parameters based on ingredients inputed
	var inputVal = document.getElementById('ingredientsInput').value;
	var upToIngredients = 'https://spoonacular-recipe-food-nutrition-v1.p.mashape.com/recipes/findByIngredients?ingredients=';
	var afterIngredients = '&number=200&limitLicense=false&fillIngredients=true&ranking=1&limitLicense=false&mashape-key=btSAgzlS6CmshxyNyEh24vDF8sl2p1w43h9jsnCABHsQZSfxx6'

	//Get recipes for specific ingredients from API 
	var searchByIngredients = new XMLHttpRequest();
	searchByIngredients.open("GET", upToIngredients + inputVal + afterIngredients, false);
	searchByIngredients.send();

	//Parse what API returns (in JSON)
	var recipes = JSON.parse(searchByIngredients.response);

	//Create arrays for HTML creation
	var recipeDiv;
	var ingredientsMissing;
	var name;
	var img;
	var description;
	var descriptionText;
	var clickPart;
	var likes;

	recipeWrapper = document.createElement("div");
	recipeWrapper.setAttribute("class", "recipeWrapper");
	recipeWrapper.setAttribute("id", "recipeWrapper");

	recipeContainer = document.createElement("div");
	recipeContainer.setAttribute("class", "recipeContainer");

	//Delete visible recipes when re-search
	if (document.getElementsByClassName("recipeWrapper") !== null) {
		$(".recipeWrapper").remove();
	}


	//Create HTML
	for (var i = 0; i < recipes.length; i++) {

		//Create divs so you get a div for each recipe
		recipeDiv = $("<div>")
			.addClass("recipeBlock")
			.attr("id", i);
			
		//Create spans to contain name of dish; and create and append the actual name of dish to said span
		name = $("<span/>")
			.addClass("name")
			.html(recipes[i].title);
		sessionStorage.setItem('title' + i, recipes[i].title);


		//Create img tags to contain image;
		img = $("<img/>")
			.addClass("img")
			.attr("src", recipes[i].image);
		sessionStorage.setItem('imageURL' + i, recipes[i].image);

		
		//Create spans with id to contain number and names of missing ingredients
		ingredientsMissing = $("<div/>").addClass("ingredientsMissing");
		//Add names of missing ingredients only if there are any
		if (recipes[i].missedIngredients.length == 0) {
			ingredientsMissing.html("<b>You have all the ingredients!</b>");
		} else {
			ingredientsMissing.html("<b>" + recipes[i].missedIngredients.length + " " + "ingredients missing:</b></br>");
			var x = [];
			for (var j = 0; j < recipes[i].missedIngredients.length; j++) {
				x[j] = recipes[i].missedIngredients[j].name;
				ingredientsMissing.append(x[j]);
				if (j !== recipes[i].missedIngredients.length - 1) {
					ingredientsMissing.append(", ");
				}
			}
		};

		//Create divs to contain number of likes
		likes = $("<div/>").addClass("likes");
		likes.html("<b>Likes</b> " + recipes[i].likes);

		//Create anchor tags to make the recipe blocks clickable
		clickPart = $("<a/>").addClass("clickPart");
		var url = "recipePage.html?id=" + recipes[i].id;
		clickPart.attr("href", url);

		//Append all parts of recipe blocks to recipe blocks
		recipeDiv.append(clickPart)
			.append(name)
			.append(img)
			.append(likes)
			.append(ingredientsMissing);

		//Append recipe blocks to container
		$(recipeContainer).append(recipeDiv);
	}

	
	//Append recipe container to recipe wrapper and that to DOM (now recipes are visible)
	recipeWrapper.append(recipeContainer);
	$('body').append(recipeWrapper);
	
	//Isotope initiation (grid format)
	// $('.recipeWrapper').imagesLoaded(function() {
	    
	    $('.recipeWrapper').isotope({
		  	itemSelector: 'div.recipeBlock',
		  	columnWidth: 'div.recipeBlock'
		});

	    //Scroll down on when recipes ready
		$('html,body').animate({
       		scrollTop: $(".recipeContainer").offset().top
    	}, 1500);
	// });

	let win = $(window);
	let search = $("#search");

	win.on("scroll", function(){
		let top = win.scrollTop() / 2;
		search.css("transform", "rotate(" + top + "deg)");
	});

};
